<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\order;
class AdminordeDetailsrComponent extends Component
{

    public $order_id;
    public function mount($order_id){
        $this->order_id = $order_id;
    }
    public function render()
    {
        $order = order::find($this->order_id);
        return view('livewire.admin.adminorde-detailsr-component',['order'=>$order]);
    }
}
