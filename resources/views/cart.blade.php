@extends('layouts.app')
@section('title', '')


@section('content')
    <main class="container-fluid my-5 mx-auto" style="max-width: 1300px;">
        <h1 class="fw-bold mb-5">Cart</h1>

        <div class="row g-5">
            <div class="col-md-7">
                <div class="overflow-y-auto overflow-x-hidden pe-3" style="max-height: 75vh;">
                    <div class="container-fluid px-0">
                        <div class="row g-4 mb-4 align-items-center">
                            <div class="col-4">
                                <div class="ratio ratio-1x1 bg-light border">
                                    <img src="assets/img/mens/DressShirtPink.jpg" alt="product" class="object-fit-contain">
                                </div>
                            </div>
                            <div class="col-8">
                                <a href="product.blade.php" class="fs-3 fw-bold mb-1 text-decoration-none text-body">Pink Dress Shirt</a>
                                <h4 class="fs-5 mb-3">59,99 $</h4>
                                <p class="fs-6 mb-3">Size XL</p>

                                <div class="d-flex gap-2 mb-3 w-100">
                                    <button class="btn btn-outline-secondary" type="button" style="width: 20%;"><i class="bi bi-dash"></i></button>
                                    <input type="text" class="form-control text-center" value="1" style="width: 60%;">
                                    <button class="btn btn-outline-secondary" type="button" style="width: 20%;"><i class="bi bi-plus"></i></button>
                                </div>
                                <button class="btn btn-outline-secondary w-100">Delete from cart</button>
                            </div>
                        </div>

                        <div class="row g-4 mb-4 align-items-center">
                            <div class="col-4">
                                <div class="ratio ratio-1x1 bg-light border">
                                    <img src="assets/img/mens/ManBeigeCoat.jpg" alt="product" class="object-fit-contain">
                                </div>
                            </div>
                            <div class="col-8">
                                <a href="product.blade.php" class="fs-3 fw-bold mb-1 text-decoration-none text-body">Beige Coat</a>
                                <h4 class="fs-5 mb-3">100 $</h4>
                                <p class="fs-6 mb-3">Size L</p>

                                <div class="d-flex gap-2 mb-3 w-100">
                                    <button class="btn btn-outline-secondary" type="button" style="width: 20%;"><i class="bi bi-dash"></i></button>
                                    <input type="text" class="form-control text-center" value="1" style="width: 60%;">
                                    <button class="btn btn-outline-secondary" type="button" style="width: 20%;"><i class="bi bi-plus"></i></button>
                                </div>
                                <button class="btn btn-outline-secondary w-100">Delete from cart</button>
                            </div>
                        </div>

                        <div class="row g-4 mb-4 align-items-center">
                            <div class="col-4">
                                <div class="ratio ratio-1x1 bg-light border">
                                    <img src="assets/img/mens/ManDenimCoat.jpg" alt="product" class="object-fit-contain">
                                </div>
                            </div>
                            <div class="col-8">
                                <a href="product.blade.php" class="fs-3 fw-bold mb-1 text-decoration-none text-body">Denim Coat</a>
                                <h4 class="fs-5 mb-3">44,99 $</h4>
                                <p class="fs-6 mb-3">Size M</p>

                                <div class="d-flex gap-2 mb-3 w-100">
                                    <button class="btn btn-outline-secondary" type="button" style="width: 20%;"><i class="bi bi-dash"></i></button>
                                    <input type="text" class="form-control text-center" value="1" style="width: 60%;">
                                    <button class="btn btn-outline-secondary" type="button" style="width: 20%;"><i class="bi bi-plus"></i></button>
                                </div>
                                <button class="btn btn-outline-secondary w-100">Delete from cart</button>
                            </div>
                        </div>

                        <div class="row g-4 mb-4 align-items-center">
                            <div class="col-4">
                                <div class="ratio ratio-1x1 bg-light border">
                                    <img src="assets/img/mens/ManDenimJacket.jpg" alt="product" class="object-fit-contain">
                                </div>
                            </div>
                            <div class="col-8">
                                <a href="product.blade.php" class="fs-3 fw-bold mb-1 text-decoration-none text-body">Denim Jacket</a>
                                <h4 class="fs-5 mb-3">80 $</h4>
                                <p class="fs-6 mb-3">Size S</p>

                                <div class="d-flex gap-2 mb-3 w-100">
                                    <button class="btn btn-outline-secondary" type="button" style="width: 20%;"><i class="bi bi-dash"></i></button>
                                    <input type="text" class="form-control text-center" value="1" style="width: 60%;">
                                    <button class="btn btn-outline-secondary" type="button" style="width: 20%;"><i class="bi bi-plus"></i></button>
                                </div>
                                <button class="btn btn-outline-secondary w-100">Delete from cart</button>
                            </div>
                        </div>

                        <div class="row g-4 mb-4 align-items-center">
                            <div class="col-4">
                                <div class="ratio ratio-1x1 bg-light border">
                                    <img src="assets/img/mens/ManDenimJacket2.jpg" alt="product" class="object-fit-contain">
                                </div>
                            </div>
                            <div class="col-8">
                                <a href="product.blade.php" class="fs-3 fw-bold mb-1 text-decoration-none text-body">Denim Jacket</a>
                                <h4 class="fs-5 mb-3">50 $</h4>
                                <p class="fs-6 mb-3">Size XS</p>

                                <div class="d-flex gap-2 mb-3 w-100">
                                    <button class="btn btn-outline-secondary" type="button" style="width: 20%;"><i class="bi bi-dash"></i></button>
                                    <input type="text" class="form-control text-center" value="1" style="width: 60%;">
                                    <button class="btn btn-outline-secondary" type="button" style="width: 20%;"><i class="bi bi-plus"></i></button>
                                </div>
                                <button class="btn btn-outline-secondary w-100">Delete from cart</button>
                            </div>
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
                        <div class="d-grid mt-2">
                            <a href="delivery_details.blade.php" class="btn btn-outline-secondary btn-lg">Go to delivery</a>
                        </div>
                    </section>
                </div>
            </div>

        </div>
    </main>
@endsection
