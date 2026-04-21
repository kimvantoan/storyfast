<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\User;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $query = User::query();

        if ($search = $request->get('search')) {
            $query->where(function($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('email', 'like', "%{$search}%");
            });
        }

        if ($role = $request->get('role')) {
            if (in_array($role, ['admin', 'author', 'reader'])) {
                $query->where('role', $role);
            }
        }

        if ($status = $request->get('status')) {
            if (in_array($status, ['active', 'suspended'])) {
                $query->where('status', $status);
            }
        }

        $sort = $request->get('sort', 'newest');
        switch($sort) {
            case 'oldest':
                $query->orderBy('created_at', 'asc');
                break;
            case 'name_asc':
                $query->orderBy('name', 'asc');
                break;
            case 'name_desc':
                $query->orderBy('name', 'desc');
                break;
            case 'newest':
            default:
                $query->orderBy('created_at', 'desc');
                break;
        }

        $users = $query->paginate(15)->appends($request->all());

        return view('admin.users', compact('users'));
    }

    public function updateRole(Request $request, User $user)
    {
        if ($user->role === 'admin' || $user->id === auth()->id()) {
            return back();
        }

        $validated = $request->validate([
            'role' => 'required|in:admin,author,reader',
        ]);

        $user->update(['role' => $validated['role']]);
        return back();
    }

    public function updateStatus(Request $request, User $user)
    {
        if ($user->role === 'admin' || $user->id === auth()->id()) {
            return back();
        }

        $validated = $request->validate([
            'status' => 'required|in:active,suspended',
        ]);

        $user->update(['status' => $validated['status']]);
        return back();
    }
}
