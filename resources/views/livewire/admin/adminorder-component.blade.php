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
                    <div class="col-md-12">
                        <div class="card-header">
                            All Orders
                        </div>
                        <div class="card">
                        <div class="card-body">
                            @if (Session::has('order_message'))
                                <div class="alert alert-success" role="alert">{{Session::get('order_message')}}</div>
                            @endif
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
                                        <th colspan="2" class="text-center">Actions</th>
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
                                                    <a href="{{route('admin.orderDetails',['order_id'=>$order->id])}}"  style="margin-left: 20px" class="btn btn-info btn-sm">Details</a>
                                                    <td class="dropdown" >
                                                        <ul class="dropdown" >
                                                            <li class="nav-item dropdown" >
                                                              <a class="nav-link dropdown-toggle" class="btn btn-success btn-sm" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">Status</a>
                                                              <ul class="dropdown-menu">
                                                                <li><a class="dropdown-item" wire:click.prevent="updateOrderStatus({{$order->id}},'delivered')" href="#">Delivered</a></li>
                                                                <li><a class="dropdown-item" wire:click.prevent="updateOrderStatus({{$order->id}},'cancelled')" href="#">Canceled</a></li>
                                                              </ul>
                                                            </li>
                                                          </ul>
                                                    </td>
                                                </td>
                                            </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            {{$orders->links()}}
                        </div>
                    </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
</div>             


