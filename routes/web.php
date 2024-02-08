<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\Registrationcontroller;
use App\Http\Controllers\ShortenerController;
use App\Http\Controllers\UrlsShowcontroller;
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
Route::get('login',[LoginController::class,'index'])->name('login');
Route::post('login',[LoginController::class,'login'])->name('login');
Route::get('signup',[Registrationcontroller::class,'index'])->name('signup');
Route::post('signup',[Registrationcontroller::class,'store'])->name('signup.store');
Route::get('/',[ShortenerController::class, 'index'])->name('home');

Route::middleware('auth')->group(function(){
    Route::get('/logout',[LoginController::class, 'logout'])->name('logout');
    Route::post('/',[ShortenerController::class, 'store'])->name('make.short');
    Route::get('brouse/{code}',[ShortenerController::class, 'browseShortlink']);
    Route::get('/mysurls',[UrlsShowcontroller::class, 'index'])->name('urls');
});

// Route::get('/', function () {
//     return view('welcome');
// });
