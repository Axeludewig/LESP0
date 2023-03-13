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
            'tipo' => 'required',
            'folio' => 'required'
        ]);

        $nombre_curso = $formFields['nombre_curso'];
        $nombre_usuario = $formFields['nombre_usuario'];
        $valor_curricular = $formFields['valor_curricular'];
        $status = $formFields['status'];
        $rfc = auth()->user()->rfc;
        $folio = $formFields['folio'];

        $numero_de_participante = DB::table('participantes')
        ->where('rfc_participante', $rfc)
        ->where('nombre_curso', $nombre_curso)
        ->where('valor_curricular', $valor_curricular)
        ->select('id')
        ->value('id');

        $numero_de_participante = $numero_de_participante < 10 ? '0' . $numero_de_participante : $numero_de_participante;        
        
        $formFields['folio'] = $formFields['folio'] . $numero_de_participante;

        if (DB::table('validaciones')->where('folio', $folio)->where('nombre_curso', $nombre_curso)->where('nombre_usuario', $nombre_usuario)->where('valor_curricular', $valor_curricular)->where('status', $status)->exists()) {
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