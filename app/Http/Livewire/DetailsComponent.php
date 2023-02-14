<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;
use Cart;
class DetailsComponent extends Component
{
    public $slug;
    public function mount($slug){
        $this->$slug = $slug;
    }
    public function store($product_id,$product_name,$product_price){
        Cart::instance('cart')->add($product_id,$product_name,1,$product_price)->associate('\App\Models\Product');
        session()->flash('Success_Message','Item Added in Cart');
        $this->emitTo('cart-icon-component','refreshComponent');
        return redirect()->route('shop.cart');
}
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
public function addToWishList($product_id,$product_name,$product_price){
    Cart::instance('wishlist')->add($product_id,$product_name,1,$product_price)->associate('App\Models\Product');
    $this->emitTo('wish-list-icon-component','refreshComponent');
}
public function removeWishList($product_id){
    foreach(Cart::instance('wishlist')->content() as $Witem){
        if($Witem->id == $product_id){
            Cart::instance('wishlist')->remove($Witem->rowId);
            $this->emitTo('wish-list-icon-component','refreshComponent');
            return;
        }
    }
 }  
    public function render()
    {
        $product = Product::where('slug', $this->slug)->first();
        $rproducts = Product::where('category_id', $product->category_id)->inRandomOrder()->limit(4)->get();
        $nproducts = Product::latest()->take(4)->get();
        return view('livewire.details-component',['product'=>$product,'rproducts'=>$rproducts,'nproducts'=>$nproducts]);
    }
}
