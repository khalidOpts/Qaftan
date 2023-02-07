<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Product;
use Cart;

class CartComponent extends Component
{


    public function increaseQuantity($rowId){
        $product = Cart::instance('cart')->get($rowId);
        $qty = $product->qty+1;
        Cart::instance('cart')->update($rowId,$qty);
        $this->emitTo('cart-icon-component','refreshComponent');
    }
    public function decreaseQuantity($rowId){
        $product = Cart::instance('cart')->get($rowId);
        $qty = $product->qty-1;
        Cart::instance('cart')->update($rowId,$qty);
        $this->emitTo('cart-icon-component','refreshComponent');

    }
    public function destroy($id){
        Cart::instance('cart')->remove($id);
        session()->flash('Success_Message','Item has been Removed');
        $this->emitTo('cart-icon-component','refreshComponent');

    }
    public function clearAll(){
        Cart::instance('cart')->destroy();
        session()->flash('Success_Message','All Items has been Removed');
        $this->emitTo('cart-icon-component','refreshComponent');

    }
    public function render()
    {
        $product = Product::get();
        return view('livewire.cart-component',['product'=>$product]);
    }
}
