<?php

use App\Http\Controllers\Admin\BankController;
use App\Http\Controllers\Admin\KategoriController;
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
Route::resource('/dashboard/admin/category', KategoriController::class);
Route::resource('/dashboard/admin/bank', BankController::class);

Route::group([
 'prefix' => 'dashboard',
 'as' => 'dashboard.'
], function(){
    Route::get('/admin',[DashboardController::class,'index'])->name('admin');
}
);

