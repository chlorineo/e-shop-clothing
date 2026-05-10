@extends('layouts.app')
@section('title', 'Admin Panel')


@section('content')
    <main class="container-fluid my-5 mx-auto" style="max-width: 1300px;">
        <div class="row g-5">

            <div class="col-md-7">
                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif

                <form method="GET" action="{{ route('admin-panel') }}" class="mb-4">
                    <div class="input-group">
                        <input
                            type="search"
                            name="search"
                            value="{{ $searchText }}"
                            class="form-control form-control-lg bg-light"
                            placeholder="Search by name...."
                            aria-label="Search products by name"
                        >
                        <button type="submit" class="btn btn-outline-secondary">Search</button>
                    </div>
                </form>

                <div class="overflow-y-auto overflow-x-hidden pe-3" style="max-height: 75vh;">
                    <div class="container-fluid px-0">

                        @forelse ($products as $product)
                            @php
                                $primaryImage = $product->images->first();
                                $typeTag = $product->tags->first(fn ($tag) => $tag->category?->name === 'Type');
                            @endphp

                            <div class="row g-2 mb-3 align-items-center border bg-light p-2">
                                <div class="col-1 text-center">
                                    <p class="mb-0">{{ $product->id }}</p>
                                </div>
                                <div class="col-2">
                                    <div class="ratio ratio-1x1 bg-white border">
                                        @if ($primaryImage !== null)
                                            <img src="{{ asset('assets/img/' . $primaryImage->url) }}" alt="{{ $primaryImage->alt }}" class="object-fit-contain">
                                        @endif
                                    </div>
                                </div>
                                <div class="col-2">
                                    <p class="fw-bold text-truncate mb-0">{{ $product->name }}</p>
                                </div>
                                <div class="col-2">
                                    <p class="text-truncate mb-0">{{ $typeTag?->name ?? 'No type' }}</p>
                                </div>
                                <div class="col-2 text-center">
                                    <p class="mb-0 text-nowrap">{{ number_format((float) $product->price, 2, ',', ' ') }} €</p>
                                </div>
                                <div class="col-1 text-center">
                                    <p class="mb-0">{{ $product->tags->count() }} tags</p>
                                </div>
                                <div class="col-2">
                                    <div class="d-flex gap-2">
                                        <a href="{{ route('products.edit-view', ['product' => $product->id]) }}" class="btn btn-outline-secondary w-50" aria-label="Edit {{ $product->name }}"><i class="bi bi-pencil"></i></a>
                                        <form method="POST" action="{{ route('products.destroy', ['product' => $product->id]) }}" class="w-50">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-outline-secondary w-100" aria-label="Delete {{ $product->name }}">
                                                <i class="bi bi-x-lg"></i>
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <div class="border bg-light p-4 text-center">
                                <p class="mb-0 fs-5 text-muted">No products found.</p>
                            </div>
                        @endforelse

                    </div>
                </div>

                <div class="d-flex gap-2 mt-4 w-100">
                    @if ($products->onFirstPage())
                        <span class="btn btn-outline-secondary disabled" style="width: 15%;" aria-disabled="true">
                            <i class="bi bi-chevron-double-left"></i>
                        </span>
                        <span class="btn btn-outline-secondary disabled" style="width: 15%;" aria-disabled="true">
                            <i class="bi bi-chevron-left"></i>
                        </span>
                    @else
                        <a href="{{ $products->url(1) }}" class="btn btn-outline-secondary" style="width: 15%;" aria-label="First page">
                            <i class="bi bi-chevron-double-left"></i>
                        </a>
                        <a href="{{ $products->previousPageUrl() }}" class="btn btn-outline-secondary" style="width: 15%;" aria-label="Previous page">
                            <i class="bi bi-chevron-left"></i>
                        </a>
                    @endif

                    <div class="form-control text-center bg-light border-0" style="width: 40%;">
                        Page {{ $products->currentPage() }} of {{ max($products->lastPage(), 1) }}
                    </div>

                    @if ($products->hasMorePages())
                        <a href="{{ $products->nextPageUrl() }}" class="btn btn-outline-secondary" style="width: 15%;" aria-label="Next page">
                            <i class="bi bi-chevron-right"></i>
                        </a>
                        <a href="{{ $products->url($products->lastPage()) }}" class="btn btn-outline-secondary" style="width: 15%;" aria-label="Last page">
                            <i class="bi bi-chevron-double-right"></i>
                        </a>
                    @else
                        <span class="btn btn-outline-secondary disabled" style="width: 15%;" aria-disabled="true">
                            <i class="bi bi-chevron-right"></i>
                        </span>
                        <span class="btn btn-outline-secondary disabled" style="width: 15%;" aria-disabled="true">
                            <i class="bi bi-chevron-double-right"></i>
                        </span>
                    @endif
                </div>

                <p class="text-muted mt-3 mb-0">
                    Showing {{ $products->count() }} of {{ $products->total() }} products
                </p>
            </div>

            <div class="col-md-5">
                <div class="mx-auto" style="max-width: 500px;">
                    <h2 class="fw-bold mb-5">Administrator</h2>

                    <p class="fs-3 mb-2">{{ auth()->user()?->name ?? 'John Doe' }}</p>
                    <p class="fs-4 mb-5">{{ auth()->user()?->email ?? 'john.doe@goodmail.com' }}</p>


                    <section class="mt-5">
                        <div class="d-grid mt-2">
                            <a href="{{ route('products.edit-view', ['product' => $nextProductId]) }}" type="button" class="btn btn-outline-secondary btn-lg py-3">Add Item</a>
                        </div>
                    </section>
                </div>
            </div>

        </div>
    </main>
@endsection
