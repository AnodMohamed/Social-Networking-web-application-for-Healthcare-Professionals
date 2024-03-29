<?php

use App\Http\Controllers\Admin\AdminArticleController;
use App\Http\Controllers\Admin\AdminManageMedicalProfileController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\medical\editProfileController;
use App\Http\Controllers\medical\MedicalArticleController;
use App\Http\Controllers\public\PublicController;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

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
Route::get('/public/medical/category/{category:string}', [PublicController::class, 'category'])->name('public.medical.category');
Route::get('/public/medical/occupation/{occupation:string}', [PublicController::class, 'occupation'])->name('public.medical.occupation');
Route::get('/public/article/showarticle/{article_id:id}', [PublicController::class, 'showarticle'])->name('public.article.showarticle');


//comment
Route::post('/comments/store', [CommentController::class, 'store'])->name('comments.store');
Route::get('/comments/edit/{id}', [CommentController::class, 'edit'])->name('comments.edit');
Route::post('/comments/update/{id}', [CommentController::class, 'update'])->name('comments.update');
Route::get('/comments/delete/{id}', [CommentController::class, 'delete'])->name('comments.delete');
Route::post('/like', [CommentController::class, 'like'])->name('like');


//admin
Route::middleware(['verified','authadmin'])->group(function(){
    //dashboard
    Route::get('admin/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');

    //medical profiles
    Route::get('admin/medical/index', [AdminManageMedicalProfileController::class, 'index'])->name('admin.medical.index');
    Route::get('admin/medical/accept/{user_id:id}', [AdminManageMedicalProfileController::class, 'accept'])->name('admin.medical.accept');
    Route::get('admin/medical/reject/{user_id:id}', [AdminManageMedicalProfileController::class, 'reject'])->name('admin.medical.reject');
    Route::get('admin/medical/stop/{user_id:id}', [AdminManageMedicalProfileController::class, 'stop'])->name('admin.medical.stop');
    Route::get('admin/medical/unblock/{user_id:id}', [AdminManageMedicalProfileController::class, 'unblock'])->name('admin.medical.unblock');

    //articles
    Route::get('admin/article/index', [AdminArticleController::class, 'index'])->name('admin.article.index');
    Route::get('/admin/article/delete/{article_id:id}', [AdminArticleController::class, 'destroy'])->name('admin.article.delete');

});



//medical personnel
Route::middleware(['verified','authmedicalpersonnel'])->group(function(){

    //medical profiles
    Route::get('/medical/edit', [editProfileController::class, 'edit'])->name('medical.edit');
    Route::post('/medical/update', [editProfileController::class, 'update'])->name('medical.update');

    //articles
    Route::get('/medical/article/create', [MedicalArticleController::class, 'create'])->name('medical.article.create');
    Route::post('/medical/article/store', [MedicalArticleController::class, 'store'])->name('medical.article.store');
    Route::get('/medical/article/index', [MedicalArticleController::class, 'index'])->name('medical.article.index');
    Route::get('/medical/article/edit/{article_id:id}', [MedicalArticleController::class, 'edit'])->name('medical.article.edit');
    Route::post('/medical/article/update/{article_id:id}', [MedicalArticleController::class, 'update'])->name('medical.article.update');
    Route::get('/medical/article/delete/{article_id:id}', [MedicalArticleController::class, 'destroy'])->name('medical.article.delete');

});


