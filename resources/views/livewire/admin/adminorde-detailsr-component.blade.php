<div>
    {{-- <style>
        .nav svg{
            height:20px;
        }
        .nav .hidden{
            display:block;
        }
    </style> --}}
    <main class="main">
        <div class="page-header breadcrumb-wrap">
            <div class="container">
                <div class="breadcrumb">
                    <a href="/" rel="nofollow">Home</a>
                    <span></span>  Order Details
                </div>
            </div>
        </div>
        <section class="mt-50 mb-50">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 mb-3">
                        <div class="card-header">
                            Order Details
                            <div class="row">
                                <div class="col md-6">
                                    <a href="{{route('admin.order')}}" class="btn btn-success btn-sm float-end mt-0">All Orders</a>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                        <div class="card-body">
                            <div class="table-responsive m-4">
                                <table class="table shopping-summery text-center clean">
                                    <thead>
                                        <tr class="main-heading">
                                            <th scope="col">Order Id</th>
                                            <th scope="col">Order Date</th>
                                            <th scope="col">Status</th>
                                            <th scope="col">Delivered Date</th>
                                            <th scope="col">Cancellation Date</th>
                                        </tr>   
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>{{$order->id}}</td>
                                            <td>{{$order->created_at}}</td>
                                            <td>{{$order->status}}</td>
                                            <td>{{$order->D}}</td>
                                            <td>{{$order->C}}</td>
                                        </tr>
                                    </tbody>
                                </table>  
                            </div>   
                        </div>
                    </div>
                    </div>
                    <div class="col-md-12 mb-3">
                        <div class="card-header">
                            <span class="m-3">Ordered items</span> 
              
                        </div>
                        <div class="card">
                        <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table shopping-summery text-center clean">
                                                <thead>
                                                    <tr class="main-heading">
                                                        <th scope="col">Image</th>
                                                        <th scope="col">Name</th>
                                                        <th scope="col">Price</th>
                                                        <th scope="col">Quantity</th>
                                                        <th scope="col">Subtotal</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                
                                                    @foreach ($order->orderItems as $item)
                                                            <tr>
                                                                <td class="image product-thumbnail"><img src="{{asset("assets/imgs/products")}}/{{$item->product->image}}" alt="{{$item->product->image}}"></td>
                                                                <td class="product-des product-name">
                                                                    <h5 class="product-name"><a href="product-details.html">{{$item->product->name}}</a></h5>
                                                                    {{-- <p class="font-xs">
                                                                        Maboriosam in a tonto nesciung eget<br> distingy magndapibus.
                                                                    </p> --}}
                                                                </td>
                                                                <td class="price" data-title="Price"><span>${{$item->price}} </span></td>
                                                                <td class="text-center" data-title="Stock">
                                                                    <div class="detail-qty border radius  m-auto">
                                                                        <span class="qty-val">{{$item->quantity}}</span>
                                                                    </div>
                                                                </td>
                                                                <td class="text-right" data-title="Cart">
                                                                    <span>${{ $item->quantity * $item->price}}</span>
                                                                </td>
                                                            </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                        </div>
                    </div>
                    </div>
                    <div class="col-md-12 mb-3">
                        <div class="card-header">
                            Billing Details
                        </div>
                            <div class="card">
                                                <div class="table-responsive m-4">
                                                    <table class="table shopping-summery text-center clean">
                                                        <thead>
                                                            <tr class="main-heading">
                                                                <th scope="col">First Name</th>
                                                                <th scope="col">Last Name</th>
                                                                <th scope="col">Mobile</th>
                                                                <th scope="col">Email</th>
                                                                <th scope="col">Line1</th>
                                                                <th scope="col">Line2</th>
                                                                <th scope="col">City</th>
                                                                <th scope="col">Province</th>
                                                                <th scope="col">Country</th>
                                                                <th scope="col">ZipCode</th>
                                                            </tr>   
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td>{{ $order->firstName}}</td>
                                                                <td>{{ $order->lastName}}</td>
                                                                <td>{{ $order->mobile}}</td>
                                                                <td>{{ $order->email}}</td>
                                                                <td>{{ $order->line1}}</td>
                                                                <td>{{ $order->line2}}</td>
                                                                <td>{{ $order->city}}</td>
                                                                <td>{{ $order->province}}</td>
                                                                <td>{{ $order->country}}</td>
                                                                <td>{{ $order->zipcode}}</td>
                                                            </tr>
                                                        </tbody>
                                                    </table>  
                                                </div>        
                                                  
                        </div>
                    </div>
                    @if($order->is_shipping_diffrent)
                        <div class="col-md-12 mb-3">
                            <div class="card-header">
                                shopping Details
                            </div>
                            <div class="card">
                            <div class="card-body">
                                <div class="table-responsive m-4">
                                    <table class="table shopping-summery text-center clean">
                                        <thead>
                                            <tr class="main-heading">
                                                <th scope="col">First Name</th>
                                                <th scope="col">Last Name</th>
                                                <th scope="col">Mobile</th>
                                                <th scope="col">Email</th>
                                                <th scope="col">Line1</th>
                                                <th scope="col">Line2</th>
                                                <th scope="col">City</th>
                                                <th scope="col">Province</th>
                                                <th scope="col">Country</th>
                                                <th scope="col">ZipCode</th>
                                            </tr>   
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>{{ $order->shipping->firstName}}</td>
                                                <td>{{ $order->shipping->lastName}}</td>
                                                <td>{{ $order->shipping->mobile}}</td>
                                                <td>{{ $order->shipping->email}}</td>
                                                <td>{{ $order->shipping->line1}}</td>
                                                <td>{{ $order->shipping->line2}}</td>
                                                <td>{{ $order->shipping->city}}</td>
                                                <td>{{ $order->shipping->province}}</td>
                                                <td>{{ $order->shipping->country}}</td>
                                                <td>{{ $order->shipping->zipcode}}</td>
                                            </tr>
                                        </tbody>
                                    </table>  
                                </div>     
                            </div>
                        </div>
                        </div>
                    @endif
                    <div class="col-md-12 mb-3">
                        <div class="card-header">
                        Transaction
                        </div>
                        <div class="card">
                        <div class="card-body">
                            <div class="table-responsive m-4">
                                <table class="table shopping-summery text-center clean">
                                    <thead>
                                        <tr class="main-heading">
                                            <th scope="col">Transaction Mode</th>
                                            <th scope="col">Status</th>
                                            <th scope="col">Transaction Date</th>
                                        </tr>   
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>{{ $order->transaction->mode}}</td>
                                            <td>{{ $order->transaction->status}}</td>
                                            <td>{{ $order->transaction->created_at}}</td>
                                        </tr>
                                    </tbody>
                                </table>  
                            </div>   
                        </div>
                    </div>
                    </div>
  
   
                </div>
            </div>
        </section>
    </main>
</div>             


