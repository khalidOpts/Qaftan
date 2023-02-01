<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\http\livewire\HomeComponent;
use App\http\livewire\ShopComponent;
use App\http\livewire\CartComponent;
use App\http\livewire\CheckoutComponent;
use App\http\livewire\User\UserDashboardComponent;
use App\http\livewire\Admin\AdminDashboardComponent;
use App\http\livewire\Admin\AdminCategoriesComponent;
use App\http\livewire\Admin\AdminAddCategoryComponent;
use App\http\livewire\Admin\AdminEditCategoryComponent;
use App\http\livewire\Admin\AdminProductComponent;
use App\http\livewire\Admin\AdminAddProductComponent;
use App\http\livewire\Admin\AdminEditProductComponent;

use App\http\livewire\Admin\AdminAddHomeSlideComponent;
use App\http\livewire\Admin\AdminAddHomeSlideEditComponent;
use App\http\livewire\Admin\AdminHomeSliderComponent;

use App\http\livewire\CategoryComponent;
use App\http\livewire\SearchComponent;
use App\http\livewire\WishListComponent;

use App\http\livewire\DetailsComponent;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/',HomeComponent::class)->name('home.index');
Route::get('/shop',ShopComponent::class)->name('shop');

Route::get('/product/{slug}',DetailsComponent::class)->name('product.details');



Route::get('/cart',CartComponent::class)->name('shop.cart');
Route::get('/checkout',CheckoutComponent::class)->name('shop.checkout');
Route::get('/product-category/{slug}',CategoryComponent::class)->name('product.category');
Route::get('/search',SearchComponent::class)->name('product.search');
Route::get('/wishList',WishListComponent::class)->name('shop.wishList');


// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth'])->group(function(){
    Route::get('user/dashboard',UserDashboardComponent::class)->name('user.dashboard');
});
Route::middleware(['auth','AuthAdmin'])->group(function(){
    Route::get('admin/dashboard',AdminDashboardComponent::class)->name('admin.dashboard');
    Route::get('admin/categories',AdminCategoriesComponent::class)->name('admin.categories');
    Route::get('admin/categories/add',AdminAddCategoryComponent::class)->name('admin.category.add');
    Route::get('admin/categories/edit/{category_id}',AdminEditCategoryComponent::class)->name('admin.category.edit');
    Route::get('admin/products',AdminProductComponent::class)->name('admin.products');
    Route::get('admin/product/add',AdminAddProductComponent::class)->name('admin.product.add');
    Route::get('admin/product/edit/{product_id}',AdminEditProductComponent::class)->name('admin.product.edit');
    Route::get('admin/slider',AdminHomeSliderComponent::class)->name('admin.Home.slider');
    Route::get('admin/slider/add',AdminAddHomeSlideComponent::class)->name('admin.Home.slide.add');
    Route::get('admin/slider/edit/{slide_id}',AdminAddHomeSlideEditComponent::class)->name('admin.Home.edit');
});

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

require __DIR__.'/auth.php';
