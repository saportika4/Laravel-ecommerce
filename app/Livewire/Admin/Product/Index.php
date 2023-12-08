<?php

namespace App\Livewire\Admin\Product;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\File;

class Index extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $product_id;

    public function DeleteProduct($product_id)
    {
        $this->product_id = $product_id;
    }

    public function DestroyProduct()
    {
        $product = Product::findOrfail($this->product_id);
        if($product->productImages){
            foreach($product->productImages as $image){
                if(File::exists($image->image)){
                    File::delete($image->image);
                }
            }
        }

        $product->delete();
        session()->flash('message', 'Category Deleted');
        $this->dispatch('close-model');
    }

    public function render()
    {
        $products = Product::orderBy('id','DESC')->paginate(10);
        return view('livewire.admin.product.index',['products' => $products]);
    }
}
