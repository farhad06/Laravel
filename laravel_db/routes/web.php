<?php

use App\Http\Controllers\formController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;


// Route::get('/', function () {
//     return view('welcome');
// });

//Route::get('/hello',[formController::class,'hello']);

// Route::get('/',[UserController::class, 'showUsers'])->name('home');
// Route::get('/user/{id}', [UserController::class, 'showSingleUser'])->name('view.user');
// Route::post('/add', [UserController::class, 'addUser'])->name('add.user');
// Route::get('/delete/{id}', [UserController::class, 'deleteUser'])->name('delete.user');
// Route::get('/updatepage/{id}',[UserController::class,'updatePage'])->name('update.page');
// Route::post('/updateuser/{id}', [UserController::class, 'updateUser'])->name('update.user');

Route::controller(UserController::class)->group(function(){
    Route::get('/',  'showUsers')->name('home');
    Route::get('/user/{id}',  'showSingleUser')->name('view.user');
    Route::post('/add',  'addUser')->name('add.user');
    Route::get('/delete/{id}',  'deleteUser')->name('delete.user');
    Route::get('/updatepage/{id}',  'updatePage')->name('update.page');
    Route::post('/updateuser/{id}',  'updateUser')->name('update.user');

});

Route::view('newUser','/addUser');






