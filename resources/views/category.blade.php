@extends('layouts.app')
@section('title', 'Category')

@push('styles')
    <style>


        .sidebar{
            background:#cfcfcf;
            padding:15px;
        }
        .filter-box{
            margin-bottom:20px;
        }

        .product-grid{
            display:grid;
            grid-template-columns: repeat(auto-fill, minmax(260px, 260px));
            gap:20px;
            justify-content:start;
        }

        .product-card{
            background:#ebebeb;
            padding:10px;
            color:white;
            border:2px solid #555;
            display: flex;
            flex-direction: column;
        }

        .product-image{
            background:#bdbdbd;
            height:150px;
            display:flex;
            align-items:center;
            justify-content:center;
            color:black;
            font-size:20px;
            margin-bottom:5px;
        }

        .product-image img{
            width:100%;
            height:100%;
            object-fit:cover;
        }

        .product-name{
            background:#bdbdbd;
            color:black;
            padding:3px;
            margin-bottom:5px;
            text-align:center;
        }

        .product-description{
            height:minmax(80px, 200px);
            align-items:center;
            justify-content:center;
            flex:1;
            text-align:center;
        }

        .price{
            background:#bdbdbd;
            color:black;
            padding:3px 8px;
        }

        .sort-btn{
            margin-right:10px;
        }
    </style>
@endpush


@section('content')
    <div class="container-fluid mt-3">

        <div class="row">

            <!-- FILTER SIDEBAR -->

            <div class="col-md-2 sidebar">

                <h4>Filters</h4>

                <div class="filter-box">

                    <label>Price Range</label>
                    <input type="range" class="form-range">

                    <div class="d-flex justify-content-between">
                        <span>14,99 €</span>
                        <span>199,99 €</span>
                    </div>

                </div>

                <div class="filter-box">

                    <label>Colors</label>

                    <div><input type="checkbox"> White</div>
                    <div><input type="checkbox"> Gray</div>
                    <div><input type="checkbox"> Dark Blue</div>
                    <div><input type="checkbox"> Red</div>
                    <div><input type="checkbox"> Blue</div>
                    <div><input type="checkbox"> Pink</div>
                    <div><input type="checkbox"> Yellow</div>

                </div>

                <div class="filter-box">

                    <label>Materials</label>

                    <div><input type="checkbox"> Cotton</div>
                    <div><input type="checkbox"> Denim</div>
                    <div><input type="checkbox"> Wool</div>
                    <div><input type="checkbox"> Polyester</div>
                    <div><input type="checkbox"> Linen</div>

                </div>

                <div class="filter-box">

                    <label>Size</label>

                    <div><input type="checkbox"> XS</div>
                    <div><input type="checkbox"> S</div>
                    <div><input type="checkbox"> M</div>
                    <div><input type="checkbox"> L</div>
                    <div><input type="checkbox"> XL</div>

                </div>

            </div>


            <!-- MAIN CONTENT -->

            <div class="col-md-10">

                <h1>Men's</h1>

                <div class="bg-secondary text-white p-2 mb-3">
                    Results for: search term
                </div>

                <div class="mb-3">

                    <strong>Sort by:</strong>

                    <button class="btn btn-light sort-btn">Highest Rated</button>
                    <button class="btn btn-light sort-btn">Cheapest</button>
                    <button class="btn btn-light sort-btn">Most Expensive</button>
                    <button class="btn btn-light sort-btn">Newest</button>

                </div>


                <!-- PRODUCT GRID -->

                <div class="product-grid">
                    @forelse ($products as $product)
                        <x-layouts.product-card :product="$product" />
                    @empty
                        <p class="fs-5 text-muted">No products available yet.</p>
                    @endforelse
                </div>


                <!-- PAGINATION -->

                <div class="d-flex justify-content-between mt-4">

                    <button class="btn btn-light">
                        < Previous
                    </button>

                    <button class="btn btn-light">
                        Next >
                    </button>

                </div>

            </div>

        </div>

    </div>
@endsection
