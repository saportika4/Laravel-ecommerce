<div>
    <main class="main main-test">
        <div class="container checkout-container checkout">
            <ul class="checkout-progress-bar d-flex justify-content-center flex-wrap">
                <li>
                    <a href="{{ url('cart') }}">Shopping Cart</a>
                </li>
                <li class="active">
                    <a href="{{ url('checkout') }}">Checkout</a>
                </li>
            </ul>

            {{-- <div class="checkout-discount">
                <h4>Have a coupon?
                    <button data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseOne" class="btn btn-link btn-toggle">ENTER YOUR CODE</button>
                </h4>

                <div id="collapseTwo" class="collapse">
                    <div class="feature-box">
                        <div class="feature-box-content">
                            <p>If you have a coupon code, please apply it below.</p>

                            <form action="#">
                                <div class="input-group">
                                    <input type="text" class="form-control form-control-sm w-auto" placeholder="Coupon code" required="" />
                                    <div class="input-group-append">
                                        <button class="btn btn-sm mt-0" type="submit">
                                            Apply Coupon
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div> --}}

            @if ($this->totalProductAmount != '0')
                <div class="row">
                    <div class="col-lg-7">
                        <ul class="checkout-steps">
                            <li>
                                <h2 class="step-title">Billing details</h2>

                                <form action="#" id="checkout-form">

                                    <div class="form-group">
                                        <label>Full Name <abbr class="required" title="required">*</abbr></label>
                                        <input type="text" wire:model.defer="fullname" id="fullname" class="form-control" />
                                        @error('fullname') <small class="text-danger">{{ $message }}</small> @enderror
                                    </div>

                                    <div class="form-group">
                                        <label>Phone
                                            <abbr class="required" title="required">*</abbr></label>
                                        <input type="number" wire:model.defer="phone" id="phone" class="form-control" />
                                        @error('phone') <small class="text-danger">{{ $message }}</small> @enderror
                                    </div>

                                    <div class="form-group">
                                        <label>Email Address <abbr class="required" title="required">*</abbr></label>
                                        <input type="email" wire:model.defer="email" id="email" class="form-control" />
                                        @error('email') <small class="text-danger">{{ $message }}</small> @enderror
                                    </div>

                                    <div class="form-group">
                                        <label>Pin-code (Zip-code)
                                            <abbr class="required" title="required">*</abbr></label>
                                        <input type="number" wire:model.defer="pincode" id="pincode" class="form-control" />
                                        @error('pincode') <small class="text-danger">{{ $message }}</small> @enderror
                                    </div>

                                    <div class="form-group">
                                        <label>Full Address
                                            <abbr class="required" title="required">*</abbr></label>
                                        <textarea wire:model.defer="address" id="address" class="form-control"></textarea>
                                        @error('address') <small class="text-danger">{{ $message }}</small> @enderror
                                    </div>


                                </form>
                            </li>
                        </ul>
                    </div>
                    <!-- End .col-lg-8 -->

                    <div class="col-lg-5">
                        <div class="order-summary">
                            <h3>YOUR ORDER</h3>

                            <table class="table table-mini-cart">
                                <thead>
                                    <tr>
                                        <th colspan="2">Product</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($CartItems as $cartItem)
                                        <tr>
                                            <td class="product-col">
                                                <h3 class="product-title">
                                                    {{ $cartItem->product->name }} ×
                                                    <span class="product-qty">{{ $cartItem->quantity }}</span>
                                                </h3>
                                            </td>

                                            <td class="price-col">
                                                <span>${{ $cartItem->product->selling_price * $cartItem->quantity }}</span>
                                            </td>
                                        </tr>
                                    @endforeach

                                </tbody>
                                <tfoot>

                                    <tr class="order-total">
                                        <td>
                                            <h4>Total</h4>
                                        </td>
                                        <td>
                                            <b class="total-price"><span>${{ $this->totalProductAmount }}</span></b>
                                        </td>
                                    </tr>
                                </tfoot>
                            </table>

                            {{-- <div class="payment-methods">
                                <h4 class="">Payment methods</h4>
                            </div> --}}

                            {{-- <button type="submit" class="btn btn-dark btn-place-order" form="checkout-form">
                                Place order
                            </button> --}}
                        </div>
                        <div class="col-md-12 mb-3" wire:ignore>
                            <h4>Select Payment Method: </h4>
                            <div class="d-md-flex align-items-start">
                                <div class="nav col-md-6 flex-column nav-pills me-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                    <button wire:loading.attr="disabled" class="btn btn-dark btn-place-order active" id="cashOnDeliveryTab-tab" data-bs-toggle="pill" data-bs-target="#cashOnDeliveryTab" type="button" role="tab" aria-controls="cashOnDeliveryTab" aria-selected="true">Cash on Delivery</button>

                                    <button wire:loading.attr="disabled" class="btn btn-dark btn-place-order" id="onlinePayment-tab" data-bs-toggle="pill" data-bs-target="#onlinePayment" type="button" role="tab" aria-controls="onlinePayment" aria-selected="false">Online Payment</button>
                                </div>
                                <div class="tab-content col-md-9" id="v-pills-tabContent">
                                    <div class="tab-pane active show fade" id="cashOnDeliveryTab" role="tabpanel" aria-labelledby="cashOnDeliveryTab-tab" tabindex="0">
                                        <h6>Cash on Delivery Mode</h6>
                                        <hr style="margin-top: 2rem; margin-bottom: 1.7rem;" />
                                        <button type="button" wire:loading.attr="disabled" wire:click="codOrder" class="btn btn-primary">
                                            <span>
                                                Place Order
                                            </span>
                                            {{-- <span wire:loading.remove wire:target="codOrder">
                                                Place Order
                                            </span>
                                            <span wire:loading wire:target="codOrder">
                                                Placing Order
                                            </span> --}}
                                        </button>

                                    </div>
                                    <div class="tab-pane fade" id="onlinePayment" role="tabpanel" aria-labelledby="onlinePayment-tab" tabindex="0">
                                        <h6>Online Payment Mode</h6>
                                        <hr style="margin-top: 2rem; margin-bottom: 1.7rem;" />
                                        {{-- <button wire:loading.attr="disabled" type="button" class="btn btn-warning">Pay Now</button> --}}

                                        <div>
                                            <div id="paypal-button-container"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <!-- End .cart-summary -->
                    </div>
                    <!-- End .col-lg-4 -->
                </div>

            @else
                <div class="card card-body shadow text-center p-md-5">
                    <h4>No items in Cart to Checkout</h4>
                    <a href="{{ url('/collections') }}" class="btn btn-warning">Shop Now</a>
                </div>
            @endif

        </div>

    </main>
