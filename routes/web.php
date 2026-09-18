<?php

use App\Http\Controllers\Auth\AuthController;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WebController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AddToCartController;

// Website Controller Groub (user side)
Route::controller(WebController::class)->group(function(){

    Route::get('/' , 'home')->name('/');

    Route::get('/men' , 'men')->name('men');

    Route::get('/woman' , 'woman')->name('woman');

    Route::get('/children' ,  'children')->name('children');

    Route::get('/accessories' , 'accessories')->name('accessories');

});


Route::controller(AddToCartController::class)->middleware('auth')->name('carts.')->prefix('/carts')->group(function(){
    Route::get('/index' , 'index')->name('index');
    Route::get('/add/{product}', 'store')->name('add');
    Route::patch('/update/{product}', 'update')->name('update');
    Route::delete('/remove/{product}', 'destroy')->name('remove');
    Route::delete('/clear', 'clear')->name('clear');
});


// Groub of AuthController
Route::controller(AuthController::class)->middleware('guest')->group(function()
{
    Route::get('/register' , 'register')->name('register');
    Route::post('/register' , 'handelRegister')->name('handelRegister')->withoutMiddleware('guest');

    Route::get('/login' ,  'login')->name('login');
    Route::post('/login' , 'handelLogin')->name('handelLogin')->WithoutMiddleware('guest');

    Route::get('/profile' , 'profile')->name('profile')->withoutMiddleware('guest');
    Route::put('/editProfile' , 'editProfile')->name('editProfile')->withoutMiddleware('guest');

    Route::get('logout' , 'logout')->name('logout')->withoutMiddleware('guest');

});





// ALL admin Controllers in one Prefix for more Pattern
Route::middleware(['auth' , 'role:admin,superadmin'])->prefix('/admin')->name('admin.')->group(function() 
{
    // Ctegogy Controller Groub 
    Route::controller(CategoryController::class)->prefix('categories')->group(function () 
    {
        Route::get('/' , 'index')->name('categories.index');
    
        Route::get('/create' , 'create')->name('categories.create');
        Route::post('/create' , 'store')->name('categories.store');
    
    
        Route::get('/edit/{id}' , 'edit')->whereNumber('id')->name('categories.edit');
        Route::put('/update/{id}' , 'update')->name('categories.update');
    
        Route::delete('/delete/{id}' , 'delete')->name('categories.delete');
    });


    // Dachbord Controller 
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');


    // Product Controller 
    Route::controller(ProductController::class)->prefix('products')->group(function() 
    {
        Route::get('/' , 'index')->name('products.index');
    
        Route::get('/doSearch' , 'doSearch')->name('products.doSearch');
    
        Route::get('/create' , 'create')->name('products.create');
        Route::post('/create' , 'store')->name('products.store');
    
        Route::get('/edit/{id}' , 'edit')->whereNumber('id')->name('products.edit');
        Route::put('/update/{id}' , 'update')->whereNumber('id')->name('products.update');
    
        Route::delete('/delete/{id}' , 'delete')->whereNumber('id')->name('products.delete');
    
        Route::get('/archive' , 'archive')->name('products.archive');
        Route::delete('/forceDelete/{id}' , 'forceDelete')->whereNumber('id')->name('products.forceDelete');
        Route::get('/restore/{id}' , 'restore')->whereNumber('id')->name('products.restore');
    });

});


// Group of UserController for Super Admin :-
Route::controller(UserController::class)->middleware(['auth' , 'role:superadmin'])->prefix('/admin/user')->name('admin.user.')->group(function() {
    
        Route::get('/' , 'index')->name('index');
    
        Route::get('doSearch' , 'doSearch')->name('doSearch');
    
        Route::get('/edit/{id}' , 'edit')->whereNumber('id')->name('edit');
        Route::put('/edit/{id}' , 'update')->whereNumber('id')->name('update');
    
        Route::delete('/delete/{id}' , 'delete')->whereNumber('id')->name('delete');
    
        Route::get('/archive' , 'archive')->name('archive');
        Route::delete('/forceDelete/{id}' , 'forceDelete')->whereNumber('id')->name('forceDelete');
        Route::get('/restore/{id}' , 'restore')->whereNumber('id')->name('restore');
    
});













