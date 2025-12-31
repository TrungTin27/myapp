<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CMS\CMSController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SearchesController;
use App\Http\Controllers\Admin\BannersController;
use App\Http\Controllers\Admin\Contact_messagesController;
use App\Http\Controllers\Admin\PostsController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\Breakfast_recipesController;
use App\Http\Controllers\Admin\Chicken_recipesController;
use App\Http\Controllers\Admin\Pasta_recipesController;
use App\Http\Controllers\Admin\Under_recipesController;
use App\Http\Controllers\Admin\Reader_favoritesController;
use App\Http\Controllers\Admin\Author_sectionsController;
use App\Http\Controllers\Admin\How_tosController;
use App\Http\Controllers\Admin\DashboardController;

Route::get('/', [HomeController::class, 'index']);
Route::resource('posts', PostsController::class);
Route::resource('searches', SearchesController::class);

//Admin//
Route::prefix('admin')->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('admin.index');
    Route::get('/login', [AdminController::class, 'showLogin'])->name('admin.login');
    Route::post('/login', [AdminController::class, 'login'])->name('admin.login.post');
    Route::post('/logout', [AdminController::class, 'logout'])->name('logout');
    Route::post('/admin/change-password', [AdminController::class, 'changePassword'])->name('admin.changePassword');
    //Dashboard//
    Route::get('admin/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');
    //Banner//
    Route::get('/banner', [BannersController::class, 'index'])->name('banners.index');
    Route::get('banner/create', [BannersController::class, 'create'])->name('banners.create');
    Route::post('/banner/store', [BannersController::class, 'store'])->name('banners.store');
    Route::get('/banner/edit/{id}', [BannersController::class, 'edit'])->name('banners.edit');
    Route::put('/banner/{id}', [BannersController::class, 'update'])->name('banners.update');
    Route::delete('/banner/{id}/delete', [BannersController::class, 'delete'])->name('banners.delete');
    //Contact_messages//
    Route::get('/contact_messages', [Contact_messagesController::class, 'index'])->name('contact_messages.index');
    Route::post('/contact/store', [Contact_messagesController::class, 'store'])->name('contact.store');
    Route::delete('/contact/delete/{id}', [Contact_messagesController::class, 'destroy'])->name('contact.delete');
    //Chicken_recipes//
    Route::get('/chicken_recipes', [Chicken_recipesController::class, 'index'])->name('chicken_recipes.index');
    Route::get('/chicken_recipes/create', [chicken_recipesController::class, 'create'])->name('chicken_recipes.create');
    Route::post('/chicken_recipes/store', [chicken_recipesController::class, 'store'])->name('chicken_recipes.store');
    Route::get('/chicken_recipes/edit/{id}', [chicken_recipesController::class, 'edit'])->name('chicken_recipes.edit');
    Route::put('/chicken_recipes/{id}', [chicken_recipesController::class, 'update'])->name('chicken_recipes.update');
    Route::delete('/chicken_recipes/{id}/delete', [chicken_recipesController::class, 'delete'])->name('chicken_recipes.delete');
    //Pasta_recipes//
    Route::get('/pasta_recipes', [Pasta_recipesController::class, 'index'])->name('pasta_recipes.index');
    Route::get('/pasta_recipes/create', [pasta_recipesController::class, 'create'])->name('pasta_recipes.create');
    Route::post('/pasta_recipes/store', [pasta_recipesController::class, 'store'])->name('pasta_recipes.store');
    Route::get('/pasta_recipes/edit/{id}', [pasta_recipesController::class, 'edit'])->name('pasta_recipes.edit');
    Route::put('/pasta_recipes/{id}', [pasta_recipesController::class, 'update'])->name('pasta_recipes.update');
    Route::delete('/pasta_recipes/{id}/delete', [pasta_recipesController::class, 'delete'])->name('pasta_recipes.delete');
    //Breakfast_recipes//
    Route::get('/breakfast_recipes', [Breakfast_recipesController::class, 'index'])->name('breakfast_recipes.index');
    Route::get('/breakfast_recipes/create', [breakfast_recipesController::class, 'create'])->name('breakfast_recipes.create');
    Route::post('/breakfast_recipes/store', [breakfast_recipesController::class, 'store'])->name('breakfast_recipes.store');
    Route::get('/breakfast_recipes/edit/{id}', [breakfast_recipesController::class, 'edit'])->name('breakfast_recipes.edit');
    Route::put('/breakfast_recipes/{id}', [breakfast_recipesController::class, 'update'])->name('breakfast_recipes.update');
    Route::delete('/breakfast_recipes/{id}/delete', [breakfast_recipesController::class, 'delete'])->name('breakfast_recipes.delete');
    //Under_recipes//
    Route::get('/under_recipes', [Under_recipesController::class, 'index'])->name('under_recipes.index');
    Route::get('/under_recipes/create', [under_recipesController::class, 'create'])->name('under_recipes.create');
    Route::post('/under_recipes/store', [under_recipesController::class, 'store'])->name('under_recipes.store');
    Route::get('/under_recipes/edit/{id}', [under_recipesController::class, 'edit'])->name('under_recipes.edit');
    Route::put('/under_recipes/{id}', [under_recipesController::class, 'update'])->name('under_recipes.update');
    Route::delete('/under_recipes/{id}/delete', [under_recipesController::class, 'delete'])->name('under_recipes.delete');
    //Trending now//latest posts//post//
    Route::resource('posts', PostsController::class);
    Route::get('/posts', [PostsController::class, 'index'])->name('posts.index');
    Route::get('/posts/create', [PostsController::class, 'create'])->name('posts.create');
    Route::post('/posts/store', [PostsController::class, 'store'])->name('posts.store');
    Route::get('/posts/edit/{id}', [PostsController::class, 'edit'])->name('posts.edit');
    Route::put('/posts/{id}', [PostsController::class, 'update'])->name('posts.update');
    Route::delete('/posts/{id}/delete', [PostsController::class, 'delete'])->name('posts.delete');
    //Reader_favorites//
    Route::get('/reader_favorites', [Reader_favoritesController::class, 'index'])->name('reader_favorites.index');
    Route::get('/reader_favorites/create', [Reader_favoritesController::class, 'create'])->name('reader_favorites.create');
    Route::post('/reader_favorites/store', [Reader_favoritesController::class, 'store'])->name('reader_favorites.store');
    Route::get('/reader_favorites/edit/{id}', [Reader_favoritesController::class, 'edit'])->name('reader_favorites.edit');
    Route::put('/reader_favorites/{id}', [Reader_favoritesController::class, 'update'])->name('reader_favorites.update');
    Route::delete('/reader_favorites/{id}/delete', [Reader_favoritesController::class, 'delete'])->name('reader_favorites.delete');
    //Author_sections//
    Route::get('/author_sections', [Author_sectionsController::class, 'index'])->name('author_sections.index');
    Route::get('/author_sections/create', [author_sectionsController::class, 'create'])->name('author_sections.create');
    Route::post('/author_sections/store', [author_sectionsController::class, 'store'])->name('author_sections.store');
    Route::get('/author_sections/edit/{id}', [author_sectionsController::class, 'edit'])->name('author_sections.edit');
    Route::put('/author_sections/{id}', [author_sectionsController::class, 'update'])->name('author_sections.update');
    Route::delete('/author_sections/{id}/delete', [author_sectionsController::class, 'delete'])->name('author_sections.delete');
    //How_tos//
    Route::get('/how_tos', [How_tosController::class, 'index'])->name('how_tos.index');
    Route::get('/how_tos/create', [how_tosController::class, 'create'])->name('how_tos.create');
    Route::post('/how_tos/store', [how_tosController::class, 'store'])->name('how_tos.store');
    Route::get('/how_tos/edit/{id}', [how_tosController::class, 'edit'])->name('how_tos.edit');
    Route::put('/how_tos/{id}', [how_tosController::class, 'update'])->name('how_tos.update');
    Route::delete('/how_tos/{id}/delete', [how_tosController::class, 'delete'])->name('how_tos.delete');
});

//CMS//
Route::get('/', [CMSController::class, 'index'])->name('home');
Route::post('/contact_messages/store', [Contact_messagesController::class, 'store'])->name('contact.store');
