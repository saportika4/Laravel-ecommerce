<?php

namespace App\Livewire\Frontend;

use App\Models\Cart;
use App\Models\Product;
use Livewire\Component;
use App\Models\Wishlist;
use Illuminate\Support\Facades\Auth;

class WishlistShow extends Component
{
    // public $prodColorSelectedQuantity, $ProductColorId;

    public function RemoveWishListItem(int $wishListId)
    {
        Wishlist::where('user_id', auth()->user()->id)->where('id',$wishListId)->delete();

        $this->dispatch('WishlistUpdated');

        $this->dispatch('message', text: 'Product removed from Wishlist', type:'success', status:'200');
    }

    // public function colorSelected($ProductColorId)
    // {
    //     $this->ProductColorId = $ProductColorId;
    //     $productColor = $this->product->productColors()->where('id',$ProductColorId)->first();
    //     $this->prodColorSelectedQuantity = $productColor->quantity;

    //     if($this->prodColorSelectedQuantity == 0){
    //         $this->prodColorSelectedQuantity = 'outOfStock';
    //     }
    // }

    // public function addToCart(int $productId)
    // {
    //     if(Auth::check()){
    //         $product = Product::where('id',$productId)->first();

    //         if($product->where('id',$productId)->where('status','0')->exists())
    //         {
    //             // check for product color quantity and insert to cart
    //             if($product->productColors()->count() >= 1)
    //             {

    //                 if($this->prodColorSelectedQuantity != NULL)
    //                 {

    //                     if(Cart::where('user_id',auth()->user()->id)
    //                             ->where('product_id', $productId)
    //                             ->where('product_color_id', $this->ProductColorId)
    //                             ->exists())
    //                         {
    //                             $this->dispatch('message', text: 'Product Already Added', type:'warning', status:'200');
    //                         }
    //                         else
    //                         {

    //                             $productColor = $this->product->productColors()->where('id',$this->ProductColorId)->first();

    //                             if($productColor->quantity > 0)
    //                             {

    //                                 if($productColor->quantity > $this->quantityCount)
    //                                 {
    //                                     //insert product to cart with color

    //                                     Cart::create([
    //                                         'user_id' => auth()->user()->id,
    //                                         'product_id' => $productId,
    //                                         'product_color_id' => $this->ProductColorId,
    //                                         'quantity' => $this->quantityCount
    //                                     ]);

    //                                     $this->dispatch('CartUpdated');

    //                                     $this->dispatch('message', text: 'Product Added to Cart', type:'success', status:'200');

    //                                 }else
    //                                 {
    //                                     $this->dispatch('message', text: 'Only '.$productColor->quantity.' Quantity Available', type:'warning', status:'404');
    //                                 }

    //                             }else
    //                             {
    //                                 $this->dispatch('message', text: 'Out of Stock', type:'warning', status:'404');
    //                             }
    //                         }


    //                 }else
    //                 {
    //                     $this->dispatch('message', text: 'Select your product color', type:'warning', status:'404');
    //                 }

    //             }else
    //             {
    //                 if(Cart::where('user_id',auth()->user()->id)->where('product_id',$productId)->exists())
    //                 {
    //                     $this->dispatch('message', text: 'Product Already Added', type:'warning', status:'200');
    //                 }
    //                 else
    //                 {

    //                     if($this->product->quantity > 0)
    //                     {

    //                         if($this->product->quantity > $this->quantityCount)
    //                         {
    //                             //add to cart without colors

    //                             Cart::create([
    //                                 'user_id' => auth()->user()->id,
    //                                 'product_id' => $productId,
    //                                 'quantity' => $this->quantityCount
    //                             ]);

    //                             $this->dispatch('CartUpdated');

    //                             $this->dispatch('message', text: 'Product Added to Cart', type:'success', status:'200');

    //                         }else
    //                         {
    //                             $this->dispatch('message', text: 'Only '.$this->product->quantity.' Quantity Available', type:'warning', status:'404');
    //                         }

    //                     }
    //                     else
    //                     {
    //                         $this->dispatch('message', text: 'Out of Stock', type:'warning', status:'404');
    //                     }
    //                 }

    //             }


    //         }else{
    //             $this->dispatch('message', text: 'Product does not exists', type:'warning', status:'404');
    //         }

    //     }else
    //     {
    //         $this->dispatch('message', text: 'You Need to Login to your account before adding products to cart', type:'warning', status:'401');
    //     }
    // }

    public function render()
    {
        $wishlist = Wishlist::where('user_id', auth()->user()->id)->get();
        return view('livewire.frontend.wishlist-show', [
            'wishlist' => $wishlist
        ]);
    }
}
