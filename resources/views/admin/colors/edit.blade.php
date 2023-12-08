@extends('layouts.admin')

@section('content')

<div class="row">
    <div class="col-lg-12">
            @if (session('message'))
                <div class="alert alert-success">{{ session('message') }}</div>
            @endif
            <div class="breadcrumb-main user-member justify-content-sm-between ">
                <div class=" d-flex flex-wrap justify-content-center breadcrumb-main__wrapper">
                    <div class="d-flex align-items-center user-member__title justify-content-center mr-sm-25">
                        <h4 class="text-capitalize fw-500 breadcrumb-title">Edit Color</h4>
                    </div>

                </div>
                <div class="action-btn">
                    <a href="{{ url('admin/colors') }}" class="btn btn-danger btn-sm px-15 btn-primary">Back</a>
                </div>
            </div>

            <div class="card">
                <div class="card-body">
                    <form action="{{ url('admin/colors/'.$color->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label>Color Name</label>
                            <input type="text" name="name" value="{{ $color->name }}" class="form-control" />
                        </div>
                        <div class="mb-3">
                            <label>Color Code</label>
                            <input type="text" name="code" value="{{ $color->code }}" class="form-control" />
                        </div>
                        <div class="mb-3">
                            <label>Status</label><br/>
                            <input type="checkbox" name="status" {{ $color->status ? 'checked':'' }} style="height: 30px;width:30px;" /> Checked=Hidden,Unchecked=Visible
                        </div>
                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>

                    </form>
                </div>
            </div>

    </div>

</div>

@endsection
