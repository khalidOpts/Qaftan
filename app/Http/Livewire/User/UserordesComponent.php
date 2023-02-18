<?php

namespace App\Http\Livewire\User;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\order;
use Illuminate\Support\Facades\DB;

class UserordesComponent extends Component
{

    public function render()
    {
        $orders = order::where('user_id',Auth::user()->id)->paginate(12);
        return view('livewire.user.userordes-component',['orders'=>$orders]);
    }
}
