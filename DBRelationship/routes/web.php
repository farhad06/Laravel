<?php

use App\Http\Controllers\AuthorController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\MobileController;
use App\Http\Controllers\PersonController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    return view('welcome');
});

Route::get('add-customer', [CustomerController::class, 'add_customer']);
Route::get('show-mobile/{id}', [CustomerController::class, 'show_mobile']);
Route::get('all-customer', [CustomerController::class, 'all_customer']);

Route::get('show-customer/{id}', [MobileController::class, 'show_customer']);

Route::get('add-author', [AuthorController::class, 'add_author']);
Route::get('add-post/{id}', [PostController::class, 'add_post']);
Route::get('show-post/{id}', [PostController::class, 'show_post']);
Route::get('show-author/{id}', [PostController::class, 'show_author']);

Route::get('show-people', [PersonController::class, 'show_people']);
