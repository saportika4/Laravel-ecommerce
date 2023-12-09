<?php

namespace App\Livewire\Frontend;

use App\Models\Wishlist;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class WishlistCount extends Component
{
    public $wishListCount;

    protected $listeners = ['WishlistUpdated' => 'CheckWishListCount'];

    public function CheckWishListCount()
    {
        if(Auth::check()){
            return $this->wishListCount = Wishlist::where('user_id', auth()->user()->id)->count();
        }else
        {
            return $this->wishListCount = 0;
        }
    }

    public function render()
    {
        $this->wishListCount = $this->CheckWishListCount();

        return view('livewire.frontend.wishlist-count', [
            'wishListCount' => $this->wishListCount
        ]);
    }
}
