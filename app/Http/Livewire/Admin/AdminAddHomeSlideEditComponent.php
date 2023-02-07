<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Illuminate\Support\Str;
use Carbon\Carbon;
use App\Models\HomeSlider;
use Livewire\WithFileUploads;

class AdminAddHomeSlideEditComponent extends Component
{
    use WithFileUploads;  

    public $TopTitle;
    public $Title;
    public $SubTitle;
    public $Offer;
    public $Link;
    public $Status = 0;
    public $Image;
    public $slide_id;
    public $newImage;


    public function mount($slide_id){
       $slide = HomeSlider::find($slide_id);
       $this->TopTitle    = $slide->top_title ;  
           $this->Title    = $slide->title     ;  
       $this->SubTitle    = $slide->sub_title ;  
           $this->Offer    = $slide->offer     ;  
            $this->Link    = $slide->link      ;  
          $this->Status    = $slide->status    ;  
        $this->Image    = $slide->image     ;  
       $this->slider_id    = $slide->id        ;  
    }

    public function UpdateSlide(){
        $this->validate([
            'TopTitle'=>'required',
            'Title'=>'required',
            'SubTitle'=>'required',
            'Offer'=>'required',
            'Link'=>'required',
            'Status'=>'required'
        ]);
        $slide = HomeSlider::find($this->slide_id);
        $slide->top_title = $this->TopTitle;
        $slide->title = $this->Title;
        $slide->sub_title = $this->SubTitle;
        $slide->offer = $this->Offer;
        $slide->link = $this->Link;
        $slide->status = $this->Status;
        if($this->newImage){
            unlink('assets/imgs/sliders/'.$slide->image);
            $ImageName = Carbon::now()->timestamp.'.'.$this->newImage->extension();
            $this->newImage->storeAs('sliders',$ImageName); 
            $slide->Image = $ImageName;
        }
        $slide->save();
        session()->flash('message', 'slide has been Updated successfully');
    }

    public function render()
    {
        return view('livewire.admin.admin-add-home-slide-edit-component');
    }
}
