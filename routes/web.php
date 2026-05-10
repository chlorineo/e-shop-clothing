<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\ProfileController;
use App\Models\Product;
use App\Models\Tag;
use App\Models\TagCategory;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Schema;
use App\Http\Controllers\CheckoutController;

Route::post('/cart/add', [CartController::class, 'add'])->name('cart.add');

$ensureAdmin = static function (): void {
    abort_unless(auth()->user()?->is_admin, 403);
};

Route::get('/', function () {
    return view('index');
});

Route::get('/category', function () {
    $allowedTypeTags = ['Mens', 'Womans', 'Unisex', 'Accessories'];
    $allowedSorts = ['cheapest', 'most_expensive', 'newest'];
    $currentTypeTag = request()->filled('type')
        ? (string) request()->input('type')
        : null;
    $currentSort = request()->filled('sort')
        ? (string) request()->input('sort')
        : null;

    if ($currentTypeTag !== null && ! in_array($currentTypeTag, $allowedTypeTags, true)) {
        $currentTypeTag = null;
    }

    if ($currentSort !== null && ! in_array($currentSort, $allowedSorts, true)) {
        $currentSort = null;
    }

    $requiredTags = $currentTypeTag !== null ? [$currentTypeTag] : [];
    $searchText = trim((string) request()->input('search', ''));
    $selectedTags = collect(request()->input('tags', []))
        ->filter(fn (mixed $tag): bool => is_string($tag) && $tag !== '')
        ->values()
        ->all();

    $allRequiredTags = array_values(array_unique([...$requiredTags, ...$selectedTags]));

    $products = new LengthAwarePaginator([], 0, 20);
    $filterCategories = collect();
    $priceBounds = [
        'min' => 0.0,
        'max' => 0.0,
    ];
    $selectedPriceRange = [
        'min' => 0.0,
        'max' => 0.0,
    ];

    if (Schema::hasTable('products')) {
        $baseProductQuery = Product::query()
            ->withAllTags($requiredTags)
            ->matchingSearch($searchText);

        $minimumAvailablePrice = (float) ((clone $baseProductQuery)->min('price') ?? 0);
        $maximumAvailablePrice = (float) ((clone $baseProductQuery)->max('price') ?? 0);

        $priceBounds = [
            'min' => $minimumAvailablePrice,
            'max' => $maximumAvailablePrice,
        ];

        $requestedMinimumPrice = request()->filled('price_min')
            ? (float) request()->input('price_min')
            : $minimumAvailablePrice;
        $requestedMaximumPrice = request()->filled('price_max')
            ? (float) request()->input('price_max')
            : $maximumAvailablePrice;

        $selectedMinimumPrice = max($minimumAvailablePrice, min($requestedMinimumPrice, $maximumAvailablePrice));
        $selectedMaximumPrice = max($minimumAvailablePrice, min($requestedMaximumPrice, $maximumAvailablePrice));

        if ($selectedMinimumPrice > $selectedMaximumPrice) {
            [$selectedMinimumPrice, $selectedMaximumPrice] = [$selectedMaximumPrice, $selectedMinimumPrice];
        }

        $selectedPriceRange = [
            'min' => $selectedMinimumPrice,
            'max' => $selectedMaximumPrice,
        ];

        $productQuery = Product::query()
            ->with('images')
            ->withAllTags($allRequiredTags)
            ->matchingSearch($searchText)
            ->withinPriceRange($selectedMinimumPrice, $selectedMaximumPrice);

        if ($currentSort === 'cheapest') {
            $productQuery->orderBy('price')->orderBy('id');
        } elseif ($currentSort === 'most_expensive') {
            $productQuery->orderByDesc('price')->orderBy('id');
        } elseif ($currentSort === 'newest') {
            $productQuery->orderByDesc('created_at')->orderByDesc('id');
        } else {
            $productQuery->orderBy('id');
        }

        $products = $productQuery
            ->paginate(20)
            ->withQueryString();
    }

    if (Schema::hasTable('tag_categories') && Schema::hasTable('tags')) {
        $filterCategories = TagCategory::query()
            ->where('name', '!=', 'Type')
            ->with(['tags' => fn ($query) => $query->orderBy('name')])
            ->orderByRaw("case name when 'Color' then 1 when 'Material' then 2 when 'Size' then 3 else 4 end")
            ->get();
    }

    return view('category', [
        'products' => $products,
        'filterCategories' => $filterCategories,
        'priceBounds' => $priceBounds,
        'currentSort' => $currentSort,
        'currentTypeTag' => $currentTypeTag,
        'requiredTags' => $requiredTags,
        'searchText' => $searchText,
        'selectedTags' => $selectedTags,
        'selectedPriceRange' => $selectedPriceRange,
    ]);
});


Route::get('/cart', function () {
    return view('cart');
});

Route::get('/checkout/delivery', [CheckoutController::class, 'showDelivery'])->name('checkout.delivery');
Route::post('/checkout/delivery', [CheckoutController::class, 'processDelivery'])->name('checkout.delivery.process');

Route::get('/checkout/contact', [CheckoutController::class, 'showContact'])->name('checkout.contact');
Route::post('/checkout/contact', [CheckoutController::class, 'processContact'])->name('checkout.contact.process');

