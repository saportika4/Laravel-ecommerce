@extends('layouts.admin')

@section('content')

<div class="row">
    <div class="col-lg-12">
            @if (session('message'))
                <div class="alert alert-success mt-3">{{ session('message') }}</div>
            @endif
            <div class="breadcrumb-main user-member justify-content-sm-between ">
                <div class=" d-flex flex-wrap justify-content-center breadcrumb-main__wrapper">
                    <div class="d-flex align-items-center user-member__title justify-content-center mr-sm-25">
                        <h4 class="text-capitalize fw-500 breadcrumb-title">Sliders</h4>
                    </div>

                </div>
                <div class="action-btn">
                    <a href="{{ url('admin/sliders/create') }}" class="btn px-15 btn-primary">
                        <i class="las la-plus fs-16"></i>Add Sliders</a>
                </div>
            </div>

            <div class="card">
                <div class="card-header color-dark fw-500">
                    Sliders List
                </div>
                <div class="card-body">
                    <div class="userDatatable global-shadow border-0 bg-white w-100">
                        <div class="table-responsive">
                            <table class="table mb-0 table-borderless">
                                <thead>
                                    <tr class="userDatatable-header">

                                        <th>
                                            <span class="userDatatable-title">ID</span>
                                        </th>
                                        <th>
                                            <span class="userDatatable-title">Title</span>
                                        </th>
                                        <th>
                                            <span class="userDatatable-title">Description</span>
                                        </th>
                                        <th>
                                            <span class="userDatatable-title">Image</span>
                                        </th>
                                        <th>
                                            <span class="userDatatable-title">Status</span>
                                        </th>
                                        <th>
                                            <span class="userDatatable-title float-right">Action</span>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($sliders as $slider)
                                        <tr>
                                            <td>
                                                <div class="userDatatable-content">
                                                    {{ $slider->id }}
                                                </div>
                                            </td>

                                            <td>
                                                <div class="userDatatable-content">
                                                    {{ $slider->title }}
                                                </div>
                                            </td>
                                            <td>
                                                <div class="userDatatable-content">
                                                    {{ $slider->description }}
                                                </div>
                                            </td>
                                            <td>
                                                <div class="d-flex">
                                                    <div class="userDatatable__imgWrapper d-flex align-items-center">

                                                        <a href="#" class="profile-image rounded-circle d-block m-0 wh-38" style="background-image:url('{{ asset("$slider->image") }}'); background-size: cover; width: 70px; height: 70px;"></a>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="userDatatable-content d-inline-block">
                                                    <span class="bg-opacity-success  color-success rounded-pill userDatatable-content-status active {{ $slider->status == '1' ? 'bgRed':'bg-opacity-success' }}">{{ $slider->status == '1' ? 'Hidden':'Visible' }}</span>
                                                </div>
                                            </td>
                                            <td>
                                                <ul class="orderDatatable_actions mb-0 d-flex flex-wrap">
                                                    <li>
                                                        <a href="{{ url('admin/sliders/'.$slider->id.'/edit') }}" class="edit">
                                                            <x-feathericon-edit style="width:24px;height:24px;"/></a>
                                                    </li>
                                                    <li>
                                                        <a href="{{ url('admin/sliders/'.$slider->id.'/delete') }}" class="remove" onclick="return confirm('Are you sure you want to delete this slider?')">
                                                            <x-feathericon-trash-2 style="width:24px;height:24px;"/></span></a>
                                                    </li>
                                                </ul>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

    </div>

</div>

@endsection
