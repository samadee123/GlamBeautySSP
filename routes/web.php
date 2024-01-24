<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;

use App\Http\Controllers\AdminController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


route::get('/',[HomeController::class,'index']);

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard'); 
});


// Admin Controller

route::get('/redirect',[HomeController::class,'redirect']);

route::get('/view_catagory',[AdminController::class,'view_catagory']);

route::post('/add_catagory',[AdminController::class,'add_catagory']);

route::get('/delete_catagory/{id}',[AdminController::class,'delete_catagory']);

route::get('/view_product',[AdminController::class,'view_product']);

route::post('/add_product',[AdminController::class,'add_product']);

route::get('/show_product',[AdminController::class,'show_product']);

route::get('/delete_product/{id}',[AdminController::class,'delete_product']);

route::get('/update_product/{id}',[AdminController::class,'update_product']);

route::post('/update_product_confirm/{id}',[AdminController::class,'update_product_confirm']);

route::get('/order',[AdminController::class,'order']); 

route::get('/delivered/{id}',[AdminController::class,'delivered']);

route::get('/print_pdf/{id}',[AdminController::class,'print_pdf']);

route::get('/send_email/{id}',[AdminController::class,'send_email']);

route::post('/send_user_email/{id}',[AdminController::class,'send_user_email']);

route::get('/search',[AdminController::class,'searchdata']);

route::get('/view_blog',[AdminController::class,'view_blog']);

route::post('/add_blog',[AdminController::class,'add_blog']);

route::get('/show_blog',[AdminController::class,'show_blog']);

route::get('/delete_blog/{id}',[AdminController::class,'delete_blog']);

route::get('/show_contactus',[AdminController::class,'show_contactus']);

route::get('/update_blog/{id}',[AdminController::class,'update_blog']);

route::post('/update_blog_confirm/{id}',[AdminController::class,'update_blog_confirm']);

route::get('/user_management',[AdminController::class,'user_management']);

route::get('/delete_user/{id}',[AdminController::class,'delete_user']);








// Home Controller

route::get('/product_details/{id}',[HomeController::class,'product_details']);

route::post('/add_cart/{id}',[HomeController::class,'add_cart']);

route::get('/show_cart',[HomeController::class,'show_cart']);

route::get('/remove_cart/{id}',[HomeController::class,'remove_cart']);

route::get('/cash_order/{totalproduct}',[HomeController::class,'cash_order']);

route::get('/stripe/{totalprice}',[HomeController::class,'stripe']); 

Route::post('stripe/{totalprice}',[HomeController::class, 'stripePost'])->name('stripe.post');

route::get('/shop',[HomeController::class,'shop']);

route::get('/blogdetails/{id}',[HomeController::class,'blogdetails']);

route::get('/favourites',[HomeController::class,'favourites']);

route::get('/allblogs',[HomeController::class,'allblogs']);

route::get('/show_order',[HomeController::class,'show_order']);

route::get('/cancel_order/{id}',[HomeController::class,'cancel_order']);

route::get('/show_fav',[HomeController::class,'show_fav']);

route::post('/add_fav/{id}',[HomeController::class,'add_fav']);

route::get('/remove_fav/{id}',[HomeController::class,'remove_fav']);

route::get('/contact_us',[HomeController::class,'contact_us']);

route::post('/add_contactus',[HomeController::class,'add_contactus']);

route::get('/product_search',[HomeController::class,'product_search']); 

route::get('/skin_filter',[HomeController::class,'skin_filter']);

route::get('/hair_filter',[HomeController::class,'hair_filter']); 

route::get('/makeup_filter',[HomeController::class,'makeup_filter']);

route::get('/fragrance_filter',[HomeController::class,'fragrance_filter']);

route::get('/skinhair_filter',[HomeController::class,'skinhair_filter']);

route::get('/firstprice_filter',[HomeController::class,'firstprice_filter']);

route::get('/secondprice_filter',[HomeController::class,'secondprice_filter']);

route::get('/thirdprice_filter',[HomeController::class,'thirdprice_filter']);

route::get('/fourthprice_filter',[HomeController::class,'fourthprice_filter']);

route::get('/lowtohigh_filter',[HomeController::class,'lowtohigh_filter']);










