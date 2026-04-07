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

                    <div class="product-card">
                        <div class="product-image">
                            <img src="assets/img/mens/ManTshirtWhite.jpg" alt="White T-Shirt">
                        </div>
                        <div class="product-name">
                            <label>White T-Shirt</label>
                        </div>
                        <div class="d-flex justify-content-between mt-2">
                            <div class="price">14,99€</div>
                            <button class="btn btn-sm btn-light">Add to Cart</button>
                        </div>
                    </div>

                    <div class="product-card">
                        <div class="product-image">
                            <img src="assets/img/mens/ManTshirtPink.jpg" alt="Pink T-Shirt">
                        </div>
                        <div class="product-name">
                            <label>Pink T-Shirt</label>
                        </div>
                        <div class="d-flex justify-content-between mt-2">
                            <div class="price">19,99€</div>
                            <button class="btn btn-sm btn-light">Add to Cart</button>
                        </div>
                    </div>

                    <div class="product-card">
                        <div class="product-image">
                            <img src="assets/img/mens/ManTshirtGray.jpg" alt="Gray T-Shirt">
                        </div>
                        <div class="product-name">
                            <label>Gray T-Shirt</label>
                        </div>
                        <div class="d-flex justify-content-between mt-2">
                            <div class="price">14.99€</div>
                            <button class="btn btn-sm btn-light">Add to Cart</button>
                        </div>
                    </div>

                    <div class="product-card">
                        <div class="product-image">
                            <img src="assets/img/mens/ManSuitDarkBlue.jpg" alt="Dark Blue Suit">
                        </div>
                        <div class="product-name">
                            <label>Dark Blue Suit</label>
                        </div>
                        <div class="d-flex justify-content-between mt-2">
                            <div class="price">199,99€</div>
                            <button class="btn btn-sm btn-light">Add to Cart</button>
                        </div>
                    </div>

                    <div class="product-card">
                        <div class="product-image">
                            <img src="assets/img/mens/ManSuitBlack.jpg" alt="Black Suit">
                        </div>
                        <div class="product-name">
                            <label>Black Suit</label>
                        </div>
                        <div class="d-flex justify-content-between mt-2">
                            <div class="price">199,99€</div>
                            <button class="btn btn-sm btn-light">Add to Cart</button>
                        </div>
                    </div>

                    <div class="product-card">
                        <div class="product-image">
                            <img src="assets/img/mens/ManDressShirtRed.jpg" alt="Red Dress Shirt">
                        </div>
                        <div class="product-name">
                            <label>Red Dress Shirt</label>
                        </div>
                        <div class="d-flex justify-content-between mt-2">
                            <div class="price">39,99€</div>
                            <button class="btn btn-sm btn-light">Add to Cart</button>
                        </div>
                    </div>

                    <div class="product-card">
                        <div class="product-image">
                            <img src="assets/img/mens/DressShirtPink.jpg" alt="Pink Dress Shirt">
                        </div>
                        <div class="product-name">
                            <label>Pink Dress Shirt</label>
                        </div>
                        <div class="d-flex justify-content-between mt-2">
                            <div class="price">59,99€</div>
                            <button class="btn btn-sm btn-light">Add to Cart</button>
                        </div>
                    </div>

                    <div class="product-card">
                        <div class="product-image">
                            <img src="assets/img/mens/ManRedHoodie.jpg" alt="Red Hoodie">
                        </div>
                        <div class="product-name">
                            <label>Red Hoodie</label>
                        </div>
                        <div class="d-flex justify-content-between mt-2">
                            <div class="price">29,99€</div>
                            <button class="btn btn-sm btn-light">Add to Cart</button>
                        </div>
                    </div>

                    <div class="product-card">
                        <div class="product-image">
                            <img src="assets/img/mens/ManDenimCoat.jpg" alt="Denim Coat">
                        </div>
                        <div class="product-name">
                            <label>Denim Coat</label>
                        </div>
                        <div class="d-flex justify-content-between mt-2">
                            <div class="price">44,99€</div>
                            <button class="btn btn-sm btn-light">Add to Cart</button>
                        </div>
                    </div>

                    <div class="product-card">
                        <div class="product-image">
                            <img src="assets/img/mens/ManGrayJacket.jpg" alt="Gray Jacket">
                        </div>
                        <div class="product-name">
                            <label>Gray Jacket</label>
                        </div>
                        <div class="d-flex justify-content-between mt-2">
                            <div class="price">50€</div>
                            <button class="btn btn-sm btn-light">Add to Cart</button>
                        </div>
                    </div>

                    <div class="product-card">
                        <div class="product-image">
                            <img src="assets/img/mens/ManBeigeCoat.jpg" alt="Beige Coat">
                        </div>
                        <div class="product-name">
                            <label>Beige Coat</label>
                        </div>
                        <div class="d-flex justify-content-between mt-2">
                            <div class="price">100€</div>
                            <button class="btn btn-sm btn-light">Add to Cart</button>
                        </div>
                    </div>

                    <div class="product-card">
                        <div class="product-image">
                            <img src="assets/img/mens/ManDenimJeans1.jpg" alt="Denim Jeans">
                        </div>
                        <div class="product-name">
                            <label>Denim Jeans</label>
                        </div>
                        <div class="d-flex justify-content-between mt-2">
                            <div class="price">30€</div>
                            <button class="btn btn-sm btn-light">Add to Cart</button>
                        </div>
                    </div>

                    <div class="product-card">
                        <div class="product-image">
                            <img src="assets/img/mens/ManDenimJacket.jpg" alt="Denim Jacket">
                        </div>
                        <div class="product-name">
                            <label>Denim Jacket</label>
                        </div>
                        <div class="d-flex justify-content-between mt-2">
                            <div class="price">80€</div>
                            <button class="btn btn-sm btn-light">Add to Cart</button>
                        </div>
                    </div>

                    <div class="product-card">
                        <div class="product-image">
                            <img src="assets/img/mens/ManTrousers.png" alt="Trousers">
                        </div>
                        <div class="product-name">
                            <label>Trousers</label>
                        </div>
                        <div class="d-flex justify-content-between mt-2">
                            <div class="price">60€</div>
                            <button class="btn btn-sm btn-light">Add to Cart</button>
                        </div>
                    </div>

                    <div class="product-card">
                        <div class="product-image">
                            <img src="assets/img/mens/ManYellowHoodie.jpg" alt="Yellow Hoodie">
                        </div>
                        <div class="product-name">
                            <label>Yellow Hoodie</label>
                        </div>
                        <div class="d-flex justify-content-between mt-2">
                            <div class="price">40€</div>
                            <button class="btn btn-sm btn-light">Add to Cart</button>
                        </div>
                    </div>

                    <div class="product-card">
                        <div class="product-image">
                            <img src="assets/img/mens/ManDenimJacket2.jpg" alt="Denim Jacket">
                        </div>
                        <div class="product-name">
                            <label>Denim Jacket</label>
                        </div>
                        <div class="d-flex justify-content-between mt-2">
                            <div class="price">50€</div>
                            <button class="btn btn-sm btn-light">Add to Cart</button>
                        </div>
                    </div>

                    <div class="product-card">
                        <div class="product-image">
                            <img src="assets/img/mens/ManGreyDressShirt.jpg" alt="Grey Dress Shirt">
                        </div>
                        <div class="product-name">
                            <label>Grey Dress Shirt</label>
                        </div>
                        <div class="d-flex justify-content-between mt-2">
                            <div class="price">35€</div>
                            <button class="btn btn-sm btn-light">Add to Cart</button>
                        </div>
                    </div>

                    <div class="product-card">
                        <div class="product-image">
                            <img src="assets/img/mens/ManWhiteDressShirt.jpg" alt="White Dress Shirt">
                        </div>
                        <div class="product-name">
                            <label>White Dress Shirt</label>
                        </div>
                        <div class="d-flex justify-content-between mt-2">
                            <div class="price">40€</div>
                            <button class="btn btn-sm btn-light">Add to Cart</button>
                        </div>
                    </div>

                    <div class="product-card">
                        <div class="product-image">
                            <img src="assets/img/mens/ManWhiteBlueShirt.jpg" alt="White-Blue Checkered Shirt">
                        </div>
                        <div class="product-name">
                            <label>White-Blue Checkered Shirt</label>
                        </div>
                        <div class="d-flex justify-content-between mt-2">
                            <div class="price">45€</div>
                            <button class="btn btn-sm btn-light">Add to Cart</button>
                        </div>
                    </div>

                    <div class="product-card">
                        <div class="product-image">
                            <img src="assets/img/mens/ManRedBlueShirt.jpg" alt="Red-Blue Checkered Shirt">
                        </div>
                        <div class="product-name">
                            <label>Red-Blue Checkered Shirt</label>
                        </div>
                        <div class="d-flex justify-content-between mt-2">
                            <div class="price">25€</div>
                            <button class="btn btn-sm btn-light">Add to Cart</button>
                        </div>
                    </div>

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
