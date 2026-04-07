@extends('layouts.app')
@section('title', '')


@section('content')
    <main class="container-fluid my-5 mx-auto" style="max-width: 1300px;">
        <h1 class="fw-bold mb-5">Contact information</h1>

        <div class="row g-5">
            <div class="col-md-7">
                <div class="pe-3 overflow-auto" style="max-height: 75vh;">
                    <div class="container-fluid px-0">

                        <input type="checkbox" class="btn-check" id="sameAsDelivery">
                        <label class="btn btn-outline-secondary w-100 py-3 mb-5 fs-5" for="sameAsDelivery">The billing information is the same as the delivery information</label>

                        <div class="mb-4">
                            <label class="form-label fs-3">Full name</label>
                            <input type="text" class="form-control form-control-lg py-3" placeholder="Name Surname...">
                        </div>

                        <div class="mb-4">
                            <label class="form-label fs-3">Email</label>
                            <input type="email" class="form-control form-control-lg py-3" placeholder="email...">
                        </div>

                        <div class="mb-4">
                            <label class="form-label fs-3">Phone number</label>
                            <input type="tel" class="form-control form-control-lg py-3" placeholder="phone number...">
                        </div>

                        <div class="mb-4">
                            <label class="form-label fs-3">Street and House Number</label>
                            <input type="text" class="form-control form-control-lg py-3" placeholder="street and house number...">
                        </div>

                        <div class="mb-4">
                            <label class="form-label fs-3">Postcode</label>
                            <input type="text" class="form-control form-control-lg py-3" placeholder="postcode...">
                        </div>

                        <div class="mb-5">
                            <label class="form-label fs-3">Country</label>
                            <input type="text" class="form-control form-control-lg py-3" placeholder="country...">
                        </div>

                    </div>
                </div>
            </div>

            <div class="col-md-5">
                <div class="mx-auto" style="max-width: 500px;">
                    <h2 class="fw-bold fs-2 mb-5">Order summary</h2>

                    <div class="d-flex justify-content-between mb-2">
                        <p class="fs-4 mb-0">Cost:</p>
                        <p class="fs-4 mb-0">300 $</p>
                    </div>
                    <div class="d-flex justify-content-between mb-2">
                        <p class="fs-4 mb-0">Discount:</p>
                        <p class="fs-4 mb-0">30 $</p>
                    </div>
                    <div class="d-flex justify-content-between mb-5">
                        <p class="fs-4 mb-0">Delivery:</p>
                        <p class="fs-4 mb-0">3 $</p>
                    </div>

                    <div class="d-flex justify-content-between mb-2">
                        <h2 class="fs-3 mb-0 fw-bold">Total cost:</h2>
                        <h2 class="fs-3 mb-0 fw-bold">1000 $</h2>
                    </div>
                    <div class="d-flex justify-content-between mb-5">
                        <h2 class="fs-3 mb-0 fw-bold">VAT:</h2>
                        <h2 class="fs-3 mb-0 fw-bold">230 $</h2>
                    </div>

                    <section class="mt-5">
                        <div class="btn-group w-100 mb-4">
                            <input type="radio" class="btn-check" name="paymentMethod" id="payGoogle" checked>
                            <label class="btn btn-outline-secondary py-3" for="payGoogle"><i class="bi bi-google fs-2"></i></label>

                            <input type="radio" class="btn-check" name="paymentMethod" id="payApple">
                            <label class="btn btn-outline-secondary py-3" for="payApple"><i class="bi bi-apple fs-2"></i></label>

                            <input type="radio" class="btn-check" name="paymentMethod" id="payCard">
                            <label class="btn btn-outline-secondary py-3" for="payCard"><i class="bi bi-credit-card fs-2"></i></label>

                            <input type="radio" class="btn-check" name="paymentMethod" id="payCash">
                            <label class="btn btn-outline-secondary py-3" for="payCash"><i class="bi bi-cash-coin fs-2"></i></label>
                        </div>

                        <div class="d-grid mt-2">
                            <a href="checkout.blade.php" class="btn btn-outline-secondary btn-lg">Checkout</a>
                        </div>
                    </section>
                </div>
            </div>

        </div>
    </main>
@endsection
