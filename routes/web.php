<?php

use App\Http\Controllers\AdController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\NoticeController;
use App\Http\Controllers\PagesController;
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

// Route::get('/viewnews2', function(){
//     return view('viewnews2');
// });
Route::get('/viewnews2', [PagesController::class, 'viewnews2'])->name('viewnews2');


Route::get('/viewnews', [PagesController::class, 'viewnews'])->name('viewnews');


Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');

    Route::get('/category', [CategoryController::class, 'index'])->name('category.index');
    Route::get('/category/create',[CategoryController::class, 'create'])->name('category.create');
    Route::post('/category/store',[CategoryController::class, 'store'])->name('category.store');
    Route::get('/category/{id}/edit',[CategoryController::class, 'edit'])->name('category.edit');
    Route::post('/category/{id}/update',[CategoryController::class, 'update'])->name('category.update');
    Route::post('/category/delete',[CategoryController::class, 'delete'])->name('category.delete');

    Route::get('/notice', [NoticeController::class, 'index'])->name('notice.index');
    Route::get('/notice/create',[NoticeController::class, 'create'])->name('notice.create');
    Route::post('/notice/store',[NoticeController::class, 'store'])->name('notice.store');
    Route::get('/notice/{id}/edit',[NoticeController::class, 'edit'])->name('notice.edit');
    Route::post('/notice/{id}/update',[NoticeController::class, 'update'])->name('notice.update');
    Route::post('/notice/delete',[NoticeController::class, 'delete'])->name('notice.delete');

    Route::get('/gallery', [GalleryController::class, 'index'])->name('gallery.index');
    Route::get('/gallery/create',[GalleryController::class, 'create'])->name('gallery.create');
    Route::post('/gallery/store',[GalleryController::class, 'store'])->name('gallery.store');
    Route::get('/gallery/{gallery}/edit',[GalleryController::class, 'edit'])->name('gallery.edit');
    Route::post('/gallery/{gallery}/update',[GalleryController::class, 'update'])->name('gallery.update');
    Route::post('/gallery/delete',[GalleryController::class, 'delete'])->name('gallery.delete');

    Route::get('/ad', [AdController::class, 'index'])->name('ad.index');
    Route::get('/ad/create',[AdController::class, 'create'])->name('ad.create');
    Route::post('/ad/store',[AdController::class, 'store'])->name('ad.store');
    Route::get('/ad/{ad}/edit',[AdController::class, 'edit'])->name('ad.edit');
    Route::post('/ad/{ad}/update',[AdController::class, 'update'])->name('ad.update');
    Route::post('/ad/delete',[AdController::class, 'delete'])->name('ad.delete');

    Route::get('/news', [NewsController::class, 'index'])->name('news.index');
    Route::get('/news/create',[NewsController::class, 'create'])->name('news.create');
    Route::post('/news/store',[NewsController::class, 'store'])->name('news.store');
    Route::get('/news/{news}/edit',[NewsController::class, 'edit'])->name('news.edit');
    Route::post('/news/{news}/update',[NewsController::class, 'update'])->name('news.update');
    Route::post('/news/delete',[NewsController::class, 'delete'])->name('news.delete');


    
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
