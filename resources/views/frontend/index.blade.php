@extends('layouts.app')

@section('title', 'Home')

@section('content')

    {{-- <main class="main"> --}}
        <div class="home-slider slide-animate owl-carousel owl-theme show-nav-hover nav-big mb-2 text-uppercase" data-owl-options="{
            'loop': true
        }">

            @foreach ($sliders as $key => $sliderItem)
                <div class="home-slide home-slide1 banner">
                    <img class="slide-bg" src="{{ asset("$sliderItem->image") }}" width="1903" height="499" alt="slider image">
                    <div class="container d-flex align-items-center">
                        <div class="banner-layer appear-animate" data-animation-name="fadeInUpShorter">
                            <h4 class="text-transform-none m-b-3">{{ $sliderItem->title }}</h4>
                            <h2 class="text-transform-none mb-0">{{ $sliderItem->description }}</h2>
                            {{-- <h3 class="m-b-3">70% Off</h3>
                            <h5 class="d-inline-block mb-0">
                                <span>Starting At</span>
                                <b class="coupon-sale-text text-white bg-secondary align-middle"><sup>$</sup><em
                                        class="align-text-top">199</em><sup>99</sup></b>
                            </h5> --}}
                            <a href="category.html" class="btn btn-dark btn-lg">Shop Now!</a>
                        </div>
                        <!-- End .banner-layer -->
                    </div>
                </div>
            @endforeach

            <!-- End .home-slide -->


        </div>
        <!-- End .home-slider -->

        <div class="container">
            <div class="info-boxes-slider owl-carousel owl-theme mb-2" data-owl-options="{
                'dots': false,
                'loop': false,
                'responsive': {
                    '576': {
                        'items': 2
                    },
                    '992': {
                        'items': 3
                    }
                }
            }">
                <div class="info-box info-box-icon-left">
                    <i class="icon-shipping"></i>

                    <div class="info-box-content">
                        <h4>FREE SHIPPING &amp; RETURN</h4>
                        <p class="text-body">Free shipping on all orders over $99.</p>
                    </div>
                    <!-- End .info-box-content -->
                </div>
                <!-- End .info-box -->

                <div class="info-box info-box-icon-left">
                    <i class="icon-money"></i>

                    <div class="info-box-content">
                        <h4>MONEY BACK GUARANTEE</h4>
                        <p class="text-body">100% money back guarantee</p>
                    </div>
                    <!-- End .info-box-content -->
                </div>
                <!-- End .info-box -->

                <div class="info-box info-box-icon-left">
                    <i class="icon-support"></i>

                    <div class="info-box-content">
                        <h4>ONLINE SUPPORT 24/7</h4>
                        <p class="text-body">Lorem ipsum dolor sit amet.</p>
                    </div>
                    <!-- End .info-box-content -->
                </div>
                <!-- End .info-box -->
            </div>
            <!-- End .info-boxes-slider -->
        </div>

        <section class="new-products-section">
            <div class="container">
                <h2 class="section-title heading-border ls-20 border-0">Featured Products</h2>

                <div class="categories-slider owl-carousel owl-theme show-nav-hover nav-outer">

                        @if($trendingProducts)

                            @foreach ($trendingProducts as $trendingProductItems)

                                <div class="product-default appear-animate" data-animation-name="fadeInRightShorter">
                                    <figure>
                                        <a href="{{ url('/collections/'.$trendingProductItems->category->slug.'/'.$trendingProductItems->slug) }}">
                                            <img src="{{ asset($trendingProductItems->productImages[0]->image) }}" style="min-height: 300px;
                                            max-height: 300px;
                                            object-fit: cover;" alt="product">
                                            {{-- <img src="assets/images/products/product-1-2.jpg" width="280" height="280" alt="product"> --}}
                                        </a>

                                    </figure>
                                    <div class="product-details">
                                        <div class="category-list">
                                            <a href="category.html" class="product-category">{{ $trendingProductItems->brand }}</a>
                                        </div>
                                        <h3 class="product-title">
                                            <a href="{{ url('/collections/'.$trendingProductItems->category->slug.'/'.$trendingProductItems->slug) }}">{{ $trendingProductItems->name }}</a>
                                        </h3>

                                        <!-- End .product-container -->
                                        <div class="price-box">
                                            <del class="old-price">${{ $trendingProductItems->original_price }}</del>
                                            <span class="product-price">${{ $trendingProductItems->selling_price }}</span>
                                        </div>
                                        <!-- End .price-box -->
                                        <div class="product-action">
                                            {{-- <a href="#" class="btn-icon-wish" title="wishlist"><i
                                                    class="icon-heart"></i></a> --}}

                                            <a href="{{ url('/collections/'.$trendingProductItems->category->slug.'/'.$trendingProductItems->slug) }}" class="btn-icon btn-add-cart"><i
                                                    class="fa fa-arrow-right"></i><span>SELECT
                                                    OPTIONS</span></a>

                                        </div>
                                    </div>
                                    <!-- End .product-details -->
                                </div>

                            @endforeach

                        @else
                            <div class="col-md-12" wire:key="item-{{ $trendingProductItems->id }}">
                                <h5>No Products Available</h5>
                            </div>
                        @endif
                </div>

            </div>
        </section>

@endsection
