<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Cuestionario;
use App\Models\Evaluacion;
use Illuminate\Http\Request;

class EvaluacionEnLineaController extends Controller
{
    public function cursosenlinea(){
        return view('admin.CREATE_evaluacion');
    }
    //
    public function STORE_cursosenlinea(Request $request){
        $validatedData = $request->validate([
            'nombre' => 'required',
            'numero_consecutivo' => 'required',
            'video' => 'file|max:51200', // Max file size of 50MB
        ]);

        $validatedData2 = $request->validate([
            'id_evaluacion' => 'required',
            'pregunta1' => 'required',
            'pregunta1_opcion1' => 'required',
            'pregunta1_opcion2' => 'required',
            'pregunta2' => 'required',
            'pregunta2_opcion1' => 'required',
            'pregunta2_opcion2' => 'required',
            'pregunta3' => 'required',
            'pregunta3_opcion1' => 'required',
            'pregunta3_opcion2' => 'required',
            'pregunta4' => 'required',
            'pregunta4_opcion1' => 'required',
            'pregunta4_opcion2' => 'required',
            'pregunta5' => 'required',
            'pregunta5_opcion1' => 'required',
            'pregunta5_opcion2' => 'required',
            'pregunta1_respuesta' => 'required',
            'pregunta2_respuesta' => 'required',
            'pregunta3_respuesta' => 'required',
            'pregunta4_respuesta' => 'required',
            'pregunta5_respuesta' => 'required',
        ]);


        if($request->hasFile('video')) {
            // Store the new video file in the storage directory
            $validatedData['video'] = $request->file('video')->store('videos', 'public');

            $evalz = Evaluacion::create($validatedData);

            $validatedData2['id_evaluacion'] = $evalz->id;

            $uwu = Cuestionario::create($validatedData2);

            dd($uwu);

            return redirect()->back()->with('message', 'Curso creado correctamente.');;
        }        
    }
}