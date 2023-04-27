<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Calificaciones;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CalificacionesController extends Controller
{
    public function reprobados(){
        $reprobados = DB::table('calificaciones')->get();


        return view('admin.reprobados', [
            'reprobados' => Calificaciones::latest()->filter(request(['search']))->paginate(12)
        ]);
    }

    public function destroy(Request $request, Calificaciones $id_calif) {
        $id_calif->delete();
        return back()->with('message', 'Calificación eliminada correctamente.');
    }
    //
}