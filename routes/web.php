<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home',[
        "title"=>"KitaBantu"
    ]);
});

Route::get('/Login',[LoginController::class,'index'])->middleware('guest');
Route::post('/Login',[LoginController::class,'authenticate']);
Route::post('/logout',[LoginController::class,'logout']);

Route::resource('/Register', RegisterController::class);
Route::resource('/dashboard/admin/category', CategoryController::class);

Route::group([
 'prefix' => 'dashboard',
 'as' => 'dashboard.'
], function(){
    Route::get('/admin',[DashboardController::class,'index'])->name('admin');
}
);

