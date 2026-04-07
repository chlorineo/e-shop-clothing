@extends('layouts.app')
@section('title', '')


@section('content')
    <main class="container-fluid my-5">
        <div class="mx-auto" style="max-width: 700px;">
            <p class="fs-4 mb-3">Add photos</p>
            <div class="d-flex gap-3 mb-5 flex-wrap">
                <div class="ratio ratio-1x1 border bg-light rounded me-1" style="width: 100px;">
                    <img src="assets/img/mens/ManDenimJacket.jpg" alt="product image" class="object-fit-contain rounded">
                </div>
                <div class="ratio ratio-1x1 border bg-light rounded me-1" style="width: 100px;">
                    <img src="assets/img/mens/ManDenimJacket2.jpg" alt="product image" class="object-fit-contain rounded">
                </div>
                <div class="ratio ratio-1x1 border bg-light rounded me-1" style="width: 100px;">
                    <img src="assets/img/mens/ManDenimJeans1.jpg" alt="product image" class="object-fit-contain rounded">
                </div>
                <div class="ratio ratio-1x1 border bg-light rounded" style="width: 100px;">
                    <button type="button" class="btn btn-outline-secondary w-100 h-100 d-flex align-items-center justify-content-center">
                        <i class="bi bi-plus fs-2"></i>
                    </button>
                </div>
            </div>

            <div class="mb-4">
                <p class="fs-4 mb-2">Product name</p>
                <input type="text" class="form-control form-control-lg py-3 fs-5" placeholder="Product name...">
            </div>

            <div class="mb-4">
                <p class="fs-4 mb-2">Product description</p>
                <textarea class="form-control form-control-lg fs-5" rows="6" placeholder="Description..."></textarea>
            </div>

            <div class="mb-4">
                <p class="fs-4 mb-2">Cost</p>
                <input type="text" class="form-control form-control-lg py-3 fs-5" placeholder="Cost...">
            </div>

            <div class="mb-5">
                <p class="fs-4 mb-2">Tags</p>
                <input type="text" class="form-control form-control-lg py-3 fs-5" placeholder="Tags...">
            </div>

            <div class="d-flex justify-content-between gap-3 mt-5">
                <a href="admin_panel.blade.php" type="button" class="btn btn-outline-secondary btn-lg flex-grow-1 py-3 fs-4">Cancel</a>
                <a href="admin_panel.blade.php" type="button" class="btn btn-outline-secondary btn-lg flex-grow-1 py-3 fs-4">Save</a>
            </div>
        </div>
    </main>
@endsection
