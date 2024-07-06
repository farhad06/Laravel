<?php

use App\Http\Controllers\ajaxController;
use App\Http\Controllers\FileUpload;
use App\Http\Controllers\registerController;
use App\Http\Controllers\SalaryController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('hello');
// });

Route::get('/adduser', [registerController::class, 'index']);
Route::post('/submit', [registerController::class, 'add']);
Route::get('/showuser', [registerController::class, 'show_users']);

#Route::get('/all',[ajaxController::class,'index']);

Route::controller(ajaxController::class)->group(function () {
    Route::get('all', 'index');
    Route::post('submit', 'register');
    Route::get('registration', 'registration_form');
    Route::get('token-verify/{token}', 'verify_token');
    //Route::get('show','get_students');
});



#Route::get('',[FileUpload::class, 'log_in_form'])->name('login');

/*Route::controller(FileUpload::class)->group(function () {
    Route::get('/', 'log_in_form')->name('login');
    Route::get('reg', 'form');
    Route::post('login', 'login');
    Route::post('submit_data', 'submit');
});

Route::middleware('auth')->group(function () {
    Route::controller(FileUpload::class)->group(function () {
        Route::get('show', 'show');
        Route::get('edit/{id}', 'edit_user')->name('edit.user');
        Route::post('update', 'update_user');
        Route::get('delete/{id}', 'delete_user');
        Route::get('logout', 'logout');
        Route::post('submit_modal_data', 'submit_modal_data');
    });
});*/

/*Route::controller(SalaryController::class)->group(function () {
    Route::get('add','add_sal_form');
    Route::get('show', 'show');
    Route::post('submit_sal', 'submit_salary');
    
});*/

