<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\HomeSlider;
use App\Models\Product;
use Cart;
class HomeComponent extends Component
{
    public function store($product_id,$product_name,$product_price){
        Cart::instance('cart')->add($product_id,$product_name,1,$product_price)->associate('\App\Models\Product');
        session()->flash('Success_Message','Item Added in Cart');
        $this->emitTo('cart-icon-component','refreshComponent');
        return redirect()->route('shop.cart');
}
    public function render()
    {
        $Slides = HomeSlider::where('status',1)->get();
        $lproduct = Product::orderBy('created_at', 'DESC')->get()->take(8);
        $fproduct = Product::where('featured',1)->inRandomOrder()->get()->take(8);
        return view('livewire.home-component',['Slides' => $Slides,'lproduct'=>$lproduct,'fproduct'=>$fproduct]);
    }
}
