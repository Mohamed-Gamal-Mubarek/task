<?php

use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
// Auth::routes(['register' => false]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// ADMIN
Route::group(['prefix' => 'admin', 'middleware' => ['admin','auth']], function () {
    Route::get('dashboard', [App\Http\Controllers\Admin\AdminController::class, 'index'])->name('admin.dashboard');
    Route::post('provider', [App\Http\Controllers\Admin\ProviderController::class, 'store'])->name('provider.store');

});
// ./ADMIN


// PROVIDER
Route::group(['prefix' => 'provider', 'middleware' => ['provider','auth']], function () {
    Route::get('dashboard', [App\Http\Controllers\Provider\ProviderController::class, 'index'])->name('provider.dashboard');
    Route::resource('location', App\Http\Controllers\Provider\LocationController::class);
});
// ./PROVIDER
