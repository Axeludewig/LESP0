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

        if (DB::table('validaciones')->where('folio', $formFields['folio'])->exists()) {
            return redirect('/cursos/misfinalizados')->with('message', 'Validación ya ha sido generada anteriormente.');
        } else {
            Validaciones::create($formFields);

            return redirect('/cursos/misfinalizados')->with('message', 'Validación generada.');
        }    
    }

    public function validar(Validaciones $validacion) {
        return view('validaciones.validar');
    }

    public function validaciones(Request $request) {
        $formFields = $request->validate([
            'id_curso' => 'required',
            'nombre_curso' => 'required',
            'valor_curricular' => 'required',
            'status' => 'required',
            'tipo' => 'required',
            'folio' => 'required'
        ]);

        $nombre_curso = $formFields['nombre_curso'];
        $valor_curricular = $formFields['valor_curricular'];
        $status = $formFields['status'];
        $tipo = $formFields['tipo'];
        $folio = $formFields['folio'];
        $id = $formFields['id_curso'];
        

        $participantes_del_curso = DB::table('participantes')
            ->where('nombre_curso', '=', $nombre_curso)
            ->get();

            $foliox = 1;

            $trufolio = $folio . sprintf('%02d', $foliox);
            $existe = DB::table('validaciones')->where('folio', $trufolio)->exists();

            if($existe){
                return back()->with('message', 'Ya se han generado anteriormente las validaciones.');
            } else {
                foreach ($participantes_del_curso as $participante) {
            
                    // $nombre_completo = $participante->nombre . ' ' . $participante->apellido_paterno . ' ' . $participante->apellido_materno;

                    if ($participante->id_user === null) {
                        $id_user = null;
                    } else {
                        $id_user = $participante->id_user;
                    }
                    
                        DB::table('validaciones')->insert([
                            'id_curso' => $id,
                            'id_user' => $id_user,
                            'nombre_curso' => $nombre_curso,
                            'nombre_usuario' => $participante->nombre_participante,
                            'valor_curricular' => $valor_curricular,
                            'status' => $status,
                            'tipo' => $tipo,
                            'folio' => $folio . sprintf('%02d', $foliox),
                        ]);
                        $foliox++;
                    }
           
                    return back()->with('message', 'Validación generada.');
            }
            
          
    }
}