<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
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


Route::get('/',[HomeController::class,'homepage']);
Route::get('/blogs',[HomeController::class,'blogs'])->name('blogs');
Route::get('/about',[HomeController::class,'about'])->name('about');


Route::get('/home',[HomeController::class,'index'])->name('home');
Route::get('/login',[HomeController::class,'login'])->name('login');
Route::get('/register',[HomeController::class,'register'])->name('register');

Route::get('/post_page',[AdminController::class,'post_page'])->name('post_page');
Route::post('/add_post',[AdminController::class,'add_post'])->name('add_post');
Route::get('/show_post',[AdminController::class,'show_post'])->name('show_post');
Route::get('/delete_post/{id}',[AdminController::class,'delete_post'])->name('delete_post');
Route::get('/edit_page/{id}',[AdminController::class,'edit_page'])->name('edit_page');
Route::put('/update_post/{id}',[AdminController::class,'update_post'])->name('update_post');
Route::delete('/delete_post/{id}', [AdminController::class, 'delete_post'])->name('delete_post');
Route::get('/post_details/{id}',[HomeController::class,'post_details'])->name('post_details');
Route::get('/create_post',[HomeController::class,'create_post'])->name('create_post')->middleware('auth');
Route::post('/user_post',[HomeController::class,'user_post'])->name('user_post')->middleware('auth');
Route::get('/my_post',[HomeController::class,'my_post'])->middleware('auth');
Route::get('/my_post_del/{id}',[HomeController::class,'my_post_del'])->middleware('auth');
Route::get('/post_update_page/{id}',[HomeController::class,'post_update_page'])->middleware('auth');
Route::post('/update_post_data/{id}',[HomeController::class,'update_post_data'])->middleware('auth');
Route::get('/accept_post/{id}',[AdminController::class,'accept_post']);
Route::get('/reject_post/{id}',[AdminController::class,'reject_post']);