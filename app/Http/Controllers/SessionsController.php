<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SessionsController extends Controller
{
    public function index()
    {
        return view('sessions.create');
    }

    public function store()
    {
        if (auth()->attempt(request(['email', 'password'])) == false) {
            return back()->withErrors([
                'message' => 'El usuario o contraseña son incorrectos; por favor, vuélvalo a intentar'
            ]);
        }

            return redirect()->to('/ficha');
    }

    public function destroy()
    {
        auth()->logout();

        return redirect()->to('/');
    }
}
