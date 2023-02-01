<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\HomeSlider;
class HomeComponent extends Component
{
    public function render()
    {
        $Slides = HomeSlider::where('status',1);
        return view('livewire.home-component');
    }
}
