@extends('layouts.app')
@section('title', '')


@section('content')
    <main class="container-fluid my-5">
        <div class="mx-auto" style="max-width: 900px;">
            <h1 class="fw-bold mb-5">Your Profile</h1>

            <div class="row mb-5 align-items-center">
                <div class="col-md-4">
                    <p class="fs-1 mb-0">Name</p>
                </div>
                <div class="col-md-8">
                    <div class="row g-3">
                        <div class="col-sm-6">
                            <input type="text" class="form-control form-control-lg py-3 fs-4" placeholder="First Name...">
                        </div>
                        <div class="col-sm-6">
                            <input type="text" class="form-control form-control-lg py-3 fs-4" placeholder="Last Name...">
                        </div>
                    </div>
                </div>
            </div>

            <div class="row mb-5 align-items-center">
                <div class="col-md-4">
                    <p class="fs-1 mb-0">Email</p>
                </div>
                <div class="col-md-8">
                    <input type="email" class="form-control form-control-lg py-3 fs-4" placeholder="Email...">
                </div>
            </div>

            <div class="row mb-5 align-items-center">
                <div class="col-md-4">
                    <p class="fs-1 mb-0">Phone Number</p>
                </div>
                <div class="col-md-8">
                    <input type="tel" class="form-control form-control-lg py-3 fs-4" placeholder="Phone Number...">
                </div>
            </div>

            <div class="row mb-5 align-items-center">
                <div class="col-md-4">
                    <p class="fs-1 mb-0">Country/Region</p>
                </div>
                <div class="col-md-8">
                    <input type="text" class="form-control form-control-lg py-3 fs-4" placeholder="Country/Region...">
                </div>
            </div>

            <div class="row mb-5 align-items-center">
                <div class="col-md-4">
                    <p class="fs-1 mb-0">Address</p>
                </div>
                <div class="col-md-8">
                    <input type="text" class="form-control form-control-lg py-3 fs-4" placeholder="Address...">
                </div>
            </div>

            <div class="d-flex justify-content-end gap-3 mt-5">
                <button type="button" class="btn btn-outline-secondary btn-lg px-5 py-3 fs-4">Discard</button>
                <button type="button" class="btn btn-outline-secondary btn-lg px-5 py-3 fs-4">Save</button>
            </div>
        </div>
    </main>
@endsection
