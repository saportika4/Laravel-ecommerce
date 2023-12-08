<div>

    @include('livewire.admin.brand.modal-form')

    <div class="row">
        <div class="col-lg-12">
            <div class="project-progree-breadcrumb">

                <div class="breadcrumb-main user-member justify-content-sm-between ">
                    <div class=" d-flex flex-wrap justify-content-center breadcrumb-main__wrapper">
                        <div class="d-flex align-items-center user-member__title justify-content-center mr-sm-25">
                            <h4 class="text-capitalize fw-500 breadcrumb-title">Brands</h4>
                        </div>

                    </div>
                    <div class="action-btn">
                        <a href="#" class="btn px-15 btn-primary" data-toggle="modal" data-target="#AddbrandModal">
                            <i class="las la-plus fs-16"></i>Add Brands</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12 mb-30">
            <div class="card">
                <div class="card-header color-dark fw-500">
                    Brands List
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
                                            <span class="userDatatable-title">Name</span>
                                        </th>
                                        <th>
                                            <span class="userDatatable-title">Category</span>
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
                                    @forelse ($brands as $brand)
                                        <tr wire:key="item-1{{ $brand->id }}">
                                            <td>
                                                <div class="userDatatable-content">
                                                    {{ $brand->id }}
                                                </div>
                                            </td>

                                            <td>
                                                <div class="userDatatable-content">
                                                    {{ $brand->name }}
                                                </div>
                                            </td>
                                            <td>
                                                <div class="userDatatable-content">
                                                    @if ($brand->category)
                                                        {{ $brand->category->name }}
                                                    @else
                                                        No Category
                                                    @endif

                                                </div>
                                            </td>
                                            <td>
                                                <div class="userDatatable-content d-inline-block">
                                                    <span class="color-success rounded-pill userDatatable-content-status active {{ $brand->status == '1' ? 'bgRed':'bg-opacity-success' }}">{{ $brand->status == '1' ? 'Hidden':'Visible' }}</span>
                                                </div>
                                            </td>
                                            <td>
                                                <ul class="orderDatatable_actions mb-0 d-flex flex-wrap">
                                                    <li>
                                                        <a wire:click="editBrand({{ $brand->id }})" href="#" data-toggle="modal" data-target="#UpdatebrandModal" class="edit">
                                                            <x-feathericon-edit style="width:24px;height:24px;"/></a>
                                                    </li>
                                                    <li>
                                                        <a wire:ignore href="#" wire:click="DeleteBrand({{$brand->id}})" class="remove" data-toggle="modal" data-target="#DeletebrandModal">
                                                            <x-feathericon-trash-2 style="width:24px;height:24px;"/></span></a>
                                                    </li>
                                                </ul>
                                            </td>
                                        </tr>
                                        @empty
                                        <tr>
                                            <td colspan="5">NO Brands Found</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div>
            {{ $brands->links() }}
        </div>
    </div>
</div>

@push('script')

    <script>
        window.addEventListener('close-model', event => {
            $('.modal').modal('hide').data('bs.modal', null);
            $('.modal').remove();
            $('.modal-backdrop').remove();
            $('body').removeClass('modal-open');
            $('body').removeAttr('style');

            $('#AddbrandModal').modal('hide');
            $('#UpdatebrandModal').modal('hide');
            $('#DeletebrandModal').modal('hide');
        });
    </script>

@endpush
