<?php

use App\Http\Controllers\medical\editProfileController;
use App\Http\Controllers\public\PublicController;
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

Route::get('/', [PublicController::class, 'home'])->name('home');

//admin
Route::middleware(['verified','authadmin'])->group(function(){

});

//admin
Route::middleware(['verified','authuser'])->group(function(){

});

//medical personnel
Route::middleware(['verified','authmedicalpersonnel'])->group(function(){
    Route::get('/medical/edit', [editProfileController::class, 'edit'])->name('medical.edit');
    Route::post('/medical/update', [editProfileController::class, 'update'])->name('medical.update');

});


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
