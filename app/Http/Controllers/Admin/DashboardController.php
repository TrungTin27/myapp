<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\chicken_recipes;
use App\Models\Contact_messages;
use App\Models\how_tos;
use App\Models\pasta_recipes;
use App\Models\posts;
use App\Models\reader_favorites;
use App\Models\under_recipes;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;


class DashboardController extends Controller
{
    public function index()
    {
        // 🔹 CARD THỐNG KÊ
        $postCount = posts::count();
        $recipeCount = pasta_recipes::count();
        $recipeCount = chicken_recipes::count();
        $recipeCount = pasta_recipes::count();
        $recipeCount = under_recipes::count();
        $howToCount = how_tos::count();
        $contactCount = Contact_messages::count();

        // 🔹 BIỂU ĐỒ CỘT
        $contentChart = [
            'Posts' => $postCount,
            'Recipes' => $recipeCount,
            'How Tos' => $howToCount,
            'Favorites' => reader_favorites::count(),
        ];

        // 🔹 BIỂU ĐỒ ĐƯỜNG (7 ngày)
        $contactChart = Contact_messages::select(
            DB::raw('DATE(created_at) as date'),
            DB::raw('COUNT(*) as total')
        )
            ->where('created_at', '>=', Carbon::now()->subDays(6))
            ->groupBy('date')
            ->orderBy('date')
            ->get();

        // 🔹 CONTACT MỚI
        $latestContacts = Contact_messages::latest()->limit(5)->get();

        return view('admin.Dashboard.index', compact(
            'postCount',
            'recipeCount',
            'howToCount',
            'contactCount',
            'contentChart',
            'contactChart',
            'latestContacts'
        ));
    }
}
