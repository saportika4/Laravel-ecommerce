<?php

namespace App\Livewire\Frontend\Product;

use App\Models\Cart;
use Livewire\Component;
use App\Models\Wishlist;
use Illuminate\Support\Facades\Auth;

class View extends Component
{
    public $category, $product, $prodColorSelectedQuantity, $quantityCount = 1, $ProductColorId;

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
        $this->ProductColorId = $ProductColorId;
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

    public function addToCart(int $productId)
    {
        if(Auth::check()){

            if($this->product->where('id',$productId)->where('status','0')->exists())
            {
                // check for product color quantity and insert to cart
                if($this->product->productColors()->count() >= 1)
                {

                    if($this->prodColorSelectedQuantity != NULL)
                    {

                        if(Cart::where('user_id',auth()->user()->id)
                                ->where('product_id', $productId)
                                ->where('product_color_id', $this->ProductColorId)
                                ->exists())
                            {
                                $this->dispatch('message', text: 'Product Already Added', type:'warning', status:'200');
                            }
                            else
                            {

                                $productColor = $this->product->productColors()->where('id',$this->ProductColorId)->first();

                                if($productColor->quantity > 0)
                                {

                                    if($productColor->quantity >= $this->quantityCount)
                                    {
                                        //insert product to cart with color

                                        Cart::create([
                                            'user_id' => auth()->user()->id,
                                            'product_id' => $productId,
                                            'product_color_id' => $this->ProductColorId,
                                            'quantity' => $this->quantityCount
                                        ]);

                                        $this->dispatch('CartUpdated');

                                        $this->dispatch('message', text: 'Product Added to Cart', type:'success', status:'200');

                                    }else
                                    {
                                        $this->dispatch('message', text: 'Only '.$productColor->quantity.' Quantity Available', type:'warning', status:'404');
                                    }

                                }else
                                {
                                    $this->dispatch('message', text: 'Out of Stock', type:'warning', status:'404');
                                }
                            }


                    }else
                    {
                        $this->dispatch('message', text: 'Select your product color', type:'warning', status:'404');
                    }

                }else
                {
                    if(Cart::where('user_id',auth()->user()->id)->where('product_id',$productId)->exists())
                    {
                        $this->dispatch('message', text: 'Product Already Added', type:'warning', status:'200');
                    }
                    else
                    {

                        if($this->product->quantity > 0)
                        {

                            if($this->product->quantity > $this->quantityCount)
                            {
                                //add to cart without colors

                                Cart::create([
                                    'user_id' => auth()->user()->id,
                                    'product_id' => $productId,
                                    'quantity' => $this->quantityCount
                                ]);

                                $this->dispatch('CartUpdated');

                                $this->dispatch('message', text: 'Product Added to Cart', type:'success', status:'200');

                            }else
                            {
                                $this->dispatch('message', text: 'Only '.$this->product->quantity.' Quantity Available', type:'warning', status:'404');
                            }

                        }
                        else
                        {
                            $this->dispatch('message', text: 'Out of Stock', type:'warning', status:'404');
                        }
                    }

                }


            }else{
                $this->dispatch('message', text: 'Product does not exists', type:'warning', status:'404');
            }

        }else
        {
            $this->dispatch('message', text: 'You Need to Login to your account before adding products to cart', type:'warning', status:'401');
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
