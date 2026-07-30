<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Laravel\Socialite\Facades\Socialite;

class SocialiteController extends Controller
{
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {
        try {
            $googleUser = Socialite::driver('google')->user();

            $user = User::where('google_id', $googleUser->id)
                ->orWhere('email', $googleUser->email)
                ->first();

            if (!$user) {
                $user = User::create([
                    'name'      => $googleUser->name,
                    'email'     => $googleUser->email,
                    'google_id' => $googleUser->id,
                    'avatar'    => $googleUser->avatar,
                    'password'  => Hash::make(Str::random(16)),
                ]);
            } else {
                $user->update([
                    'google_id' => $googleUser->id,
                    'avatar'    => $googleUser->avatar,
                ]);
            }

            Auth::login($user);
            return redirect()->intended('/')->with('success', 'Berhasil login via Google!');
        } catch (\Exception $e) {
            return redirect()->route('login')->with('error', 'Gagal login via Google.');
        }
    }
}
