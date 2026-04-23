<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use Exception;

class GoogleLoginController extends Controller
{
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {
        try {
            $googleUser = Socialite::driver('google')->user();
            
            // Find existing user by email or create a new one
            $user = User::updateOrCreate(
                [
                    'email' => $googleUser->email,
                ],
                [
                    'name' => $googleUser->name,
                    'avatar' => $googleUser->avatar,
                    'google_id' => $googleUser->id,
                ]
            );

            Auth::login($user);

            return redirect()->intended('/');
            
        } catch (Exception $e) {
            return redirect('/')->with('error', 'Something went wrong during Google Login: ' . $e->getMessage());
        }
    }
}
