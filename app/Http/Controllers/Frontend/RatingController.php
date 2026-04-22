<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Story;
use App\Models\Rating;

class RatingController extends Controller
{
    public function store(Request $request, Story $story)
    {
        $request->validate([
            'rating' => 'required|integer|min:1|max:5',
        ]);

        $existingRating = Rating::where('user_id', auth()->id())->where('story_id', $story->id)->first();
        if ($existingRating) {
            return response()->json([
                'success' => false,
                'message' => 'You have already rated this story.'
            ], 403);
        }

        Rating::create([
            'user_id' => auth()->id(),
            'story_id' => $story->id,
            'rating' => $request->rating,
        ]);

        // Recalculate story rating
        $avgRating = Rating::where('story_id', $story->id)->avg('rating');
        $ratingCount = Rating::where('story_id', $story->id)->count();

        $story->update([
            'rating_score' => round($avgRating, 1),
            'rating_count' => $ratingCount,
        ]);

        return response()->json([
            'success' => true,
            'rating_score' => round($avgRating, 1),
            'rating_count' => $ratingCount,
            'message' => 'Rating submitted successfully.'
        ]);
    }
}
