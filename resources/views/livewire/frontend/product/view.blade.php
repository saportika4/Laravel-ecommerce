<div>

        <main class="main">
            <div class="container">
                <nav aria-label="breadcrumb" class="breadcrumb-nav">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="demo4.html"><i class="icon-home"></i></a></li>
                        <li class="breadcrumb-item"><a href="#">{{ $product->category->name }}</a></li>
                        <li class="breadcrumb-item"><a href="#">{{ $product->name }}</a></li>
                    </ol>
                </nav>

                <div class="product-single-container product-single-default">
                    {{-- <div class="">
                        @if (session()->has('message'))
                            <strong class="alert alertstyle1">{{ session('message') }}</strong>
                        @endif
                    </div> --}}

                    <div class="row">
                        <div class="col-lg-5 col-md-6 product-single-gallery" wire:ignore>
                            <div class="product-slider-container">
                                <div class="product-single-carousel owl-carousel owl-theme show-nav-hover">

                                    @foreach ($product->productImages as $ItemImage)
                                        <div class="product-item">
                                            @if($product->productImages)
                                                <img class="product-single-image" src="{{ asset($ItemImage->image) }}" data-zoom-image="{{ asset($ItemImage->image) }}" width="468" height="468" style="max-height: 468px;
                                                min-height: 468px;
                                                object-fit: cover;" alt="product" />
                                            @else
                                                <h4>No Image</h4>
                                            @endif
                                        </div>
                                    @endforeach
                                </div>
                                <span class="prod-full-screen">
                                    <i class="icon-plus"></i>
                                </span>
                            </div>

                            <div class="prod-thumbnail owl-dots">
                                    @if($product->productImages)

                                        @foreach ($product->productImages as $ItemImage)
                                            <div class="owl-dot">
                                                <img src="{{ asset($ItemImage->image) }}" width="110" height="110" alt="product-thumbnail" style="max-height: 110px;
                                                min-height: 110px;
                                                object-fit: cover;" />
                                            </div>
                                        @endforeach

                                    @else
                                        <h4>No Image</h4>
                                    @endif
                            </div>
                        </div>

                        <div class="col-lg-7 col-md-6 product-single-details">
                            <h1 class="product-title">{{ $product->name }}</h1>

                            <hr class="short-divider">

                            <div class="price-box">
                                <span class="old-price">${{ $product->original_price }}</span>
                                <span class="new-price">${{ $product->selling_price }}</span>
                            </div>

                            <div>
                                @if($product->productColors->count()>0)
                                    @if($product->productColors)
                                        <ul class="config-swatch-list d-flex" style="gap: 5px">
                                            @foreach ($product->productColors as $colorItem)
                                                <li>
                                                    <a class="colorSelectionLabel w-100" style="background-color:{{$colorItem->color->code}}; text-align:center; border: none;" wire:click="colorSelected({{ $colorItem->id }})">
                                                        {{-- {{$colorItem->color->code}} --}}
                                                    </a>
                                                </li>

                                            @endforeach
                                        </ul>
                                    @endif

                                    @if ($this->prodColorSelectedQuantity == 'outOfStock')
                                        <label class="btn py-1 mt-1 text-white bg-danger">Out of Stock</label>
                                    @elseif ($this->prodColorSelectedQuantity > 0)
                                        <label class="btn py-1 mt-1 text-white bg-success">In Stock</label>
                                    @endif

                                @else
                                    @if($product->quantity > 0)
                                        <label class="btn py-1 mt-2 text-white bg-success">In Stock</label>
                                    @else
                                        <label class="btn py-1 mt-2 text-white bg-danger">Out of Stock</label>
                                    @endif
                                @endif
                            </div>

                            <div class="product-desc mt-2">
                                <p>
                                    {{ $product->small_description }}
                                </p>
                            </div>

                            <ul class="single-info-list">
                                {{-- <li>
                                    Quantity: <strong>{{ $product->quantity }}</strong>
                                </li> --}}

                                <li>
                                    CATEGORY: <strong><a href="#" class="product-category">{{ $product->category->name }}</a></strong>
                                </li>
                            </ul>

                            <div class="product-action d-flex" style="gap: 20px !important;">
                                <div class="input-groupCount">
                                    <span class="btn btn1 quantitybtn" wire:click="decrementQuantity"><i class="fa fa-minus" style="color: black;"></i></span>
                                    <input class="input-quantity quantitycount" wire:model="quantityCount" value="{{ $this->quantityCount }}" type="text" readonly>
                                    <span class="btn btn1 quantitybtn" wire:click="incrementQuantity"><i class="fa fa-plus" style="color: black;"></i></span>
                                </div>

                                <button type="button" wire:click="addToCart({{ $product->id }})" class="btn btn-dark add-cart mr-2" title="Add to Cart">Add to Cart</button>

                                {{-- <a href="cart.html" class="btn btn-gray view-cart d-none">View cart</a> --}}
                            </div>

                            <hr class="divider mb-0 mt-0">

                            <div class="product-single-share mb-3">
                                {{-- <label class="sr-only">Share:</label>

                                <div class="social-icons mr-2">
                                    <a href="#" class="social-icon social-facebook icon-facebook" target="_blank" title="Facebook"></a>
                                    <a href="#" class="social-icon social-twitter icon-twitter" target="_blank" title="Twitter"></a>
                                    <a href="#" class="social-icon social-linkedin fab fa-linkedin-in" target="_blank" title="Linkedin"></a>
                                    <a href="#" class="social-icon social-gplus fab fa-google-plus-g" target="_blank" title="Google +"></a>
                                    <a href="#" class="social-icon social-mail icon-mail-alt" target="_blank" title="Mail"></a>
                                </div> --}}

                                <a href="#" wire:click="addToWishlist({{ $product->id }})" class="wishlist-btn" title="Add to Wishlist">
                                    <span wire:loading.remove wire:target="addToWishlist">
                                        <i class="icon-wishlist-2"></i><span>Add to Wishlist</span>
                                    </span>
                                    <span wire:loading wire:target="addToWishlist">Adding ...</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <hr class="mt-0 m-b-5" />
            </div>
        </main>

</div>

