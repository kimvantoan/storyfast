<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function requestAuthor(Request $request)
    {
        $user = auth()->user();

        if ($user->role === 'reader') {
            $user->is_author_requested = true;
            $user->save();
        }

        return back()->with('success', 'Your request to become an author has been sent to the administrators.');
    }
}
