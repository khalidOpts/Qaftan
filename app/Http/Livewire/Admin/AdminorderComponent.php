<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\order;
use Illuminate\Support\Facades\DB;
class AdminorderComponent extends Component
{
    public function updateOrderStatus($order_id, $status)
    {
        $order = order::find($order_id);
        if (!in_array($status, ['delivered', 'cancelled'])) {
            throw new \Exception('Invalid status code');
        }
        $order->status = $status;
        if ($status == 'delivered') {
            $order->D = DB::raw('CURRENT_DATE');
        } else if ($status == 'cancelled') {
            $order->C = DB::raw('CURRENT_DATE');
        }
        $order->save();
        session()->flash('order_message', 'Order status has been updated successfully');
    }
    
    public function render()
    {
        $orders = order::orderBy('created_at','DESC')->paginate(12);
        return view('livewire.admin.adminorder-component',['orders' => $orders]);
    }
}



