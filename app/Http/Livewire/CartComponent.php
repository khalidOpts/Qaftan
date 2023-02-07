<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Product;
use App\Models\Coupens;
use Cart;
use Carbon\Carbon;

class CartComponent extends Component
{
    public $Coupon;
    public $CouponCode;
    public $discount;
    public $subtotalAfterDiscount;
    public $TotalAfterDiscount;

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
    public function applyCouponCode(){
        $Coupon = Coupens::where('code',$this->CouponCode)->where('expiry_date','>=',Carbon::today())->where('cart_value','<=',Cart::instance('cart')->subtotal())->first();
        if(!$Coupon){
            session()->flash('coupon_message','Code is invalid!');
            return;
        }

        session()->put('coupon',[
            'code'=>$Coupon->code,
            'type'=>$Coupon->type,
            'value'=>$Coupon->value,
            'cart_value'=>$Coupon->cart_value,
        ]);
    }
    public function calculateDiscount(){
        if(session()->has('coupon')){
            if(session()->get('coupon') == 'fixed' ){
                $this->discount = session()->get('coupon')['value'];
            }else{
                $this->discount = (Cart::instance('cart')->subtotal()*session()->get('coupon')['value'])/100;
            }
            $this->subtotalAfterDiscount = Cart::instance('cart')->subtotal() - $this->discount;
            $this->TotalAfterDiscount = $this->subtotalAfterDiscount;
        }
    }
    public function removeCoupon(){
        session()->forget('coupon');
    }
    public function render()
    {
        $product = Product::get();
        if(session()->has('coupon')){
            if(Cart::instance('cart')->subtotal() < session()->get('coupon')['cart_value']){
                session()->forget('coupon');
             }else{
                $this->calculateDiscount();
             }
        }
        return view('livewire.cart-component',['product'=>$product]);
    }
}
