<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Story;
use App\Models\Category;

class HomeController extends Controller
{
    public function index()
    {
        // Must be approved and published
        $baseQuery = Story::where('is_approved', true)
                          ->where('is_published', true);

        // 1. Featured story (Random from top 10 most viewed or recently updated)
        $featuredStory = (clone $baseQuery)->with(['categories'])
                                           ->orderBy('views', 'desc')
                                           ->first();

        // 2. Latest Updates (5 stories ordered by updated_at)
        $latestUpdates = (clone $baseQuery)->withCount(['chapters' => function($q) {
                                                $q->where('status', 'published')->where('is_approved', true);
                                           }])
                                           ->with(['categories'])
                                           ->orderBy('updated_at', 'desc')
                                           ->take(5)
                                           ->get();

        // 3. Hot Rankings (3 stories ordered by views)
        $hotStories = (clone $baseQuery)->with(['categories'])
                                        ->orderBy('views', 'desc')
                                        ->take(3)
                                        ->get();

        // 4. Categories limit to 10 for the homepage tags
        $categories = Category::orderBy('name', 'asc')->take(10)->get();

        return view('welcome', compact('featuredStory', 'latestUpdates', 'hotStories', 'categories'));
    }
}
