@extends('layouts.app')

@section('title', 'Homepage')

@push('styles')
    <style>

        .banner{
            background:#cfcfcf;
            height:600px;
            display:flex;
            align-items:center;
            justify-content:center;
            font-size:60px;
            font-weight:300;
            margin-top:15px;
        }

        .banner img{
            width:100%;
            height:100%;
            object-fit:cover;
        }

        .page-content{
            flex:1;
        }

        .category-box{
            position: relative;
            background:#bdbdbd;
            height:200px;
            display:flex;
            align-items:center;
            justify-content:center;
            text-align: center;
            font-size:28px;
            margin-bottom:10px;
        }

        .category-text {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            color: white;
            font-size: 50px;
            font-weight: bold;
        }

        .category-box img{
            width:100%;
            height:100%;
            object-fit:cover;
        }

        .category-scroll{
            padding:15px;
            margin-top:20px;
        }
    </style>
@endpush

@section('content')
<div class="page-content">
    <div class="container-fluid">

        <!-- BANNER -->

        <div class="banner">
            <img src="assets/img/HomePage/banner.jpg" alt="Banner">
        </div>


        <!-- CATEGORY ROW -->

        <div class="category-scroll">

            <div class="row text-center">

                <div class="col-md-3">
                    <a href="{{ url('/category') }}">
                        <div class="category-box">
                            <img src="assets/img/HomePage/menClothing.jpg" alt="Men's">
                            <div class="category-text">Men's</div>
                        </div>
                    </a>
                </div>

                <div class="col-md-3">
                    <a href="{{ url('/category') }}">
                        <div class="category-box">
                            <img src="assets/img/HomePage/womenClothing.png" alt="Women's">
                            <div class="category-text">Women's</div>
                        </div>
                    </a>
                </div>

                <div class="col-md-3">
                    <a href="{{ url('/category') }}">
                        <div class="category-box">
                            <img src="assets/img/HomePage/unisex.jpg" alt="Unisex">
                            <div class="category-text">Unisex</div>
                        </div>
                    </a>
                </div>

                <div class="col-md-3">
                    <a href="{{ url('/category') }}">
                        <div class="category-box">
                            <img src="assets/img/HomePage/accesories.jpg" alt="Accessories">
                            <div class="category-text">Accessories</div>
                        </div>
                    </a>
                </div>

            </div>

        </div>

    </div>
</div>
@endsection
