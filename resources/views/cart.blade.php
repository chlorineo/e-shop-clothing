@extends('layouts.app')
@section('title', '')


@section('content')
    @php
        $cart = session()->get('cart', []);

        $cost = 0;
        foreach ($cart as $item) $cost += $item['price'] * $item['quantity'];

        $discount = 0;
        $delivery = 0;

        $totalCost = $cost - $discount + $delivery;
        $vat = $totalCost * 0.23;
    @endphp

    <main class="container-fluid my-5 mx-auto" style="max-width: 1300px;">
        <h1 class="fw-bold mb-5">Cart</h1>

        <div class="row g-5">
            <div class="col-md-7">
                <div class="overflow-y-auto overflow-x-hidden pe-3" style="max-height: 75vh;">
                    <div class="container-fluid px-0">
                        @forelse($cart as $key => $item)
                            <form action="{{ route('cart.add') }}" method="POST">
                                @csrf
                                <input type="hidden" name="product_id" value="{{ $item['id'] }}">
                                <input type="hidden" name="sizeOptions" value="{{ $item['size'] }}">

                                <div class="row g-4 mb-4 align-items-center">
                                    <div class="col-4">
                                        <div class="ratio ratio-1x1 bg-light border">
                                            <img src="{{ asset('assets/img/' . ($item['image'] ?? 'null')) }}" alt="product" class="object-fit-contain">
                                        </div>
                                    </div>
                                    <div class="col-8">
                                        <a href="#" class="fs-3 fw-bold mb-1 text-decoration-none text-body">{{ $item['name'] }}</a>
                                        <h4 class="fs-5 mb-3">{{ number_format((float) $item['price'], 2, ',', '') }} $</h4>
                                        <p class="fs-6 mb-3">Size {{ $item['size'] }}</p>

                                        <div class="d-flex gap-2 mb-3 w-100">
                                            <button type="submit" name="action" value="decrease" class="btn btn-outline-secondary" style="width: 20%;"><i class="bi bi-dash"></i></button>
                                            <span type="text" class="form-control text-center" style="width: 60%;">{{ $item['quantity'] }}</span>
                                            <button type="submit" name="action" value="increase" class="btn btn-outline-secondary" style="width: 20%;"><i class="bi bi-plus"></i></button>
                                        </div>
                                        <button type="submit" name="action" value="remove" class="btn btn-outline-secondary w-100">Delete from cart</button>
                                    </div>
                                </div>
                            </form>
                        @empty
                            <div class="text-center py-5">
                                <h4 class="fs-4 fw-bold">Your cart is empty</h4>
                            </div>
                        @endforelse
                    </div>
                </div>
            </div>

            <div class="col-md-5">
                <div class="mx-auto" style="max-width: 500px;">
                    <h2 class="fw-bold fs-2 mb-5">Order summary</h2>

                    <div class="d-flex justify-content-between mb-2">
                        <p class="fs-4 mb-0">Cost:</p>
                        <p class="fs-4 mb-0">{{ number_format((float) $cost, 2, ',', ' ') }} €</p>
                    </div>
                    <div class="d-flex justify-content-between mb-2">
                        <p class="fs-4 mb-0">Discount:</p>
                        <p class="fs-4 mb-0">{{ number_format((float) $discount, 2, ',', ' ') }} €</p>
                    </div>
                    <div class="d-flex justify-content-between mb-5">
                        <p class="fs-4 mb-0">Delivery:</p>
                        <p class="fs-4 mb-0">{{ number_format((float) $delivery, 2, ',', ' ') }} €</p>
                    </div>

                    <div class="d-flex justify-content-between mb-2">
                        <h2 class="fs-3 mb-0 fw-bold">Total cost:</h2>
                        <h2 class="fs-3 mb-0 fw-bold">{{ number_format((float) $totalCost, 2, ',', ' ') }} €</h2>
                    </div>
                    <div class="d-flex justify-content-between mb-5">
                        <h2 class="fs-3 mb-0 fw-bold">VAT:</h2>
                        <h2 class="fs-3 mb-0 fw-bold">{{ number_format((float) $vat, 2, ',', ' ') }} €</h2>
                    </div>

                    <section class="mt-5">
                        <div class="d-grid mt-2">
                            <a href="delivery_details.blade.php" class="btn btn-outline-secondary btn-lg">Go to delivery</a>
                        </div>
                    </section>
                </div>
            </div>

        </div>
    </main>
@endsection
