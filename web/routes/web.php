<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::get('/web3-login-message', 'Web3LoginController@message');
Route::post('/web3-login-verify', 'Web3LoginController@verify');

Auth::routes();
Route::prefix('login')->name('login.')->group(function() {
    Route::get('/google/redirect', [App\Http\Controllers\GoogleLoginController::class, 'getGoogleAuth'])->name('google.redirect');
    Route::get('/google/callback', [App\Http\Controllers\GoogleLoginController::class, 'authGoogleCallback'])->name('google.callback');

});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::post('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



