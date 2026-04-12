@props(['product'])

@php
    $primaryImage = $product->images->first();
@endphp

<div
    class="product-card"
    role="link"
    tabindex="0"
    style="cursor: pointer;"
    onclick="window.location='{{ url('/product?product=' . $product->id) }}'"
    onkeydown="if (event.key === 'Enter' || event.key === ' ') { event.preventDefault(); window.location='{{ url('/product?product=' . $product->id) }}'; }"
>
    <div class="product-image">
        @if ($primaryImage !== null)
            <img src="{{ asset('assets/img/' . $primaryImage->url) }}" alt="{{ $primaryImage->alt }}">
        @endif
    </div>
    <div class="product-name">
        <label>{{ $product->name }}</label>
    </div>
    <div class="d-flex justify-content-between mt-2">
        <div class="price">{{ number_format($product->price, 2, ',', ' ') }} €</div>
        <button class="btn btn-sm btn-light">Add to Cart</button>
    </div>
</div>
