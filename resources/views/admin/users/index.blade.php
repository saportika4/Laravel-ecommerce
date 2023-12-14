@extends('layouts.admin')

@section('title', 'Users List')

@section('content')

<div class="row">
    <div class="col-lg-12">
        @if (session('message'))
            <div class="alert alert-success">{{ session('message') }}</div>
        @endif
        <div class="breadcrumb-main user-member justify-content-sm-between ">
            <div class=" d-flex flex-wrap justify-content-center breadcrumb-main__wrapper">
                <div class="d-flex align-items-center user-member__title justify-content-center mr-sm-25">
                    <h4 class="text-capitalize fw-500 breadcrumb-title">Users</h4>
                </div>

            </div>
            <div class="action-btn">
                <a href="{{ url('admin/users/create') }}" class="btn px-15 btn-primary">
                    <i class="las la-plus fs-16"></i>Add User</a>
            </div>
        </div>

        <div class="card">
            <div class="card-header color-dark fw-500">
                Users List
            </div>
            <div class="card-body">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th style="text-align: right;">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($users as $user)
                            <tr>
                                <td>{{ $user->id }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>
                                    @if($user->role_as == '0')
                                        <label class="badge btn-primary">User</label>
                                    @elseif ($user->role_as == '1')
                                        <label class="badge btn-success">Admin</label>
                                    @else
                                        <label class="badge btn-danger">None</label>
                                    @endif
                                </td>
                                <td>
                                    <ul class="orderDatatable_actions mb-0">
                                        <li class="d-flex flex-wrap justify-content-end">
                                            <a href="{{ url('admin/users/'.$user->id.'/edit') }}" class="edit">
                                                <x-feathericon-edit style="width:24px;height:24px;"/>
                                            </a>
                                            {{-- <a href="#" wire:click="DeleteProduct({{$user->id}})" class="remove" data-toggle="modal" data-target="#DeleteProductModal">
                                                <x-feathericon-trash-2 style="width:24px;height:24px;"/>
                                            </a> --}}
                                            <a href="{{ url('admin/users/'.$user->id.'/delete') }}" onclick="return confirm('Are you sure, you want to delete this data?')" class="remove">
                                                <x-feathericon-trash-2 style="width:24px;height:24px;"/>
                                            </a>
                                        </li>
                                    </ul>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5">No Users Available</td>
                            </tr>
                        @endforelse

                    </tbody>

                </table>
            </div>

            <div>
                {{ $users->links() }}
            </div>

        </div>
    </div>

</div>

@endsection
