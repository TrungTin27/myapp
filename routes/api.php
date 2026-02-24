<?php

use App\Http\Controllers\Api\Chicken_recipesController;
use App\Http\Controllers\Api\Contact_messagesController;
use App\Http\Controllers\Api\Pasta_recipesController;
use App\Http\Controllers\Api\Reader_favoritesController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\BannerController;
use App\Http\Controllers\Api\PostController;
use App\Http\Controllers\Api\Under_recipesController;
use App\Http\Controllers\Api\Breakfast_recipesController;
use App\Http\Controllers\Api\How_tosController;
use App\Http\Controllers\Api\Author_sectionsController;


// banner //
Route::prefix('banner')->name('api.banner.')->group(function () {
    Route::get('/', [BannerController::class, 'index'])->name('index');
    Route::post('/', [BannerController::class, 'store'])->name('store');
    Route::get('/{id}', [BannerController::class, 'show'])->name('show');
    Route::put('/{id}', [BannerController::class, 'update'])->name('update');
    Route::delete('/{id}', [BannerController::class, 'destroy'])->name('destroy');
});
// posts //
Route::prefix('posts')->name('api.posts.')->group(function () {
    Route::get('/', [PostController::class, 'index'])->name('index');
    Route::post('/', [PostController::class, 'store'])->name('store');
    Route::get('/{id}', [PostController::class, 'show'])->name('show');
    Route::put('/{id}', [PostController::class, 'update'])->name('update');
    Route::delete('/{id}', [PostController::class, 'destroy'])->name('destroy');
});         
// chicken_recipes //
Route::prefix('chicken-recipes')->name('api.chicken_recipes.')->group(function () {
    Route::get('/', [Chicken_recipesController::class, 'index'])->name('index');
    Route::post('/', [Chicken_recipesController::class, 'store'])->name('store');
    Route::get('/{id}', [Chicken_recipesController::class, 'show'])->name('show');
    Route::put('/{id}', [Chicken_recipesController::class, 'update'])->name('update');
    Route::delete('/{id}', [Chicken_recipesController::class, 'destroy'])->name('destroy');
});
// pasta_recipes //
Route::prefix('pasta-recipes')->name('api.pasta_recipes.')->group(function () {
    Route::get('/', [Pasta_recipesController::class, 'index'])->name('index');
    Route::post('/', [Pasta_recipesController::class, 'store'])->name('store');
    Route::get('/{id}', [Pasta_recipesController::class, 'show'])->name('show');
    Route::put('/{id}', [Pasta_recipesController::class, 'update'])->name('update');
    Route::delete('/{id}', [Pasta_recipesController::class, 'destroy'])->name('destroy');
});
// breakfast_recipes //
Route::prefix('breakfast-recipes')->name('api.breakfast_recipes.')->group(function () {
    Route::get('/', [Breakfast_recipesController::class, 'index'])->name('index');
    Route::post('/', [Breakfast_recipesController::class, 'store'])->name('store');
    Route::get('/{id}', [Breakfast_recipesController::class, 'show'])->name('show');
    Route::put('/{id}', [Breakfast_recipesController::class, 'update'])->name('update');
    Route::delete('/{id}', [Breakfast_recipesController::class, 'destroy'])->name('destroy');
});
// Under_recipes //
Route::prefix('under-recipes')->name('api.under_recipes.')->group(function () {
    Route::get('/', [Under_recipesController::class, 'index'])->name('index');
    Route::post('/', [Under_recipesController::class, 'store'])->name('store');
    Route::get('/{id}', [Under_recipesController::class, 'show'])->name('show');
    Route::put('/{id}', [Under_recipesController::class, 'update'])->name('update');
    Route::delete('/{id}', [Under_recipesController::class, 'destroy'])->name('destroy');
});
//Author_sections //
Route::prefix('author-sections')->name('api.author_sections.')->group(function () {
    Route::get('/', [Author_sectionsController::class, 'index'])->name('index');
    Route::post('/', [Author_sectionsController::class, 'store'])->name('store');
    Route::get('/{id}', [Author_sectionsController::class, 'show'])->name('show');
    Route::put('/{id}', [Author_sectionsController::class, 'update'])->name('update');
    Route::delete('/{id}', [Author_sectionsController::class, 'destroy'])->name('destroy');
});

// How_tos //
Route::prefix('how-tos')->name('api.how_tos.')->group(function () {
    Route::get('/', [How_tosController::class, 'index'])->name('index');
    Route::post('/', [How_tosController::class, 'store'])->name('store');
    Route::get('/{id}', [How_tosController::class, 'show'])->name('show');
    Route::put('/{id}', [How_tosController::class, 'update'])->name('update');
    Route::delete('/{id}', [How_tosController::class, 'destroy'])->name('destroy');
});
// Reader_favorites //
Route::prefix('reader-favorites')->name('api.reader_favorites.')->group(function () {
    Route::get('/', [Reader_favoritesController::class, 'index'])->name('index');
    Route::post('/', [Reader_favoritesController::class, 'store'])->name('store');
    Route::get('/{id}', [Reader_favoritesController::class, 'show'])->name('show');
    Route::put('/{id}', [Reader_favoritesController::class, 'update'])->name('update');
    Route::delete('/{id}', [Reader_favoritesController::class, 'destroy'])->name('destroy');
});
// Contact_messages //
Route::prefix('contact-messages')->name('api.contact_messages.')->group(function () {
    Route::get('/', [Contact_messagesController::class, 'index'])->name('index');
    Route::post('/', [Contact_messagesController::class, 'store'])->name('store');
    Route::delete('/{id}', [Contact_messagesController::class, 'destroy'])->name('destroy');
});


