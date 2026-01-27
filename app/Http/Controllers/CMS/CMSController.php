<?php

namespace App\Http\Controllers\CMS;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\breakfast_recipes;
use App\Models\Post;
use App\Models\chicken_recipes;
use App\Models\pasta_recipes;
use App\Models\reader_favorites;
use App\Models\author_sections;
use App\Models\how_tos;

use App\Models\under_recipes;

class CMSController extends Controller
{
    public function index()
    {
        /* ================= BANNER ================= */
        $banners = Banner::where('is_active', 1)
            ->orderBy('sort_order')
            ->get();

        /* ================= POSTS ================= */
        $posts = Post::where('status', 'published')
            ->orderByDesc('published_at')
            ->get();

        /* ================= CHICKEN RECIPES ================= */

        // bài nổi bật (ảnh lớn)
        $chicken_featured = chicken_recipes::where('status', 'published')
            ->where('is_featured', 1)
            ->orderByDesc('created_at')
            ->first();

        // các bài còn lại (grid phải)
        $chicken_recipes = chicken_recipes::where('status', 'published')
            ->when($chicken_featured, function ($query) use ($chicken_featured) {
                $query->where('id', '!=', $chicken_featured->id);
            })
            ->orderByDesc('created_at')
            ->get();

             /* ================= PASTA RECIPES ================= */

        $pasta_recipes = pasta_recipes::where('status', 'published')
            ->orderByDesc('created_at')
            ->get();

      /* ================= READER FAVORITES ================= */
        $reader_favorites = reader_favorites::where('is_active', 1)
            ->orderBy('sort_order')
            ->orderByDesc('created_at')
            ->get();
/* =================  author_sections ================= */
             $author_sections = author_sections::where('is_active', 1)
        ->latest()
        ->first();

        /* =================  learn how to ================= */
        $how_tos = how_tos::where('is_active', 1)
    ->orderBy('sort_order')
    ->get();
            /* =================  breakfast recipes ================= */
               $breakfast_recipes = breakfast_recipes::where('status', 'published')
        ->orderBy('created_at', 'desc')
        ->take(8)
        ->get();

         /* =================  under recipes ================= */

             $under_recipes = under_recipes::where('status', 'published')
        ->latest()
        ->take(4)
        ->get();


        return view('cms.home', compact(
            'banners',
            'posts',
            'chicken_featured',
            'chicken_recipes',
            'pasta_recipes',
            'reader_favorites',
            'author_sections',
            'how_tos',
            'breakfast_recipes',
            'under_recipes' 
        ));
    }
}
