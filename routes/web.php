<?php

use App\Http\Controllers\Admin\AdminManageMedicalProfileController;
use App\Http\Controllers\medical\editProfileController;
use App\Http\Controllers\medical\MedicalArticleController;
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
Route::get('/public/medical/showprofile/{user_id:id}', [PublicController::class, 'showprofile'])->name('public.medical.showprofile');

//admin
Route::middleware(['verified','authadmin'])->group(function(){

    //medical profiles
    Route::get('admin/medical/index', [AdminManageMedicalProfileController::class, 'index'])->name('admin.medical.index');
    Route::get('admin/medical/accept/{user_id:id}', [AdminManageMedicalProfileController::class, 'accept'])->name('admin.medical.accept');
    Route::get('admin/medical/reject/{user_id:id}', [AdminManageMedicalProfileController::class, 'reject'])->name('admin.medical.reject');
    Route::get('admin/medical/stop/{user_id:id}', [AdminManageMedicalProfileController::class, 'stop'])->name('admin.medical.stop');
    Route::get('admin/medical/unblock/{user_id:id}', [AdminManageMedicalProfileController::class, 'unblock'])->name('admin.medical.unblock');

    
});

//user
Route::middleware(['verified','authuser'])->group(function(){

});

//medical personnel
Route::middleware(['verified','authmedicalpersonnel'])->group(function(){

    //medical profiles
    Route::get('/medical/edit', [editProfileController::class, 'edit'])->name('medical.edit');
    Route::post('/medical/update', [editProfileController::class, 'update'])->name('medical.update');

    //articles
    Route::get('/medical/article/create', [MedicalArticleController::class, 'create'])->name('medical.article.create');
    Route::post('/medical/article/store', [MedicalArticleController::class, 'store'])->name('medical.article.store');
    Route::get('/medical/article/store', [MedicalArticleController::class, 'index'])->name('medical.article.index');
    Route::get('/medical/article/edit/{article_id:id}', [MedicalArticleController::class, 'edit'])->name('admin.medical.edit');

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
