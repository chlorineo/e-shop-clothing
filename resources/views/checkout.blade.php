@extends('layouts.app')
@section('title', '')

@php
    $deliveryMethodText = $deliveryData['deliveryMethod'] === 'homeDelivery' ? 'Home Delivery' : 'Pick up in store';
    $finalTotal = $totalCost + $vat;

    $paymentIcons = [
        'google' => 'bi-google',
        'apple' => 'bi-apple',
        'card' => 'bi-credit-card',
        'cash' => 'bi-cash-coin'
    ];
    $paymentIcon = $paymentIcons[$contactData['paymentMethod'] ?? 'card'] ?? 'bi-credit-card';
@endphp

@section('content')
    <main class="container-fluid my-5">
        <div class="mx-auto bg-light p-4 p-md-5" style="max-width: 700px;">
            <h1 class="fw-bold mb-5">Order Summary</h1>

            <div class="mb-5">
                <h2 class="fs-2 mb-3">Delivery details:</h2>
                <p class="fs-4 mb-1">{{ $deliveryMethodText }}</p>
                <p class="fs-4 mb-1">Address: {{ $deliveryData['street'] }}, {{ $deliveryData['city'] }}, {{ $deliveryData['zip_code'] }}, {{ $deliveryData['country'] }}</p>
                <p class="fs-4 mb-1">Name: {{ $deliveryData['first_name'] }} {{ $deliveryData['last_name'] }}</p>
                <p class="fs-4 mb-1">Phone number: {{ $deliveryData['phone'] }}</p>
                <p class="fs-4 mb-1">Email: {{ $deliveryData['email'] }}</p>
            </div>

            <div class="mb-5">
                <h2 class="fs-2 mb-3">Contact information:</h2>
                <p class="fs-4 mb-1">Address: {{ $contactData['street'] }}, {{ $contactData['city'] }}, {{ $contactData['zip_code'] }}, {{ $contactData['country'] }}</p>
                <p class="fs-4 mb-1">Name: {{ $contactData['first_name'] }} {{ $contactData['last_name'] }}</p>
                <p class="fs-4 mb-1">Phone number: {{ $contactData['phone'] }}</p>
                <p class="fs-4 mb-1">Email: {{ $contactData['email'] }}</p>
            </div>

            <div class="d-flex justify-content-between align-items-center mt-5 mb-5">
                <h2 class="fs-2 fw-bold mb-0">Total Cost + VAT:</h2>
                <h2 class="fs-2 fw-bold mb-0">{{ number_format((float) $finalTotal, 2, '.', ' ') }} €</h2>
            </div>

            <form
                method="POST"
                action="{{ route('checkout.place') }}"
                class="d-grid">
                @csrf

                <button type="submit"class="btn btn-outline-secondary btn-lg py-3">
                    <i class="bi {{ $paymentIcon }} me-2 fs-3"></i> Pay
                </button>
            </form>
        </div>
    </main>
@endsection
