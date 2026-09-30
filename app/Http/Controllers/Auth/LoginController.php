<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
    public function create() // mostrar el formulario de login
    {
        return view('auth.login');
    }

    public function store(Request $request) // iniciar sesión
    {
        $credentials = $request->validate([
            'email' => ['required', 'string', 'email'],
            'password' => ['required', 'string'],
        ]);

        if (! Auth::attempt($credentials, $request->boolean('remember'))) {
            throw ValidationException::withMessages([
                'email' => 'El correo o la contraseña no son correctos.',
            ]);
        }

        $request->session()->regenerate();

        // Regresa a la página que intentaba abrir (por ejemplo, crear post) o al dashboard
        return redirect()->intended(route('dashboard'))->with('status', 'Sesión iniciada');
    }

    public function destroy(Request $request) // cerrar sesión
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return to_route('home')->with('status', 'Sesión cerrada');
    }
}
