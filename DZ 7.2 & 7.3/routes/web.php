<?php

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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('auth/redirect', [\App\Http\Controllers\Auth\SocialController::class, 'redirect']);
Route::get('auth/callback', [\App\Http\Controllers\Auth\SocialController::class, 'callback']);

require __DIR__.'/auth.php';
