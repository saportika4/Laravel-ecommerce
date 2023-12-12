@extends('layouts.app')

@section('title','Order details')

@section('content')

    <div class="py-3 py-md-5">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="shadow bg-white p-3">

                        <h4 class="text-primary">
                            <i class="fa fa-shopping-cart text-dark"></i> My Order Details
                            <a href="{{ url('/orders') }}" class="btn btn-danger btn-sm" style="float: inline-end;">Back</a>
                        </h4>
                        <hr style="margin: 2rem;">

                        <div class="row">
                            <div class="col-md-6 pb-5">
                                <h5>Order Details</h5>
                                <hr style="margin: 1rem;">
                                <h6>Order Id: {{ $order->id }}</h6>
                                <h6>Tracking Id/No: {{ $order->tracking_no }}</h6>
                                <h6>Ordered Date: {{ $order->created_at->format('d-m-Y h:i A') }}</h6>
                                <h6>Payment Mode: {{ $order->payment_mode }}</h6>
                                <h6 class="border p-3 text-warning d-inline">
                                    Order Status Message: <span class="text-uppercase">{{ $order->status_message }}</span>
                                </h6>
                            </div>
                            <div class="col-md-6">
                                <h5>User Details</h5>
                                <hr style="margin: 1rem;">
                                <h6>Full Name: {{ $order->fullname }}</h6>
                                <h6>Email Id: {{ $order->email }}</h6>
                                <h6>Phone: {{ $order->phone }}</h6>
                                <h6>Address: {{ $order->address }}</h6>
                                <h6>Pincode: {{ $order->pincode }}</h6>
                            </div>
                        </div>

                        <br/>
                        <h5>Order Items</h5>
                        <hr style="margin: 2rem;">

                        <div class="table-responsive">
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Item Id</th>
                                        <th>Image</th>
                                        <th>Product</th>
                                        <th>Price</th>
                                        <th>Quantity</th>
                                        <th>Total</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @php
                                        $totalPrice =0;
                                    @endphp

                                    @foreach ($order->orderItems as $orderItem)
                                        <tr>
                                            <td width="10%">{{ $orderItem->id }}</td>
                                            <td width="10%">

                                                @if ($orderItem->product->productImages)
                                                    <a href="{{ url('collections/'.$orderItem->product->category->slug.'/'.$orderItem->product->slug) }}" class="product-image">

                                                    <img src="{{ asset($orderItem->product->productImages[0]->image) }}" alt="product" style="width: 50px; heught:50px;">

                                                    </a>
                                                @else

                                                    <a href="#" class="product-image"><img src="" alt="default" style="width: 50px; heught:50px;"></a>

                                                @endif

                                            </td>
                                            <td width="10%">
                                                <span>{{ $orderItem->product->name }}</span>
                                                @if($orderItem->productColor)
                                                    @if ($orderItem->productColor->color)
                                                        <div class="mt-1">Color : {{ $orderItem->productColor->color->name }}</div>
                                                    @endif
                                                @endif
                                            </td>
                                            <td width="10%">${{ $orderItem->price }}</td>
                                            <td width="10%">{{ $orderItem->quantity }}</td>
                                            <td width="10%" style="font-weight: bold;">${{ $orderItem->quantity * $orderItem->price }}</td>

                                            @php
                                                $totalPrice += $orderItem->quantity * $orderItem->price;
                                            @endphp
                                        </tr>
                                    @endforeach
                                        <tr>
                                            <td colspan="5" style="font-weight: bold; text-align:right;">Total Amount: </td>
                                            <td colspan="1" style="font-weight: bold;">${{ $totalPrice }}</td>
                                        </tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
