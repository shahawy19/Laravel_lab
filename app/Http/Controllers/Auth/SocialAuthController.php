<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class SocialAuthController extends Controller
{
    public function githubRedirect()
    {
        return Socialite::driver('github')->redirect();
    }
    public function googleRedirect()
    {
        return Socialite::driver('google')->redirect();
    }

    public function googleCallback()
    {
        $googleUser = Socialite::driver('google')->user();
        $user = User::where('email', $googleUser->email)->first();
        if ($user) {
            $user->update([
                'name' => $googleUser->name,
            ]);
        } else {
            $user = User::create([
                'email' => $googleUser->email,
                'name' => $googleUser->name,
            ]);
        }
        Auth::login($user);
        return redirect('/posts');
    }

    public function githubCallback()
    {
        $githubUser = Socialite::driver('github')->user();
        $user = User::where('email', $githubUser->email)->first();
        if ($user) {
            $user->update([
                'name' => $githubUser->name,
            ]);
        } else {
            $user = User::create([
                'email' => $githubUser->email,
                'name' => $githubUser->name,
            ]);
        }

        Auth::login($user);

        return redirect('/posts');
    }
}
