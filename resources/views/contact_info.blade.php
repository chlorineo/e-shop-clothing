@extends('layouts.app')
@section('title', '')

@php
    $selectedPayment = old('paymentMethod', $contactData['paymentMethod'] ?? 'google');

    $cart = session()->get('cart', []);

    $cost = 0;
    foreach ($cart as $item) {
        $cost += $item['price'] * $item['quantity'];
    }

    $discount = 0;
    $delivery = ($deliveryData['deliveryMethod'] ?? 'homeDelivery') === 'homeDelivery' ? 3 : 0;

    $totalCost = $cost - $discount + $delivery;
    $vat = $totalCost * 0.23;
@endphp


@section('content')
    <form
        method="POST"
        action="{{ route('checkout.contact.process') }}"
        class="container-fluid my-5 mx-auto"
        style="max-width: 1300px;">
        @csrf

        <h1 class="fw-bold mb-5">Contact information</h1>

        <div class="row g-5">
            <div class="col-md-7">
                <div class="pe-3 overflow-auto" style="max-height: 75vh;">
                    <div class="container-fluid px-0">

                        <input type="checkbox" class="btn-check" id="sameAsDelivery">
                        <label
                            class="btn btn-outline-secondary w-100 py-3 mb-5 fs-5"
                            for="sameAsDelivery">
                            The billing information is the same as the delivery information
                        </label>

                        <div class="mb-4">
                            <label class="form-label fs-3">First Name</label>
                            <input
                                type="text"
                                id="first_name"
                                name="first_name"
                                class="form-control form-control-lg py-3"
                                placeholder="First Name..."
                                value="{{ old('first_name', $contactData['first_name'] ?? $user?->first_name) }}"
                                required
                            >
                        </div>

                        <div class="mb-4">
                            <label class="form-label fs-3">Last Name</label>
                            <input
                                type="text"
                                id="last_name"
                                name="last_name"
                                class="form-control form-control-lg py-3"
                                placeholder="Last Name..."
                                value="{{ old('last_name', $contactData['last_name'] ?? $user?->last_name) }}"
                                required
                            >
                        </div>

                        <div class="mb-4">
                            <label class="form-label fs-3">Email</label>
                            <input
                                type="email"
                                id="email"
                                name="email"
                                class="form-control form-control-lg py-3"
                                placeholder="Email..."
                                value="{{ old('email', $contactData['email'] ?? $user?->email) }}"
                                required
                            >
                        </div>

                        <div class="mb-4">
                            <label class="form-label fs-3">Phone number</label>
                            <input
                                type="tel"
                                id="phone"
                                name="phone"
                                class="form-control form-control-lg py-3"
                                placeholder="Phone number..."
                                value="{{ old('phone', $contactData['phone'] ?? $user?->phone) }}"
                                required
                            >
                        </div>

                        <div class="mb-4">
                            <label class="form-label fs-3">Street and House Number</label>
                            <input
                                type="text"
                                id="street"
                                name="street"
                                class="form-control form-control-lg py-3"
                                placeholder="Street and house number..."
                                value="{{ old('street', $contactData['street'] ?? $user?->street) }}"
                                required
                            >
                        </div>

                        <div class="mb-4">
                            <label class="form-label fs-3">City</label>
                            <input
                                type="text"
                                id="city"
                                name="city"
                                class="form-control form-control-lg py-3"
                                placeholder="City..."
                                value="{{ old('city', $contactData['city'] ?? $user?->city) }}"
                            >
                        </div>

                        <div class="mb-4">
                            <label class="form-label fs-3">Postcode</label>
                            <input
                                type="text"
                                id="zip_code"
                                name="zip_code"
                                class="form-control form-control-lg py-3"
                                placeholder="Postcode..."
                                value="{{ old('zip_code', $contactData['zip_code'] ?? $user?->zip_code) }}"
                                required
                            >
                        </div>

                        <div class="mb-5">
                            <label class="form-label fs-3">Country</label>
                            <input
                                type="text"
                                id="country"
                                name="country"
                                class="form-control form-control-lg py-3"
                                placeholder="Country..."
                                value="{{ old('country', $contactData['country'] ?? $user?->country) }}"
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
                        <div class="btn-group w-100 mb-4">
                            <input
                                type="radio"
                                id="payGoogle"
                                name="paymentMethod"
                                class="btn-check"
                                value="google"
                                {{ $selectedPayment === 'google' ? 'checked' : '' }}
                            >
                            <label class="btn btn-outline-secondary py-3" for="payGoogle">
                                <i class="bi bi-google fs-2"></i>
                            </label>

                            <input
                                type="radio"
                                id="payApple"
                                name="paymentMethod"
                                class="btn-check"
                                value="apple"
                                {{ $selectedPayment === 'apple' ? 'checked' : '' }}
                            >
                            <label class="btn btn-outline-secondary py-3" for="payApple">
                                <i class="bi bi-apple fs-2"></i>
                            </label>

                            <input
                                type="radio"
                                id="payCard"
                                name="paymentMethod"
                                class="btn-check"
                                value="card"
                                {{ $selectedPayment === 'card' ? 'checked' : '' }}
                            >
                            <label class="btn btn-outline-secondary py-3" for="payCard">
                                <i class="bi bi-credit-card fs-2"></i>
                            </label>

                            <input
                                type="radio"
                                id="payCash"
                                name="paymentMethod"
                                class="btn-check"
                                value="cash"
                                {{ $selectedPayment === 'cash' ? 'checked' : '' }}
                            >
                            <label class="btn btn-outline-secondary py-3" for="payCash">
                                <i class="bi bi-cash-coin fs-2"></i>
                            </label>
                        </div>

                        <div class="d-grid mt-2">
                            <button type="submit" class="btn btn-outline-secondary btn-lg">Checkout</button>
                        </div>
                    </section>
                </div>
            </div>

        </div>
    </form>

    <script>
        document.getElementById('sameAsDelivery').addEventListener('change', function() {
            if (this.checked) {
                document.getElementById('first_name').value = "{{ $deliveryData['first_name'] ?? '' }}";
                document.getElementById('last_name').value = "{{ $deliveryData['last_name'] ?? '' }}";
                document.getElementById('email').value = "{{ $deliveryData['email'] ?? '' }}";
                document.getElementById('phone').value = "{{ $deliveryData['phone'] ?? '' }}";
                document.getElementById('street').value = "{{ $deliveryData['street'] ?? '' }}";
                document.getElementById('city').value = "{{ $deliveryData['city'] ?? '' }}";
                document.getElementById('zip_code').value = "{{ $deliveryData['zip_code'] ?? '' }}";
                document.getElementById('country').value = "{{ $deliveryData['country'] ?? '' }}";
            }
            else {
                document.getElementById('first_name').value = "{{ $user?->first_name ?? '' }}";
                document.getElementById('last_name').value = "{{ $user?->last_name ?? '' }}";
                document.getElementById('email').value = "{{ $user?->email ?? '' }}";
                document.getElementById('phone').value = "{{ $user?->phone ?? '' }}";
                document.getElementById('street').value = "{{ $user?->street ?? '' }}";
                document.getElementById('city').value = "{{ $user?->city ?? '' }}";
                document.getElementById('zip_code').value = "{{ $user?->zip_code ?? '' }}";
                document.getElementById('country').value = "{{ $user?->country ?? '' }}";
            }
        });
    </script>
@endsection
