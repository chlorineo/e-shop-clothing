@extends('layouts.app')
@section('title', '')


@section('content')
    <main class="container-fluid my-5">
        <div class="mx-auto" style="max-width: 900px;">
            <h1 class="fw-bold mb-5">Your Profile</h1>

            <form method="POST" id="profile-form" action="{{ route('profile.update') }}">
                @csrf
                @method('PATCH')

                <div class="row mb-5 align-items-center">
                    <div class="col-md-4">
                        <p class="fs-1 mb-0">Username</p>
                    </div>
                    <div class="col-md-8">
                        <input
                            type="text"
                            name="name"
                            value="{{ old('name', auth()->user()->name) }}"
                            class="form-control form-control-lg py-3 fs-4"
                            placeholder="Username..."
                        >
                    </div>
                </div>

                <div class="row mb-5 align-items-center">
                    <div class="col-md-4">
                        <p class="fs-1 mb-0">Name</p>
                    </div>
                    <div class="col-md-8">
                        <div class="row g-3">
                            <div class="col-sm-6">
                                <input
                                    type="text"
                                    name="first_name"
                                    value="{{ old('first_name', auth()->user()->first_name) }}"
                                    class="form-control form-control-lg py-3 fs-4"
                                    placeholder="First Name..."
                                >
                            </div>
                            <div class="col-sm-6">
                                <input
                                    type="text"
                                    name="last_name"
                                    value="{{ old('last_name', auth()->user()->last_name) }}"
                                    class="form-control form-control-lg py-3 fs-4"
                                    placeholder="Last Name..."
                                >
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row mb-5 align-items-center">
                    <div class="col-md-4">
                        <p class="fs-1 mb-0">Email</p>
                    </div>
                    <div class="col-md-8">
                        <input
                            type="email"
                            name="email"
                            value="{{ old('email', auth()->user()->email) }}"
                            class="form-control form-control-lg py-3 fs-4"
                            placeholder="Email..."
                        >
                    </div>
                </div>

                <div class="row mb-5 align-items-center">
                    <div class="col-md-4">
                        <p class="fs-1 mb-0">Phone Number</p>
                    </div>
                    <div class="col-md-8">
                        <input
                            type="tel"
                            name="phone"
                            value="{{ old('phone', auth()->user()->phone) }}"
                            class="form-control form-control-lg py-3 fs-4"
                            placeholder="Phone Number..."
                        >
                    </div>
                </div>

                <div class="row mb-5 align-items-center">
                    <div class="col-md-4">
                        <p class="fs-1 mb-0">Country</p>
                    </div>
                    <div class="col-md-8">
                        <input
                            type="text"
                            name="country"
                            value="{{ old('country', auth()->user()->country) }}"
                            class="form-control form-control-lg py-3 fs-4"
                            placeholder="Country/Region..."
                        >
                    </div>
                </div>

                <div class="row mb-5 align-items-center">
                    <div class="col-md-4">
                        <p class="fs-1 mb-0">Address</p>
                    </div>
                    <div class="col-md-8">
                        <div class="row g-3 mb-3">
                            <div class="col-12">
                                <input
                                    type="text"
                                    name="street"
                                    value="{{ old('street', auth()->user()->street) }}"
                                    class="form-control form-control-lg py-3 fs-4"
                                    placeholder="Street..."
                                >
                            </div>
                        </div>
                        <div class="row g-3">
                            <div class="col-sm-8">
                                <input
                                    type="text"
                                    name="city"
                                    value="{{ old('city', auth()->user()->city) }}"
                                    class="form-control form-control-lg py-3 fs-4"
                                    placeholder="City..."
                                >
                            </div>
                            <div class="col-sm-4">
                                <input
                                    type="text"
                                    name="zip_code"
                                    value="{{ old('zip_code', auth()->user()->zip_code) }}"
                                    class="form-control form-control-lg py-3 fs-4"
                                    placeholder="Zip code..."
                                >
                            </div>
                        </div>
                    </div>
                </div>
            </form>

            <div class="d-flex justify-content-between align-items-center mt-5">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="btn btn-outline-danger btn-lg px-5 py-3 fs-4">Log Out</button>
                </form>

                <div class="d-flex gap-3">
                    <a href="{{ request()->url() }}" class="btn btn-outline-secondary btn-lg px-5 py-3 fs-4">Discard</a>
                    <button type="submit" form="profile-form" class="btn btn-outline-secondary btn-lg px-5 py-3 fs-4">Save</button>
                </div>
            </div>
        </div>
    </main>
@endsection
