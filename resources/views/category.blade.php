@extends('layouts.app')
@section('title', 'Category')

@push('styles')
    <style>
        .sidebar{
            background:#cfcfcf;
            padding:15px;
        }
        .filter-box{
            margin-bottom:20px;
        }

        .product-grid{
            display:grid;
            grid-template-columns: repeat(auto-fill, minmax(260px, 260px));
            gap:20px;
            justify-content:start;
        }

        .product-card{
            background:#ebebeb;
            padding:10px;
            color:white;
            border:2px solid #555;
            display: flex;
            flex-direction: column;
        }

        .product-image{
            background:#bdbdbd;
            height:150px;
            display:flex;
            align-items:center;
            justify-content:center;
            color:black;
            font-size:20px;
            margin-bottom:5px;
        }

        .product-image img{
            width:100%;
            height:100%;
            object-fit:cover;
        }

        .product-name{
            background:#bdbdbd;
            color:black;
            padding:3px;
            margin-bottom:5px;
            text-align:center;
        }

        .product-description{
            height:minmax(80px, 200px);
            align-items:center;
            justify-content:center;
            flex:1;
            text-align:center;
        }

        .price{
            background:#bdbdbd;
            color:black;
            padding:3px 8px;
        }

        .sort-btn{
            margin-right:10px;
        }

        .filter-option {
            display: block;
            margin-bottom: 6px;
        }

        .filter-actions {
            display: flex;
            gap: 10px;
            margin-top: 24px;
        }

        .price-slider-group {
            position: relative;
            height: 40px;
            margin-top: 12px;
        }

        .price-slider-group::before {
            content: "";
            position: absolute;
            left: 0;
            right: 0;
            top: 50%;
            height: 4px;
            background: #9c9c9c;
            transform: translateY(-50%);
            z-index: 1;
            border-radius: 999px;
        }

        .price-slider-group input[type="range"] {
            position: absolute;
            left: 0;
            top: 0;
            width: 100%;
            height: 40px;
            pointer-events: none;
            background: transparent;
            -webkit-appearance: none;
            appearance: none;
            z-index: 2;
        }

        .price-slider-group input[type="range"]::-webkit-slider-thumb {
            pointer-events: auto;
            -webkit-appearance: none;
            appearance: none;
            width: 16px;
            height: 16px;
            border-radius: 50%;
            background: #555;
            border: 0;
            cursor: pointer;
            position: relative;
            z-index: 3;
        }

        .price-slider-group input[type="range"]::-moz-range-thumb {
            pointer-events: auto;
            width: 16px;
            height: 16px;
            border-radius: 50%;
            background: #555;
            border: 0;
            cursor: pointer;
            position: relative;
            z-index: 3;
        }

        .price-slider-group input[type="range"]::-webkit-slider-runnable-track {
            height: 4px;
            background: transparent;
        }

        .price-slider-group input[type="range"]::-moz-range-track {
            height: 4px;
            background: transparent;
        }

        .price-values {
            display: flex;
            justify-content: space-between;
            gap: 12px;
            font-size: 0.95rem;
        }

        .pagination-links {
            display: flex;
            gap: 8px;
            align-items: center;
            flex-wrap: wrap;
            justify-content: center;
        }

        .category-search {
            margin-bottom: 16px;
        }
    </style>
@endpush


