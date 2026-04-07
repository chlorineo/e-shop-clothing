@extends('layouts.app')
@section('title', '')


@section('content')
    <main class="container-fluid my-5">
        <div class="mx-auto bg-light p-4 p-md-5 rounded" style="max-width: 500px;">
            <h1 class="fw-bold mb-5">Sign Up</h1>

            <div class="mb-4">
                <p class="fs-4 mb-2">Email</p>
                <input type="email" class="form-control form-control-lg py-3 fs-5" placeholder="email...">
            </div>

            <div class="mb-4">
                <p class="fs-4 mb-2">Password</p>
                <input type="password" class="form-control form-control-lg py-3 fs-5" placeholder="Password...">
            </div>

            <div class="mb-5">
                <p class="fs-4 mb-2">Confirm password</p>
                <input type="password" class="form-control form-control-lg py-3 fs-5" placeholder="Password...">
            </div>

            <div class="d-grid">
                <a href="profile.blade.php" type="button" class="btn btn-outline-secondary btn-lg py-3 fs-4">Sign Up</a>
            </div>
        </div>
    </main>
@endsection
