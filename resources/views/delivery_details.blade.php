@extends('layouts.app')
@section('title', '')

@php
    $selectedDelivery = old('deliveryMethod', $deliveryData['deliveryMethod'] ?? 'homeDelivery');

    $cart = session()->get('cart', []);

    $cost = 0;
    foreach ($cart as $item) {
        $cost += $item['price'] * $item['quantity'];
    }

    $discount = 0;
    $delivery = $selectedDelivery === 'homeDelivery' ? 3 : 0;

    $totalCost = $cost - $discount + $delivery;
    $vat = $totalCost * 0.23;
@endphp


@section('content')
    <form
        method="POST"
        action="{{ route('checkout.delivery.process') }}"
        class="container-fluid my-5 mx-auto"
        style="max-width: 1300px;">
        @csrf

        <h1 class="fw-bold mb-5">Delivery Details</h1>

        <div class="row g-5">
            <div class="col-md-7">
                <div class="pe-3 overflow-auto" style="max-height: 75vh;">
                    <div class="container-fluid px-0">

                        <div class="btn-group w-100 mb-5">
                            <input
                                type="radio"
                                id="homeDelivery"
                                name="deliveryMethod"
                                class="btn-check"
                                value="homeDelivery"
                                {{ $selectedDelivery === 'homeDelivery' ? 'checked' : '' }}
                            >
                            <label class="btn btn-outline-secondary py-2 fs-5" for="homeDelivery">Home Delivery</label>

                            <input
                                type="radio"
                                id="pickUp"
                                name="deliveryMethod"
                                class="btn-check"
                                value="pickUp"
                                {{ $selectedDelivery === 'pickUp' ? 'checked' : '' }}
                            >
                            <label class="btn btn-outline-secondary py-2 fs-5" for="pickUp">Pick Up In Store</label>
                        </div>

                        <div class="mb-4">
                            <label class="form-label fs-3">First Name</label>
                            <input
                                type="text"
                                name="first_name"
                                class="form-control form-control-lg py-3"
                                placeholder="First Name..."
                                value="{{ old('first_name', $deliveryData['first_name'] ?? $user?->first_name) }}"
                                required
                            >
                        </div>

                        <div class="mb-4">
                            <label class="form-label fs-3">Last Name</label>
                            <input
                                type="text"
                                name="last_name"
                                class="form-control form-control-lg py-3"
                                placeholder="Last Name..."
                                value="{{ old('last_name', $deliveryData['last_name'] ?? $user?->last_name) }}"
                                required
                            >
                        </div>

                        <div class="mb-4">
                            <label class="form-label fs-3">Email</label>
                            <input
                                type="email"
                                name="email"
                                class="form-control form-control-lg py-3"
                                placeholder="Email..."
                                value="{{ old('email', $deliveryData['email'] ?? $user?->email) }}"
                                required
                            >
                        </div>

                        <div class="mb-4">
                            <label class="form-label fs-3">Phone number</label>
                            <input
                                type="tel"
                                name="phone"
                                class="form-control form-control-lg py-3"
                                placeholder="Phone number..."
                                value="{{ old('phone', $deliveryData['phone'] ?? $user?->phone) }}"
                                required
                            >
                        </div>

                        <div class="mb-4">
                            <label class="form-label fs-3">Street and House Number</label>
                            <input
                                type="text"
                                name="street"
                                class="form-control form-control-lg py-3"
                                placeholder="Street and house number..."
                                value="{{ old('street', $deliveryData['street'] ?? $user?->street) }}"
                                required
                            >
                        </div>

                        <div class="mb-4">
                            <label class="form-label fs-3">City</label>
                            <input
                                type="text"
                                name="city"
                                class="form-control form-control-lg py-3"
                                placeholder="City..."
                                value="{{ old('city', $deliveryData['city'] ?? $user?->city) }}"
                            >
                        </div>

                        <div class="mb-4">
                            <label class="form-label fs-3">Postcode</label>
                            <input
                                type="text"
                                name="zip_code"
                                class="form-control form-control-lg py-3"
                                placeholder="Postcode..."
                                value="{{ old('zip_code', $deliveryData['zip_code'] ?? $user?->zip_code) }}"
                                required
                            >
                        </div>

                        <div class="mb-5">
                            <label class="form-label fs-3">Country</label>
                            <input
                                type="text"
                                name="country"
                                class="form-control form-control-lg py-3"
                                placeholder="Country..."
                                value="{{ old('country', $deliveryData['country'] ?? $user?->country) }}"
                                required
                            >
                        </div>

                    </div>
                </div>
            </div>

            <div class="col-md-5">
                <div class="mx-auto" style="max-width: 500px;">
                    <h2 class="fw-bold fs-2 mb-5">Order summary</h2>

                    <div class="d-flex justify-content-between mb-2">
                        <p class="fs-4 mb-0">Cost:</p>
                        <p class="fs-4 mb-0">{{ number_format((float) $cost, 2, '.', ' ') }} €</p>
                    </div>
                    <div class="d-flex justify-content-between mb-2">
                        <p class="fs-4 mb-0">Discount:</p>
                        <p class="fs-4 mb-0">{{ number_format((float) $discount, 2, '.', ' ') }} €</p>
                    </div>
                    <div class="d-flex justify-content-between mb-5">
                        <p class="fs-4 mb-0">Delivery:</p>
                        <p class="fs-4 mb-0">{{ number_format((float) $delivery, 2, '.', ' ') }} €</p>
                    </div>

                    <div class="d-flex justify-content-between mb-2">
                        <h2 class="fs-3 mb-0 fw-bold">Total cost:</h2>
                        <h2 class="fs-3 mb-0 fw-bold">{{ number_format((float) $totalCost, 2, '.', ' ') }} €</h2>
                    </div>
                    <div class="d-flex justify-content-between mb-5">
                        <h2 class="fs-3 mb-0 fw-bold">VAT:</h2>
                        <h2 class="fs-3 mb-0 fw-bold">{{ number_format((float) $vat, 2, '.', ' ') }} €</h2>
                    </div>

                    <section class="mt-5">
                        <div class="d-grid mt-2">
                            <button
                                type="submit"
                                class="btn btn-outline-secondary btn-lg">
                                Go to contact info and payment
                            </button>
                        </div>
                    </section>
                </div>
            </div>

        </div>
    </form>
@endsection
