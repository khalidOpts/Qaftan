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
                    <span></span> Add New Product
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
                                Add New Product
                            </div>
                            <div class="col-md-6">
                                <a href="{{route('admin.products')}}" class="btn btn-success float-end">All Categories</a>
                            </div>
                           </div>
                        </div>
                        <div class="card">
                            <div class="card-body">
                                @if(Session::has('message'))
                                    <div class="alert alert-success" role="alert">{{Session::get('message')}}</div>
                                @endif
                                <form wire:submit.prevent="UpdateProduct" enctype="multipart/form-data">
                                    <div class="mb-3 mt-3">
                                        <label for="name" class="form-label">Name</label>
                                        <input type="text" name="name" class="form-control" placeholder="Enter Product Name" wire:model="name"  wire:keyup="generateSlug">
                                        @error('name')
                                            <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </div>
                                    <div class="mb-3 mt-3">
                                        <label for="slug" class="form-label">Slug</label>
                                        <input type="text" name="slug" class="form-control" placeholder="Enter Product Slug" wire:model="slug">
                                        @error('slug')
                                        <p class="text-danger">{{$message}}</p>
                                    @enderror
                                    </div>
                                    <div class="mb-3 mt-3">
                                        <label for="short_Description" class="form-label">short Description</label>
                                        <textarea  name="short_Description"  class="form-control"placeholder="Enter Product short Description" wire:model="short_description"></textarea>
                                        @error('short_description')
                                        <p class="text-danger">{{$message}}</p>
                                    @enderror
                                    </div>
                                    <div class="mb-3 mt-3">
                                        <label for="Description" class="form-label"> Description</label>
                                        <textarea  name="Description"  class="form-control"placeholder="Enter Product Description"  wire:model="description"></textarea>
                                        @error('description')
                                        <p class="text-danger">{{$message}}</p>
                                    @enderror
                                    </div>
                                    <div class="mb-3 mt-3">
                                        <label for="regular_price" class="form-label">regular price</label>
                                        <input type="text" name="regular_price" class="form-control" placeholder="Enter regular price" wire:model="regular_price">
                                        @error('regular_price')
                                        <p class="text-danger">{{$message}}</p>
                                    @enderror
                                    </div>
                                    <div class="mb-3 mt-3">
                                        <label for="sale_price" class="form-label">sale price</label>
                                        <input type="text" name="sale_price" class="form-control" placeholder="Enter sale price" wire:model="sale_price">
                                        @error('sale_price')
                                        <p class="text-danger">{{$message}}</p>
                                    @enderror
                                    </div>
                                    <div class="mb-3 mt-3">
                                        <label for="SKU" class="form-label">SKU</label>
                                        <input type="text" name="SKU" class="form-control" placeholder="Enter SKU" wire:model="SKU">
                                        @error('SKU')
                                            <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </div>
                                    <div class="mb-3 mt-3">
                                        <label for="stock_status" class="form-label">Stock Status</label>
                                            <select name="stock_status" class="form-control" wire:model="stock_status">
                                                <option value="InStock">InStock</option>
                                                <option value="OutOfStock">OutOfStock</option>
                                            </select>
                                        @error('Stock Status')
                                            <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </div>
                                    <div class="mb-3 mt-3">
                                        <label for="featured" class="form-label">Featured</label>
                                            <select name="featured" class="form-control" wire:model="featured">
                                                <option value="0">No</option>
                                                <option value="1">Yes</option>
                                            </select>
                                        @error('featured')
                                            <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </div>
                                    <div class="mb-3 mt-3">
                                        <label for="quantity" class="form-label">Quantity</label>
                                        <input type="text" name="quantity" class="form-control" placeholder="Enter Product Quantity" wire:model="quantity">
                                        @error('quantity')
                                            <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </div>
                                    <div class="mb-3 mt-3">
                                        <label for="Image" class="form-label">Product Image</label>
                                        <input type="file" class="form-control" name="image" wire:model="newImage">
                                        @if($newImage)
                                            <img src="{{$newImage->temporaryUrl()}}" alt="temporary" width="120">
                                        @else    
                                            <img src="{{asset('assets/imgs/products')}}/{{$image}}" alt="temporary" width="120">
                                        @endif    
                                        @error('newImage')
                                            <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </div>
                                    <div class="mb-3 mt-3">
                                        <label for="Category_id" class="form-label">Category</label>
                                            <select name="category_id" class="form-control" wire:model="category_id">
                                                <option value="0">Select Category</option>
                                                    @foreach ($categories as $category)
                                                    <option value="{{$category->id}}">{{$category->name}}</option>
                                                    @endforeach
                                            </select>
                                        @error('category_id')
                                            <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </div>
                                    <button type="submit" class="btn btn-primary float-end ">Edit</button>
                                </form>
                            </div>
                    </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
</div>                                    
