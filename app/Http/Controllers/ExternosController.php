<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Externos;
use App\Models\User;

class ExternosController extends Controller
{
    public function validar(Request $request, Externos $externo){
        $formFields = $request->validate([
            'status' => 'required'
        ]);
        $externo->update($formFields);
        
        return back()->with('message', 'Validado correctamente');
    }

    public function users_externos(User $user){
        return view('admin.user_externos', [
            'user' => $user
        ]);
    }

    public function destroy(Request $request, Externos $externo){
        $externo->delete();

        return back()->with('message', 'Eliminado correctamente');
    }

    public function store(Request $request){
        $formFields = $request->validate([
            'id_user' => 'required',
            'horas_totales' => 'required',
            'status' => 'required',
        ]);
        
        $externo = [];
        $externo['id_user'] = $formFields['id_user'];
        $externo['horas_totales'] = $formFields['horas_totales'];
        $externo['status'] = $formFields['status'];
        $externo['archivo'] = "";
        $externo['archivo2'] = "";
        $externo['archivo3'] = "";
        $externo['archivo4'] = "";

 
        if($request->hasFile('archivo')) {
            $externo['archivo'] = $request->file('archivo')->store('externos', 'public');
        }
        if($request->hasFile('archivo2')) {
            $externo['archivo2'] = $request->file('archivo2')->store('externos', 'public');
        }
        if($request->hasFile('archivo3')) {
            $externo['archivo3'] = $request->file('archivo3')->store('externos', 'public');
        }
        if($request->hasFile('archivo4')) {
            $externo['archivo4'] = $request->file('archivo4')->store('externos', 'public');
        }

        Externos::create($externo);

        return back()->with('message', 'Guardado con éxito.');
    }
    
    public function add(){
        return view('users.add_externo');
    }
    //
}