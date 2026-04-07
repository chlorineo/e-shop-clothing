@extends('layouts.app')
@section('title', 'Log In')


@section('content')
    <main class="container-fluid my-5">
        <div class="mx-auto bg-light p-4 p-md-5 rounded" style="max-width: 500px;">
            <h1 class="fw-bold mb-5">Log In</h1>

            <form method="POST" action="{{ route('login') }}">
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
                    <p class="fs-4 mb-2">Email</p>
                    <input
                        type="email"
                        name="email"
                        value="{{ old('email') }}"
                        class="form-control form-control-lg py-3 fs-5 @error('email') is-invalid @enderror"
                        placeholder="example@example.com"
                        required
                        autofocus
                    >
                    @error('email')
                        <div class="invalid-feedback d-block fs-6">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-5">
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

                <div class="d-grid">
                    <button type="submit" class="btn btn-outline-secondary btn-lg py-3 fs-4">Log In</button>
                </div>
            </form>

        </div>

        <div class="text-center mt-4">
            <a href="{{ route('register') }}" class="text-decoration-none text-body fs-4">Sign Up</a>
        </div>
    </main>
@endsection