Route::get('/checkout/summary', [CheckoutController::class, 'showSummary'])->name('checkout.summary');
Route::post('/checkout/place-order', [CheckoutController::class, 'placeOrder'])->name('checkout.place');


Route::get('/admin-panel', function () use ($ensureAdmin) {
    $ensureAdmin();

    $searchText = trim((string) request()->input('search', ''));
    $products = new LengthAwarePaginator([], 0, 20);
    $nextProductId = 1;

    if (Schema::hasTable('products')) {
        $nextProductId = ((int) Product::query()->max('id')) + 1;
        $products = Product::query()
            ->with(['images', 'tags.category'])
            ->matchingSearch($searchText)
            ->orderBy('id')
            ->paginate(20)
            ->withQueryString();
    }

    return view('admin_panel', [
        'products' => $products,
        'searchText' => $searchText,
        'nextProductId' => $nextProductId,
    ]);
})->middleware('auth')->name('admin-panel');

Route::get('/product', function () {
    abort_unless(Schema::hasTable('products'), 404);

    $product = Product::query()
        ->with(['tags.category', 'images'])
        ->findOrFail(request()->integer('product'));

    return view('product', [
        'product' => $product,
    ]);
});

Route::get('/edit-item', function () use ($ensureAdmin) {
    $ensureAdmin();

    abort_unless(Schema::hasTable('products'), 404);

    $requestedProductId = request()->integer('product') ?: (((int) Product::query()->max('id')) + 1);
    $product = Product::query()
        ->with(['tags.category', 'images'])
        ->find($requestedProductId);

    $isNewProduct = $product === null;

    if ($isNewProduct) {
        $product = new Product([
            'name' => '',
            'description' => '',
            'price' => null,
        ]);
        $product->setAttribute('id', $requestedProductId);
        $product->setRelation('images', new Collection);
        $product->setRelation('tags', new Collection);
    }

    return view('edit_item', [
        'product' => $product,
        'isNewProduct' => $isNewProduct,
    ]);
})->middleware('auth')->name('products.edit-view');

Route::patch('/edit-item', function () use ($ensureAdmin) {
    $ensureAdmin();

    abort_unless(Schema::hasTable('products'), 404);

    $requestedProductId = request()->integer('product') ?: (((int) Product::query()->max('id')) + 1);
    $product = Product::query()
        ->with(['tags.category', 'images'])
        ->find($requestedProductId);
    $isNewProduct = $product === null;

    $validated = request()->validate([
        'name' => ['required', 'string', 'max:255'],
        'description' => ['nullable', 'string'],
        'price' => ['required', 'numeric', 'min:0', 'max:999999.99'],
        'tags' => ['nullable', 'string'],
        'images' => ['nullable', 'array'],
        'images.*.url' => ['required', 'string', 'max:255'],
        'images.*.alt' => ['nullable', 'string', 'max:255'],
        'new_images' => ['nullable', 'array'],
        'new_images.*.url' => ['nullable', 'string', 'max:255'],
        'new_images.*.alt' => ['nullable', 'string', 'max:255'],
    ]);

    $tagNames = collect(explode(',', (string) ($validated['tags'] ?? '')))
        ->map(fn (string $tag): string => trim($tag))
        ->filter()
        ->unique()
        ->values();

    $tags = Tag::query()
        ->whereIn('name', $tagNames)
        ->get();

    $missingTags = $tagNames
        ->diff($tags->pluck('name'))
        ->values();

    if ($missingTags->isNotEmpty()) {
        return back()
            ->withErrors([
                'tags' => 'Unknown tag(s): '.$missingTags->implode(', ').'. Use existing tags only.',
            ])
            ->withInput();
    }

    if ($isNewProduct) {
        $product = new Product;
        $product->setAttribute('id', $requestedProductId);
        $product->fill([
            'name' => $validated['name'],
            'description' => $validated['description'] ?? '',
            'price' => $validated['price'],
        ]);
        $product->save();
        $product->setRelation('images', new Collection);
    } else {
        $product->update([
            'name' => $validated['name'],
            'description' => $validated['description'] ?? '',
            'price' => $validated['price'],
        ]);
    }

    $product->tags()->sync($tags->pluck('id')->all());

    foreach ($validated['images'] ?? [] as $imageId => $imageData) {
        $image = $product->images->firstWhere('id', (int) $imageId);

        if ($image === null) {
            continue;
        }

        $image->update([
            'url' => $imageData['url'],
            'alt' => $imageData['alt'] ?? $product->name,
        ]);
    }

    $nextImagePosition = ((int) $product->images()->max('position')) + 1;

    foreach ($validated['new_images'] ?? [] as $newImageData) {
        $newImageUrl = trim((string) ($newImageData['url'] ?? ''));

        if ($newImageUrl === '') {
            continue;
        }

        $product->images()->create([
            'url' => $newImageUrl,
            'alt' => $newImageData['alt'] ?? $product->name,
            'position' => $nextImagePosition,
        ]);

        $nextImagePosition++;
    }

    return redirect()
        ->route('products.edit-view', ['product' => $product->id])
        ->with('status', 'Product updated successfully.');
})->middleware('auth')->name('products.update');

Route::delete('/products/{product}', function (Product $product) use ($ensureAdmin) {
    $ensureAdmin();

    $product->delete();

    return redirect()
        ->route('admin-panel')
        ->with('status', 'Product deleted successfully.');
})->middleware('auth')->name('products.destroy');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
