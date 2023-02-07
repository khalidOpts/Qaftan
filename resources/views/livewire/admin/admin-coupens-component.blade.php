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
                    <span></span> All Coupons
                </div>
            </div>
        </div>
        <section class="mt-50 mb-50">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card-header">
                            All Coupons
                            <div class="row">
                                <div class="col md-6">
                                    <a href="{{route('admin.coupens.add')}}" class="btn btn-success float-end">Add New Coupons</a>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                        <div class="card-body">
                            @if(Session::has('message'))
                            <div class="alert alert-success" role="alert">{{Session::get('message')}}</div>
                            @endif
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        			
                                        <th>#</th>
                                        <th>Coupon code</th>
                                        <th>Coupon type</th>
                                        <th>Coupon value</th>
                                        <th>Coupon cart_value</th>
                                        <th>Expiry date</th>
                                        <th>Coupon Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $i = 1;
                                        // ($categories->currentPage()-1)*$categories->perPage();
                                    @endphp
                                    @foreach ($Coupens as $Coupen)
                                            <tr>
                                                <td>{{$i++}}</td>
                                                <td>{{$Coupen->code}}</td>
                                                <td>{{$Coupen->type}}</td>
                                                
                                                @if($Coupen->type == 'fixed')
                                                        <td>${{$Coupen->value}}</td>
                                                @else
                                                        <td>{{$Coupen->value}} %</td>
                                                @endif
                                                <td>{{$Coupen->cart_value}}</td>
                                                <td>{{$Coupen->expiry_date}}</td>
                                                <td>
                                                    <a href="{{route('admin.coupens.edit',['coupen_id'=>$Coupen->id])}}" class="text-info">Edit</a>
                                                    <a href="#" onclick="deleteConfirmation({{$Coupen->id}})" style="margin-left: 20px" class="text-danger">Delete</a>
                                                </td>
                                            </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
</div>             
<div class="modal" id="deleteConfirmation">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body pb-30 pt-30">
                <div class="row">
                    <div class="col-md-12 text-center">
                        <h4 class="pb-3">Do you want to delte this record ?</h4>
                        <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#deleteConfirmation">Cancel</button>
                        <button type="button" class="btn btn-danger" onclick="deleteCoupon()">Delete</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@push('scripts')
    <script>
        function deleteConfirmation(id){
            @this.set('coupen_id',id);
            $('#deleteConfirmation').modal('show');
        }
        function deleteCoupon(id){
            @this.call('deleteCoupon')
            $('#deleteConfirmation').modal('hide');
        }
    </script>
@endpush
