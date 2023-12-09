<?php

namespace App\Livewire\Frontend\Product;

use App\Models\Wishlist;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class View extends Component
{
    public $category, $product, $prodColorSelectedQuantity, $quantityCount = 1;

    public function addToWishlist($ProductId)
    {
        if(Auth::check())
        {
            if(Wishlist::where('user_id',auth()->user()->id)->where('product_id',$ProductId)->exists())
            {
                session()->flash('message','Product already added to wishlist');

                $this->dispatch('message', text: 'Product already added to wishlist', type:'warning', status:'409');

                return false;
            }
            else
            {
                Wishlist::create([
                    'user_id' => auth()->user()->id,
                    'product_id' => $ProductId
                ]);

                $this->dispatch('WishlistUpdated');

                session()->flash('message','Product added To Wishlist');

                $this->dispatch('message', text: 'Product added to wishlist', type:'success', status:'200');
            }
        }
        else
        {
            session()->flash('message','Please login to continue');

            $this->dispatch('message', text: 'Please login to continue', type:'warning', status:'401');

            return false;
        }
    }

    public function colorSelected($ProductColorId)
    {
        $productColor = $this->product->productColors()->where('id',$ProductColorId)->first();
        $this->prodColorSelectedQuantity = $productColor->quantity;

        if($this->prodColorSelectedQuantity == 0){
            $this->prodColorSelectedQuantity = 'outOfStock';
        }
    }

    public function incrementQuantity()
    {
        if($this->quantityCount < 10){
            $this->quantityCount++;
        }
    }

    public function decrementQuantity()
    {
        if($this->quantityCount > 1){
            $this->quantityCount--;
        }
    }

    public function mount($category, $product)
    {
        $this->category = $category;
        $this->product = $product;
    }

    public function render()
    {
        return view('livewire.frontend.product.view',[
            'category' => $this->category,
            'product' => $this->product,
        ]);
    }
}
