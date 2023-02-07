<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Coupens;
class AdminCoupensComponent extends Component
{
    public $coupen_id;
    public function deleteCoupon(){
        $Coupens = Coupens::find($this->coupen_id);
        $Coupens->delete();
        session()->flash('message','Coupen has been deleted successfully!');
    }
    public function render()
    {
        $Coupens = Coupens::all();
        return view('livewire.admin.admin-coupens-component',['Coupens'=>$Coupens])->layout('layouts.app');
    }
}
