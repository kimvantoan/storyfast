<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Story;
use Illuminate\Http\Request;

class PendingStoryController extends Controller
{
    public function index(Request $request)
    {
        $query = Story::with(['categories'])->where('is_approved', false)->where('is_draft', false);

        if ($request->has('q') && $request->q !== '') {
            $searchTerm = '%' . $request->q . '%';
            $query->where(function($q) use ($searchTerm) {
                $q->where('title', 'like', $searchTerm)
                  ->orWhere('author', 'like', $searchTerm);
            });
        }

        $stories = $query->latest()->paginate(10);
        $type = 'stories';
        return view('admin.pending', compact('stories', 'type'));
    }

    public function approve(Story $story)
    {
        $story->update(['is_approved' => true]);
        // Only approve chapters that the author has officially "published"
        $story->chapters()->where('status', 'published')->update(['is_approved' => true]);
        return redirect()->back()->with('success', 'Story and its published chapters approved successfully.');
    }
}
