<?php

namespace App\Http\Livewire\User;

use Livewire\Component;
use App\Models\order;
use Illuminate\Support\Facades\Auth;

class UserorderDetailsComponent extends Component
{
    public $order_id;
    public function mount($order_id){
        $this->order_id =$order_id;
    }
    public function render()
    {
        $order = order::where('user_id',Auth::user()->id)->where('id', $this->order_id)->first();
        return view('livewire.user.userorder-details-component',['order' => $order]);
    }
}
