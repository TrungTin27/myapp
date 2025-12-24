<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CMS\CMSController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\methodsController;
use App\Http\Controllers\searchesController;
use App\Http\Controllers\Admin\BannersController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\CoursesController;
use App\Http\Controllers\Admin\ProductDetailsController;
use App\Http\Controllers\Admin\Contact_messagesController;
use App\Http\Controllers\Admin\PostsController;
use App\Http\Controllers\Admin\ProductsController;
use App\Http\Controllers\Admin\Recipe_stepsController;
use App\Http\Controllers\Admin\Recipe_ingredientsController;
use App\Http\Controllers\Admin\Recipe_sectionsController;
use App\Http\Controllers\Admin\Recipe_videosController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\Breakfast_recipesController;
use App\Http\Controllers\Admin\Chicken_recipesController;
use App\Http\Controllers\Admin\Pasta_recipesController;
use App\Http\Controllers\Admin\Product_reviewsController;
use App\Http\Controllers\Admin\Under_recipesController;

Route::get('/', [HomeController::class, 'index']);
Route::resource('posts', PostsController::class);
Route::resource('searches', searchesController::class);
Route::resource('methods', methodsController::class);
//Admin//
Route::prefix('admin')->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('admin.index');
    Route::get('/login', [AdminController::class, 'showLogin'])->name('admin.login');
    Route::post('/login', [AdminController::class, 'login'])->name('admin.login.post');
    Route::post('/logout', [AdminController::class, 'logout'])->name('logout');
    Route::post('/admin/change-password', [AdminController::class, 'changePassword'])->name('admin.changePassword');
    //Product//
    Route::get('/product', [ProductsController::class, 'index'])->name('product.index');
    Route::get('product/create', [ProductsController::class, 'create'])->name('product.create');
    Route::post('product/store', [ProductsController::class, 'store'])->name('product.store');
    //Banner//
    Route::get('/banner', [BannersController::class, 'index'])->name('banners.index');
    Route::get('banner/create', [BannersController::class, 'create'])->name('banners.create');
    Route::post('/banner/store', [BannersController::class, 'store'])->name('banners.store');
    Route::get('/banner/edit/{id}', [BannersController::class, 'edit'])->name('banners.edit');
    Route::put('/banner/{id}', [BannersController::class, 'update'])->name('banners.update');
    //Category//
    Route::get('category/index', [CategoryController::class, 'index'])->name('category.index');
    Route::get('category/create', [CategoryController::class, 'create'])->name('category.create');
    Route::post('category/store', [CategoryController::class, 'store'])->name('category.store');
    //Product_details//
    Route::get('/product_details', [ProductDetailsController::class, 'index'])->name('product_details.index');
    Route::get('/product_details/create', [ProductDetailsController::class, 'create'])->name('product_details.create');
    //Recipe_ingredients//
    Route::get('/ingredients', [Recipe_ingredientsController::class, 'index'])->name('ingredients.index');
    Route::get('/ingredients/create', [Recipe_ingredientsController::class, 'create'])->name('ingredients.create');
    //Recipe_steps//
    Route::get('/recipe_steps/index', [Recipe_stepsController::class, 'index'])->name('recipe_steps.index');
    Route::get('/recipe_steps/create', [Recipe_stepsController::class, 'create'])->name('recipe_steps.create');
    //Recipe_sections//
    Route::get('/recipe_sections/index', [Recipe_sectionsController::class, 'index'])->name('recipe_sections.index');
    Route::get('/recipe_sections/create', [Recipe_sectionsController::class, 'create'])->name('recipe_sections.create');
    //Contact_messages//
    Route::get('/contact_messages', [Contact_messagesController::class, 'index'])->name('contact_messages.index');
    Route::delete('/contact/delete/{id}', [Contact_messagesController::class, 'destroy'])->name('contact.delete');
    //Recipe_videos//
    Route::get('/recipe_videos/index', [Recipe_videosController::class, 'index'])->name('recipe_videos.index');
    Route::get('/recipe_videos/create', [Recipe_videosController::class, 'create'])->name('recipe_videos.create');
    //Product_review//
    Route::get('/product_reviews', [Product_reviewsController::class, 'index'])->name('product_reviews.index');
    Route::get('product_reviews/create', [Product_reviewsController::class, 'create'])->name('product_reviews.create');
    Route::post('product_reviews/store', [Product_reviewsController::class, 'store'])->name('product_reviews.store');
    //Chicken_recipes//
    Route::get('/chicken_recipes', [Chicken_recipesController::class, 'index'])->name('chicken_recipes.index');
    Route::get('/chicken_recipes/create', [chicken_recipesController::class, 'create'])->name('chicken_recipes.create');
    Route::post('/chicken_recipes/store', [chicken_recipesController::class, 'store'])->name('chicken_recipes.store');
    Route::get('/chicken_recipes/edit/{id}', [chicken_recipesController::class, 'edit'])->name('chicken_recipes.edit');
    Route::put('/chicken_recipes/{id}', [chicken_recipesController::class, 'update'])->name('chicken_recipes.update');
    //Pasta_recipes//
    Route::get('/pasta_recipes', [Pasta_recipesController::class, 'index'])->name('pasta_recipes.index');
    Route::get('/pasta_recipes/create', [pasta_recipesController::class, 'create'])->name('pasta_recipes.create');
    Route::post('/pasta_recipes/store', [pasta_recipesController::class, 'store'])->name('pasta_recipes.store');
    Route::get('/pasta_recipes/edit/{id}', [pasta_recipesController::class, 'edit'])->name('pasta_recipes.edit');
    Route::put('/pasta_recipes/{id}', [pasta_recipesController::class, 'update'])->name('pasta_recipes.update');
    //Breakfast_recipes//
    Route::get('/breakfast_recipes', [Breakfast_recipesController::class, 'index'])->name('breakfast_recipes.index');
    Route::get('/breakfast_recipes/create', [breakfast_recipesController::class, 'create'])->name('breakfast_recipes.create');
    Route::post('/breakfast_recipes/store', [breakfast_recipesController::class, 'store'])->name('breakfast_recipes.store');
    Route::get('/breakfast_recipes/edit/{id}', [breakfast_recipesController::class, 'edit'])->name('breakfast_recipes.edit');
    Route::put('/breakfast_recipes/{id}', [breakfast_recipesController::class, 'update'])->name('breakfast_recipes.update');
    //Under_recipes//
    Route::get('/under_recipes', [Under_recipesController::class, 'index'])->name('under_recipes.index');
    Route::get('/under_recipes/create', [under_recipesController::class, 'create'])->name('under_recipes.create');
    Route::post('/under_recipes/store', [under_recipesController::class, 'store'])->name('under_recipes.store');
    Route::get('/under_recipes/edit/{id}', [under_recipesController::class, 'edit'])->name('under_recipes.edit');
    Route::put('/under_recipes/{id}', [under_recipesController::class, 'update'])->name('under_recipes.update');
    //Trending now//latest posts//post//
    Route::get('/posts', [PostsController::class, 'index'])->name('posts.index');
    Route::get('/posts/create', [PostsController::class, 'create'])->name('posts.create');
    Route::post('/posts/store', [PostsController::class, 'store'])->name('posts.store');
    Route::get('/posts/edit/{id}', [PostsController::class, 'edit'])->name('posts.edit');
    Route::put('/posts/{id}', [PostsController::class, 'update'])->name('posts.update');
});


//Course//
Route::prefix('admin')->group(function () {
    Route::resource('courses', CoursesController::class);
});


//CMS//
Route::get('/', [CMSController::class, 'index'])->name('home');
Route::post('/contact_messages/store', [Contact_messagesController::class, 'store'])->name('contact.store');
