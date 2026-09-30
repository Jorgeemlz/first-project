<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class ProfileController extends Controller
{
    public function edit(Request $request) // mostrar el formulario del perfil
    {
        return view('profile.edit', ['user' => $request->user()]);
    }

    public function update(Request $request) // guardar nombre y correo
    {
        $user = $request->user();

        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            // El correo debe ser único, pero ignorando el del propio usuario
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users')->ignore($user->id)],
        ]);

        $user->fill($validated);

        // Si cambió el correo, deja de estar verificado
        if ($user->isDirty('email')) {
            $user->email_verified_at = null;
        }

        $user->save();

        return to_route('profile.edit')->with('status', 'Perfil actualizado');
    }

    public function destroy(Request $request) // eliminar la cuenta
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();
        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return to_route('home')->with('status', 'Cuenta eliminada');
    }
}
