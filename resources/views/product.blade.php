@extends('layouts.app')

@section('title', $product->name)

@section('content')
    @php
        $productImages = $product->images;
        $availableSizes = $product->tags
            ->filter(fn ($tag) => $tag->category?->name === 'Size')
            ->pluck('name')
            ->values()
            ->all();
        $sizeOptions = ['XS', 'S', 'M', 'L', 'XL'];
        $defaultSize = $availableSizes[0] ?? null;
    @endphp

    <main class="container-fluid my-5">
        <div class="row g-5">
            <div class="col-md-7" style="max-width: calc(98vh - 90px)">
                <div id="productCarousel" class="carousel slide ratio ratio-1x1 mx-auto" data-bs-ride="carousel">

                    <div class="carousel-inner h-100">
                        @foreach ($productImages as $image)
                            <div class="carousel-item h-100 {{ $loop->first ? 'active' : '' }}">
                                <img src="{{ asset('assets/img/' . $image->url) }}"
                                     alt="{{ $image->alt }}"
                                     class="d-block w-100 h-100 object-fit-contain">
                            </div>
                        @endforeach
                    </div>

                    <div>
                        <button class="btn position-absolute top-50 start-0 translate-middle-y z-3" type="button" data-bs-target="#productCarousel" data-bs-slide="prev">
                            <i class="bi bi-chevron-compact-left fs-1 text-dark"></i>
                        </button>
                        <button class="btn position-absolute top-50 end-0 translate-middle-y z-3" type="button" data-bs-target="#productCarousel" data-bs-slide="next">
                            <i class="bi bi-chevron-compact-right fs-1 text-dark"></i>
                        </button>
                    </div>
                </div>
            </div>
            <div class="col-md-5">
                <div class="mx-auto" style="max-width: 600px;">
                    <div class="mb-4">
                        <h2 class="fw-bold fs-2">{{ $product->name }}</h2>
                        <h4 class="fs-5">{{ number_format((float) $product->price, 2, ',', ' ') }} €</h4>
                    </div>

                    <p class="lh-base">{{ $product->description }}</p>

                    <section class="mt-5">
                        <div class="container-fluid btn-group">
                            @foreach ($sizeOptions as $size)
                                @php
                                    $isAvailable = in_array($size, $availableSizes, true);
                                    $inputId = 'size' . $size;
                                @endphp

                                <input
                                    type="radio"
                                    class="btn-check"
                                    name="sizeOptions"
                                    id="{{ $inputId }}"
                                    autocomplete="off"
                                    {{ $isAvailable ? '' : 'disabled' }}
                                    {{ $defaultSize === $size ? 'checked' : '' }}
                                >
                                <label class="btn btn-outline-secondary {{ $isAvailable ? '' : 'disabled' }}" for="{{ $inputId }}">{{ $size }}</label>
                            @endforeach
                        </div>

                        <div class="container-fluid mt-1 d-grid">
                            <button type="button" class="btn btn-outline-secondary">Add To Cart</button>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </main>
@endsection
