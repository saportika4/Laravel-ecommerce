<div>
    <main class="main">
        <div class="page-header">
            <div class="container d-flex flex-column align-items-center">
                <nav aria-label="breadcrumb" class="breadcrumb-nav">
                    <div class="container">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="demo4.html">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">
                                Wishlist
                            </li>
                        </ol>
                    </div>
                </nav>

                <h1>Wishlist</h1>
            </div>
        </div>

        <div class="container">
            <div class="wishlist-title">
                <h2 class="p-2">My wishlist</h2>
            </div>
            <div class="wishlist-table-container">
                <table class="table table-wishlist mb-0">
                    {{-- <thead>
                        <tr>
                            <th class="thumbnail-col"></th>
                            <th class="product-col">Product</th>
                            <th class="price-col">Price</th>
                            <th class="status-col">Stock Status</th>
                            <th class="action-col">Actions</th>
                        </tr>
                    </thead> --}}
                    <tbody>
                        @forelse ($wishlist as $wishlistItem)
                            @if ($wishlistItem->product)
                                <tr class="product-row">
                                    <td>
                                        <figure class="product-image-container">
                                            <a href="{{ url('collections/'.$wishlistItem->product->category->slug.'/'.$wishlistItem->product->slug) }}" class="product-image">
                                                <img src="{{ asset($wishlistItem->product->productImages[0]->image) }}" alt="product">
                                            </a>

                                            <a type="" wire:click="RemoveWishListItem({{ $wishlistItem->id }})" class="btn-remove icon-cancel" style="cursor: pointer;" title="Remove Product"></a>
                                        </figure>
                                    </td>
                                    <td>
                                        <h5 class="product-title">
                                            <a href="{{ url('collections/'.$wishlistItem->product->category->slug.'/'.$wishlistItem->product->slug) }}">{{ $wishlistItem->product->name }}</a>
                                        </h5>
                                    </td>
                                    <td class="price-box">${{ $wishlistItem->product->selling_price }}</td>
                                    <td>

                                        @if ($wishlistItem->product->quantity > 0)
                                            <span class="stock-status">In stock</span>
                                        @else
                                            <span class="stock-status">Out Of stock</span>
                                        @endif

                                    </td>
                                    <td class="action">
                                        <div class="d-flex"  style="gap: 10px;">
                                            <button type="button" wire:click="RemoveWishListItem({{ $wishlistItem->id }})" class="btn btn-danger mt-1 mt-md-0" title="Quick View">
                                                <span wire:loading.remove wire:target="RemoveWishListItem({{ $wishlistItem->id }})">
                                                    <i class="fa fa-trash"></i> Remove
                                                </span>

                                                <span wire:loading wire:target="RemoveWishListItem({{ $wishlistItem->id }})">
                                                    <i class="fa fa-trash"></i> Removing...
                                                </span>
                                            </button>
                                            <button class="btn btn-dark btn-add-cart product-type-simple btn-shop">
                                                <i class="minicart-icon" style="background: white;border: #ffffff;"></i> ADD TO CART
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            @endif

                        @empty
                            <h4>No Products Added</h4>
                        @endforelse

                    </tbody>
                </table>
            </div>
        </div>
    </main>
</div>
