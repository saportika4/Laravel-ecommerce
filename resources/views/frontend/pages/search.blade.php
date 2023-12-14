@extends('layouts.app')

@section('title','Search results')

@section('content')

<div class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h4>Search Results</h4>
                <div class="underline mb-4"></div>
            </div>
            <div class="col-lg-12 order-lg-1">
                <div class="row pb-4">

                    @forelse ($searchProducts as $productsItems)


                        <div class="col-sm-12 col-12 product-default left-details product-list mb-2 shadow pl-0">
                            <figure>
                                <a href="{{ url('/collections/'.$productsItems->category->slug.'/'.$productsItems->slug) }}">
                                    <div>
                                        @if ($productsItems->productImages->count() > 0)

                                            <img src="{{ asset($productsItems->productImages[0]->image) }}" width="280" height="280" class="category-img" alt="{{ $productsItems->name }}" />

                                        @endif
                                    </div>
                                </a>
                            </figure>
                            <div class="product-details">
                                <div class="category-list">
                                    <a href="{{ url('/collections/'.$productsItems->category->slug.'/'.$productsItems->slug) }}" class="product-category">{{ $productsItems->brand }}</a>
                                </div>
                                <h3 class="product-title"> <a href="{{ url('/collections/'.$productsItems->category->slug.'/'.$productsItems->slug) }}">{{ $productsItems->name }}</a>
                                </h3>
                                <div class="ratings-container">
                                    <div class="product-ratings">
                                        <span class="ratings" style="width:100%"></span>
                                        <!-- End .ratings -->
                                        <span class="tooltiptext tooltip-top"></span>
                                    </div>
                                    <!-- End .product-ratings -->
                                </div>
                                <!-- End .product-container -->
                                <p class="product-description">{{ $productsItems->description }}</p>
                                <div class="price-box">
                                    <span class="old-price">${{ $productsItems->original_price }}</span>
                                    <span class="product-price">${{ $productsItems->selling_price }}</span>
                                </div>
                                <!-- End .price-box -->
                                <div class="product-action">
                                    <a href="{{ url('/collections/'.$productsItems->category->slug.'/'.$productsItems->slug) }}" class="btn-icon btn-add-cart">
                                        <i class="icon-shopping-cart"></i>
                                        <span>ADD TO CART</span>
                                    </a>
                                </div>
                            </div>
                            <!-- End .product-details -->
                        </div>


                    @empty
                        <div class="col-md-12">
                            <h5>No such products found</h5>
                        </div>
                    @endforelse
                </div>
                {{ $searchProducts->appends(request()->input())->links() }}
            </div>
        </div>
    </div>
</div>

@endsection
