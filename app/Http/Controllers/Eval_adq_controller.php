<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Eval_adq;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\DB;
use DateTime;
use DateInterval;
use Carbon\Carbon;

class Eval_adq_controller extends Controller
{
    public function create(Request $request){
        $data = $request->validate([
            'id_curso' => 'required',
            'id_revisor' => 'required',
            'fecha_evaluacion' => 'required',
            'status' => 'required'
        ]);

        Eval_adq::create($data);

        return back()->with('message', 'Evaluador asignado correctamente.');
    }

    public function show(){
        $evals = DB::table('cursos')->where('evaluacion_adquirida', 'Si')->where('status', 'Finalizado')->latest()->paginate(15);
        $users = DB::table('users')->get();


        foreach ($evals as $eval) {
            $eval->evalAdq = DB::table('evals_adq')->where('id_curso', $eval->id)->first();
            $dateTime = new DateTime($eval->fecha_de_terminacion);
            $dateTime->add(new DateInterval('P1M'));
            $eval->newDate = $dateTime->format('Y-m-d'); // Change the format here
        }
    
        return view('admin.showevaladq', [
            'evals' => $evals,
            'users' => $users,
        ]);
    }
    //
}