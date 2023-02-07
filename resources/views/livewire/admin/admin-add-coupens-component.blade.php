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
                    <span></span> Add New Coupon
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
                                Add New Coupon
                            </div>
                            <div class="col-md-6">
                                <a href="{{route('admin.coupens')}}" class="btn btn-success float-end">All Coupon</a>
                            </div>
                           </div>
                        </div>
                        <div class="card">
                            <div class="card-body">
                                @if(Session::has('message'))
                                    <div class="alert alert-success" role="alert">{{Session::get('message')}}</div>
                                @endif
                                <form wire:submit.prevent="storeCoupens">
                                    <div class="mb-3 mt-3">
                                        <label for="code" class="form-label">code</label>
                                        <input type="text" name="code" class="form-control" placeholder="enter Coupon code " wire:model="code"  >
                                        @error('code')
                                            <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </div>
                                    <div class="mb-3 mt-3">
                                        <label for="type" class="form-label">type</label>
                                        <select name="type" class="form-control" wire:model="type">
                                            <option value="percent">Select</option>
                                            <option value="fixed">Fixed</option>
                                            <option value="percent">Percent</option>
                                        </select>
                                        @error('type')
                                            <p class="text-danger">{{$message}}</p>
                                         @enderror
                                    </div>
                                    <div class="mb-3 mt-3">
                                        <label for="value" class="form-label">value</label>
                                        <input type="text" name="type" class="form-control" placeholder="enter Coupon value" wire:model="value">
                                        @error('value')
                                            <p class="text-danger">{{$message}}</p>
                                         @enderror
                                    </div>
                                    <div class="mb-3 mt-3">
                                        <label for="cart_value" class="form-label">cart_value</label>
                                        <input type="text" name="cart_value" class="form-control" placeholder="enter Coupon cart_value" wire:model="cart_value">
                                        @error('cart_value')
                                            <p class="text-danger">{{$message}}</p>
                                         @enderror
                                    </div>
                                    <div class="mb-3 mt-3" >
                                        <label for="expiry_date" class="form-label">expiry date</label>
                                                    <input type="date"  name="expiry_date" id="expiry_date" class="form-control" placeholder="enter Coupon expiry date" wire:model="expiry_date">
                                                    @error('expiry_date')
                                                        <p class="text-danger">{{$message}}</p>
                                                    @enderror
                                    </div>
                                    <button type="submit" class="btn btn-primary float-end ">Submit</button>
                                </form>
                            </div>
                    </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
</div>    

