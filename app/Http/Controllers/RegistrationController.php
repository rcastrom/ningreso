<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class RegistrationController extends Controller
{
    public function create()
    {
        return view('registration.create');
    }
    public function store()
    {
        $this->validate(request(), [
            'email'                  => 'required|unique:users,email|email',
            'password'               => 'required|confirmed',
            'password_confirmation'  => 'required',
            'g-recaptcha-response'   => 'required|captcha'
        ],[
            'email.required'         => 'Favor de indicar el correo electrónico',
            'email.unique'           => 'El correo electrónico ya ha sido empleado',
            'email.email'            => 'Por favor, escriba un correo electrónico válido',
            'password.required'      => 'Escriba su contraseña',
            'password.confirmed'     => 'No concuerda la confirmación de la contraseña'
        ]);

        $user = User::create(request(['email', 'password','type']));

        auth()->login($user);

        return redirect()->to('/ficha');
    }
}
