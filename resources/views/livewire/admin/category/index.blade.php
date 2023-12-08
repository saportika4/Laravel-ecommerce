<div>
    <div wire:ignore.self class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Delete Category</h5>
            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>

            <form wire:submit.prevent="destroyCategory">
                <div class="modal-body">
                    <h6>Are you sure you want delete this data</h6>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Yes, Delete</button>
                </div>
            </form>

        </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12 mb-30">
            <div class="card">
                <div class="card-header color-dark fw-500">
                    User List
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
                                            <span class="userDatatable-title">Image</span>
                                        </th>
                                        <th>
                                            <span class="userDatatable-title">Name</span>
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
                                    @foreach ($categories as $category)
                                        <tr wire:key="item-1{{ $category->id }}">
                                            <td>
                                                <div class="userDatatable-content">
                                                    {{ $category->id }}
                                                </div>
                                            </td>
                                            <td>
                                                <div class="d-flex">
                                                    <div class="userDatatable__imgWrapper d-flex align-items-center">

                                                        <a href="#" class="profile-image rounded-circle d-block m-0 wh-38" style="background-image:url('{{ asset("$category->image") }}'); background-size: cover;"></a>
                                                    </div>
                                                </div>
                                            </td>

                                            <td>
                                                <div class="userDatatable-content">
                                                    {{ $category->name }}
                                                </div>
                                            </td>
                                            <td>
                                                <div class="userDatatable-content d-inline-block">
                                                    <span class="bg-opacity-success  color-success rounded-pill userDatatable-content-status active {{ $category->status == '1' ? 'bgRed':'bg-opacity-success' }}">{{ $category->status == '1' ? 'Hidden':'Visible' }}</span>
                                                </div>
                                            </td>
                                            <td>
                                                <ul class="orderDatatable_actions mb-0 d-flex flex-wrap">
                                                    <li>
                                                        <a wire:ignore href="{{ url('admin/category/'.$category->id.'/edit') }}" class="edit">
                                                            <x-feathericon-edit style="width:24px;height:24px;"/></a>
                                                    </li>
                                                    <li>
                                                        <a wire:ignore href="#" wire:click="deleteCategory({{$category->id}})" class="remove" data-toggle="modal" data-target="#deleteModal">
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
        <div>
            {{ $categories->links() }}
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

            $('#deleteModal').modal('hide');
        });
    </script>

    @endpush

</div>
