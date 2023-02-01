<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Illuminate\Support\Str;
use Carbon\Carbon;
use App\Models\HomeSlider;
use Livewire\WithFileUploads;
class AdminAddHomeSlideComponent extends Component
{
    use WithFileUploads;  

    public $TopTitle;
    public $Title;
    public $SubTitle;
    public $Offer;
    public $Link;
    public $Status = 0;
    public $Image;

    public function addSlide(){
        $this->validate([
            'TopTitle'=>'required',
            'Title'=>'required',
            'SubTitle'=>'required',
            'Offer'=>'required',
            'Link'=>'required',
            'Status'=>'required',
            'Image'=>'required',
        ]);
        $slide = new HomeSlider();
        $slide->top_title = $this->TopTitle;
        $slide->title = $this->Title;
        $slide->sub_title = $this->SubTitle;
        $slide->offer = $this->Offer;
        $slide->link = $this->Link;
        $slide->status = $this->Status;

        $ImageName = Carbon::now()->timestamp.'.'.$this->Image->extension();
        $this->Image->storeAs('sliders',$ImageName); 
        $slide->Image = $ImageName;
        $slide->save();
        session()->flash('message', 'slide has been added successfully');
    }
    public function render()
    {
        return view('livewire.admin.admin-add-home-slide-component');
    }
}