@section('content')
    <div class="container-fluid mt-3">

        <div class="row">

            <!-- FILTER SIDEBAR -->

            <div class="col-md-2 sidebar">

                <h4>Filters</h4>

                <form method="GET" action="{{ url('/category') }}" id="category-filters">
                    @if ($currentTypeTag !== null)
                        <input type="hidden" name="type" value="{{ $currentTypeTag }}">
                    @endif
                    @if ($searchText !== '')
                        <input type="hidden" name="search" value="{{ $searchText }}">
                    @endif

                    <div class="filter-box">

                        <label>Price Range</label>

                        <div class="price-slider-group">
                            <input
                                type="range"
                                class="form-range"
                                id="price-min"
                                name="price_min"
                                min="{{ (int) floor($priceBounds['min']) }}"
                                max="{{ (int) ceil($priceBounds['max']) }}"
                                value="{{ (int) floor($selectedPriceRange['min']) }}"
                            >
                            <input
                                type="range"
                                class="form-range"
                                id="price-max"
                                name="price_max"
                                min="{{ (int) floor($priceBounds['min']) }}"
                                max="{{ (int) ceil($priceBounds['max']) }}"
                                value="{{ (int) ceil($selectedPriceRange['max']) }}"
                            >
                        </div>

                        <div class="d-flex justify-content-between">
                            <span id="price-min-label">{{ number_format($selectedPriceRange['min'], 2, ',', ' ') }} €</span>
                            <span id="price-max-label">{{ number_format($selectedPriceRange['max'], 2, ',', ' ') }} €</span>
                        </div>

                    </div>

                    @php
                        $categoryLabels = [
                            'Color' => 'Colors',
                            'Material' => 'Materials',
                            'Size' => 'Size',
                        ];
                    @endphp

                    @foreach ($filterCategories as $category)
                        <div class="filter-box">
                            <label>{{ $categoryLabels[$category->name] ?? $category->name }}</label>

                            @foreach ($category->tags as $tag)
                                <label class="filter-option">
                                    <input
                                        type="checkbox"
                                        name="tags[]"
                                        value="{{ $tag->name }}"
                                        {{ in_array($tag->name, $selectedTags, true) ? 'checked' : '' }}
                                        onchange="document.getElementById('category-filters').submit()"
                                    >
                                    {{ $tag->name }}
                                </label>
                            @endforeach
                        </div>
                    @endforeach

                    <div class="filter-actions">
                        <button type="submit" class="btn btn-light btn-sm">Apply Filters</button>
                        <a href="{{ url('/category' . ($currentTypeTag !== null ? '?type=' . $currentTypeTag : '')) }}" class="btn btn-outline-secondary btn-sm">Clear</a>
                    </div>
                </form>

            </div>


            <!-- MAIN CONTENT -->

            <div class="col-md-10">

                @php
                    $typeLabels = [
                        'Mens' => "Men's",
                        'Womans' => "Women's",
                        'Unisex' => 'Unisex',
                        'Accessories' => 'Accessories',
                    ];
                @endphp

                <h1>{{ $currentTypeTag !== null ? ($typeLabels[$currentTypeTag] ?? $currentTypeTag) : 'All' }}</h1>

                <form method="GET" action="{{ url('/category') }}" class="category-search">
                    @if ($currentTypeTag !== null)
                        <input type="hidden" name="type" value="{{ $currentTypeTag }}">
                    @endif

                    <div class="input-group">
                        <input
                            type="search"
                            name="search"
                            class="form-control"
                            value="{{ $searchText }}"
                            placeholder="Search products..."
                            aria-label="Search products within this category"
                        >
                        <button type="submit" class="btn btn-outline-secondary">Search</button>
                    </div>
                </form>

                <div class="bg-secondary text-white p-2 mb-3">
                    Results: {{ $products->total() }} products
                    @if ($searchText !== '')
                        for search "{{ $searchText }}"
                    @endif
                    @if ($selectedTags !== [])
                        with tags {{ implode(', ', $selectedTags) }}
                    @endif
                    in {{ number_format($selectedPriceRange['min'], 2, ',', ' ') }} € - {{ number_format($selectedPriceRange['max'], 2, ',', ' ') }} €
                </div>

                <div class="mb-3">
                    @php
                        $sortQueryBase = request()->except(['page', 'sort']);
                        $sortButtonClasses = fn (?string $sortValue): string => 'btn ' . ($currentSort === $sortValue ? 'btn-secondary' : 'btn-light') . ' sort-btn';
                    @endphp

                    <strong>Sort by:</strong>

                    <button type="button" class="btn btn-light sort-btn" disabled>Highest Rated</button>
                    <a href="{{ url('/category?' . http_build_query([...$sortQueryBase, 'sort' => 'cheapest'])) }}" class="{{ $sortButtonClasses('cheapest') }}">Cheapest</a>
                    <a href="{{ url('/category?' . http_build_query([...$sortQueryBase, 'sort' => 'most_expensive'])) }}" class="{{ $sortButtonClasses('most_expensive') }}">Most Expensive</a>
                    <a href="{{ url('/category?' . http_build_query([...$sortQueryBase, 'sort' => 'newest'])) }}" class="{{ $sortButtonClasses('newest') }}">Newest</a>

                </div>


                <!-- PRODUCT GRID -->

                <div class="product-grid">
                    @forelse ($products as $product)
                        <x-layouts.product-card :product="$product" />
                    @empty
                        <p class="fs-5 text-muted">No products available yet.</p>
                    @endforelse
                </div>


                <!-- PAGINATION -->

                <div class="d-flex justify-content-between mt-4">

                    @if ($products->onFirstPage())
                        <span class="btn btn-light disabled" aria-disabled="true">
                            < Previous
                        </span>
                    @else
                        <a href="{{ $products->previousPageUrl() }}" class="btn btn-light">
                            < Previous
                        </a>
                    @endif

                    <div class="pagination-links">
                        @foreach ($products->getUrlRange(1, $products->lastPage()) as $page => $url)
                            @if ($page === $products->currentPage())
                                <span class="btn btn-secondary btn-sm disabled" aria-current="page">{{ $page }}</span>
                            @else
                                <a href="{{ $url }}" class="btn btn-light btn-sm">{{ $page }}</a>
                            @endif
                        @endforeach
                    </div>

                    @if ($products->hasMorePages())
                        <a href="{{ $products->nextPageUrl() }}" class="btn btn-light">
                            Next >
                        </a>
                    @else
                        <span class="btn btn-light disabled" aria-disabled="true">
                            Next >
                        </span>
                    @endif
                </div>

            </div>

        </div>

    </div>

    <script>
        (() => {
            const minimumSlider = document.getElementById('price-min');
            const maximumSlider = document.getElementById('price-max');
            const minimumLabel = document.getElementById('price-min-label');
            const maximumLabel = document.getElementById('price-max-label');
            const filterForm = document.getElementById('category-filters');

            if (!minimumSlider || !maximumSlider || !minimumLabel || !maximumLabel || !filterForm) {
                return;
            }

            const formatPrice = (value) => `${Number(value).toFixed(2).replace('.', ',')} €`;

            const syncLabels = () => {
                minimumLabel.textContent = formatPrice(minimumSlider.value);
                maximumLabel.textContent = formatPrice(maximumSlider.value);
            };

            const clampRanges = (activeSlider) => {
                const minimumValue = Number(minimumSlider.value);
                const maximumValue = Number(maximumSlider.value);

                if (minimumValue > maximumValue) {
                    if (activeSlider === minimumSlider) {
                        maximumSlider.value = minimumSlider.value;
                    } else {
                        minimumSlider.value = maximumSlider.value;
                    }
                }

                syncLabels();
            };

            minimumSlider.addEventListener('input', () => clampRanges(minimumSlider));
            maximumSlider.addEventListener('input', () => clampRanges(maximumSlider));
            minimumSlider.addEventListener('change', () => filterForm.submit());
            maximumSlider.addEventListener('change', () => filterForm.submit());

            syncLabels();
        })();
    </script>
@endsection
