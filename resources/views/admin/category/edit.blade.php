@extends('layouts.admin')

@section('content')

<div class="row">
    <div class="col-lg-12">
        <div class="d-flex align-items-center user-member__title mb-30 mt-30 ">
            <h4 class="text-capitalize w-100 d-flex justify-content-between">Edit Category
                <a href="{{ url('admin/category') }}" class="btn btn-danger btn-sm text-white float-end">BACK</a>
            </h4>
        </div>
    </div>
</div>

<div class="card mb-50">
    <div class="row justify-content-center">
        <div class="col-sm-5 col-10">
            <div class="mt-40 mb-50">

                <div class="edit-profile__body">
                    <form action="{{ url('admin/category/'.$category->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group mb-25">
                            <input type="text" name="name" value="{{ $category->name }}" class="form-control" placeholder="Name">
                            @error('name') <small class="text-danger">{{$message}}</small> @enderror
                        </div>
                        <div class="form-group mb-25">
                            <input type="text" name="slug" value="{{ $category->slug }}" class="form-control" placeholder="Slug">
                            @error('slug') <small class="text-danger">{{$message}}</small>@enderror
                        </div>
                        <div class="form-group mb-25">
                            <textarea class="form-control" name="description" id="exampleFormControlTextarea1" rows="3" placeholder="Description">{{ $category->description }}</textarea>
                            @error('description') <small class="text-danger">{{$message}}</small>@enderror
                        </div>
                        <div class="pb-md-40 pt-md-0">
                            <div class="custom-file">

                                <label for="formFile" class="form-label">Image</label>
                                <input class="form-control" name="image" type="file" id="formFile">

                                <img src="{{ asset("$category->image") }}" width="60px" height="60px" alt="">

                            </div>
                            @error('image') <small class="text-danger">{{$message}}</small>@enderror
                        </div>
                        <div class="form-group textarea-group">
                            <label class="mb-15">status</label>
                            <div class="d-flex">
                                <div class="project-task-list__left d-flex align-items-center">
                                    <div class="checkbox-group d-flex mr-50 pr-10">
                                        <div class="checkbox-theme-default custom-checkbox checkbox-group__single d-flex">
                                            <input class="checkbox" name="status" {{ $category->status == '1' ? 'checked':'' }} type="checkbox" id="check-grp-1">
                                            <label for="check-grp-1" class="fs-14 color-light">
                                                status
                                            </label>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="form-group mb-25">
                            <label class="mb-15">SEO Tags</label>
                        </div>
                        <div class="form-group mb-25">
                            <input type="text" name="meta_title" value="{{ $category->meta_title }}" class="form-control" placeholder="Meta Title">
                            @error('meta_title') <small class="text-danger">{{$message}}</small>@enderror
                        </div>
                        <div class="form-group mb-25">
                            <textarea class="form-control" name="meta_keyword" id="exampleFormControlTextarea1" rows="3" placeholder="Meta Keyword">{{ $category->meta_keyword }}</textarea>
                            @error('meta_keyword') <small class="text-danger">{{$message}}</small>@enderror
                        </div>
                        <div class="form-group mb-25">
                            <textarea class="form-control" name="meta_description" id="exampleFormControlTextarea1" rows="3" placeholder="Meta Description">{{ $category->meta_description }}</textarea>
                            @error('meta_description') <small class="text-danger">{{$message}}</small>@enderror
                        </div>

                        <div class="button-group d-flex pt-25 justify-content-end">



                            <button class="btn btn-primary btn-default btn-squared text-capitalize radius-md shadow2">Save
                            </button>





                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
