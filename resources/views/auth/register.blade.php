@extends('layouts.app')
@section('title', 'Sign Up')


@section('content')
    <main class="container-fluid my-5">
        <div class="mx-auto bg-light p-4 p-md-5 rounded" style="max-width: 500px;">
            <h1 class="fw-bold mb-5">Sign Up</h1>

            <form method="POST" action="{{ route('register') }}">
                @csrf

                <div class="mb-4">
                    <p class="fs-4 mb-2">Name</p>
                    <input type="text" name="name" class="form-control form-control-lg py-3 fs-5" placeholder="John Doe" required autofocus>
                </div>

                <div class="mb-4">
                    <p class="fs-4 mb-2">Email</p>
                    <input type="email" name="email" class="form-control form-control-lg py-3 fs-5" placeholder="example@example.com" required>
                </div>

                <div class="mb-4">
                    <p class="fs-4 mb-2">Password</p>
                    <input type="password" name="password" class="form-control form-control-lg py-3 fs-5" placeholder="Password..." required>
                </div>

                <div class="mb-5">
                    <p class="fs-4 mb-2">Confirm password</p>
                    <input type="password" name="password_confirmation" class="form-control form-control-lg py-3 fs-5" placeholder="Confirm Password...">
                </div>

                <div class="d-grid">
                    <button type="submit" class="btn btn-outline-secondary btn-lg py-3 fs-4">Sign Up</button>
                </div>
            </form>
        </div>
    </main>
@endsection
