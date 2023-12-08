<div>
    <div wire:ignore.self class="modal fade new-member" id="AddbrandModal" role="dialog" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content  radius-xl">
                <div class="modal-header">
                    <h6 class="modal-title fw-500" id="staticBackdropLabel">Add Brands</h6>
                    <button type="button" wire:click="closeModal()" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span data-feather="x"></span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="new-member-modal">
                        <form wire:submit.prevent="storeBrand">
                            @csrf
                            <div class="form-group mb-20">
                                <label>Select Category</label>
                                <select wire:model.defer="category_id" required class="form-control">
                                    <option value="">--Select category--</option>
                                    @foreach ($categories as $categoryItem)
                                        <option value="{{ $categoryItem->id }}">{{ $categoryItem->name }}</option>
                                    @endforeach

                                </select>
                                @error('category_id') <small class="text-danger">{{$message}}</small> @enderror
                            </div>
                            <div class="form-group mb-20">
                                <input type="text" wire:model.defer="name" class="form-control" placeholder="Brand Name">
                                @error('name') <small class="text-danger">{{$message}}</small> @enderror
                            </div>
                            <div class="form-group mb-20">
                                <input type="text" wire:model.defer="slug" class="form-control" placeholder="Brand Slug">
                                @error('slug') <small class="text-danger">{{$message}}</small>@enderror
                            </div>

                            <div class="form-group textarea-group">
                                <label class="mb-15">status (Checked = hidden, unchecked = visible)</label>
                                <div class="d-flex">
                                    <div class="project-task-list__left d-flex align-items-center">
                                        <div class="checkbox-group d-flex mr-50 pr-10">
                                            <div class="checkbox-theme-default custom-checkbox checkbox-group__single d-flex">
                                                <input class="checkbox" wire:model.defer="status" type="checkbox" id="check-grp-1">
                                                <label for="check-grp-1" class="fs-14 color-light">
                                                    status
                                                </label>
                                                @error('status') <small class="text-danger">{{$message}}</small>@enderror
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>


                            <div class="button-group d-flex pt-25">



                                <button type="submit" class="btn btn-primary btn-default btn-squared text-capitalize">Save
                                </button>








                                <button type="button" data-bs-dismiss="modal" wire:click="closeModal()" aria-label="Close" class="btn btn-light btn-default btn-squared fw-400 text-capitalize b-light color-light">cancel
                                </button>





                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- brand update model --}}


    <div wire:ignore.self class="modal fade new-member" id="UpdatebrandModal" role="dialog" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content  radius-xl">
                <div class="modal-header">
                    <h6 class="modal-title fw-500" id="staticBackdropLabel">Update Brands</h6>
                    <button type="button" wire:click="closeModal()" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span data-feather="x"></span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="new-member-modal">
                        <div wire:loading class="p-2">
                            <div class="spinner-border text-primary" role="status">
                                <span class="visually-hidden"></span>
                            </div>  Loading...
                        </div>
                        <div wire:loading.remove>
                            <form wire:submit.prevent="UpdateBrand">
                                @csrf
                                <div class="form-group mb-20">
                                    <label>Select Category</label>
                                    <select wire:model.defer="category_id" required class="form-control">
                                        <option value="">--Select category--</option>
                                        @foreach ($categories as $categoryItem)
                                            <option value="{{ $categoryItem->id }}">{{ $categoryItem->name }}</option>
                                        @endforeach

                                    </select>
                                    @error('category_id') <small class="text-danger">{{$message}}</small> @enderror
                                </div>
                                <div class="form-group mb-20">
                                    <input type="text" wire:model.defer="name" class="form-control" placeholder="Brand Name">
                                    @error('name') <small class="text-danger">{{$message}}</small> @enderror
                                </div>
                                <div class="form-group mb-20">
                                    <input type="text" wire:model.defer="slug" class="form-control" placeholder="Brand Slug">
                                    @error('slug') <small class="text-danger">{{$message}}</small>@enderror
                                </div>

                                <div class="form-group textarea-group">
                                    <label class="mb-15">status (Checked = hidden, unchecked = visible)</label>
                                    <div class="d-flex">
                                        <div class="project-task-list__left d-flex align-items-center">
                                            <div class="checkbox-group d-flex mr-50 pr-10">
                                                <div class="checkbox-theme-default custom-checkbox checkbox-group__single d-flex">
                                                    <input class="checkbox" type="checkbox" wire:model.defer="status" id="check-grp-1">
                                                    <label for="check-grp-1" class="fs-14 color-light">
                                                        status
                                                    </label>
                                                    @error('status') <small class="text-danger">{{$message}}</small>@enderror
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>


                                <div class="button-group d-flex pt-25">



                                    <button type="submit" class="btn btn-primary btn-default btn-squared text-capitalize">Update
                                    </button>








                                    <button type="button" data-bs-dismiss="modal" wire:click="closeModal()" aria-label="Close" class="btn btn-light btn-default btn-squared fw-400 text-capitalize b-light color-light">cancel
                                    </button>





                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- brand delete model --}}


    <div wire:ignore.self class="modal fade new-member" id="DeletebrandModal" role="dialog" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content  radius-xl">
                <div class="modal-header">
                    <h6 class="modal-title fw-500" id="staticBackdropLabel">Delete Brand</h6>
                    <button type="button" class="close" data-bs-dismiss="modal" wire:click="closeModal()" aria-label="Close">
                        <span data-feather="x"></span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="new-member-modal">
                        <div wire:loading class="p-2">
                            <div class="spinner-border text-primary" role="status">
                                <span class="visually-hidden"></span>
                            </div>  Loading...
                        </div>
                        <div wire:loading.remove>
                            <form wire:submit.prevent="DestroyBrand">

                                <h4>Are you sure you want to delete?</h4>


                                <div class="button-group d-flex pt-25">



                                    <button type="submit" class="btn btn-primary btn-default btn-squared text-capitalize">Yes,Delete
                                    </button>








                                    <button type="button" data-bs-dismiss="modal" wire:click="closeModal()" aria-label="Close" class="btn btn-light btn-default btn-squared fw-400 text-capitalize b-light color-light">cancel
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
