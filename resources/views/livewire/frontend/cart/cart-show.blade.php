<div>
    <main class="main">
        <div class="container">
            <ul class="checkout-progress-bar d-flex justify-content-center flex-wrap">
                <li class="active">
                    <a href="{{ url('cart') }}">Shopping Cart</a>
                </li>
                <li>
                    <a href="{{ url('checkout') }}">Checkout</a>
                </li>
                {{-- <li class="disabled">
                    <a href="cart.html">Order Complete</a>
                </li> --}}
            </ul>

            <div class="row">
                <div class="col-lg-12">
                    <div class="cart-table-container">
                        <table class="table table-cart">
                            <thead>
                                <tr>
                                    <th class="thumbnail-col"></th>
                                    <th class="product-col">Product</th>
                                    <th class="price-col">Price</th>
                                    <th class="qty-col">Quantity</th>
                                    <th class="">Subtotal</th>
                                    <th class="text-right">Remove</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($cart as $cartItem)

                                    @if ($cartItem->product)

                                        <tr class="product-row">
                                            <td>
                                                <figure class="product-image-container">

                                                    @if ($cartItem->product->productImages)
                                                        <a href="{{ url('collections/'.$cartItem->product->category->slug.'/'.$cartItem->product->slug) }}" class="product-image">
                                                        <img src="{{ asset($cartItem->product->productImages[0]->image) }}" alt="product">
                                                        </a>
                                                    @else

                                                        <a href="#" class="product-image">
                                                            <img src="" alt="default">
                                                            </a>

                                                    @endif

                                                    {{-- <a href="" class="btn-remove icon-cancel" title="Remove Product"></a> --}}

                                                </figure>

                                                @if($cartItem->productColor)
                                                    @if ($cartItem->productColor->color)
                                                        <div class="mt-1" style="font-weight: 600;">Color : {{ $cartItem->productColor->color->name }}</div>
                                                    @endif
                                                @endif
                                            </td>

                                            <td class="product-col">
                                                <h5 class="product-title">
                                                    <a href="{{ url('collections/'.$cartItem->product->category->slug.'/'.$cartItem->product->slug) }}">{{ $cartItem->product->name }}</a>
                                                </h5>
                                            </td>

                                            <td>${{ $cartItem->product->selling_price }}</td>

                                            <td>
                                                <div class="input-groupCount">
                                                    <button type="button" class="btn btn1 quantitybtn" wire:loading.attr="disabled" wire:click="decrementQuantity({{$cartItem->id}})"><i class="fa fa-minus" style="color: black;"></i></button>

                                                    <input class="input-quantity quantitycount" wire:model="quantityCount" value="{{ $cartItem->quantity }}" type="text" readonly>

                                                    <button type="button" class="btn btn1 quantitybtn" wire:loading.attr="disabled" wire:click="incrementQuantity({{$cartItem->id}})"><i class="fa fa-plus" style="color: black;"></i></button>
                                                </div>
                                            </td>

                                            <td class="">
                                                <span class="subtotal-price">${{ $cartItem->product->selling_price * $cartItem->quantity }}</span>
                                                @php
                                                    $TotalPrice += $cartItem->product->selling_price * $cartItem->quantity
                                                @endphp
                                            </td>

                                            <td class="text-right">
                                                <button type="button" wire:loading.attr="disabled" wire:click="RemoveCartItem({{ $cartItem->id }})" class="btn btn-danger mt-1 mt-md-0" title="Quick View" style="padding: 0.5em 1em;">
                                                    <span wire:loading.remove wire:target="RemoveCartItem({{ $cartItem->id }})">
                                                        <i class="fa fa-trash"></i> Remove
                                                    </span>

                                                    <span wire:loading wire:target="RemoveCartItem({{ $cartItem->id }})">
                                                        <i class="fa fa-trash"></i> Removing...
                                                    </span>
                                                </button>
                                            </td>
                                        </tr>

                                    @endif
                                @empty
                                    <div>No Items Added</div>
                                @endforelse
                            </tbody>

                        </table>


                        <div class="row">
                            <div class="col-md-8 mt-3"></div>
                            <div class="col-md-4 mt-3">
                                <div class="shadow bg-white p-3">
                                    <h4 class="d-flex justify-content-between">Total:
                                        <span class="float-end">${{ $TotalPrice }}</span>
                                    </h4>
                                    <hr style="margin-top: 1rem; margin-bottom: 1rem;" />
                                    <a href="{{ url('/checkout') }}" class="btn btn-warning w-100">Proceed to Checkout<i class="fa fa-arrow-right" style="margin-left: 1.2rem;"></i></a>
                                </div>
                            </div>
                        </div>

                    </div><!-- End .cart-table-container -->
                </div><!-- End .col-lg-8 -->

            </div>

        </div>

        <div class="mb-6"></div>
    </main>
</div>
