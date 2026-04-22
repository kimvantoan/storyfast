<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Story;

class StoryController extends Controller
{
    public function show($id_or_slug)
    {
        $query = Story::with(['categories', 'chapters' => function($q) {
            $q->where('status', 'published')->orderBy('order_index', 'asc');
        }]);

        if (is_numeric($id_or_slug)) {
            $query->where('id', $id_or_slug);
        } else {
            $query->where('slug', $id_or_slug);
        }

        if (!auth()->check() || (auth()->user()->role !== 'admin' && auth()->user()->role !== 'author')) {
            $query->where('is_approved', true)->where('is_published', true);
        } else if (auth()->check() && auth()->user()->role === 'author') {
            $query->where(function($q) {
                $q->where(function($q2) {
                    $q2->where('is_approved', true)->where('is_published', true);
                })->orWhere('user_id', auth()->id());
            });
        }

        $story = $query->firstOrFail();

        // Increment views
        $story->increment('views');

        // Fetch paginated chapters
        $chaptersQuery = $story->chapters()->where('status', 'published')->orderBy('order_index', 'asc');
        
        // Gatekeep unapproved chapters for public viewers
        if (!auth()->check() || (auth()->user()->role !== 'admin' && $story->user_id !== auth()->id())) {
            $chaptersQuery->where('is_approved', true);
        }
        
        if (request()->filled('cq')) {
            $cq = '%' . request('cq') . '%';
            $chaptersQuery->where(function($q) use ($cq) {
                $q->where('title', 'like', $cq)
                  ->orWhere('order_index', 'like', $cq);
            });
        }
        
        $chapters = $chaptersQuery->paginate(10)->withQueryString();

        return view('story', compact('story', 'chapters'));
    }
}
