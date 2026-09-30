<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Password;

class PasswordController extends Controller
{
    public function update(Request $request) // cambiar la contraseña
    {
        // 'updatePassword' separa estos errores de los de los otros formularios del perfil
        $validated = $request->validateWithBag('updatePassword', [
            'current_password' => ['required', 'current_password'],
            'password' => ['required', 'confirmed', Password::defaults()],
        ]);

        // El modelo User la encripta solo (cast 'hashed')
        $request->user()->update([
            'password' => $validated['password'],
        ]);

        return back()->with('status', 'Contraseña actualizada');
    }
}
