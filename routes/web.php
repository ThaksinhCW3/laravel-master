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
use App\Models\Product;

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
        //new
        Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function () {
            Route::post('logout', [LoginController::class, 'logout'])->name('admin.logout');
            Route::get('dashboard', [AdminDashboardController::class, 'dashboard'])->name('admin.dashboard');
            
            // Category CRUD routes using resource
            Route::resource('category', CategoryController::class)->names([
                'index' => 'admin.category.index',
                'create' => 'admin.category.create',
                'store' => 'admin.category.store',
                'show' => 'admin.category.show', // Optional
                'edit'=> 'admin.category.edit',
                'update' => 'admin.category.update',
                'destroy' => 'admin.category.destroy',
            ]);
            Route::resource('product', ProductController::class)->names([
                'index' => 'admin.product.index',
                'create' => 'admin.product.create',
                'store' => 'admin.product.store',
                'show' => 'admin.product.show', // Optional
                'edit'=> 'admin.product.edit',
                'update' => 'admin.product.update',
                'destroy' => 'admin.product.destroy',
            ]);
        });