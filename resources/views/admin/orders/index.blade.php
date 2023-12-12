@extends('layouts.admin')

@section('title','My Orders')

@section('content')

<div class="row">
    <div class="col-lg-12">
            {{-- @if (session('message'))
                <div class="alert alert-success">{{ session('message') }}</div>
            @endif
            <div class="breadcrumb-main user-member justify-content-sm-between ">
                <div class=" d-flex flex-wrap justify-content-center breadcrumb-main__wrapper">
                    <div class="d-flex align-items-center user-member__title justify-content-center mr-sm-25">
                        <h4 class="text-capitalize fw-500 breadcrumb-title">My Orders</h4>
                    </div>

                </div>
            </div> --}}
            <div class="py-3 py-md-5">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="shadow bg-white p-3">
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="mb-2"><i class="fa fa-shopping-cart text-dark"></i> My Orders </h4>
                                    </div>

                                    <div class="card-body">
                                        <form action="" method="GET" class="mb-4">
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <label>Filter by Date</label>
                                                    <input type="date" name="date" value="{{ Request::get('date') ?? date('Y-m-d') }}" class="form-control">
                                                </div>
                                                <div class="col-md-3">
                                                    <label>Filter by Status</label>
                                                    <select name="status" class="form-select">
                                                        <option value="">Select all Status</option>
                                                        <option value="in progress" {{ Request::get('status') == 'in progress' ? 'selected':'' }}>In Progress</option>
                                                        <option value="completed" {{ Request::get('status') == 'completed' ? 'selected':'' }}>Completed</option>
                                                        <option value="pending" {{ Request::get('status') == 'pending' ? 'selected':'' }}>Pending</option>
                                                        <option value="cancelled" {{ Request::get('status') == 'cancelled' ? 'selected':'' }}>Cancelled</option>
                                                        <option value="out-for-delivery" {{ Request::get('status') == 'out-for-delivery' ? 'selected':'' }}>Out for Delivery</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-6 d-grid">
                                                    <br/>
                                                    <button type="submit" class="btn btn-primary">Filter</button>
                                                </div>
                                            </div>
                                        </form>

                                        <hr style="margin: 1rem;">

                                        <div class="table-responsive">
                                            <table class="table table-striped">
                                                <thead>
                                                    <tr>
                                                        <th>Order Id</th>
                                                        <th>Tracking No</th>
                                                        <th>Username</th>
                                                        <th>Payment Mode</th>
                                                        <th>Ordered date</th>
                                                        <th>Status Message</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>

                                                <tbody>
                                                    @forelse ($orders as $orderItem)

                                                        <tr>
                                                            <td>{{ $orderItem->id }}</td>
                                                            <td>{{ $orderItem->tracking_no }}</td>
                                                            <td>{{ $orderItem->fullname }}</td>
                                                            <td>{{ $orderItem->payment_mode }}</td>
                                                            <td>{{ $orderItem->created_at->format('d-m-y') }}</td>
                                                            <td>{{ $orderItem->status_message }}</td>
                                                            <td>
                                                                <a href="{{ url('admin/orders/'.$orderItem->id) }}" class="btn btn-primary btn-sm">View</a>
                                                            </td>
                                                        </tr>

                                                    @empty
                                                        <tr>
                                                            <td colspan="7">No Orders Available</td>
                                                        </tr>
                                                    @endforelse
                                                </tbody>
                                            </table>
                                            <div>
                                                {{ $orders->links() }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>
</div>

@endsection
