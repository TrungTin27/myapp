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

Route::get('/Reader_favorites', [Reader_favoritesController::class, 'index']);
Route::get('/Contact_messages', [Contact_messagesController::class, 'index']);
Route::get('/how_tos', [How_tosController::class, 'index']);
Route::get('/author_sections', [Author_sectionsController::class, 'index']);
Route::get('/under_recipes', [Under_recipesController::class, 'index']);
Route::get('/breakfast_recipes', [Breakfast_recipesController::class, 'index']);
Route::get('/pasta_recipes', [Pasta_recipesController::class, 'index']);
Route::get('/banners', [BannerController::class, 'index']);
Route::get('/posts', [PostController::class, 'index']);
Route::get('/chicken_recipes', [Chicken_recipesController::class, 'index']);
