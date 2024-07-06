<?php

use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

// Route::get('/welcome',function(){
//      return view('hello');
// });

// Route::get('/hello/{name?}/{id?}',function($name=null,$id=null){
//     if($name){
//         return "<h1> Hello Mr. " . $name . " Your ID is: ".$id."</h1>";

//     }else{
//         return "<script>alert('No name found in the server');</script>";
//     }

// })->whereAlpha('name')->whereNumber('id');

// Route::get('/about',function(){
//     return view('about');
// });
// Route::get('/post', function () {
//     return view('post');
// });

// Route::get('/passdata',function(){
//     $data=[
//         'name' => 'Rohit Sharma',
//         'jersey_no'=>45,
//         'role'=>'Batter'
//     ];

//     return view('passdata',$data);

// });

// Route::get('/post',function(){

//     return view('post');

// });