<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Chapter;
use Illuminate\Http\Request;

class PendingChapterController extends Controller
{
    public function index(Request $request)
    {
        $query = Chapter::with(['story'])
            ->where('is_approved', false)
            ->where('status', 'published')
            ->whereHas('story', function($q) {
                $q->where('is_approved', true);
            });

        if ($request->has('q') && $request->q !== '') {
            $searchTerm = '%' . $request->q . '%';
            $query->where(function($q) use ($searchTerm) {
                $q->where('title', 'like', $searchTerm)
                  ->orWhereHas('story', function($q2) use ($searchTerm) {
                      $q2->where('title', 'like', $searchTerm)
                         ->orWhere('author', 'like', $searchTerm);
                  });
            });
        }

        $chapters = $query->latest()->paginate(10);
        
        // Let's pass $type so the view knows which tab is active
        $type = 'chapters';
        return view('admin.pending', compact('chapters', 'type'));
    }

    public function approve(Chapter $chapter)
    {
        $chapter->update(['is_approved' => true]);
        return redirect()->back()->with('success', 'Chapter approved successfully.');
    }

    public function reject(Chapter $chapter)
    {
        $chapter->delete();
        return redirect()->back()->with('success', 'Chapter rejected and deleted successfully.');
    }
}
