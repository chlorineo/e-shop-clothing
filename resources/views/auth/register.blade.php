@extends('layouts.app')
@section('title', 'Sign Up')


@section('content')
    <main class="container-fluid my-5">
        <div class="mx-auto bg-light p-4 p-md-5 rounded" style="max-width: 500px;">
            <h1 class="fw-bold mb-5">Sign Up</h1>

            <form method="POST" action="{{ route('register') }}">
                @csrf

                @if ($errors->any())
                    <div class="alert alert-danger mb-4">
                        <ul class="mb-0 ps-3">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="mb-4">
                    <p class="fs-4 mb-2">Name</p>
                    <input
                        type="text"
                        name="name"
                        value="{{ old('name') }}"
                        class="form-control form-control-lg py-3 fs-5 @error('name') is-invalid @enderror"
                        placeholder="John Doe"
                        required
                        autofocus
                    >
                    @error('name')
                        <div class="invalid-feedback d-block fs-6">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-4">
                    <p class="fs-4 mb-2">Email</p>
                    <input
                        type="email"
                        name="email"
                        value="{{ old('email') }}"
                        class="form-control form-control-lg py-3 fs-5 @error('email') is-invalid @enderror"
                        placeholder="example@example.com"
                        required
                    >
                    @error('email')
                        <div class="invalid-feedback d-block fs-6">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-4">
                    <p class="fs-4 mb-2">Password</p>
                    <input
                        type="password"
                        name="password"
                        class="form-control form-control-lg py-3 fs-5 @error('password') is-invalid @enderror"
                        placeholder="Password..."
                        required
                    >
                    @error('password')
                        <div class="invalid-feedback d-block fs-6">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-5">
                    <p class="fs-4 mb-2">Confirm password</p>
                    <input
                        type="password"
                        name="password_confirmation"
                        class="form-control form-control-lg py-3 fs-5 @error('password_confirmation') is-invalid @enderror"
                        placeholder="Confirm Password..."
                        required
                    >
                    @error('password_confirmation')
                        <div class="invalid-feedback d-block fs-6">{{ $message }}</div>
                    @enderror
                </div>

                <div class="d-grid">
                    <button type="submit" class="btn btn-outline-secondary btn-lg py-3 fs-4">Sign Up</button>
                </div>
            </form>

        </div>
    </main>
@endsection
