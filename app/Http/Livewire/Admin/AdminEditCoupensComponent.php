<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Coupens;
class AdminEditCoupensComponent extends Component
{
    public $code;
    public $type;
    public $value;
    public $cart_value;    
    public $coupen_id;
    public $expiry_date;

    public function mount($coupen_id){
        $Coupen = Coupens::find($coupen_id);
                $this->code  = $Coupen->code;
                $this->type  = $Coupen->type;
                $this->value  = $Coupen->value;
                $this->cart_value  = $Coupen->cart_value;
                $this->coupen_id  = $Coupen->id;
                $this->expiry_date  = $Coupen->expiry_date;
        $Coupen->save();

    }

    public function updated($fields){
        $this->validateOnly($fields,[
            'code'=>'required',
            'type'=>'required',
            'value'=>'required|numeric',
            'cart_value'=>'required|numeric',
            'expiry_date'=>'required'
        ]);
    }
    public function updateCoupens(){
        $this->validate([
            'code'=>'required',
            'type'=>'required',
            'value'=>'required|numeric',
            'cart_value'=>'required|numeric',
            'expiry_date'=>'required'
        ]);
        $Coupen = Coupens::find($this->coupen_id);
        $Coupen->code = $this->code;
        $Coupen->type = $this->type;
        $Coupen->value = $this->value;
        $Coupen->cart_value = $this->cart_value;
        $Coupen->expiry_date= $this->expiry_date;
        $Coupen->save();
        session()->flash('message','Coupon has been Updated successfully');
    }
    public function render()
    {
        return view('livewire.admin.admin-edit-coupens-component')->layout('layouts.app');
    }
}
