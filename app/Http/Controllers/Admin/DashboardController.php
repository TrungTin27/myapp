<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\author_sections;
use App\Models\Banner;
use App\Models\breakfast_recipes;
use App\Models\chicken_recipes;
use App\Models\Contact_messages;
use App\Models\how_tos;
use App\Models\pasta_recipes;
use App\Models\posts;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        return view('admin.Dashboard.index', [
            'bannerCount' => Banner::count(),
            'postCount' => posts::count(),
            'recipeCount' =>
            chicken_recipes::count()
                + pasta_recipes::count()
                + breakfast_recipes::count(),

            'unreadContacts' => Contact_messages::where('is_read', 0)->latest()->take(5)->get(),
            'latestPosts' => posts::latest()->take(5)->get(),

            'authorActive' => author_sections::where('is_active', 1)->exists(),
            'howToActive' => how_tos::where('is_active', 1)->exists(),
        ]);
    }
}
