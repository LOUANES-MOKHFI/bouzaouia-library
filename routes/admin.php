<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\RolesController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\BookController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\ListController;
use App\Http\Controllers\Admin\ExhibitionsController;
use App\Http\Controllers\Admin\StateController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Middleware\Authenticate;


Route::group(['prefix' => 'admin'],function(){
    Route::get('/login',[LoginController::class,'login'])->name('admin.login');
    Route::post('/login',[LoginController::class,'Postlogin'])->name('admin.login');
});

Route::group(['prefix' => 'admin','middleware'=>'auth:admins'/*,'middleware'=>Authenticate::class*/],function(){
    Route::get('/',[AdminController::class,'index'])->name('admin');
    //Logout
    Route::get('/logout',[LoginController::class,'logout'])->name('admin.logout');

    
	///Roles Routes
    Route::group(['prefix' => 'roles'/*,'middleware' => 'can:roles'*/],function(){
        Route::get('/',[RolesController::class,'index'])->name('admin.roles');
        Route::get('create',[RolesController::class,'create'])->name('admin.roles.create');
        Route::post('store',[RolesController::class,'store'])->name('admin.roles.store');
        Route::get('edit/{uuid}',[RolesController::class,'edit'])->name('admin.roles.edit');
        Route::post('update/{uuid}',[RolesController::class,'update'])->name('admin.roles.update');
        Route::get('delete/{uuid}',[RolesController::class,'destroy'])->name('admin.roles.delete');
    });

	///Users Routes
    Route::group(['prefix' => 'users'/*,'middleware' => 'can:users'*/],function(){
        Route::get('/',[UserController::class,'index'])->name('admin.users');
        Route::get('create',[UserController::class,'create'])->name('admin.users.create');
        Route::post('store',[UserController::class,'store'])->name('admin.users.store');
        Route::get('edit/{id}',[UserController::class,'edit'])->name('admin.users.edit');
        Route::post('update/{id}',[UserController::class,'update'])->name('admin.users.update');
        Route::get('delete/{id}',[UserController::class,'destroy'])->name('admin.users.delete');
        Route::get('changeStatus/{uuid}',[UserController::class,'changeStatus'])->name('admin.users.changeStatus');
       // Route::get('changeStatusExit/{uuid}',[UserController::class,'changeStatusExit'])->name('admin.users.changeStatusExit');
    });

     ///categories
    Route::group(['prefix' => 'categories'/*,'middleware' => 'can:categories'*/],function(){
        Route::get('/',[CategoryController::class,'index'])->name('admin.categories');
        Route::get('create',[CategoryController::class,'create'])->name('admin.categories.create');
        Route::post('store',[CategoryController::class,'store'])->name('admin.categories.store');
        Route::get('edit/{uuid}',[CategoryController::class,'edit'])->name('admin.categories.edit');
        Route::post('update/{uuid}',[CategoryController::class,'update'])->name('admin.categories.update');
        Route::get('delete/{uuid}',[CategoryController::class,'destroy'])->name('admin.categories.delete');
    });

    ///books
    Route::group(['prefix' => 'books'/*,'middleware' => 'can:books'*/],function(){
        Route::get('/',[BookController::class,'index'])->name('admin.books');
        Route::get('create',[BookController::class,'create'])->name('admin.books.create');
        Route::post('store',[BookController::class,'store'])->name('admin.books.store');
        Route::get('edit/{uuid}',[BookController::class,'edit'])->name('admin.books.edit');
        Route::get('show/{uuid}',[BookController::class,'show'])->name('admin.books.show');
        Route::post('update/{uuid}',[BookController::class,'update'])->name('admin.books.update');
        Route::get('delete/{uuid}',[BookController::class,'destroy'])->name('admin.books.delete');
        Route::get('changeStatus/{uuid}',[BookController::class,'changeStatus'])->name('admin.books.changeStatus');
    });

    //// lists 
        Route::group(['prefix' => 'lists'/*,'middleware' => 'can:lists'*/],function(){
            Route::get('/',[ListController::class,'index'])->name('admin.lists');
            Route::get('create',[ListController::class,'create'])->name('admin.lists.create');
            Route::post('store',[ListController::class,'store'])->name('admin.lists.store');
            Route::get('edit/{uuid}',[ListController::class,'edit'])->name('admin.lists.edit');
            Route::post('update/{uuid}',[ListController::class,'update'])->name('admin.lists.update');
            Route::get('delete/{uuid}',[ListController::class,'destroy'])->name('admin.lists.delete');
        });

        //// exhibitions 
    Route::group(['prefix' => 'exhibitions'/*,'middleware' => 'can:exhibitions'*/],function(){
        Route::get('/',[ExhibitionsController::class,'index'])->name('admin.exhibitions');
        Route::get('create',[ExhibitionsController::class,'create'])->name('admin.exhibitions.create');
        Route::post('store',[ExhibitionsController::class,'store'])->name('admin.exhibitions.store');
        Route::get('edit/{uuid}',[ExhibitionsController::class,'edit'])->name('admin.exhibitions.edit');
        Route::post('update/{uuid}',[ExhibitionsController::class,'update'])->name('admin.exhibitions.update');
        Route::get('delete/{uuid}',[ExhibitionsController::class,'destroy'])->name('admin.exhibitions.delete');
    });

    ///// states
    Route::group(['prefix' => 'states'/*,'middleware' => 'can:states'*/],function(){
        Route::get('/',[StateController::class,'index'])->name('admin.states');
        Route::get('create',[StateController::class,'create'])->name('admin.states.create');
        Route::post('store',[StateController::class,'store'])->name('admin.states.store');
        Route::get('edit/{id}',[StateController::class,'edit'])->name('admin.states.edit');
        Route::post('update/{id}',[StateController::class,'update'])->name('admin.states.update');
        Route::get('delete/{id}',[StateController::class,'destroy'])->name('admin.states.delete');
    });

    ///// states
    Route::group(['prefix' => 'sliders'/*,'middleware' => 'can:sliders'*/],function(){
        Route::get('/',[SliderController::class,'index'])->name('admin.sliders');
        Route::get('create',[SliderController::class,'create'])->name('admin.sliders.create');
        Route::post('store',[SliderController::class,'store'])->name('admin.sliders.store');
        Route::get('edit/{id}',[SliderController::class,'edit'])->name('admin.sliders.edit');
        Route::post('update/{id}',[SliderController::class,'update'])->name('admin.sliders.update');
        Route::get('delete/{id}',[SliderController::class,'destroy'])->name('admin.sliders.delete');
        Route::get('change_status/{id}',[SliderController::class,'changeStatus'])->name('admin.sliders.change_status');
    });

        
    ///settings
    Route::group(['prefix' => 'settings'/*,'middleware' => 'can:settings'*/],function(){
        Route::get('/',[SettingController::class,'index'])->name('admin.settings');
        Route::post('update',[SettingController::class,'update'])->name('admin.settings.update');
        
        ///purchase methode 
        Route::get('/purchase_methode',[SettingController::class,'purchaseMethode'])->name('admin.settings.purchase_methode');

        Route::post('update_purchase_methode',[SettingController::class,'updatePuchaseMethode'])->name('admin.settings.update_purchase_methode');
    });

    ///orders
    Route::group(['prefix' => 'orders'/*,'middleware' => 'can:books'*/],function(){
        Route::get('/',[OrderController::class,'index'])->name('admin.orders');
        Route::get('order-detail/{id}',[OrderController::class,'OrderDetail'])->name('admin.orders.details');
        Route::get('change-status/{id}',[OrderController::class,'changeStatus'])->name('admin.orders.change_status');
    });
});