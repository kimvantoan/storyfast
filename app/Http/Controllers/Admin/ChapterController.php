<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Chapter;
use App\Models\Story;
use Illuminate\Http\Request;

class ChapterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Story $story)
    {
        // Auth check
        if (auth()->user()->role === 'author' && $story->user_id != auth()->id()) {
            abort(403, 'Unauthorized access.');
        }

        $query = $story->chapters()->orderBy('order_index', 'asc');
        
        if (request()->filled('publish')) {
            $query->where('status', request()->publish);
        }

        $chapters = $query->get();
        return view('admin.chapters.index', compact('story', 'chapters'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Story $story)
    {
        if (auth()->user()->role === 'author' && $story->user_id != auth()->id()) {
            abort(403, 'Unauthorized access.');
        }

        return view('admin.chapters.form', compact('story'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Story $story)
    {
        if (auth()->user()->role === 'author' && $story->user_id != auth()->id()) {
            abort(403, 'Unauthorized access.');
        }

        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'status' => 'required|in:draft,published',
            'order_index' => 'nullable|integer'
        ]);

        $orderIndex = $request->order_index ?? ($story->chapters()->max('order_index') + 1);

        $story->chapters()->create([
            'title' => $request->title,
            'content' => $request->content,
            'status' => $request->status,
            'order_index' => $orderIndex,
            'is_approved' => auth()->user()->role === 'admin'
        ]);

        return redirect()->route('admin.chapters.index', $story)->with('success', 'Chapter created successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Chapter $chapter)
    {
        $story = $chapter->story;
        if (auth()->user()->role === 'author' && $story->user_id != auth()->id()) {
            abort(403, 'Unauthorized access.');
        }

        return view('admin.chapters.form', compact('story', 'chapter'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Chapter $chapter)
    {
        $story = $chapter->story;
        if (auth()->user()->role === 'author' && $story->user_id != auth()->id()) {
            abort(403, 'Unauthorized access.');
        }

        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'status' => 'required|in:draft,published',
            'order_index' => 'required|integer'
        ]);

        $updateData = $request->only('title', 'content', 'status', 'order_index');

        // Auto revoke approval if edited by author
        if (auth()->user()->role === 'author') {
            $updateData['is_approved'] = false;
        }

        $chapter->update($updateData);

        return redirect()->route('admin.chapters.index', $story)->with('success', 'Chapter updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Chapter $chapter)
    {
        $story = $chapter->story;
        if (auth()->user()->role === 'author' && $story->user_id != auth()->id()) {
            abort(403, 'Unauthorized access.');
        }

        $chapter->delete();
        return redirect()->route('admin.chapters.index', $story)->with('success', 'Chapter deleted successfully.');
    }

    public function togglePublish(Chapter $chapter)
    {
        $story = $chapter->story;
        if (auth()->user()->role === 'author' && $story->user_id != auth()->id()) {
            abort(403, 'Unauthorized access.');
        }

        $chapter->update(['status' => $chapter->status === 'published' ? 'draft' : 'published']);

        return back()->with('success', 'Chapter status updated successfully.');
    }
}
