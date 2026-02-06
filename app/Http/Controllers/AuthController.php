<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;

class AuthController extends Controller
{
    public function redirect() 
    {
        return Socialite::driver('facebook')->stateless()->redirect();

    }

    public function callback()
    {    
         $facebookUser = Socialite::driver('facebook')->stateless()->user();

            $user = User::firstOrCreate([
                'email' => $facebookUser->getEmail(),
            ], [
                'name' => $facebookUser->getName(),
            ]);
       
       auth()->login($user);

       return redirect()->to('/dashboard');      

    }
}
