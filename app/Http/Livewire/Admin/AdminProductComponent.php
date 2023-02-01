<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Product;
use livewire\WithPagination;
class AdminProductComponent extends Component
{
    use WithPagination;

    public $product_id;
    public function DeleteProduct(){
        $product = Product::find($this->product_id);
        unlink('assets/imgs/products/'.$product->image);
        $product->delete();
        session()->flash('message','Product has been deleted successfully');
    }
    public function render()
    {
        $products = Product::orderBy('created_at','DESC')->paginate(10);
        return view('livewire.admin.admin-product-component',['products'=>$products]);
    }
}
