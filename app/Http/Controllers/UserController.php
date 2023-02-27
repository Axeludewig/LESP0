<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    // Show Register/Create Form
    public function create() {
        return view('users.register');
    }

    // Create New User
    public function store(Request $request) {
        $formFields = $request->validate([
            'rfc' => ['required', 'min:3', Rule::unique('users', 'rfc')],
            'password' => 'required|confirmed|min:6',
            'apellido_paterno' => ['required', 'min:3'],
            'apellido_materno' => ['required', 'min:3'],
            'nombre' => ['required', 'min:3'],
            'proyecto' => ['required', 'min:3'],
            'puesto' => ['required', 'min:3'],
            'descripcion_puesto' => ['required', 'min:3'],
            'turno' => ['required', 'min:3'],
            'coordinacion' => ['required', 'min:3'],
            'area' => ['required', 'min:3'],
            'funcion' => ['required', 'min:3'],
            'tipo' => ['required', 'min:3'],
            'status' => ['required', 'min:3'],
            'observaciones' => ['required', 'min:3'],  
            'es_admin' => ['required', 'min:1'],          
        ]);

        // Hash Password
        $formFields['password'] = bcrypt($formFields['password']);

        // Create User
        $user = User::create($formFields);

        // Login
        auth()->login($user);

        return redirect('/')->with('message', 'Usuario creado y sesión iniciada!');
    }

    // Logout User
    public function logout(Request $request) {
        auth()->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/')->with('message', 'Tu sesión ha sido cerrada!');

    }

    // Show Login Form
    public function login() {
        return view('users.login');
    }

    // Authenticate User
    public function authenticate(Request $request) {
        $formFields = $request->validate([
            'rfc' => 'required',
            'password' => 'required'
        ]);

        if(auth()->attempt($formFields)) {
            $request->session()->regenerate();

            return redirect('/')->with('message', 'Tu sesión ha sido iniciada!');
        }

        return back()->withErrors(['rfc' => 'Credenciales Invalidas'])->onlyInput('rfc');
    }
}
