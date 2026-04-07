@extends('layouts.app')
@section('title', 'Admin Panel')


@section('contect')
    <main class="container-fluid my-5 mx-auto" style="max-width: 1300px;">
        <div class="row g-5">

            <div class="col-md-7">
                <input type="search" class="form-control form-control-lg bg-light mb-4" placeholder="Search by name....">

                <div class="overflow-y-auto overflow-x-hidden pe-3" style="max-height: 75vh;">
                    <div class="container-fluid px-0">

                        <div class="row g-2 mb-3 align-items-center border bg-light p-2">
                            <div class="col-1 text-center">
                                <p class="mb-0">333</p>
                            </div>
                            <div class="col-2">
                                <div class="ratio ratio-1x1 bg-white border">
                                    <img src="assets/img/mens/ManDenimJacket.jpg" alt="product" class="object-fit-contain">
                                </div>
                            </div>
                            <div class="col-2">
                                <p class="fw-bold text-truncate mb-0">Jacket</p>
                            </div>
                            <div class="col-2">
                                <p class="text-truncate mb-0">Men's</p>
                            </div>
                            <div class="col-1 text-center">
                                <p class="mb-0">33.33$</p>
                            </div>
                            <div class="col-2 text-center">
                                <p class="mb-0">99</p>
                            </div>
                            <div class="col-2">
                                <div class="d-flex gap-2">
                                    <a href="edit_item.blade.php" class="btn btn-outline-secondary w-50" type="button"><i class="bi bi-pencil"></i></a>
                                    <button class="btn btn-outline-secondary w-50" type="button"><i class="bi bi-x-lg"></i></button>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="d-flex gap-2 mt-4 w-100">
                    <button class="btn btn-outline-secondary" type="button" style="width: 15%;">
                        <i class="bi bi-chevron-double-left"></i>
                    </button>
                    <button class="btn btn-outline-secondary" type="button" style="width: 15%;">
                        <i class="bi bi-chevron-left"></i>
                    </button>
                    <div class="form-control text-center bg-light border-0" style="width: 40%;">1</div>
                    <button class="btn btn-outline-secondary" type="button" style="width: 15%;">
                        <i class="bi bi-chevron-right"></i>
                    </button>
                    <button class="btn btn-outline-secondary" type="button" style="width: 15%;">
                        <i class="bi bi-chevron-double-right"></i>
                    </button>
                </div>
            </div>

            <div class="col-md-5">
                <div class="mx-auto" style="max-width: 500px;">
                    <h2 class="fw-bold mb-5">Administrator</h2>

                    <p class="fs-3 mb-2">John Doe</p>
                    <p class="fs-4 mb-5">john.doe@goodmail.com</p>

                    <p class="fs-4 mt-5 pt-5 mb-5">Last logged in: 10.02.2033, 17:11</p>

                    <section class="mt-5">
                        <div class="d-grid mt-2">
                            <a href="edit_item.blade.php" type="button" class="btn btn-outline-secondary btn-lg py-3">Add New Item</a>
                        </div>
                    </section>
                </div>
            </div>

        </div>
    </main>
@endsection
