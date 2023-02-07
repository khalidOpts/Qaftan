<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Coupens;
class AdminAddCoupensComponent extends Component
{
    public $code;
    public $type;
    public $value;
    public $cart_value;
    public $expiry_date;

    public function updated($fields){
        $this->validateOnly($fields,[
            'code'=>'required|unique:_coupens',
            'type'=>'required',
            'value'=>'required|numeric',
            'cart_value'=>'required|numeric',
            'expiry_date'=>'required'
        ]);
    }
    public function storeCoupens(){
        $this->validate([
            'code'=>'required|unique:_coupens',
            'type'=>'required',
            'value'=>'required|numeric',
            'cart_value'=>'required|numeric',
            'expiry_date'=>'required'
   
        ]);
        $Coupen = new Coupens();
        $Coupen->code = $this->code;
        $Coupen->type = $this->type;
        $Coupen->value = $this->value;
        $Coupen->cart_value = $this->cart_value;
        $Coupen->expiry_date = $this->expiry_date;
        $Coupen->save();
        session()->flash('message','Coupon has been created successfully');
    }
    public function render()
    {
        return view('livewire.admin.admin-add-coupens-component')->layout('layouts.app');
    }
}
