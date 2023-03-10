<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Validaciones;
use Illuminate\Support\Facades\DB;

class ValidacionesController extends Controller
{
    public function store(Request $request) {
        $formFields = $request->validate([
            'nombre_curso' => 'required',
            'nombre_usuario' => 'required',
            'valor_curricular' => 'required',
            'status' => 'required',
            'tipo' => 'required'
        ]);

        $nombre_curso = $formFields['nombre_curso'];
        $nombre_usuario = $formFields['nombre_usuario'];
        $valor_curricular = $formFields['valor_curricular'];
        $status = $formFields['status'];

        if (DB::table('validaciones')->where('nombre_curso', $nombre_curso)->where('nombre_usuario', $nombre_usuario)->where('valor_curricular', $valor_curricular)->where('status', $status)->exists()) {
            return redirect('/cursos/misfinalizados')->with('message', 'Validación ya ha sido generada anteriormente.');
        } else {
            Validaciones::create($formFields);

            return redirect('/cursos/misfinalizados')->with('message', 'Validación generada.');
        }


       
    }

    public function validar(Validaciones $validacion) {
        return view('validaciones.validar');
    }

    //
}