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

    <style>
        #quantity {
            appearance: textfield;
        }
    </style>

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

                    <form action="{{ route('cart.add') }}" method="POST" class="mt-5">
                        @csrf
                        <input type="hidden" name="product_id" value="{{ $product->id }}">

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
                                    value="{{ $size }}"
                                    autocomplete="off"
                                    {{ $isAvailable ? '' : 'disabled' }}
                                    {{ $defaultSize === $size ? 'checked' : '' }}
                                >
                                <label class="btn btn-outline-secondary {{ $isAvailable ? '' : 'disabled' }}" for="{{ $inputId }}">{{ $size }}</label>
                            @endforeach
                        </div>

                        <div class="container-fluid mt-3">
                            <div class="d-flex gap-2 mb-3 w-100">
                                <button type="button" class="btn btn-outline-secondary js-quantity-decrease" style="width: 20%;">
                                    <i class="bi bi-dash"></i>
                                </button>
                                <input
                                    type="number"
                                    min="1"
                                    step="1"
                                    value="1"
                                    name="quantity"
                                    id="quantity"
                                    class="form-control text-center"
                                    style="width: 60%;"
                                    inputmode="numeric"
                                >
                                <button type="button" class="btn btn-outline-secondary js-quantity-increase" style="width: 20%;">
                                    <i class="bi bi-plus"></i>
                                </button>
                            </div>

                            <div class="d-grid w-100">
                                <button type="submit" name="action" value="add" class="btn btn-outline-secondary">Add To Cart</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const quantityInput = document.getElementById('quantity');
            const decreaseButton = document.querySelector('.js-quantity-decrease');
            const increaseButton = document.querySelector('.js-quantity-increase');

            if (!quantityInput || !decreaseButton || !increaseButton) {
                return;
            }

            decreaseButton.addEventListener('click', function () {
                const currentValue = Number(quantityInput.value) || 1;
                quantityInput.value = Math.max(1, currentValue - 1);
            });

            increaseButton.addEventListener('click', function () {
                const currentValue = Number(quantityInput.value) || 1;
                quantityInput.value = currentValue + 1;
            });

            quantityInput.addEventListener('input', function () {
                quantityInput.value = quantityInput.value.replace(/[^0-9]/g, '');
            });

            quantityInput.addEventListener('blur', function () {
                const currentValue = Number(quantityInput.value);
                quantityInput.value = currentValue >= 1 ? currentValue : 1;
            });
        });
    </script>
@endsection
