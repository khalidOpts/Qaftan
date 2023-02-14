<div>
    <main class="main ">
        <div class="page-header breadcrumb-wrap">
            <div class="container">
                <div class="breadcrumb">
                    <a href="index.html" rel="nofollow">Home</a>
                    <span></span> Shop
                    <span></span> Checkout
                </div>
            </div>
        </div>
        <section class="mt-50 mb-50">
            <div class="container">
                    <form wire:submit.prevent="palceOrder">
                                <div class="row">
                                    <div class="text-center">
                                        <h3>Process To Checkout</h3>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="divider mt-50 mb-50"></div>
                                    </div>
                                </div>
                                <div class="row order_review">
                                    <h4 class="my-2">BILLING ADDRESS</h4>
                                    <div class="col-md-6">
                                            <p class="row-in-form">
                                                <label >first name<span>*</span></label>
                                                <input  type="text" name="fname" value="" placeholder="Your name" wire:model="firstname">
                                                @error('firstname')
                                                    <span class="text-danger">{{$message}}</span>
                                                @enderror
                                            </p>
                                            <p class="row-in-form">
                                                <label >last name<span>*</span></label>
                                                <input  type="text" name="lname" value="" placeholder="Your last name" wire:model="lastname">
                                                @error('lastname')
                                                <span class="text-danger">{{$message}}</span>
                                                @enderror
                                            </p>
                                            <p class="row-in-form">
                                                <label >Email Addreess:</label>
                                                <input  type="email" name="email" value="" placeholder="Type your email" wire:model="email">
                                                @error('email')
                                                <span class="text-danger">{{$message}}</span>
                                                @enderror
                                            </p>
                                            <p class="row-in-form">
                                                <label >Phone number<span>*</span></label>
                                                <input  type="number" name="phone" value="" placeholder="10 digits format" wire:model="mobile">
                                                @error('mobile')
                                                <span class="text-danger">{{$message}}</span>
                                                @enderror
                                            </p>
                                            <p class="row-in-form">
                                                <label >line1:</label>
                                                <input  type="text" name="add" value="" placeholder="Street at apartment number" wire:model="line1">
                                                @error('line1')
                                                <span class="text-danger">{{$message}}</span>
                                                @enderror
                                            </p>
                                    </div>
                                    <div class="col-md-6">

                                            <p class="row-in-form">
                                                <label >line2:</label>
                                                <input  type="text" name="add" value="" placeholder="Street at apartment number" wire:model="line2">
                                                @error('line2')
                                                <span class="text-danger">{{$message}}</span>
                                                @enderror
                                            </p>
                                            <p class="row-in-form">
                                                <label >Country<span>*</span></label>
                                                <input  type="text" name="country" value="" placeholder="United States" wire:model="country">
                                                @error('country')
                                                <span class="text-danger">{{$message}}</span>
                                                @enderror
                                            </p>
                                            <p class="row-in-form">
                                                <label >Province</label>
                                                <input  type="text" name="zip-code" value="" placeholder="Your postal code" wire:model="province">
                                                @error('province')
                                                <span class="text-danger">{{$message}}</span>
                                                @enderror
                                            </p>
                                            <p class="row-in-form">
                                                <label >Town / City<span>*</span></label>
                                                <input type="text" name="city" value="" placeholder="City name" wire:model="city"> 
                                                @error('city')
                                                <span class="text-danger">{{$message}}</span>
                                                @enderror
                                            </p>
                                            <p class="row-in-form">
                                                <label >Postcode / ZIP:</label>
                                                <input  type="text" name="zip-code" value="" placeholder="Your postal code" wire:model="zipcode">
                                                @error('zipcode')
                                                <span class="text-danger">{{$message}}</span>
                                                @enderror
                                            </p>
                                    </div>
                                </div>
                                        <div class="form-check my-3" >
                                            <label>
                                            Ship to a diffrent location?
                                            </label>
                                            <input style="box-shadow: none;"  class="form-check-input" value="1" type="checkbox" wire:model="ship_to_diffrent">
                                        </div>
                                    @if($ship_to_diffrent)
                                                    <div class="row order_review">
                                                            <h4 class="my-2">SHIPPING ADDRESS</h4>
                                                            <div class="col-md-6">
                                                                    <p class="row-in-form">
                                                                        <label >first name<span>*</span></label>
                                                                        <input  type="text" name="s_firstname" value="" placeholder="Your name" wire:model="s_firstname">
                                                                        @error('s_firstname')
                                                                        <span class="text-danger">{{$message}}</span>
                                                                        @enderror
                                                                    </p>
                                                                    <p class="row-in-form">
                                                                        <label >last name<span>*</span></label>
                                                                        <input  type="text" name="s_lastname" value="" placeholder="Your last name" wire:model="s_lastname">
                                                                        @error('s_lastname')
                                                                        <span class="text-danger">{{$message}}</span>
                                                                        @enderror
                                                                    </p>
                                                                    <p class="row-in-form">
                                                                        <label >Email Addreess:</label>
                                                                        <input  type="email" name="s_email" value="" placeholder="Type your email" wire:model="s_email">
                                                                        @error('s_email')
                                                                        <span class="text-danger">{{$message}}</span>
                                                                        @enderror
                                                                    </p>
                                                                    <p class="row-in-form">
                                                                        <label >Phone number<span>*</span></label>
                                                                        <input  type="number" name="s_mobile" value="" placeholder="10 digits format" wire:model="s_mobile">
                                                                        @error('s_mobile')
                                                                        <span class="text-danger">{{$message}}</span>
                                                                        @enderror
                                                                    </p>
                                                                    <p class="row-in-form">
                                                                        <label >line1:</label>
                                                                        <input  type="text" name="s_line1" value="" placeholder="Street at apartment number" wire:model="s_line1">
                                                                        @error('s_line1')
                                                                        <span class="text-danger">{{$message}}</span>
                                                                        @enderror
                                                                    </p>
                                                            </div>
                                                            <div class="col-md-6">
                                                                    <p class="row-in-form">
                                                                        <label >line2:</label>
                                                                        <input  type="text" name="s_line2" value="" placeholder="Street at apartment number" wire:model="s_line2">
                                                                        @error('s_line2')
                                                                        <span class="text-danger">{{$message}}</span>
                                                                        @enderror
                                                                    </p>
                                                                    <p class="row-in-form">
                                                                        <label >Country<span>*</span></label>
                                                                        <input  type="text" name="s_country" value="" placeholder="United States" wire:model="s_country">
                                                                        @error('s_country')
                                                                        <span class="text-danger">{{$message}}</span>
                                                                        @enderror
                                                                    </p>
                                                                    <p class="row-in-form">
                                                                        <label >Province</label>
                                                                        <input  type="text" name="s_province" value="" placeholder="Your postal code" wire:model="s_province">
                                                                        @error('s_province')
                                                                        <span class="text-danger">{{$message}}</span>
                                                                        @enderror
                                                                    </p>
                                                                    <p class="row-in-form">
                                                                        <label >Town / City<span>*</span></label>
                                                                        <input type="text" name="s_city" value="" placeholder="City name" wire:model="s_city">
                                                                        @error('s_city')
                                                                        <span class="text-danger">{{$message}}</span>
                                                                        @enderror
                                                                    </p>
                                                                    <p class="row-in-form">
                                                                        <label >Postcode / ZIP:</label>
                                                                        <input  type="number" name="s_city" value="" placeholder="Your postal code" wire:model="s_zipcode">
                                                                        @error('s_zipcode')
                                                                        <span class="text-danger">{{$message}}</span>
                                                                        @enderror
                                                                    </p>
                                                    </div>
                                                </div>
                                                @endif                
                                <div class="row">
                                    <div class="col-12">
                                        <div class="divider mt-50 mb-50"></div>
                                    </div>
                                </div>
                                {{-- payment methods --}}
                              @if ($paymentMode == 'card')
                                <div class="col-md-6 mb-2">
                                    <div class="row order_review">
                                        @if(Session::has('payPal_error'))
                                            <div class="alert alert-danger" role="alert">{{Session::get('payPal_error')}}</div>
                                        @endif
                                        
                                        <p class="row-in-form">
                                            <label >firstName:</label>
                                            <input  type="text" name="firstName" value="" placeholder="enter Your firstName" wire:model="firstName">
                                            @error('firstName')
                                                <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </p>
                                        <p class="row-in-form">
                                            <label >lastName:</label>
                                            <input  type="text" name="lastName" value="" placeholder="enter Your lastName" wire:model="lastName">
                                            @error('lastName')
                                                <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </p>
                                        <p class="row-in-form">
                                            <label >Card Number:</label>
                                            <input  type="text" name="card-no" value="" placeholder="Your Card number" wire:model="card_num">
                                            @error('card_num')
                                                <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </p>
                                        <p class="row-in-form">
                                            <label >Expiry Month:</label>
                                            <input  type="text" name="Expiry_Month" value="" placeholder="MM" wire:model="exp_month">
                                            @error('exp_month')
                                                <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </p>
                                        <p class="row-in-form">
                                            <label >Expiry Year:</label>
                                            <input  type="text" name="Expiry_Year" value="" placeholder="YY" wire:model="exp_year">
                                            @error('exp_year')
                                                <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </p>
                                        <p class="row-in-form">
                                            <label >CVC</label>
                                            <input  type="password" name="CVC" value="" placeholder="CVC" wire:model="cvc">
                                            @error('cvc')
                                                <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </p>
                                    </div>
                                </div>
                              @endif  
                                <div class="col-md-6">
                                    <div class="row order_review">
                                            <div class="payment_method">
                                                    <div class="mb-25">
                                                        <h5>Payment</h5>
                                                    </div>
                                                    <div class="payment_option">
                                                        <div class="form-check">
                                                                <input class="form-check-input" type="radio" name="exampleRadios" id="payment" value="cod"  wire:model="paymentMode">
                                                                <label class="form-check-label" for="exampleRadios1">
                                                                Cod
                                                                </label>
                                                        </div>
                                                        <div class="form-check">
                                                                <input class="form-check-input" type="radio" name="exampleRadios" id="payment" value="card" wire:model="paymentMode">
                                                                <label class="form-check-label" for="exampleRadios1">
                                                                Card
                                                                </label>
                                                        </div>
                                                        
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="payment_gateway" id="payment" value="paypal" wire:model="paymentMode">
                                                                <label class="form-check-label" for="exampleRadios1">
                                                                PayPall
                                                                </label>
                                                        </div>
                                                        @error('paymentMode')
                                                            <span class="text-danger">{{$message}}</span>
                                                        @enderror
                                                        @if(Session::has('checkout'))
                                                                <div class="table-responsive ">
                                                                    <table class="table  w-100">
                                                                            <thead>
                                                                                <tr>
                                                                                    <td class="font-lg fw-300">
                                                                                        Total
                                                                                    </td>
                                                                                    <td class="font-lg fw-900 text-brand">
                                                                                    ${{Session::get('checkout')['total']}}
                                                                                    </td>
                                                                                </tr>
                                                                            </thead>
                                                                    </table>
                                                                </div>    
                                                        @endif                
                                                    </div>
                                            </div>
                                            <button type="submit" class="btn btn-fill-out btn-block ">Place Order</button>
                                    </div>
                                </div>
                            </form>
            </div>
        </section>
    </main>
</div>

