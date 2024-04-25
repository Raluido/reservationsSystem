<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function editData()
    {
        $user = auth()->user();
        return view('user.editData')->with('user', $user);
    }

    public function updateData(Request $request)
    {
        $user = User::find(auth()->user()->id);
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->phone = $request->input('phone');
        $user->padel_Level = $request->input('padel_level');
        $user->update();

        return redirect()
            ->route('user.editData')
            ->with('user', $user)
            ->withSuccess(__('Se ha editado con éxito'));
    }

    public function editPassword()
    {
        $user = auth()->user();

        return view('user.editPassword')->with('user', $user);
    }

    public function updatePassword(Request $request)
    {
        $user = User::find(auth()->user()->id);

        $request->validate(
            [
                'password' => 'required|min:8|regex:/[a-z]/|regex:/[A-Z]/|regex:/[0-9]/|regex:/[@$!%*#?&]/',
                'password_confirmation' => 'required'

            ],
            [
                'password.required' => 'La contraseña debe contener al menos una letra mayúscula, una minúscula, un caracter espacial, un número y una longitud de al menos 10 dígitos',
                'password.min' => 'La contraseña debe contener al menos una letra mayúscula, una minúscula, un caracter espacial, un número y una longitud de al menos 10 dígitos',
                'password.regex' => 'La contraseña debe contener al menos una letra mayúscula, una minúscula, un caracter espacial, un número y una longitud de al menos 10 dígitos',
                'password_confirmation.required' => 'Tienes que repetir la contraseña del apartado superior aqui',

            ]
        );

        $user->password = $request->input('password');
        $user->update();

        return redirect()->route('user.editPassword')
            ->with('user', $user)
            ->withSuccess(__('Se ha editado con éxito'));
    }
}
