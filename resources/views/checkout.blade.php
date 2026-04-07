@extends('layouts.app')
@section('title', '')


@section('content')
    <main class="container-fluid my-5">
        <div class="mx-auto bg-light p-4 p-md-5" style="max-width: 700px;">
            <h1 class="fw-bold mb-5">Order Summary</h1>

            <div class="mb-5">
                <h2 class="fs-2 mb-3">Delivery details:</h2>
                <p class="fs-4 mb-1">Pick up in store</p>
                <p class="fs-4 mb-1">Address: 123 Main Street, Springfield, IL 62701, USA</p>
                <p class="fs-4 mb-1">Name: John Doe</p>
                <p class="fs-4 mb-1">Phone number: +1 555-123-4567</p>
                <p class="fs-4 mb-1">Email: john.doe@example.com</p>
            </div>

            <div class="mb-5">
                <h2 class="fs-2 mb-3">Contact information:</h2>
                <p class="fs-4 mb-1">Address: 456 Elm Street, Springfield, IL 62702, USA</p>
                <p class="fs-4 mb-1">Name: John Doe</p>
                <p class="fs-4 mb-1">Phone number: +1 555-123-4567</p>
                <p class="fs-4 mb-1">Email: john.doe@example.com</p>
            </div>

            <div class="d-flex justify-content-between align-items-center mt-5 mb-5">
                <h2 class="fs-2 fw-bold mb-0">Total Cost + VAT:</h2>
                <h2 class="fs-2 fw-bold mb-0">1230 $</h2>
            </div>

            <div class="d-grid">
                <button type="button" class="btn btn-outline-secondary btn-lg py-3"><i class="bi bi-credit-card me-2 fs-3"></i> Pay</button>
            </div>
        </div>
    </main>
@endsection
