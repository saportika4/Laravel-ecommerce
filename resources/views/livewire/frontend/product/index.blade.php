<div>

        <div class="row">

            <div class="col-lg-9 main-content">
                <nav class="toolbox sticky-header" data-sticky-options="{'mobile': true}">
                    <div class="toolbox-left">
                        <a href="" class="sidebar-toggle">
                            <svg data-name="Layer 3" id="Layer_3" viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg">
                                <line x1="15" x2="26" y1="9" y2="9" class="cls-1"></line>
                                <line x1="6" x2="9" y1="9" y2="9" class="cls-1"></line>
                                <line x1="23" x2="26" y1="16" y2="16" class="cls-1"></line>
                                <line x1="6" x2="17" y1="16" y2="16" class="cls-1"></line>
                                <line x1="17" x2="26" y1="23" y2="23" class="cls-1"></line>
                                <line x1="6" x2="11" y1="23" y2="23" class="cls-1"></line>
                                <path
                                    d="M14.5,8.92A2.6,2.6,0,0,1,12,11.5,2.6,2.6,0,0,1,9.5,8.92a2.5,2.5,0,0,1,5,0Z"
                                    class="cls-2"></path>
                                <path d="M22.5,15.92a2.5,2.5,0,1,1-5,0,2.5,2.5,0,0,1,5,0Z" class="cls-2"></path>
                                <path d="M21,16a1,1,0,1,1-2,0,1,1,0,0,1,2,0Z" class="cls-3"></path>
                                <path
                                    d="M16.5,22.92A2.6,2.6,0,0,1,14,25.5a2.6,2.6,0,0,1-2.5-2.58,2.5,2.5,0,0,1,5,0Z"
                                    class="cls-2"></path>
                            </svg>
                            <span>Filter</span>
                        </a>
                    </div>
                </nav>

                <div class="row">

                    @forelse ($products as $productsItems)
                        <div class="col-6 col-sm-4" wire:key="item-{{ $productsItems->id }}">
                            <div class="product-default">
                                <figure>
                                    <a href="{{ url('/collections/'.$productsItems->category->slug.'/'.$productsItems->slug) }}">
                                        <div>
                                            @if ($productsItems->productImages->count() > 0)

                                                <img src="{{ asset($productsItems->productImages[0]->image) }}" width="280" height="280" class="category-img" alt="{{ $productsItems->name }}" />

                                            @endif
                                        </div>
                                    </a>

                                    <div class="label-group">
                                        @if($productsItems->quantity > 0)
                                            <div class="product-label label-hot">In Stock</div>
                                        @else
                                            <div class="product-label label-sale">Out of Stock</div>
                                        @endif
                                    </div>
                                </figure>

                                <div class="product-details">
                                    <div class="category-wrap">
                                        <div class="category-list">
                                            <a href="{{ url('/collections/'.$productsItems->category->slug.'/'.$productsItems->slug) }}" class="product-category">{{ $productsItems->brand }}</a>
                                        </div>
                                    </div>

                                    <h3 class="product-title"> <a href="{{ url('/collections/'.$productsItems->category->slug.'/'.$productsItems->slug) }}">{{ $productsItems->name }}</a>
                                    </h3>

                                    {{-- <div class="ratings-container">
                                        <div class="product-ratings">
                                            <span class="ratings" style="width:100%"></span>
                                            <span class="tooltiptext tooltip-top"></span>
                                        </div>
                                    </div> --}}
                                    <!-- End .product-container -->

                                    <div class="price-box">
                                        <span class="old-price">${{ $productsItems->original_price }}</span>
                                        <span class="product-price">${{ $productsItems->selling_price }}</span>
                                    </div>
                                    <!-- End .price-box -->

                                    <div class="product-action">
                                        <a href="#" wire:click="addToWishlist({{ $productsItems->id }})" class="btn-icon-wish" title="wishlist">
                                            <i class="icon-heart"></i>
                                        </a>

                                        <a href="{{ url('/collections/'.$productsItems->category->slug.'/'.$productsItems->slug) }}" class="btn-icon btn-add-cart"><i class="icon-shopping-cart"></i>View</a>
                                    </div>
                                </div>
                                <!-- End .product-details -->
                            </div>
                        </div>
                    @empty
                        <div class="col-md-5">
                            <h5>No Products Available for {{ $category->name }}</h5>
                        </div>
                    @endforelse

                </div>

                <nav class="toolbox toolbox-pagination">
                    <div class="toolbox-item toolbox-show">
                    </div>
                </nav>
            </div>


            @if($category->brands)
                <div class="sidebar-overlay"></div>
                <aside class="sidebar-shop col-lg-3 order-lg-first mobile-sidebar">
                    <div class="sidebar-wrapper">
                        <div class="widget">
                            <h3 class="widget-title">
                                <a data-toggle="collapse" href="#widget-body-2" role="button" aria-expanded="true" aria-controls="widget-body-2">Brands</a>
                            </h3>

                            <div class="collapse show" id="widget-body-2">
                                <div class="widget-body">
                                    <ul class="cat-list">

                                        <li>
                                            @foreach ($category->brands as $brandItem)
                                                <label class="d-flex align-items-center" style="font-size:15px;">
                                                    <input type="checkbox" wire:model="brandInputs" wire:click="applyFilter" value="{{ $brandItem->name }}" style="width:20px;height:20px;margin-right: 5px;" />{{ $brandItem->name }}
                                                </label>
                                            @endforeach
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <div class="widget">
                            <h3 class="widget-title">
                                <a data-toggle="collapse" href="#widget-body-3" role="button" aria-expanded="true" aria-controls="widget-body-3">Price</a>
                            </h3>

                            <div class="collapse show" id="widget-body-3">
                                <div class="widget-body pb-0">
                                    <label class="d-block">
                                        <input type="radio" wire:click="applyFilter" name="priceSort" wire:model="priceInput" value="high-to-low">Hight To Low
                                    </label>
                                    <label class="d-block">
                                        <input type="radio" wire:click="applyFilter" name="priceSort" wire:model="priceInput" value="low-to-high">Low To High
                                    </label>
                                </div>
                            </div>
                        </div>

                    </div>
                </aside>
            @endif

        </div>
</div>
