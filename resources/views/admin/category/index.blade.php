@extends('layouts.admin')

@section('content')

<div class="row">
    <div class="col-lg-12">
        <div class="project-progree-breadcrumb">

            <div class="breadcrumb-main user-member justify-content-sm-between ">
                <div class=" d-flex flex-wrap justify-content-center breadcrumb-main__wrapper">
                    <div class="d-flex align-items-center user-member__title justify-content-center mr-sm-25">
                        <h4 class="text-capitalize fw-500 breadcrumb-title">Category</h4>
                    </div>

                </div>
                <div class="action-btn">
                    <a href="#" class="btn px-15 btn-primary" data-toggle="modal" data-target="#new-member">
                        <i class="las la-plus fs-16"></i>Add Category</a>


                    <div class="modal fade new-member" id="new-member" role="dialog" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content  radius-xl">
                                <div class="modal-header">
                                    <h6 class="modal-title fw-500" id="staticBackdropLabel">Add Category</h6>
                                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                        <span data-feather="x"></span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="new-member-modal">
                                        <form action="{{ url('admin/category') }}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            <div class="form-group mb-20">
                                                <input type="text" name="name" class="form-control" placeholder="Name">
                                                @error('name') <small class="text-danger">{{$message}}</small> @enderror
                                            </div>
                                            <div class="form-group mb-20">
                                                <input type="text" name="slug" class="form-control" placeholder="Slug">
                                                @error('slug') <small class="text-danger">{{$message}}</small>@enderror
                                            </div>
                                            <div class="form-group mb-20">
                                                <textarea class="form-control" name="description" id="exampleFormControlTextarea1" rows="3" placeholder="Description"></textarea>
                                                @error('description') <small class="text-danger">{{$message}}</small>@enderror
                                            </div>
                                            <div class="pb-md-40 pt-md-0">
                                                <div class="custom-file">

                                                    <label for="formFile" class="form-label">Image</label>
                                                    <input class="form-control" name="image" type="file" id="formFile">

                                                </div>
                                                @error('image') <small class="text-danger">{{$message}}</small>@enderror
                                            </div>
                                            <div class="form-group textarea-group">
                                                <label class="mb-15">status</label>
                                                <div class="d-flex">
                                                    <div class="project-task-list__left d-flex align-items-center">
                                                        <div class="checkbox-group d-flex mr-50 pr-10">
                                                            <div class="checkbox-theme-default custom-checkbox checkbox-group__single d-flex">
                                                                <input class="checkbox" name="status" type="checkbox" id="check-grp-1">
                                                                <label for="check-grp-1" class="fs-14 color-light">
                                                                    status
                                                                </label>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group mb-20">
                                                <label class="mb-15">SEO Tags</label>
                                            </div>
                                            <div class="form-group mb-20">
                                                <input type="text" name="meta_title" class="form-control" placeholder="Meta Title">
                                                @error('meta_title') <small class="text-danger">{{$message}}</small>@enderror
                                            </div>
                                            <div class="form-group mb-20">
                                                <textarea class="form-control" name="meta_keyword" id="exampleFormControlTextarea2" rows="3" placeholder="Meta Keyword"></textarea>
                                                @error('meta_keyword') <small class="text-danger">{{$message}}</small>@enderror
                                            </div>
                                            <div class="form-group mb-20">
                                                <textarea class="form-control" name="meta_description" id="exampleFormControlTextarea3" rows="3" placeholder="Meta Description"></textarea>
                                                @error('meta_description') <small class="text-danger">{{$message}}</small>@enderror
                                            </div>

                                            <div class="button-group d-flex pt-25">



                                                <button type="submit" class="btn btn-primary btn-default btn-squared text-capitalize">Save
                                                </button>








                                                <button type="button" data-bs-dismiss="modal" aria-label="Close" class="btn btn-light btn-default btn-squared fw-400 text-capitalize b-light color-light">cancel
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

            @if(session('message'))

            <div class="alert alert-success mb-20">{{ session('message') }}</div>

            @endif

        </div>
    </div>

</div>

<div>
    <livewire:admin.category.index/>
</div>

@endsection
