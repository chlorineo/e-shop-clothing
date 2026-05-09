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

            <form method="POST" action="{{ route('products.update', ['product' => $product->id]) }}">
                @csrf
                @method('PATCH')

                <p class="fs-4 mb-3">Photos</p>
                <div class="d-flex gap-3 mb-5 flex-wrap">
                    @forelse ($productImages as $image)
                        <div class="ratio ratio-1x1 border bg-light rounded me-1" style="width: 100px;">
                            <img src="{{ asset('assets/img/' . $image->url) }}" alt="{{ $image->alt }}" class="object-fit-contain rounded">
                        </div>
                    @empty
                        <div class="ratio ratio-1x1 border bg-light rounded me-1" style="width: 100px;">
                            <div class="d-flex align-items-center justify-content-center text-muted">
                                <i class="bi bi-image fs-2"></i>
                            </div>
                        </div>
                    @endforelse

                    <div class="ratio ratio-1x1 border bg-light rounded" style="width: 100px;">
                        <button
                            type="button"
                            id="add-image-button"
                            class="btn btn-outline-secondary w-100 h-100 d-flex align-items-center justify-content-center"
                            title="Add photo"
                            aria-label="Add photo"
                        >
                            <i class="bi bi-plus fs-2"></i>
                        </button>
                    </div>
                </div>

                @if ($productImages->isNotEmpty())
                    <div class="mb-5">
                        @foreach ($productImages as $image)
                            <div class="border rounded p-3 mb-3">
                                <p class="fw-semibold mb-3">Photo {{ $loop->iteration }}</p>

                                <div class="mb-3">
                                    <label for="image-url-{{ $image->id }}" class="form-label">Image path</label>
                                    <input
                                        type="text"
                                        id="image-url-{{ $image->id }}"
                                        name="images[{{ $image->id }}][url]"
                                        class="form-control @error('images.' . $image->id . '.url') is-invalid @enderror"
                                        value="{{ old('images.' . $image->id . '.url', $image->url) }}"
                                        required
                                    >
                                    @error('images.' . $image->id . '.url')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div>
                                    <label for="image-alt-{{ $image->id }}" class="form-label">Alt text</label>
                                    <input
                                        type="text"
                                        id="image-alt-{{ $image->id }}"
                                        name="images[{{ $image->id }}][alt]"
                                        class="form-control @error('images.' . $image->id . '.alt') is-invalid @enderror"
                                        value="{{ old('images.' . $image->id . '.alt', $image->alt) }}"
                                    >
                                    @error('images.' . $image->id . '.alt')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endif

                <div id="new-image-fields" class="mb-5">
                    @foreach ($newImages as $newImageIndex => $newImage)
                        <div class="border rounded p-3 mb-3">
                            <p class="fw-semibold mb-3">New photo {{ $loop->iteration }}</p>

                            <div class="mb-3">
                                <label for="new-image-url-{{ $newImageIndex }}" class="form-label">Image path</label>
                                <input
                                    type="text"
                                    id="new-image-url-{{ $newImageIndex }}"
                                    name="new_images[{{ $newImageIndex }}][url]"
                                    class="form-control @error('new_images.' . $newImageIndex . '.url') is-invalid @enderror"
                                    value="{{ data_get($newImage, 'url') }}"
                                >
                                @error('new_images.' . $newImageIndex . '.url')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div>
                                <label for="new-image-alt-{{ $newImageIndex }}" class="form-label">Alt text</label>
                                <input
                                    type="text"
                                    id="new-image-alt-{{ $newImageIndex }}"
                                    name="new_images[{{ $newImageIndex }}][alt]"
                                    class="form-control @error('new_images.' . $newImageIndex . '.alt') is-invalid @enderror"
                                    value="{{ data_get($newImage, 'alt') }}"
                                >
                                @error('new_images.' . $newImageIndex . '.alt')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    @endforeach
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
        document.addEventListener('DOMContentLoaded', function () {
            const addImageButton = document.getElementById('add-image-button');
            const newImageFields = document.getElementById('new-image-fields');

            if (!addImageButton || !newImageFields) {
                return;
            }

            let nextImageIndex = {{ count($newImages) }};

            addImageButton.addEventListener('click', function () {
                const imageIndex = nextImageIndex;
                nextImageIndex++;

                const fieldGroup = document.createElement('div');
                fieldGroup.className = 'border rounded p-3 mb-3';
                fieldGroup.innerHTML = `
                    <p class="fw-semibold mb-3">New photo ${imageIndex + 1}</p>

                    <div class="mb-3">
                        <label for="new-image-url-${imageIndex}" class="form-label">Image path</label>
                        <input
                            type="text"
                            id="new-image-url-${imageIndex}"
                            name="new_images[${imageIndex}][url]"
                            class="form-control"
                        >
                    </div>

                    <div>
                        <label for="new-image-alt-${imageIndex}" class="form-label">Alt text</label>
                        <input
                            type="text"
                            id="new-image-alt-${imageIndex}"
                            name="new_images[${imageIndex}][alt]"
                            class="form-control"
                        >
                    </div>
                `;

                newImageFields.appendChild(fieldGroup);
                fieldGroup.querySelector('input')?.focus();
            });
        });
    </script>
@endsection
