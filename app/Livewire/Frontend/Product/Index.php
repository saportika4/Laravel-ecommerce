<?php

namespace App\Livewire\Frontend\Product;

use App\Models\Product;
use Livewire\Component;
use App\Models\Wishlist;
use Illuminate\Support\Facades\Auth;

class Index extends Component
{
    public $products, $category, $brandInputs = [], $priceInput;

    protected $queryString = [
        'brandInputs' => ['except' => '', 'as' => 'brand'],
        'priceInput' => ['except' => '', 'as' => 'price'],
    ];

    public function mount($category)
    {
        $this->category = $category;
    }

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

    public function applyFilter()
    {
        $this->products = Product::where('category_id',$this->category->id)
                                    ->when($this->brandInputs, function($query) {
                                        $query->whereIn('brand', $this->brandInputs);
                                    })
                                    ->when($this->priceInput, function($query) {

                                        $query->when($this->priceInput == 'high-to-low', function($q2) {
                                                $q2->orderBy('selling_price','DESC');
                                            })
                                            ->when($this->priceInput == 'low-to-high', function($q2) {
                                                $q2->orderBy('selling_price','ASC');
                                            });
                                    })
                                    ->where('status','0')
                                    ->get();
    }

    public function render()
    {
        $this->products = Product::where('category_id',$this->category->id)
                                    ->when($this->brandInputs, function($query) {
                                        $query->whereIn('brand', $this->brandInputs);
                                    })
                                    ->when($this->priceInput, function($query) {

                                        $query->when($this->priceInput == 'high-to-low', function($q2) {
                                                $q2->orderBy('selling_price','DESC');
                                            })
                                            ->when($this->priceInput == 'low-to-high', function($q2) {
                                                $q2->orderBy('selling_price','ASC');
                                            });
                                    })
                                    ->where('status','0')
                                    ->get();

        return view('livewire.frontend.product.index', [
            'products' => $this->products,
            'category' => $this->category
        ]);
    }
}
