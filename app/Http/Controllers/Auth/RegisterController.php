<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Password;

class RegisterController extends Controller
{
    public function create() // mostrar el formulario de registro
    {
        return view('auth.register');
    }

    public function store(Request $request) // crear la cuenta e iniciar sesión
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', Password::defaults()],
        ]);

        // El modelo User encripta la contraseña solo (cast 'hashed')
        $user = User::create($validated);

        Auth::login($user);
        $request->session()->regenerate();

        return to_route('dashboard')->with('status', 'Cuenta creada, ¡bienvenido!');
    }
}
