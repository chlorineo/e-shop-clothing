<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CartController;
use App\Models\Product;
use App\Models\TagCategory;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Schema;

Route::post('/cart/add', [CartController::class, 'add'])->name('cart.add');

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

Route::get('/product', function () {
    abort_unless(Schema::hasTable('products'), 404);

    $product = Product::query()
        ->with(['tags.category', 'images'])
        ->findOrFail(request()->integer('product'));

    return view('product', [
        'product' => $product,
    ]);
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
