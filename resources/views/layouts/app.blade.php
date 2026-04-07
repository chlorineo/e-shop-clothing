<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Styliqueo')</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    @stack('styles')
</head>
<body class="container-fluid">
<div class="min-vh-100">
    <header class="navbar navbar-expand-md border-bottom p-3" style="min-height: 90px">
        <div class="container-fluid">
            <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <i class="navbar-toggler-icon"></i>
            </button>

            <a href="{{ url('/') }}" class="navbar-brand mx-auto mx-md-0 fw-bold">Styliqueo</a>

            <div class="d-md-none invisible pe-none">
                <button class="navbar-toggler border-0" type="button">
                    <i class="navbar-toggler-icon"></i>
                </button>
            </div>

            <div class="collapse navbar-collapse" id="navbarNav">
                <section class="d-flex flex-column flex-md-row gap-3 align-items-start align-items-md-center order-md-last ms-md-auto mt-4 mt-md-0">
                    <form class="w-100"><input class="form-control" type="search" placeholder="Search..."></form>
                    <div class="d-flex flex-column flex-md-row gap-3">
                        <a href="{{ url('/profile') }}" class="text-body"><i class="bi bi-person fs-3"></i></a>
                        <a href="{{ url('/cart') }}" class="text-body"><i class="bi bi-bag fs-4"></i></a>
                    </div>
                </section>

                <ul class="navbar-nav gap-2 gap-md-0 mt-4 mt-md-0 ms-md-4">
                    <li class="nav-item"><a class="nav-link active fs-5" href="{{ url('/category') }}">Men's</a></li>
                    <li class="nav-item"><a class="nav-link active fs-5" href="{{ url('/category') }}">Women's</a></li>
                    <li class="nav-item"><a class="nav-link active fs-5" href="{{ url('/category') }}">Unisex</a></li>
                    <li class="nav-item"><a class="nav-link active fs-5" href="{{ url('/category') }}">Accessories</a></li>
                </ul>
            </div>
        </div>
    </header>


    @yield('content')
</div>

<footer class="border-top p-3">
    <div class="d-flex justify-content-between align-items-top mt-2">
        <h2 class="fw-bold fs-2">Styliqueo</h2>

        <section class="d-flex gap-3">
            <a href="https://instagram.com"><i class="bi bi-instagram fs-4"></i></a>
            <a href="https://threads.com"><i class="bi bi-threads fs-4"></i></a>
            <a href="https://youtube.som"><i class="bi bi-youtube fs-4"></i></a>
            <a href="https://x.com"><i class="bi bi-twitter-x fs-4"></i></a>
            <a href="https://tiktok.com"><i class="bi bi-tiktok fs-4"></i></a>
            <a href="https://pinterest.com"><i class="bi bi-pinterest fs-4"></i></a>
        </section>
    </div>
</footer>
</body>
</html>
