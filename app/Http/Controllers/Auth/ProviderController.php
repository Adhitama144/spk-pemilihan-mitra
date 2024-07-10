<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class ProviderController extends Controller
{
    public function redirect($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    public function callback($provider)
    {
        try {
            $userSocial = Socialite::driver($provider)->user();

            $user = User::where([
                'provider' => $provider,
                'provider_id' => $userSocial->id,
            ])->first();

            if (!$user) {
                if (User::where('email', $userSocial->email)->exists()) {
                    return redirect('/')->withErrors(['form.email' => "email ini sudah terdaftar dengan akun lain!"]);
                }

                $user = User::create([
                    'name' => $userSocial->getName(),
                    'email' => $userSocial->getEmail(),
                    'username' => $userSocial->getNickname(),
                    'provider' => $provider,
                    'password' => '1234',
                    'provider_id' => $userSocial->getId(),
                    'provider_token' => $userSocial->token,
                ]);
                $user->sendEmailVerificationNotification();
            }

            Auth::login($user);

            return route('dashboard');
        } catch (\Throwable $th) {
            dd('error guys : ', $th->getMessage());
            return redirect('/login');
        }
    }
}
