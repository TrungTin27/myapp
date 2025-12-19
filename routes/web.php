<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CMS\CMSController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\BannersController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\CoursesController;
use App\Http\Controllers\Admin\ProductDetailsController;
use App\Http\Controllers\Admin\Contact_messagesController;
use App\Http\Controllers\methodsController;
use App\Http\Controllers\searchesController;
use App\Http\Controllers\postsController;
use App\Http\Controllers\Admin\ProductsController;
use App\Http\Controllers\Admin\Recipe_stepsController;
use App\Http\Controllers\Admin\Recipe_ingredientsController;
use App\Http\Controllers\Admin\Recipe_sectionsController;
use App\Http\Controllers\Admin\Recipe_videosController;
use App\Http\Controllers\Admin\AdminController;

use App\Http\Controllers\Admin\Product_reviewsController;
use App\Http\Controllers\Admin\ProductsController as AdminProductsController;

Route::get('/', [HomeController::class, 'index']);
Route::resource('posts', postsController::class);
Route::resource('searches', searchesController::class);
Route::resource('methods', methodsController::class);
//Admin//
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
    Route::get('/banner', [BannersController::class, 'index'])->name('banners.index');
    Route::get('banner/create', [BannersController::class, 'create'])->name('banners.create');
    Route::post('/banner/store', [BannersController::class, 'store'])->name('banners.store');
    Route::get('/banner/edit/{id}', [BannersController::class, 'edit'])->name('banners.edit');
    Route::put('/banner/{id}', [BannersController::class, 'update'])->name('banners.update');
    //Category
    Route::get('category/index', [CategoryController::class, 'index'])->name('category.index');
    Route::get('category/create', [CategoryController::class, 'create'])->name('category.create');
    Route::post('category/store', [CategoryController::class, 'store'])->name('category.store');
    //Product_details//
    Route::get('/product_details', [ProductDetailsController::class, 'index'])->name('product_details.index');
    Route::get('/product_details/create', [ProductDetailsController::class, 'create'])->name('product_details.create');
    //Recipe_ingredients
    Route::get('/ingredients', [Recipe_ingredientsController::class, 'index'])->name('ingredients.index');
    Route::get('/ingredients/create', [Recipe_ingredientsController::class, 'create'])->name('product_details.create');
    //Recipe_steps//X
    Route::get('/recipe_steps/index', [Recipe_stepsController::class, 'index'])->name('recipe_steps.index');
    Route::get('/recipe_steps/create', [Recipe_stepsController::class, 'create'])->name('product_details.create');
    //Recipe_sections//
    Route::get('/recipe_sections/index', [Recipe_sectionsController::class, 'index'])->name('recipe_sections.index');
    Route::get('/recipe_sections/create', [Recipe_sectionsController::class, 'create'])->name('product_details.create');
    //Contact_messages//
    Route::get('/contact_messages/index', [Contact_messagesController::class, 'index'])->name('contact_messages.index');
    Route::get('/contact_messages/create', [Contact_messagesController::class, 'create'])->name('product_details.create');
    //Recipe_videos//
    Route::get('/recipe_videos/index', [Recipe_videosController::class, 'index'])->name('recipe_videos.index');
    Route::get('/recipe_videos/create', [Recipe_videosController::class, 'create'])->name('product_details.create');
    //Product_review
    Route::get('/product_reviews', [Product_reviewsController::class, 'index'])->name('product_reviews.index');
    Route::get('product_reviews/create', [Product_reviewsController::class, 'create'])->name('product_reviews.create');
    Route::post('product_reviews/store', [Product_reviewsController::class, 'store'])->name('product_reviews.store');
});
//Course
Route::prefix('admin')->group(function () {
    Route::resource('courses', CoursesController::class);
});


//CMS//
Route::prefix('cms ')->group(function () {
    Route::get('/', [CMSController::class, 'index']);
});
