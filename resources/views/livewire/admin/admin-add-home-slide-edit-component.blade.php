<div>
    <style>
        .nav svg{
            height:20px;
        }
        .nav .hidden{
            display:block;
        }
    </style>
    <main class="main">
        <div class="page-header breadcrumb-wrap">
            <div class="container">
                <div class="breadcrumb">
                    <a href="/" rel="nofollow">Home</a>
                    <span></span> Edit Slide
                </div>
            </div>
        </div>
        <section class="mt-50 mb-50">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card-header">
                           <div class="row">
                            <div class="col-md-6">
                                Edit Slide
                            </div>
                            <div class="col-md-6">
                                <a href="{{route('admin.Home.slider')}}" class="btn btn-success float-end">All Slide</a>
                            </div>
                           </div>
                        </div>
                        <div class="card">
                            <div class="card-body">
                                @if(Session::has('message'))
                                    <div class="alert alert-success" role="alert">{{Session::get('message')}}</div>
                                @endif
                                <form wire:submit.prevent="UpdateSlide">
                                    <div class="mb-3 mt-3">
                                        <label  class="form-label">Top title</label>
                                        <input type="text"  class="form-control" placeholder="Enter Slider Top Title" wire:model="TopTitle" >
                                        @error('TopTitle')
                                            <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </div>
                                    <div class="mb-3 mt-3">
                                        <label  class="form-label">Title</label>
                                        <input type="text"  class="form-control" placeholder="Enter  Slider  Title" wire:model="Title">
                                        @error('Title')
                                        <p class="text-danger">{{$message}}</p>
                                    @enderror
                                    </div>
                                    <div class="mb-3 mt-3">
                                        <label  class="form-label">SubTitle</label>
                                        <input type="text"  class="form-control" placeholder="Enter Slider SubTitle" wire:model="SubTitle">
                                        @error('SubTitle')
                                        <p class="text-danger">{{$message}}</p>
                                    @enderror
                                    </div>
                                    <div class="mb-3 mt-3">
                                        <label  class="form-label">Offer</label>
                                        <input type="text"  class="form-control" placeholder="Enter Slider Offer" wire:model="Offer">
                                        @error('Offer')
                                        <p class="text-danger">{{$message}}</p>
                                    @enderror
                                    </div>
                                    <div class="mb-3 mt-3">
                                        <label  class="form-label">Link</label>
                                        <input type="text"  class="form-control" placeholder="Enter Slider Link" wire:model="Link">
                                        @error('Offer')
                                        <p class="text-danger">{{$message}}</p>
                                    @enderror
                                    </div>
                                    <div class="mb-3 mt-3">
                                        <label  class="form-label">Status</label>
                                        <select name="" class="form-select" wire:model="Status">
                                            <option value="1">Active</option>
                                            <option value="0">Inctive</option>
                                        </select>
                                        @error('Link')
                                        <p class="text-danger">{{$message}}</p>
                                    @enderror
                                    </div>
                                    <div class="mb-3 mt-3">
                                        <label  class="form-label">Image</label>
                                        <input type="file"  class="form-control"  wire:model="newImage">
                                        @if ($newImage)
                                                <img src="{{$newImage->temporaryUrl()}}" width="100"/>    
                                        @else
                                                <img src="{{asset('assets/imgs/sliders')}}/{{$Image}}" width="100"/>    
                                        @endif
                                        @error('Image')
                                            <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </div>
                                    <button type="submit" class="btn btn-primary float-end ">Update</button>
                                </form>
                            </div>
                    </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
</div>                                    
