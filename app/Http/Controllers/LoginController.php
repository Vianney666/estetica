<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Administradores;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('/iniciodesesion/sesion');
    }

    public function login(Request $request)
    {
        
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        
        $admin = Administradores::where('correo', $request->email)->first();

       
        if (!$admin) {
            return back()->withErrors([
                'error' => 'No existe una cuenta con ese correo electrónico.'
            ])->withInput();
        }

       
        if ($admin->estado != 1) {
            return back()->withErrors([
                'error' => 'Tu cuenta está desactivada. Contacta al administrador.'
            ])->withInput();
        }

        
        $credenciales = [
            'correo' => $request->email,
            'password' => $request->password, 
            'estado' => 1 
        ];

        if (Auth::guard('admin')->attempt($credenciales)) {
            $request->session()->regenerate();
            return redirect()->intended('/bienvenido');
        }

      
        return back()->withErrors([
            'error' => 'La contraseña es incorrecta.'
        ])->withInput();
    }

    public function logout(Request $request)
    {
        Auth::guard('admin')->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
