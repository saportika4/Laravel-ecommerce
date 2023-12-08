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
                        <h4 class="text-capitalize fw-500 breadcrumb-title">Edit Slider</h4>
                    </div>

                </div>
                <div class="action-btn">
                    <a href="{{ url('admin/sliders') }}" class="btn btn-danger btn-sm px-15 btn-primary">Back</a>
                </div>
            </div>

            <div class="card">
                <div class="card-body">
                    <form action="{{ url('admin/sliders/'.$slider->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label>Title</label>
                            <input type="text" name="title" value="{{ $slider->title }}" class="form-control" />
                        </div>
                        <div class="mb-3">
                            <label>Description</label>
                            <textarea type="text" name="description" class="form-control">{{ $slider->description }}</textarea>
                        </div>
                        <div class="mb-3">
                            <label>Image</label>
                            <input type="file" name="image" multiple class="form-control mb-3" />
                            <img src="{{ asset("$slider->image") }}" width="60px" height="60px" alt="">
                        </div>
                        <div class="mb-3">
                            <label>Status</label><br/>
                            <input type="checkbox" name="status" {{ $slider->status == 1 ? 'checked':'' }} style="height: 30px;width:30px;" /> Checked=Hidden,Unchecked=Visible
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
