<?php

namespace App\Livewire\Frontend;

use App\Models\Wishlist;
use Livewire\Component;

class WishlistShow extends Component
{
    public function RemoveWishListItem(int $wishListId)
    {
        Wishlist::where('user_id', auth()->user()->id)->where('id',$wishListId)->delete();

        $this->dispatch('WishlistUpdated');

        $this->dispatch('message', text: 'Product removed from Wishlist', type:'success', status:'200');
    }
    public function render()
    {
        $wishlist = Wishlist::where('user_id', auth()->user()->id)->get();
        return view('livewire.frontend.wishlist-show', [
            'wishlist' => $wishlist
        ]);
    }
}
