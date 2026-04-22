<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Story;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        $q = $request->input('q');
        
        $query = Story::where('is_approved', true)
                      ->where('is_published', true);

        if (!empty($q)) {
            $query->where(function($subQuery) use ($q) {
                $subQuery->where('title', 'like', '%' . $q . '%')
                         ->orWhere('author', 'like', '%' . $q . '%')
                         ->orWhereHas('categories', function($catQuery) use ($q) {
                             $catQuery->where('name', 'like', '%' . $q . '%');
                         });
            });
        }
        
        // Paginate stories
        $stories = $query->with('categories')
                         ->withCount(['chapters' => function($cq) {
                             $cq->where('status', 'published')->where('is_approved', true);
                         }])
                         ->orderBy('updated_at', 'desc')
                         ->paginate(15)
                         ->appends(['q' => $q]);

        return view('search', compact('stories', 'q'));
    }
}
