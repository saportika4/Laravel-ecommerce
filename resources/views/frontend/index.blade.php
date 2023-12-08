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

@endsection
