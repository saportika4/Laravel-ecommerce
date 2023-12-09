@extends('layouts.app')

@section('title','categories')

@section('content')

<main class="main">
    <div class="category-banner-container bg-gray">
        <div class="category-banner banner text-uppercase" style="background: no-repeat 60%/cover url('assets/images/banners/banner-top.jpg');">
            <div class="container position-relative">
                <div class="row">
                    <div class="pl-lg-5 pb-5 pb-md-0 col-sm-5 col-xl-4 col-lg-4 offset-1">
                        <h3>Electronic<br>Deals</h3>
                        <a href="category.html" class="btn btn-dark">Get Yours!</a>
                    </div>
                    <div class="pl-lg-3 col-sm-4 offset-sm-0 offset-1 pt-3">
                        <div class="coupon-sale-content">
                            <h4 class="m-b-1 coupon-sale-text bg-white text-transform-none">Exclusive COUPON
                            </h4>
                            <h5 class="mb-2 coupon-sale-text d-block ls-10 p-0"><i class="ls-0">UP TO</i><b class="text-dark">$100</b> OFF</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <nav aria-label="breadcrumb" class="breadcrumb-nav">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="demo4.html"><i class="icon-home"></i></a></li>
                <li class="breadcrumb-item"><a href="#">All Categories</a></li>
                {{-- <li class="breadcrumb-item active" aria-current="page">Accessories</li> --}}
            </ol>
        </nav>

        <div class="row">
            <div class="col-lg-12 main-content">


                <div class="row">

                    @forelse ($categories as $categoryItem)
                    <div class="col-6 col-sm-3">
                        <div class="product-default">
                            <figure>
                                <a href="{{ url('/collections/'.$categoryItem->slug) }}">
                                    <img src="{{ asset("$categoryItem->image") }}" class="category-img" width="280" height="280" alt="product" />
                                    {{-- <img src="assets/images/products/product-1-2.jpg" width="280" height="280" alt="product" /> --}}
                                </a>

                                {{-- <div class="label-group">
                                    <div class="product-label label-hot">HOT</div>
                                    <div class="product-label label-sale">-20%</div>
                                </div> --}}
                            </figure>

                            <div class="product-details">
                                <div class="category-wrap">
                                    <div class="category-list">
                                        <a href="category.html" class="product-category">category</a>
                                    </div>
                                </div>

                                <h3 class="product-title"> <a href="{{ url('/collections/'.$categoryItem->slug) }}">{{ $categoryItem->name }}</a> </h3>

                                {{-- <div class="ratings-container">
                                    <div class="product-ratings">
                                        <span class="ratings" style="width:100%"></span>
                                        <span class="tooltiptext tooltip-top"></span>
                                    </div>
                                </div> --}}
                                <!-- End .product-container -->

                                {{-- <div class="price-box">
                                    <span class="old-price">$90.00</span>
                                    <span class="product-price">$70.00</span>
                                </div> --}}
                                <!-- End .price-box -->

                                <div class="product-action">
                                    <a href="wishlist.html" class="btn-icon-wish" title="wishlist"><i
                                            class="icon-heart"></i></a>
                                    <a href="{{ url('/collections/'.$categoryItem->slug) }}" class="btn-icon btn-add-cart"><i
                                            class="fa fa-arrow-right"></i><span>SELECT
                                            OPTIONS</span></a>
                                    <a href="ajax/product-quick-view.html" class="btn-quickview" title="Quick View"><i class="fas fa-external-link-alt"></i></a>
                                </div>
                            </div>
                            <!-- End .product-details -->
                        </div>
                    </div>
                    @empty
                    <div class="col-md-5">
                        <h5>No Categories Available</h5>
                    </div>

                    @endforelse
                    <!-- End .col-sm-4 -->


                </div>
                <!-- End .row -->


            </div>
            <!-- End .col-lg-9 -->


            <!-- End .col-lg-3 -->
        </div>
        <!-- End .row -->
    </div>
    <!-- End .container -->

    <div class="mb-4"></div>
    <!-- margin -->
</main>


@endsection
