@extends('layouts.base')

@section('content')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
{{-- 1st section style --}}
<style>
    .promo-text {
        background-color: #f8f9fa;
        padding: 30px;
        text-align: center;
        margin-top: 30px;
        border-radius: 5px;
    }
    .promo-text h2 {
        margin-bottom: 20px;
        font-size: 24px;
    }
    .promo-text p {
        font-size: 18px;
    }
</style>

{{-- 1st section style end --}}
<section class="pt-0 poster-section">
    <div id="productCarousel" class="carousel slide mt-5" data-bs-ride="carousel">
        <div class="carousel-inner">
            @foreach ($products->chunk(3) as $productChunk)
                <div class="carousel-item @if ($loop->first) active @endif">
                    <div class="container">
                        <div class="row justify-content-center">
                            @foreach ($productChunk as $product)
                                <div class="col-md-4 mb-4 d-flex justify-content-center">
                                    <div class="card h-80 product-card">
                                        <a href="{{ route('shop.product.details', $product->slug) }}">
                                            <img src="{{ asset('products/' . $product->image) }}" class="card-img-top" alt="{{ $product->name }}">
                                        </a>
                                        <div class="card-body text-center">
                                            <h5 class="card-title">{{ $product->name }}</h5>
                                            <p class="card-text"><strong>${{ $product->regular_price }}</strong></p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#productCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#productCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
    <div class="promo-text m-5">
        <h2>Welcome to Our Store!</h2>
        <p>Discover the best products with unbeatable prices. Don't miss out on our exclusive offers and discounts.</p>
        <p>Enjoy shopping with us!</p>
    </div>
</section>



    {{-- 2nd section --}}
    <!-- banner section start -->
    <section class="ratio2_1 banner-style-2">
        <div class="container">
            <div class="row gy-4">
                @foreach ($products->take(3) as $product)
                    <div class="col-lg-4 col-md-6">
                        <div class="collection-banner p-bottom p-center text-center">
                            <a href="{{ route('shop.product.details', $product->slug) }}" class="banner-img">
                                <img src="{{ asset('products/' . $product->image) }}" class="bg-img blur-up lazyload" alt="{{ $product->name }}">
                            </a>
                            <div class="banner-detail">
                                <a href="javascript:void(0)" class="heart-wishlist">
                                    <i class="far fa-heart"></i>
                                </a>
                                <span class="font-dark-30">{{ rand(20, 50) }}% <span>OFF</span></span> <!-- Example discount percentage -->
                            </div>
                            <a href="{{ route('shop.product.details', $product->slug) }}" class="contain-banner">
                                <div class="banner-content with-big">
                                    <h2 class="mb-2">{{ $product->name }}</h2>
                                </div>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- banner section end -->




    {{-- 3rd section --}}
    <section class="ratio_asos overflow-hidden">
        <div class="container p-sm-0">
            <div class="row m-0">
                <div class="col-12 p-0">
                    <div class="title-3 text-center">
                        <h2>New Arrival</h2>
                        <h5 class="theme-color">Our Collection</h5>
                    </div>
                </div>
            </div>
            <style>
                .r-price {
                    display: flex;
                    flex-direction: row;
                    gap: 20px;
                }
    
                .r-price .main-price {
                    width: 100%;
                }
    
                .r-price .rating {
                    padding-left: auto;
                }
    
                .product-style-3.product-style-chair .product-title {
                    text-align: left;
                    width: 100%;
                }
    
                @media (max-width:600px) {
                    .product-box p,
                    .product-box a {
                        text-align: left;
                    }
    
                    .product-style-3.product-style-chair .main-price {
                        text-align: right !important;
                    }
                }
            </style>
            <div class="row g-sm-4 g-3">
                @foreach ($products as $product)
                <div class="col-xl-2 col-lg-2 col-6">
                    <div class="product-box">
                        <div class="img-wrapper">
                            <a href="{{ route('shop.product.details', $product->slug) }}">
                                <img src="{{ asset('assets/images/fashion/product/front/' . $product->image) }}" class="w-100 bg-img blur-up lazyload" alt="{{ $product->title }}">
                            </a>
                            <div class="circle-shape"></div>
                            <span class="background-text">{{ $product->category }}</span>
                            <div class="label-block">
                                <span class="label label-theme">{{ $product->discount }}</span>
                            </div>
                            <div class="cart-wrap">
                                <ul>
                                    <li>
                                        <a href="javascript:void(0)" class="addtocart-btn">
                                            <i data-feather="shopping-cart"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0)">
                                            <i data-feather="eye"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0)" class="wishlist">
                                            <i data-feather="heart"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="product-style-3 product-style-chair">
                            <div class="product-title d-block mb-0">
                                <div class="r-price">
                                    <div class="theme-color">${{ $product->regular_price }}</div>
                                    <div class="main-price">
                                        <ul class="rating mb-1 mt-0">
                                            @for ($i = 0; $i < $product->rating; $i++)
                                            <li><i class="fas fa-star theme-color"></i></li>
                                            @endfor
                                            @for ($i = $product->rating; $i < 5; $i++)
                                            <li><i class="fas fa-star"></i></li>
                                            @endfor
                                        </ul>
                                    </div>
                                </div>
                                <p class="font-light mb-sm-2 mb-0">{{ $product->name }}</p>
                                <a href="{{ route('shop.product.details', $product->slug) }}" class="font-default">
                                    <h5>{{ $product->title }}</h5>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    

   
@endsection