<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\Admin\Users\ListUsers;
use App\Livewire\Admin\Products\ListProducts;
use App\Livewire\Admin\Products\CreateProductsForm;
use App\Livewire\Admin\Categories\ListCategories;



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

Route::get('/', function () {
    return view('welcome');
});

// users
Route::get('users', ListUsers::class)->name('users');

// products
Route::get('products', ListProducts::class)->name('products');
Route::get('create-product', CreateProductsForm::class)->name('create.product');



// categories
Route::get('categories', ListCategories::class)->name('categories');

//Route::get('appointments/create', CreateAppointmentForm::class)->name('appointments.create');
//Route::get('appointments/{appointment}/edit', UpdateAppointmentForm::class)->name('appointments.edit');

// posts
// Route::get('posts', PostList::class)->name('posts');
// Route::get('posts/create', PostForm::class)->name('posts.create');
// Route::get('posts/{post}/view', PostForm::class)->name('posts.view');
// Route::get('posts/{post}/edit', PostForm::class)->name('posts.edit');
