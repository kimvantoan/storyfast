<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Story;

class ReadingController extends Controller
{
    public function show($id_or_slug, $order_index)
    {
        $query = Story::with(['chapters']);

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

        $chapterQuery = $story->chapters()->where('order_index', $order_index);
        
        if (!auth()->check() || (auth()->user()->role !== 'admin' && $story->user_id !== auth()->id())) {
            $chapterQuery->where('status', 'published')->where('is_approved', true);
        }
        
        $chapter = $chapterQuery->firstOrFail();

        // Previous and Next Chapters (respecting same visibility rules)
        $prevChapterQuery = $story->chapters()->where('order_index', '<', $order_index)->orderBy('order_index', 'desc');
        $nextChapterQuery = $story->chapters()->where('order_index', '>', $order_index)->orderBy('order_index', 'asc');
        
        if (!auth()->check() || (auth()->user()->role !== 'admin' && $story->user_id !== auth()->id())) {
            $prevChapterQuery->where('status', 'published')->where('is_approved', true);
            $nextChapterQuery->where('status', 'published')->where('is_approved', true);
        }

        $prevChapter = $prevChapterQuery->first();
        $nextChapter = $nextChapterQuery->first();

        // Only increment views if not an admin/author viewing their own
        if (!auth()->check() || (auth()->user()->role !== 'admin' && $story->user_id !== auth()->id())) {
            $chapter->increment('views');
        }

        return view('reading', compact('story', 'chapter', 'prevChapter', 'nextChapter'));
    }

    public function drawerList(\Illuminate\Http\Request $request, $id_or_slug)
    {
        $query = Story::query();

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

        $chaptersQuery = $story->chapters()->where('status', 'published')->orderBy('order_index', 'asc');
        
        // Gatekeep unapproved chapters for public viewers
        if (!auth()->check() || (auth()->user()->role !== 'admin' && $story->user_id !== auth()->id())) {
            $chaptersQuery->where('is_approved', true);
        }
        
        if ($request->filled('cq')) {
            $cq = '%' . $request->cq . '%';
            $chaptersQuery->where(function($q) use ($cq) {
                $q->where('title', 'like', $cq)
                  ->orWhere('order_index', 'like', $cq);
            });
        }
        
        // Pass a distinct parameter so pagination links keep 'cq'
        // and we can intercept them via JS
        $chapters = $chaptersQuery->paginate(15)->withQueryString();

        return view('partials.chapter_drawer_content', compact('story', 'chapters'));
    }
}
