<?php

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\MobileController;
use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    return view('welcome');
});

Route::get('add-customer', [CustomerController::class, 'add_customer']);
Route::get('show-mobile/{id}', [CustomerController::class, 'show_mobile']);
Route::get('all-customer', [CustomerController::class, 'all_customer']);

Route::get('show-customer/{id}', [MobileController::class, 'show_customer']);
