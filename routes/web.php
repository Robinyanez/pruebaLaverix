<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;

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

Route::get('/user', [HomeController::class, 'user'])->name('user.home')->middleware('user.middleware');
Route::get('/guest', [HomeController::class, 'guest'])->name('guest.home')->middleware('guest.middleware');

Route::middleware('admin.middleware')->group(function(){

    Route::get('/edit/{id}/password', [UserController::class, 'updatePasswordView'])->prefix('admin')->name('admin.update.password.view');
    Route::put('/update/password/{id}', [UserController::class, 'updatePassword'])->prefix('admin')->name('admin.update.password');
    Route::resources([
        'admin' => UserController::class,
    ]);

});
