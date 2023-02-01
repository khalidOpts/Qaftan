<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Cart;
class WishListComponent extends Component
{
    public function removeWishList($product_id){
        foreach(Cart::instance('wishlist')->content() as $Witem){
            if($Witem->id == $product_id){
                Cart::instance('wishlist')->remove($Witem->rowId);
                $this->emitTo('wish-list-component','refreshComponent');
                return;
            }
        }
     }   
    public function render()
    {
        return view('livewire.wish-list-component');
    }
}
