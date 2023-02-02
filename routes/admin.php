<?php 

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Master\AdminController;

Route::prefix('admin')->name('admin.')->group(function(){
    Route::middleware(['guest:admin','PreventBackHistory'])->group(function(){
        Route::view('/login','admin_dashboard.login')->name('login');
        Route::post('/check',[AdminController::class,'check'])->name('check');

    });
    
    Route::middleware(['auth:admin','PreventBackHistory'])->group(function(){
        Route::get('/dashboard',[AdminController::class,'dashboard'])->name('home');
        Route::post('/logout',[AdminController::class,'logout'])->name('logout');
    });
});