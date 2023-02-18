<div>
    <main class="main">
        <div class="page-header breadcrumb-wrap">
            <div class="container">
                <div class="breadcrumb">
                    <a href="/" rel="nofollow">Home</a>
                    <span></span> All Orders
                </div>
            </div>
        </div>
        <section class="mt-50 mb-50">
            <div class="container">
                <div class="row">
                    @if(count($orders) > 0) 
                    <div class="col-md-12">
                        <div class="card-header">
                            All Orders
                        </div>
                        <div class="card">
                        <div class="card-body">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>OrderId</th>
                                        <th>Subtotal</th>
                                        <th>Discount</th>
                                        <th>Total</th>
                                        <th>First Name</th>
                                        <th>Last Name</th>
                                        <th>Mobile</th>
                                        <th>Email</th>
                                        <th>ZipCode</th>
                                        <th>Status</th>
                                        <th>Order Date</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($orders as $order)
                                            <tr>
                                                <td>{{$order->id}}</td>
                                                <td>${{$order->subtotal}}</td>
                                                <td>${{$order->discount}}</td>
                                                <td>${{$order->total}}</td>
                                                <td>{{$order->firstName}}</td>
                                                <td>{{$order->lastName}}</td>
                                                <td>{{$order->mobile}}</td>
                                                <td>{{$order->email}}</td>
                                                <td>{{$order->zipcode}}</td>
                                                <td>{{$order->status}}</td>
                                                <td>{{$order->created_at}}</td>
                                                <td>
                                                    <a href="{{route('user.orders.details',['order_id'=>$order->id])}}"  style="margin-left: 20px" class="btn btn-info btn-sm">Details</a>
                                                </td>
                                            </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            {{$orders->links()}}
                        </div>
                    </div>
                    </div>
                    @else
                    <div class="col-md-12 text-center">
                        <h2> you have no orders yet!</h2>
                        <p>add somthing now.</p>
                        <a href="{{route('shop')}}" class="btn btn-submit btn-submitx">Continue Shopping</a>
                    </div>
                    @endif
                </div>
            </div>
        </section>
    </main>
</div>             


