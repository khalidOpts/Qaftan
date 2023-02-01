<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Livewire\WithFileUploads;
class AdminEditProductComponent extends Component
{
    use WithFileUploads;
    public $product_id;
    public $name;
    public $slug;
    public $short_description;
    public $description;
    public $regular_price;
    public $sale_price;
    public $SKU;
    public $stock_status = "inStock";
    public $featured = 0; 
    public $quantity;
    public $image;
    public $category_id;
    public $newImage;

    public function mount($product_id){
       $product = Product::find($product_id);
        $this->product_id =$product->id;
        $this->name =$product->name;
        $this->slug =$product->slug;
        $this->short_description =$product->short_description;
        $this->description =$product->description;
        $this->regular_price =$product->regular_price;
        $this->sale_price =$product->sale_price;
        $this->SKU =$product->SKU;
        $this->stock_status =$product->stock_status;
        $this->featured =$product->featured;
        $this->quantity =$product->quantity;
        $this->image =$product->image;
        $this->category_id =$product->category_id;
    }
    public function generateSlug(){
        $this->slug = Str::slug($this->name);
    }

    public function UpdateProduct(){
        $this->validate([
            'name'=>'required',
            'slug'=>'required',
            'short_description'=>'required',
            'description'=>'required',
            'regular_price'=>'required',
            'sale_price'=>'required',
            'SKU'=>'required',
            'stock_status'=>'required',
            'featured'=>'required',
            'quantity'=>'required',
            'image'=>'required',
            'category_id'=>'required'
        ]);
        $product =  Product::find($this->category_id);
        $product->name = $this->name;
        $product->slug = $this->slug;
        $product->short_description = $this->short_description;
        $product->description = $this->description;
        $product->regular_price = $this->regular_price;
        $product->sale_price = $this->sale_price;
        $product->SKU = $this->SKU;
        $product->stock_status = $this->stock_status;
        $product->featured = $this->featured;
        $product->quantity = $this->quantity;
        if($this->newImage){
            unlink('assets/imgs/products/'.$product->image);
            $ImageName = Carbon::now()->timestamp.'.'.$this->newImage->extension();
            $this->newImage->storeAs('products',$ImageName); 
            $product->image = $ImageName;
        }
        $product->category_id = $this->category_id;
        $product->save();
        session()->flash('message', 'Product has been Updated successfully');
    }
    public function render()
    {
        $categories = Category::orderBy('name', 'ASC')->get();
        return view('livewire.admin.admin-edit-product-component',['categories'=>$categories]);
    }
}









