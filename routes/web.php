<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
Route::get('/', [HomeController::class, 'index']);
use App\Http\Controllers\productsController; 
Route::resource('products', productsController::class);
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
use App\Http\Controllers\coursesController; 
Route::resource('courses', coursesController::class);
use App\Http\Controllers\methodsController; 
Route::resource('methods', methodsController::class);
use App\Http\Controllers\partnersController; 
Route::resource('partners', partnersController::class);
use App\Http\Controllers\contact_messagesController;
Route::resource('contact_messages', contact_messagesController::class);
use App\Http\Controllers\categoriesController; 
Route::resource('categories', categoriesController::class);
use App\Http\Controllers\bannersController; 
Route::resource('banners', bannersController::class);

use App\Http\Controllers\CMS\CMSController;

use App\Http\Controllers\Admin\AdminController;

Route::prefix('admin')->group(function () {
         Route::get('/', [AdminController::class, 'index'])->name('admin.index');

    Route::get('/login', [AdminController::class, 'showLogin'])->name('admin.login');
    Route::post('/login', [AdminController::class, 'login'])->name('admin.login.post');
});

Route::prefix('cms ')->group(function () {
    Route::get('/', [CMSController::class, 'index']);
});
