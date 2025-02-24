<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Admin\loginController as AdminloginController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Frontend\FrontendController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\CartController;

Route::get('/', function () {
    return view('layouts.app');
});

Route::group(['prefix' => 'account'],function(){

    //guest middleware
    Route::group(['middleware' => 'guest'],function (){
        Route::get('login',[LoginController::class,'index'])->name('account.login');
        Route::get('register',[LoginController::class,'register'])->name('account.register');
        Route::post('authenticate',[LoginController::class,'authenticate'])->name('account.authenticate');
        Route::post('processregister',[LoginController::class,'processregister'])->name('account.processregister');
        
    });
    //authed middleware
    Route::group(['middleware' => 'auth'],function (){
        Route::get('logout', [LoginController::class, 'logout'])->name('account.logout');
        Route::get('dashboard',[DashboardController::class,'index'])->name('account.dashboard');
    });
});

Route::group(['prefix' => 'admin'],function(){

    //guest middleware
    Route::group(['middleware' => 'guest'],function (){
        Route::post('authenticate',[AdminLoginController::class,'authenticate'])->name('admin.authenticate');
    });
    //authed middleware
    
});
    //Frontend pages routes
        Route::get('/about', [FrontendController::class, 'about'])->name('about');
        Route::get('/blogs', [FrontendController::class, 'blogs'])->name('blogs');
        Route::get('/contact', [FrontendController::class, 'contact'])->name('contact');
        Route::get('/shop', [FrontendController::class, 'shop'])->name('shop');
        Route::get('/wish', [FrontendController::class, 'wish'])->name('wish');
        Route::get('/order', [FrontendController::class, 'order'])->name('order');
        Route::get('/profile', [FrontendController::class, 'profile'])->name('profile');
    //Cart routesS
        Route::get('/cart', [FrontendController::class, 'cart'])->name('cart');
        Route::post('/cart/add', [CartController::class, 'addToCart'])->name('cart.add');
        Route::post('/cart/remove/{id}', [CartController::class, 'removeFromCart'])->name('cart.remove');
        

        //Admin routes
    Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function () {
        Route::post('logout', [LoginController::class, 'logout'])->name('admin.logout');
        Route::get('dashboard', [AdminDashboardController::class, 'dashboard'])->name('admin.dashboard');
        
            Route::get('category', [CategoryController::class, 'index'])->name('admin.category.index');
            Route::get('category/create', [CategoryController::class, 'create'])->name('admin.category.create');
            Route::post('category/store', [CategoryController::class, 'store'])->name('admin.category.store');
            Route::get('category/edit/{category}', [CategoryController::class, 'edit'])->name('admin.category.edit');
            Route::post('category/update/{category}', [CategoryController::class, 'update'])->name('admin.category.update');
            Route::delete('category/delete/{category}', [CategoryController::class, 'delete'])->name('admin.category.delete');
            Route::get('category/change/{category}', [CategoryController::class, 'change'])->name('admin.category.change');    
            Route::get('category/{category}', [CategoryController::class, 'showCategoryWithProducts'])->name('admin.category.show');
  

            Route::get('product', [ProductController::class, 'index'])->name('admin.product.index');
            Route::get('product/create', [ProductController::class, 'create'])->name('admin.product.create');
            Route::post('product/store', [ProductController::class, 'store'])->name('admin.product.store');
            Route::get('product/edit/{product}', [ProductController::class, 'edit'])->name('admin.product.edit');
            Route::post('product/update/{product}', [ProductController::class, 'update'])->name('admin.product.update');
            Route::delete('product/delete/{product}', [ProductController::class, 'delete'])->name('admin.product.delete');
            Route::get('product/change/{product}', [ProductController::class, 'change'])->name('admin.product.change');
});