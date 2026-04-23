<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Story;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class SubmitController extends Controller
{
    public function create()
    {
        if (!\Illuminate\Support\Facades\Auth::check() || !in_array(\Illuminate\Support\Facades\Auth::user()->role, ['author', 'admin'])) {
            abort(403, 'Unauthorized action.');
        }

        $categories = Category::all();
        return view('submit', compact('categories'));
    }

    public function store(Request $request)
    {
        if (!\Illuminate\Support\Facades\Auth::check() || !in_array(\Illuminate\Support\Facades\Auth::user()->role, ['author', 'admin'])) {
            abort(403, 'Unauthorized action.');
        }
        $request->validate([
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255', // User manually inputs author
            'description' => 'required|string',
            'cover_image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'category_id' => 'required|exists:categories,id', // they pick one main genre in the UI
            'status' => 'required|in:ongoing,completed' // The UI has Ongoing/Completed radio buttons
        ]);

        $coverPath = null;
        if ($request->hasFile('cover_image')) {
            $coverPath = $request->file('cover_image')->store('covers', 'public');
        }

        $story = Story::create([
            'user_id' => auth()->id(),
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'author' => $request->author,
            'description' => $request->description,
            'status' => $request->status,
            'cover_image' => $coverPath
        ]);

        // Sync the main genre selected to categories
        $story->categories()->sync([$request->category_id]);

        return back()->with('success', 'Bản thảo của bạn đã được gửi và đang chờ Admin xét duyệt!');
    }
}