</div>

@push('scripts')

<script src="https://www.paypal.com/sdk/js?client-id=AaV9Yz74oVSwlNoXSZ-9_9iLoD6fW1ACa0JDtJND8oGdMuv5HhcaPzrQg5El0CKG0Hlds5F_HPhZX6N5&currency=USD"></script>

    <script>
        window.paypal
            .Buttons({
                    onClick: function()  {

                        // Show a validation error if the checkbox is not checked
                        if (!document.getElementById('fullname').value
                            || !document.getElementById('phone').value
                            || !document.getElementById('email').value
                            || !document.getElementById('pincode').value
                            || !document.getElementById('address').value
                        )
                        {
                            Livewire.dispatch('validationForAll');
                            return false;
                        }else{

                            @this.set('fullname', document.getElementById('fullname').value);
                            @this.set('phone', document.getElementById('phone').value);
                            @this.set('email', document.getElementById('email').value);
                            @this.set('pincode', document.getElementById('pincode').value);
                            @this.set('address', document.getElementById('address').value);
                        }
                },

                createOrder: (data, actions) => {
                    return actions.order.create({
                        purchase_units: [{
                            amount: {
                                value: '0.1' //"{{ $this->totalProductAmount }}"
                            }
                        }]
                    });
                },

                onApprove: (data, actions) => {
                    return actions.order.capture().then(function(orderData) {
                        console.log('Capture result', orderData, JSON.stringify(orderData, null, 2));
                        const transaction = orderData.purchase_units[0].payments.captures[0];
                        if(transaction.status == "COMPLETED")
                        {
                            Livewire.dispatch('transactionEmit', {TransactionId: transaction.id});
                            // @this.dispatchSelf('edit-that', { id: transaction.id} );
                        }
                        // alert('Transaction' ${transaction.status}: ${transaction.id}\n\nSee See console for all available details);
                    });
                }
            }).render("#paypal-button-container");

    </script>

@endpush
