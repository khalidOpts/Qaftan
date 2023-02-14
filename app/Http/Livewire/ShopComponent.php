<?php

namespace App\Http\Livewire;
use App\Models\Product;
use App\Models\Category;
use Livewire\Component;
use Livewire\WithPagination;
use Cart;
class ShopComponent extends Component
{
    use WithPagination;

    public $pageSize = 12;
    public $orderBy = "Default Sorting";
    public $min_value = 0;
    public $max_value = 1000;

    public function store($product_id,$product_name,$product_price){
                Cart::instance('cart')->add($product_id,$product_name,1,$product_price)->associate('\App\Models\Product');
                session()->flash('Success_Message','Item Added in Cart');
                $this->emitTo('cart-icon-component','refreshComponent');
                return redirect()->route('shop.cart');
    }
    public function changePageSize($size){
        $this->pageSize = $size;
    }
    public function changeOrderBy($ordre){
        $this->orderBy = $ordre;
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
    public function render(){   
        if( $this->orderBy == "Price: Low to High"){
        $products = Product::whereBetween('regular_price',[$this->min_value,$this->max_value])->orderBy('regular_price','ASC')->paginate($this->pageSize);
        }
        else if($this->orderBy == "Price: High to Low"){
            $products = Product::whereBetween('regular_price',[$this->min_value,$this->max_value])->orderBy('regular_price','DESC')->paginate($this->pageSize);
        }
        else if($this->orderBy == "Sort By newness"){
            $products = Product::whereBetween('regular_price',[$this->min_value,$this->max_value])->orderBy('created_at','DESC')->paginate($this->pageSize);
        }
        else{
            $products = Product::whereBetween('regular_price',[$this->min_value,$this->max_value])->paginate($this->pageSize);
        }
        $categories = Category::orderBy('name', 'ASC')->get();

        $lproduct = Product::orderBy('created_at', 'DESC')->get()->take(3);
        return view('livewire.shop-component',['products' => $products,'categories' => $categories,'lproduct' => $lproduct]);
    }
}
