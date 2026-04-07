@extends('layouts.app')

@section('title', 'Product')

@section('content')
    <main class="container-fluid my-5">
        <div class="row g-5">
            <div class="col-md-7" style="max-width: calc(98vh - 90px)">
                <div id="productCarousel" class="carousel slide ratio ratio-1x1 mx-auto" data-bs-ride="carousel">

                    <div class="carousel-inner h-100">
                        <div class="carousel-item active h-100">
                            <img src="assets/img/benjamin-szabo-3azXYMg-Y8o-unsplash.jpg"
                                 alt="Black Insulated Puffer Jacket"
                                 class="d-block w-100 h-100 object-fit-contain">
                        </div>
                        <div class="carousel-item h-100">
                            <img src="assets/img/mens/ManDenimJacket.jpg"
                                 alt="Jacket back"
                                 class="d-block w-100 h-100 object-fit-contain">
                        </div>
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
                        <h2 class="fw-bold fs-2">Black Insulated Puffer Jacket</h2>
                        <h4 class="fs-5">89,99 €</h4>
                    </div>

                    <p class="lh-base">A sleek, lightweight puffer jacket designed for everyday warmth and comfort. Features a zip-up front, high collar, and insulated padding to keep you protected in cooler weather while maintaining a clean, modern look.</p>


                    <section class="mt-5">
                        <div class="container-fluid btn-group">
                            <input type="radio" class="btn-check" name="sizeOptions" id="sizeXS" autocomplete="off">
                            <label class="btn btn-outline-secondary" for="sizeXS">XS</label>

                            <input type="radio" class="btn-check" name="sizeOptions" id="sizeS" autocomplete="off">
                            <label class="btn btn-outline-secondary" for="sizeS">S</label>

                            <input type="radio" class="btn-check" name="sizeOptions" id="sizeM" autocomplete="off" checked>
                            <label class="btn btn-outline-secondary" for="sizeM">M</label>

                            <input type="radio" class="btn-check" name="sizeOptions" id="sizeL" autocomplete="off">
                            <label class="btn btn-outline-secondary" for="sizeL">L</label>

                            <input type="radio" class="btn-check" name="sizeOptions" id="sizeXL" autocomplete="off">
                            <label class="btn btn-outline-secondary" for="sizeXL">XL</label>
                        </div>

                        <div class="container-fluid mt-1 d-grid">
                            <button type="button" class="btn btn-outline-secondary">Add To Cart</button>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </main>
@endsection
