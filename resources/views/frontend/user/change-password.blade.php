@extends('layouts.app')

@section('title','Search results')

@push('styles')
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">
@endpush

@section('content')

        <main class="main">

            <div class="col-md-12">
                <div class="container login-container">
                    <div class="row justify-content-center">
                        <div class="col-lg-6 mx-auto">
                            <div class="row">
                                <div class="col-md-12">
                                    @if (session('message'))
                                        <div class="alert alert-success">{{ session('message') }}</div>
                                    @endif

                                    @if ($errors->any())
                                        <ul class="alert alert-warning">
                                            @foreach ($errors->all() as $error)
                                                <li>{{$error}}</li>
                                            @endforeach
                                        </ul>
                                    @endif
                                    <div class="heading mb-5">
                                        <h2 class="title">Change Password
                                            <a href="{{ url('profile') }}" class="float-end btn btn-danger">Back</a>
                                        </h2>
                                    </div>

                                    <form action="{{ url('change-password') }}" method="POST">
                                        @csrf

                                        <label>Current Password
                                            <span class="required">*</span>
                                        </label>
                                        <input type="password" name="current_password" class="form-input form-wide" />

                                        <label>New Password
                                            <span class="required">*</span>
                                        </label>
                                        <input type="password" name="password" class="form-input form-wide" />

                                        <label>Confirm Password
                                            <span class="required">*</span>
                                        </label>
                                        <input type="password" name="password_confirmation" class="form-input form-wide" />

                                        <div class="form-footer mb-2">
                                            <button type="submit" class="btn btn-dark btn-md w-100 mr-0 p-4">
                                                Update Password
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

@endsection
