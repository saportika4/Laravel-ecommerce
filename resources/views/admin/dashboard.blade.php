@extends('layouts.admin')

@section('content')

<div class="row">
    <div class="col-md-12 grid-margin">
        <div class="me-md-3 me-xl-5">
            <h4 class="text-capitalize breadcrumb-title mt-3">Dashboard</h4>
        </div>
        <hr/>

        <div class="row">
            <div class="col-md-3">
                <div class="card card-body bg-primary text-white mb-3 shadow">
                    <label>Total Orders</label>
                    <h1 class="text-white">{{ $totalOrder }}</h1>
                    <a href="{{ url('admin/orders') }}" class="text-white">View</a>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card card-body bg-success text-white mb-3 shadow">
                    <label>Today Orders</label>
                    <h1 class="text-white">{{ $todayorder }}</h1>
                    <a href="{{ url('admin/orders') }}" class="text-white">View</a>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card card-body bg-warning text-white mb-3 shadow">
                    <label>This Month Orders</label>
                    <h1 class="text-white">{{ $ThisMonthorder }}</h1>
                    <a href="{{ url('admin/orders') }}" class="text-white">View</a>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card card-body bg-danger text-white mb-3 shadow">
                    <label>This year Orders</label>
                    <h1 class="text-white">{{ $ThisYearorder }}</h1>
                    <a href="{{ url('admin/orders') }}" class="text-white">View</a>
                </div>
            </div>
        </div>

        <hr/>
        <div class="row">
            <div class="col-md-3">
                <div class="card card-body bg-primary text-white mb-3 shadow">
                    <label>Total Products</label>
                    <h1 class="text-white">{{ $totalProducts }}</h1>
                    <a href="{{ url('admin/products') }}" class="text-white">View</a>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card card-body bg-success text-white mb-3 shadow">
                    <label>Total Categories</label>
                    <h1 class="text-white">{{ $totalCategories }}</h1>
                    <a href="{{ url('admin/category') }}" class="text-white">View</a>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card card-body bg-warning text-white mb-3 shadow">
                    <label>Total Brands</label>
                    <h1 class="text-white">{{ $totalBrands }}</h1>
                    <a href="{{ url('admin/brands') }}" class="text-white">View</a>
                </div>
            </div>
        </div>

        <hr/>
        <div class="row">
            <div class="col-md-3">
                <div class="card card-body bg-primary text-white mb-3 shadow">
                    <label>All Users</label>
                    <h1 class="text-white">{{ $totalAllUsers }}</h1>
                    <a href="{{ url('admin/users') }}" class="text-white">View</a>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card card-body bg-success text-white mb-3 shadow">
                    <label>Total Users</label>
                    <h1 class="text-white">{{ $totalUsers }}</h1>
                    <a href="{{ url('admin/users') }}" class="text-white">View</a>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card card-body bg-warning text-white mb-3 shadow">
                    <label>Total Admins</label>
                    <h1 class="text-white">{{ $totalAdmin }}</h1>
                    <a href="{{ url('admin/users') }}" class="text-white">View</a>
                </div>
            </div>
        </div>

    </div>
</div>



@endsection
