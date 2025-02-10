<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Admin\loginController as AdminloginController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Frontend\FrontendController;
use App\Http\Controllers\Admin\CategoryController;

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
        Route::get('about', [FrontendController::class, 'about'])->name('about');
        Route::get('blogs', [FrontendController::class, 'blogs'])->name('blogs');
        Route::get('contact', [FrontendController::class, 'contact'])->name('contact');
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
    Route::group(['middleware' => 'auth'],function (){
        Route::post('logout', [LoginController::class, 'logout'])->name('admin.logout');
    //Dashboard routes
        Route::get('dashboard',[AdminDashboardController::class,'dashboard'])->name('admin.dashboard');
    //Category routes
        Route::get('category', [CategoryController::class, 'index'])->name('admin.category.index');
        Route::get('create', [CategoryController::class, 'create'])->name('admin.category.create');
        Route::post('category', [CategoryController::class, 'store'])->name('admin.category.store');
        Route::get('category/{id}/edit', [CategoryController::class, 'edit'])->name('admin.category.edit');
        Route::put('category/{id}', [CategoryController::class, 'update'])->name('admin.category.update');
    });
});


