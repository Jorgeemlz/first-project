<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class ConfirmPasswordController extends Controller
{
    public function create() // mostrar el formulario para confirmar la contraseña
    {
        return view('auth.confirm-password');
    }

    public function store(Request $request) // revisar la contraseña y dejar pasar
    {
        $request->validate([
            'password' => ['required', 'string'],
        ]);

        $correcta = Auth::guard('web')->validate([
            'email' => $request->user()->email,
            'password' => $request->input('password'),
        ]);

        if (! $correcta) {
            throw ValidationException::withMessages([
                'password' => 'La contraseña no es correcta.',
            ]);
        }

        // Guarda la hora; por un rato (3 horas por defecto) no te la vuelve a pedir
        $request->session()->passwordConfirmed();

        return redirect()->intended(route('profile.edit'));
    }
}
