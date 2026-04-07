@props(['product'])

<div class="product-card">
    <div class="product-image">
        <img src="{{ asset('assets/img/' . $product->image) }}" alt="{{ $product->name }}">
    </div>
    <div class="product-name">
        <label>{{ $product->name }}</label>
    </div>
    <div class="d-flex justify-content-between mt-2">
        <div class="price">{{ number_format($product->price, 2, ',', ' ') }} EUR</div>
        <button class="btn btn-sm btn-light">Add to Cart</button>
    </div>
</div>
