@extends('layouts.app')
@section('title', ($isNewProduct ? 'Add Item' : 'Edit Item - ' . $product->name))


@section('content')
    @php
        $productImages = $product->images;
        $groupedTags = $product->tags
            ->sortBy(fn ($tag) => ($tag->category?->name ?? 'Other') . $tag->name)
            ->groupBy(fn ($tag) => $tag->category?->name ?? 'Other');
        $tagText = $product->tags
            ->sortBy('name')
            ->pluck('name')
            ->implode(', ');
        $formTagText = old('tags', $tagText);
        $newImages = old('new_images', []);
        $typeTag = $product->tags->first(fn ($tag) => $tag->category?->name === 'Type');
        $selectedCategory = old('category', $typeTag?->name ?? '');
    @endphp

    <main class="container-fluid my-5">
        <div class="mx-auto" style="max-width: 700px;">
            <div class="d-flex justify-content-between align-items-start gap-3 mb-4">
                <div>
                    <h1 class="fs-2 fw-bold mb-1">{{ $isNewProduct ? 'Add product' : 'Edit product' }}</h1>
                    <p class="text-muted mb-0">{{ $isNewProduct ? 'This product will be created when you save.' : 'Update product information' }}</p>
                </div>
                @unless ($isNewProduct)
                    <a href="{{ url('/product?product=' . $product->id) }}" class="btn btn-outline-secondary">
                        <i class="bi bi-eye me-1"></i>
                        Store view
                    </a>
                @endunless
            </div>

            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif

            @if ($errors->any())
                <div class="alert alert-danger">
                    <p class="fw-semibold mb-2">Please fix the highlighted fields.</p>
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form
                method="POST"
                action="{{ route('products.update', ['product' => $product->id]) }}"
                enctype="multipart/form-data">
                @csrf
                @method('PATCH')

                <p class="fs-4 mb-3">Photos</p>
                <div id="image-container" class="d-flex gap-3 mb-5 flex-wrap">
                    @foreach ($productImages as $image)
                        <div class="ratio ratio-1x1 border bg-light rounded me-1 position-relative" style="width: 100px;">
                            <img
                                src="{{ asset('assets/img/' . $image->url) }}"
                                alt="{{ $image->alt }}"
                                class="object-fit-contain rounded"
                                id="img-{{ $image->id }}"
                            >

                            <input
                                type="checkbox"
                                id="delete-{{ $image->id }}"
                                name="delete_images[]"
                                class="btn-check delete-checkbox"
                                value="{{ $image->id }}"
                            >
                            <label
                                class="rounded-circle position-absolute top-0 end-0 m-1 text-white bg-secondary bg-opacity-75 d-flex align-items-center justify-content-center"
                                for="delete-{{ $image->id }}"
                                style="width: 15px; height: 15px"
                            >
                                <i class="bi bi-x"></i>
                            </label>
                        </div>
                    @endforeach

                    <div class="ratio ratio-1x1 border bg-light rounded" style="width: 100px;">
                        <label
                            for="new_images"
                            class="w-100 h-100 d-flex align-items-center justify-content-center m-0"
                            title="Add photo"
                        >
                            <i class="bi bi-plus fs-2 text-secondary"></i>
                        </label>
                        <input
                            type="file"
                            id="new_images"
                            name="new_images[]"
                            multiple class="d-none"
                            accept="image/*"
                        >
                    </div>
                </div>

                <div class="mb-4">
                    <label for="name" class="fs-4 mb-2">Product name</label>
                    <input
                        type="text"
                        id="name"
                        name="name"
                        class="form-control form-control-lg py-3 fs-5 @error('name') is-invalid @enderror"
                        value="{{ old('name', $product->name) }}"
                        required
                    >
                    @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="description" class="fs-4 mb-2">Product description</label>
                    <textarea
                        id="description"
                        name="description"
                        class="form-control form-control-lg fs-5 @error('description') is-invalid @enderror"
                        rows="6"
                    >{{ old('description', $product->description) }}</textarea>
                    @error('description')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="price" class="fs-4 mb-2">Cost</label>
                    <input
                        type="number"
                        id="price"
                        name="price"
                        class="form-control form-control-lg py-3 fs-5 @error('price') is-invalid @enderror"
                        value="{{ old('price', $product->price) }}"
                        min="0"
                        max="999999.99"
                        step="0.01"
                        required
                    >
                    @error('price')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="category" class="fs-4 mb-2">Category</label>
                    <select
                        id="category"
                        name="category"
                        class="form-select form-select-lg fs-5 @error('category') is-invalid @enderror"
                        required
                    >
                        <option value="" disabled {{ $selectedCategory === '' ? 'selected' : '' }}>Select category...</option>
                        <option value="Mens" {{ $selectedCategory === 'Mens' ? 'selected' : '' }}>Men's</option>
                        <option value="Womans" {{ $selectedCategory === 'Womans' ? 'selected' : '' }}>Women's</option>
                        <option value="Unisex" {{ $selectedCategory === 'Unisex' ? 'selected' : '' }}>Unisex</option>
                        <option value="Accessories" {{ $selectedCategory === 'Accessories' ? 'selected' : '' }}>Accessories</option>
                    </select>
                    @error('category')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-5">
                    <label for="tags" class="fs-4 mb-2">Tags</label>
                    <input
                        type="text"
                        id="tags"
                        name="tags"
                        class="form-control form-control-lg py-3 fs-5 @error('tags') is-invalid @enderror"
                        value="{{ $formTagText }}"
                    >
                    @error('tags')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror

                    @if ($groupedTags->isNotEmpty())
                        <div class="mt-3">
                            @foreach ($groupedTags as $categoryName => $tags)
                                <div class="mb-2">
                                    <span class="fw-semibold">{{ $categoryName }}:</span>
                                    @foreach ($tags as $tag)
                                        <span class="badge text-bg-light border">{{ $tag->name }}</span>
                                    @endforeach
                                </div>
                            @endforeach
                        </div>
                    @endif
                </div>

                <div class="d-flex justify-content-between gap-3 mt-5 flex-wrap">
                    <a href="{{ route('admin-panel') }}" class="btn btn-outline-secondary btn-lg flex-grow-1 py-3 fs-4">Cancel</a>
                    <button type="submit" class="btn btn-outline-secondary btn-lg flex-grow-1 py-3 fs-4">Save</button>
                </div>
            </form>
        </div>
    </main>

    <script>
        document.querySelectorAll('.delete-checkbox').forEach(checkbox => {
            checkbox.addEventListener('change', function() {
                if (this.checked) {
                    this.parentElement.style.display = 'none';
                }
            });
        });

        let dt = new DataTransfer();

        document.getElementById('new_images').addEventListener('change', function(event) {
            const container = document.getElementById('image-container');
            const addButton = container.lastElementChild;

            Array.from(event.target.files).forEach(file => {
                dt.items.add(file);

                const reader = new FileReader();
                reader.onload = function(e) {
                    const div = document.createElement('div');
                    div.className = 'ratio ratio-1x1 border bg-light rounded me-1 position-relative';
                    div.style.width = '100px';
                    div.innerHTML = `
                        <img src="${e.target.result}" class="object-fit-contain rounded">
                        <div
                            class="rounded-circle position-absolute top-0 end-0 m-1 text-white bg-secondary bg-opacity-75 d-flex align-items-center justify-content-center"
                            style="width: 15px; height: 15px">
                            <i class="bi bi-x"></i>
                        </div>
                    `;

                    div.querySelector('div.position-absolute').addEventListener('click', function () {
                        div.remove();

                        const newDt = new DataTransfer();
                        Array.from(dt.files).forEach(f => {
                            if (f !== file) newDt.items.add(f);
                        });
                        dt = newDt;
                        document.getElementById('new_images').files = dt.files;
                    });
                    container.insertBefore(div, addButton);
                }
                reader.readAsDataURL(file);
            });

            this.files = dt.files;
        });
    </script>
@endsection
