<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Asistencias;
use App\Models\Cursos;
use App\Models\Sesiones;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SesionesController extends Controller
{
    //
    public function sesiones() {
        return view('admin.cpsesiones');
    }

    public function create() {
        return view('admin.crearsesion', [
            'listings' => Cursos::latest()->where('status', 'En proceso')->filter(request(['tag', 'search']))->paginate(6)
        ]);
    }

    public function store(Request $request) {
        $formFields = $request->validate([
            'id_curso' => 'required',
            'fecha_sesion' => 'required',
            'hora_sesion' => 'required',
        ]);

        $nombre_curso = DB::table('cursos')->where('id', $request->id_curso)->value('nombre');

  $formFields['nombre_curso'] = $nombre_curso;

        
        Sesiones::create($formFields);

        return redirect('/admin/sesiones')->with('message', 'Sesión creada correctamente.');
    }

    public function show()
    {
        // Retrieve all open sessions from the database
        $listings = Sesiones::where('status', 'abierta')->get();
    
        return view('admin.sesionesabiertas', compact('listings'));
    }

    public function showmisabiertas()
    {
        // Retrieve all open sessions from the database
        $listings = Sesiones::where('status', 'abierta')->get();
    
        return view('sesiones.abiertas', compact('listings'));
    }

    public function misasistencias()
    {
        $rfc = auth()->user()->rfc;
        // Retrieve all open sessions from the database
        $listings = Asistencias::where('rfc_participante', $rfc)->get();
    
        return view('sesiones.misasistencias', compact('listings'));
    }

    public function showcerradas()
    {
        // Retrieve all open sessions from the database
        $listings = Sesiones::where('status', 'cerrada')->get();
    
        return view('admin.showcerradas', compact('listings'));
    }

    public function history() {
        $listings = Sesiones::all();
        return view('admin.history', compact('listings'));
    }

    public function cerrarsesion(Request $request, Sesiones $sesionid) {
        $formFields = $request->validate([
            'status' => 'required'
        ]);

        $sesionid->update($formFields);
    
            return redirect('/admin/sesiones')->with('message', 'Sesión cerrada correctamente.');
    }

    public function destroy(Sesiones $id_sesion) {
        $id_sesion->delete();
        return redirect('/admin/sesiones')->with('message', 'Sesión eliminada correctamente.');
    }

    public function store_asistencia(Request $request) {
        $formFields = $request->validate([
            'id_sesion' => 'required',
            'nombre_curso' => 'required',
            'fecha_sesion' => 'required',
            'hora_sesion' => 'required',
            'nombre_participante' => 'required',
            'rfc_participante' => 'required',
            'id_participante' => 'required',
        ]);

        $nombre_curso = $formFields['nombre_curso'];
        $rfc_participante = $formFields['rfc_participante'];
        $id_sesion = $formFields['id_sesion'];

        if (DB::table('asistencias')->where('nombre_curso', $nombre_curso)->where('rfc_participante', $rfc_participante)->where('id_sesion', $id_sesion)->exists()) {
            return redirect('/users/perfil')->with('message', 'Tu asistencia ya había sido registrada anteriormente.');
        } else {
            Asistencias::create($formFields);

            return redirect('/users/perfil')->with('message', 'Asistencia registrada correctamente.');
        }
        
    }

}