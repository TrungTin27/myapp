<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\BannersController;
Route::get('/', [HomeController::class, 'index']);

use App\Http\Controllers\Admin\ProductsController;
use App\Http\Controllers\product_detailsController;

Route::resource('product_details', product_detailsController::class);

use App\Http\Controllers\product_reviewsController;

Route::resource('product_reviews', product_reviewsController::class);

use App\Http\Controllers\recipe_stepsController;

Route::resource('recipe_steps', recipe_stepsController::class);

use App\Http\Controllers\recipe_ingredientsController;

Route::resource('recipe_ingredients', recipe_ingredientsController::class);

use App\Http\Controllers\recipe_sectionsController;

Route::resource('recipe_sections', recipe_sectionsController::class);

use App\Http\Controllers\recipe_videosController;

Route::resource('recipe_videos', recipe_videosController::class);

use App\Http\Controllers\postsController;

Route::resource('posts', postsController::class);

use App\Http\Controllers\searchesController;

Route::resource('searches', searchesController::class);

use App\Http\Controllers\methodsController;

Route::resource('methods', methodsController::class);

use App\Http\Controllers\partnersController;

Route::resource('partners', partnersController::class);

use App\Http\Controllers\contact_messagesController;

Route::resource('contact_messages', contact_messagesController::class);



//Admin//
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CategoriesController;
use App\Http\Controllers\Admin\ProductsController as AdminProductsController;

Route::prefix('admin')->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('admin.index');
    Route::get('/login', [AdminController::class, 'showLogin'])->name('admin.login');
    Route::post('/login', [AdminController::class, 'login'])->name('admin.login.post');
    Route::post('/logout', [AdminController::class, 'logout'])->name('logout');
    Route::post('/admin/change-password', [AdminController::class, 'changePassword'])->name('admin.changePassword');


    //Product
    Route::get('/product', [ProductsController::class, 'index'])->name('product.index');
    Route::get('product/create', [ProductsController::class, 'create'])->name('product.create');
    Route::post('product/store', [ProductsController::class, 'store'])->name('product.store');

    //Banner
    Route::get('/banner',[BannersController::class,'index'])->name('banners.index');
    Route::get('banner/create',[BannersController::class,'create'])->name('banners.create');
    Route::post('/banner/store',[BannersController::class,'store'])->name('banners.store');
    Route::get('/banner/edit/{id}',[BannersController::class,'edit'])->name('banners.edit');
    Route::put('/banner/{id}',[BannersController::class,'update'])->name('banners.update');
});
//Course
use App\Http\Controllers\Admin\CoursesController;

// Tất cả route admin sẽ bắt đầu bằng /admin/...
Route::prefix('admin')->group(function () {
    // Tạo toàn bộ routes cho khóa học
    Route::resource('courses', CoursesController::class);
});
//Categories//
use App\Http\Controllers\Admin\CategoryController;

Route::prefix('admin')->group(function () {
Route:: get('/index',[CategoryController::class,'index'])->name('category.index');
Route:: get('/create',[CategoryController::class,'create'])->name('category.create');
Route:: post('/store',[CategoryController::class,'store'])->name('category.store');


});



//CMS//
use App\Http\Controllers\CMS\CMSController;

Route::prefix('cms ')->group(function () {
    Route::get('/', [CMSController::class, 'index']);
});
