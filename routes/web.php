<?php

use App\Http\Controllers\About;
use App\Http\Controllers\Contact;
use App\Http\Controllers\Home;
use App\Http\Controllers\HomeSliderController;
use App\Http\Controllers\Products;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\categoryController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\selectProduct;
use App\Http\Controllers\RequestArea;
use App\Http\Controllers\service;
use App\Http\Controllers\Trial;
use App\Http\Controllers\Visit;
use App\Http\Controllers\DetailProducts;
use Illuminate\Support\Facades\Route;

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

// multi language
Route::get('locale/{locale}', function($locale){
    \Session::put('locale', $locale);
    return redirect()->back();
});


// symlink 
Route::get('/storage-link',function(){
    $targetFolder = storage_path('app/public');
    $linkFolder = $_SERVER['DOCUMENT_ROOT'] . '/storage';
    symlink($targetFolder,$linkFolder);
});

Route::get('/',[Home::class, 'index']);
Route::get('/about',[About::class, 'index']);
Route::get('/product',[Products::class, 'index']);
Route::get('/product/detail/{category}/{brand}/{type}/{series}',[Products::class, 'detail'])->name('product.detail');
Route::post('/product/detail',[DetailProducts::class, 'sendEmail'])->name('product.send');
Route::get('/service',[service::class, 'index']);
Route::get('/request',[RequestArea::class, 'index']);
Route::get('/visit',[Visit::class, 'index']);
Route::post('/visit',[Visit::class, 'sendEmail'])->name('visit.send');
Route::get('/trial',[Trial::class, 'index']);
Route::post('/trial',[Trial::class, 'sendEmail'])->name('trial.send');
Route::get('/contact',[Contact  ::class, 'index']);
Route::post('/contact',[Contact  ::class, 'sendEmail'])->name('contact.send');;


// category select2
Route::get('/get-products', [selectProduct::class, 'getProducts'])->name('get.products');

//filter 
Route::get('/product/filter', [Products::class,'filter'])->name('products.filter');

// grup middleware
Route::middleware(['auth'])->group(function () {
    // slider parameter binding 
    Route::delete('/dashboard/slider/{homeSlider}', [HomeSliderController::class, 'destroy']);
    Route::get('/dashboard/slider/create', [HomeSliderController::class, 'create']);
    Route::get('/dashboard/slider/{homeSlider}', [HomeSliderController::class, 'show']);
    // end slider parameter binding 
    Route::get('/dashboard/product/checkSlug', [ProductController::class, 'checkSlug']);
    Route::resource('/dashboard/product', ProductController::class);
    Route::resource('/dashboard/slider', HomeSliderController::class);
    Route::resource('/dashboard/category', categoryController::class);
    Route::resource('/dashboard/brand', BrandController::class);

    Route::get('/dashboard', function () {
        return view('Dashboard.Dashboard',[
            'title' => 'Dashboard'
        ]);
    })->name('dashboard');
});

require __DIR__.'/auth.php';
