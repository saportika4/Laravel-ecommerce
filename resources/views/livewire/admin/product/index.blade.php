<div>
    <div wire:ignore.self class="modal fade new-member" id="DeleteProductModal" role="dialog" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content  radius-xl">
                <div class="modal-header">
                    <h6 class="modal-title fw-500" id="staticBackdropLabel">Delete product</h6>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
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
                            <form wire:submit.prevent="DestroyProduct">

                                <h4>Are you sure you want to delete?</h4>


                                <div class="button-group d-flex pt-25">



                                    <button type="submit" class="btn btn-primary btn-default btn-squared text-capitalize">Yes,Delete
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

    <div class="row">
        <div class="col-lg-12">
                @if (session('message'))
                    <div class="alert alert-success">{{ session('message') }}</div>
                @endif
                <div class="breadcrumb-main user-member justify-content-sm-between ">
                    <div class=" d-flex flex-wrap justify-content-center breadcrumb-main__wrapper">
                        <div class="d-flex align-items-center user-member__title justify-content-center mr-sm-25">
                            <h4 class="text-capitalize fw-500 breadcrumb-title">Products</h4>
                        </div>

                    </div>
                    <div class="action-btn">
                        <a href="{{ url('admin/products/create') }}" class="btn px-15 btn-primary">
                            <i class="las la-plus fs-16"></i>Add Products</a>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header color-dark fw-500">
                        Product List
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Category</th>
                                    <th>Product</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Status</th>
                                    <th style="text-align: right;">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($products as $product)
                                    <tr>
                                        <td>{{ $product->id }}</td>
                                        <td>
                                            @if ($product->category)
                                                {{ $product->category->name }}
                                            @else
                                                No Category
                                            @endif
                                        </td>
                                        <td>{{ $product->name }}</td>
                                        <td>{{ $product->selling_price }}</td>
                                        <td>{{ $product->quantity }}</td>
                                        <td>{{ $product->status == '1' ? 'Hidden':'Visible' }}</td>
                                        <td>
                                            <ul class="orderDatatable_actions mb-0">
                                                <li class="d-flex flex-wrap justify-content-end">
                                                    <a href="{{ url('admin/products/'.$product->id.'/edit') }}" class="edit">
                                                        <x-feathericon-edit style="width:24px;height:24px;"/>
                                                    </a>
                                                    <a href="#" wire:click="DeleteProduct({{$product->id}})" class="remove" data-toggle="modal" data-target="#DeleteProductModal">
                                                        <x-feathericon-trash-2 style="width:24px;height:24px;"/>
                                                    </a>
                                                    {{-- <a href="{{ url('admin/products/'.$product->id.'/delete') }}" onclick="return confirm('Are you sure, you want to delete this data?')" class="remove">
                                                        <x-feathericon-trash-2 style="width:24px;height:24px;"/>
                                                    </a> --}}
                                                </li>
                                            </ul>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="7">No Products Available</td>
                                    </tr>
                                @endforelse

                            </tbody>
                        </table>
                    </div>

                    <div>
                        {{ $products->links() }}
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
