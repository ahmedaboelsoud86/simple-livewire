<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\PostList;
use App\Livewire\PostForm;

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


Route::get('posts', PostList::class)->name('posts');
Route::get('posts/create', PostForm::class)->name('posts.create');
Route::get('posts/{post}/view', PostForm::class)->name('posts.view');
Route::get('posts/{post}/edit', PostForm::class)->name('posts.edit');
