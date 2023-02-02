<?php 

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\UserController;
Route::prefix('user')->name('user.')->group(function(){
    Route::middleware(['guest:web','PreventBackHistory'])->group(function(){
        Route::view('/login','dashboard.login')->name('login');
        Route::view('/register','dashboard.register')->name('register');
        Route::view('/forgot','dashboard.forget')->name('forgot');
        Route::view('/change-password','dashboard.change')->name('change');
        Route::get('/verify',[UserController::class,'verify'])->name('verify');
        Route::post('/create',[UserController::class,'create'])->name('create');
        Route::post('/check',[UserController::class,'check'])->name('check');
        Route::post('/forgot/sendLink',[UserController::class,'sendResetLink'])->name('resets');
        Route::get('/forgot/sendLink',[UserController::class,'showResetPasswordForm']);
        Route::post('/forgot/password',[UserController::class,'changePassword'])->name('change_password');

    });
    Route::middleware(['auth:web','IsUserVerifyEmail','PreventBackHistory'])->group(function(){
        Route::get('/home',[UserController::class,'home'])->name('home');
        Route::post('/logout',[UserController::class,'logout'])->name('logout');
        
    });
});
