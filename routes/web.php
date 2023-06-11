<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Site\HomeController;
use App\Http\Controllers\Site\BookController;
use App\Http\Controllers\Site\CartController;
use App\Http\Controllers\Site\ProfileController;
use App\Http\Controllers\Site\SubscribersController;


Auth::routes();

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/download-list', [HomeController::class, 'downloadList'])->name('download_list');
Route::get('/purchase-method', [HomeController::class, 'purchaseMethod'])->name('purchase_method');
Route::get('/exhibitions', [HomeController::class, 'Exhibitions'])->name('exhibitions');
Route::get('/categories', [HomeController::class, 'Categories'])->name('categories');
Route::get('/add_your_book', [HomeController::class, 'addYourBook'])->name('add_your_book');



Route::get('/about', [HomeController::class, 'about'])->name('about');
Route::get('/new-arrivals', [BookController::class, 'newaArrivals'])->name('new_arrivals');
Route::get('/books', [BookController::class, 'index'])->name('books');
Route::get('/search-book', [BookController::class, 'searchBook'])->name('search_book');
Route::get('/book/{slug}', [BookController::class, 'show'])->name('book.show');
Route::get('/book/category/{slug}', [BookController::class, 'getBooksByCategory'])->name('books.category');



Route::get('/cart', [CartController::class, 'content'])->name('shoping_cart');
Route::get('/clear-cart', [CartController::class, 'clearCart'])->name('clear_cart');
Route::get('/clear-item/{id}', [CartController::class, 'clearItem'])->name('clear_item');
Route::get('/add-to-cart', [CartController::class, 'addToCart'])->name('add_to_cart');


Route::post('/update-cart', [CartController::class, 'updateItemInCart'])->name('update_cart');
Route::get('/checkout', [CartController::class, 'checkout'])->name('checkout');
Route::post('/validate_checkout', [CartController::class, 'validateCheckout'])->name('validate_checkout');
Route::get('/get_state_info/{state_id}',[HomeController::class,'getStateInfo'])->name('get_state_info');

Route::get('/profile', [ProfileController::class, 'index'])->name('profile')->middleware('auth');

Route::post('/check-subscriber-email',[SubscribersController::class,'checksubscribe']);
Route::post('/add-subscriber-email',[SubscribersController::class,'addsubscribe']);
