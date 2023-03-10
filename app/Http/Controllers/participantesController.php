<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\participantes;
use App\Models\Cursos;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;

class participantesController extends Controller
{
    public function store(Request $request)
    {
        $formFields = $request->validate([
            'nombre_curso' => 'required',
            'rfc_participante' => 'required',
            'nombre_participante' => 'required',
            'ubicacion' => 'required',
            'fecha_de_inicio' => 'required',
            'fecha_de_terminacion' => 'required',
            'valor_curricular' => 'required',
            'tipo' => 'required',
            'img' => 'required'
        ]);

        $nombre_curso = $formFields['nombre_curso'];
        $rfc_participante = $formFields['rfc_participante'];

        if (DB::table('participantes')->where('nombre_curso', $nombre_curso)->where('rfc_participante', $rfc_participante)->exists()) {
            return redirect('/')->with('message', 'Ya te has registrado anteriormente.');
        } else {
            participantes::create($formFields);
            return redirect('/')->with('message', 'Te has registrado correctamente.');
        }
    }

    // Manage Listings
    public function index()
    {

        $user_id = auth()->user()->rfc;
        $cursos_en_proceso = DB::table('participantes')
            ->where('rfc_participante', $user_id)
            ->join('cursos', 'participantes.nombre_curso', '=', 'cursos.nombre')
            ->where('cursos.status', 'En proceso')
            ->orWhere('cursos.status', 'Disponible')
            ->select('cursos.*')
            ->get();

        return view('participantes.index', [
            'listings' => $cursos_en_proceso
        ]);
    }


    public function indexfinish()
    {

        $user_id = auth()->user()->rfc;
        $finished_courses = DB::table('participantes')
            ->where('rfc_participante', $user_id)
            ->join('cursos', 'participantes.nombre_curso', '=', 'cursos.nombre')
            ->where('cursos.status', 'Finalizado')
            ->select('cursos.*')
            ->get();

        return view('participantes.mis-finalizados', ['listings' => $finished_courses]);
    }
}