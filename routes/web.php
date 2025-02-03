<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\Admin\Users\ListUsers;
use App\Livewire\Admin\Products\ListProducts;
use App\Livewire\Admin\Products\CreateProductsForm;
use App\Livewire\Admin\Products\UpdateProductForm;
use App\Livewire\Admin\Categories\ListCategories;
use App\Livewire\Admin\Dashboard\MainPage;
use App\Livewire\Admin\users\UserProfile;



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

Route::group(['middleware' => 'auth'],function () {
    Route::get('users', ListUsers::class)->name('users');

    // products
    Route::get('products', ListProducts::class)->name('products');
    Route::get('create-product', CreateProductsForm::class)->name('create.product');
    Route::get('product/{product}/edit', UpdateProductForm::class)->name('edit.product');



    // categories
    Route::get('categories', ListCategories::class)->name('categories');

    // categories
    Route::get('dashboard', MainPage::class)->name('dashboard');


    Route::get('profile', UserProfile::class)->name('profile');
});
// users


//Route::get('appointments/create', CreateAppointmentForm::class)->name('appointments.create');
//Route::get('appointments/{appointment}/edit', UpdateAppointmentForm::class)->name('appointments.edit');

// posts
// Route::get('posts', PostList::class)->name('posts');
// Route::get('posts/create', PostForm::class)->name('posts.create');
// Route::get('posts/{post}/view', PostForm::class)->name('posts.view');
// Route::get('posts/{post}/edit', PostForm::class)->name('posts.edit');
