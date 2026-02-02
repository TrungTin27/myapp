<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\author_sections;
use Illuminate\Http\Request;

class Author_sectionsController extends Controller
{
         public function index()
{
    $author_sections = author_sections::all();

    return response()->json([
        'status' => true,
        'data' => $author_sections
    ]);
}
}
