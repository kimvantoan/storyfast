<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Story;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class StoryController extends Controller
{
    public function index(Request $request)
    {
        $query = Story::with(['categories'])->withCount('chapters');

        if (auth()->user()->role === 'author') {
            $query->where('user_id', auth()->id());
        } else {
            $query->where('is_approved', true);
        }

        // Search by title or author
        if ($request->has('q') && $request->q !== '') {
            $searchTerm = '%' . $request->q . '%';
            $query->where(function($q) use ($searchTerm) {
                $q->where('title', 'like', $searchTerm)
                  ->orWhere('author', 'like', $searchTerm);
            });
        }

        // Optional filtering by genre if passed
        if ($request->has('genre') && $request->genre !== 'All Genres') {
            $query->whereHas('categories', function($q) use ($request) {
                $q->where('name', $request->genre);
            });
        }
        
        // Optional filtering by status
        if ($request->has('status') && $request->status !== 'All Status') {
            $query->where('status', strtolower($request->status));
        }

        // Optional filtering by publish status
        if ($request->filled('publish')) {
            $query->where('is_published', $request->publish === 'published' ? true : false);
        }

        $stories = $query->latest()->paginate(10);
        $categories = Category::all();

        return view('admin.stories', compact('stories', 'categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'description' => 'required|string',
            'status' => 'required|in:ongoing,completed,dropped',
            'categories' => 'array',
            'categories.*' => 'exists:categories,id',
            'cover_image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048'
        ]);

        $coverPath = null;
        if ($request->hasFile('cover_image')) {
            // Save to storage/app/public/covers
            $coverPath = $request->file('cover_image')->store('covers', 'public');
        }

        $isDraft = $request->input('action') === 'draft';

        $story = Story::create([
            'user_id' => auth()->id(),
            'title' => $request->title,
            'slug' => Str::slug($request->title), // removed uniqid for cleaner urls
            'author' => $request->author,
            'description' => $request->description,
            'status' => $request->status,
            'cover_image' => $coverPath,
            'is_approved' => auth()->user()->role === 'admin' ? !$isDraft : false,
            'is_published' => false,
            'is_draft' => $isDraft
        ]);

        if ($request->has('categories')) {
            $story->categories()->sync($request->categories);
        }

        return redirect()->back()->with('success', 'Story created successfully.');
    }

    public function update(Request $request, Story $story)
    {
        if (auth()->user()->role === 'author' && $story->user_id != auth()->id()) {
            abort(403, 'Unauthorized action.');
        }

        $request->validate([
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'description' => 'required|string',
            'status' => 'required|in:ongoing,completed,dropped',
            'categories' => 'array',
            'categories.*' => 'exists:categories,id',
            'cover_image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048'
        ]);

        $coverPath = $story->cover_image;
        if ($request->hasFile('cover_image')) {
            // Delete old file if exists
            if ($coverPath && Storage::disk('public')->exists($coverPath)) {
                Storage::disk('public')->delete($coverPath);
            }
            $coverPath = $request->file('cover_image')->store('covers', 'public');
        }

        $isDraft = $request->input('action') === 'draft';

        $updateData = [
            'title' => $request->title,
            // don't change slug on update usually to preserve SEO unless explicitly requested
            'author' => $request->author,
            'description' => $request->description,
            'status' => $request->status,
            'cover_image' => $coverPath,
            'is_draft' => $isDraft
        ];

        // Auto revoke approval if edited by author, or if saved as draft by anyone
        if (auth()->user()->role === 'author' || $isDraft) {
            $updateData['is_approved'] = false;
        }

        $story->update($updateData);

        if ($request->has('categories')) {
            $story->categories()->sync($request->categories);
        } else {
            $story->categories()->detach();
        }

        return redirect()->back()->with('success', 'Story updated successfully.');
    }

    public function destroy(Story $story)
    {
        if (auth()->user()->role === 'author' && $story->user_id != auth()->id()) {
            abort(403, 'Unauthorized action.');
        }

        if ($story->cover_image && Storage::disk('public')->exists($story->cover_image)) {
            Storage::disk('public')->delete($story->cover_image);
        }
        $story->delete();
        return redirect()->back()->with('success', 'Story deleted successfully.');
    }

    public function togglePublish(Story $story)
    {
        if (auth()->user()->role === 'author' && $story->user_id != auth()->id()) {
            abort(403, 'Unauthorized action.');
        }

        $story->update(['is_published' => !$story->is_published]);

        return back()->with('success', $story->is_published ? 'Story published successfully.' : 'Story unpublished successfully.');
    }
}
