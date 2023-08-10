<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Eval_adq;
use App\Models\User;
use App\Models\Evals_adq;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\DB;
use DateTime;
use DateInterval;
use Carbon\Carbon;

class Eval_adq_controller extends Controller
{
    public function evaluar_store(Request $request){

        $data = $request->validate([
            'id_evaladq' => 'required',
            'id_curso' => 'required',
            'id_evaluador' => 'required',
            'id_evaluado' => 'required',
            'nombre_completo_evaluador' => 'required',
            'puesto_evaluador' => 'required',
            'firma_del_evaluador' => 'nullable',
            'nombre_evaluado' => 'required',
            'puesto_evaluado' => 'required',
            'area_evaluado' => 'required',
            'nombre_capacitacion' => 'required',
            'evaluacion1' => 'required',
            'evaluacion2' => 'required',
            'evaluacion3' => 'required',
            'evaluacion4' => 'required',
            'evaluacion5' => 'required',
            'evaluacion6' => 'required',
            'evaluacion7' => 'required',
            'evaluacion8' => 'required',
            'resultado' => 'required',
            'necesidad_capacitacion' => 'nullable',
            'descripcion_necesidad' => 'nullable',
            'calificacion' => 'nullable',
            'validacion_ensenanza' => 'nullable',
        ]);

        if($data['resultado'] > 0 && $data['resultado'] < 9){
            $data['interpretacion_resultado'] = 'Malo';
        }
        if($data['resultado'] > 8 && $data['resultado'] < 17){
            $data['interpretacion_resultado'] = 'Deficiente';
        }
        if($data['resultado'] > 16 && $data['resultado'] < 25){
            $data['interpretacion_resultado'] = 'Regular';
        }
        if($data['resultado'] > 24 && $data['resultado'] < 33){
            $data['interpretacion_resultado'] = 'Bueno';
        }
        if($data['resultado'] > 32 && $data['resultado'] < 41){
            $data['interpretacion_resultado'] = 'Muy bueno';
        }

        Evals_adq::create($data);

        return redirect('/users/evaluar')->with('message', 'Evaluación guardada.');
    }
    
    public function evaluar_participante(User $user_id, Eval_adq $eval_id){

        $curso = DB::table('cursos')->where('id', $eval_id->id_curso)->first();

        return view('users.evaluar_participante', [
            'user' => $user_id,
            'eval' => $eval_id,
            'curso' => $curso
        ]);
    }

    public function evaluar(){
        $evals = DB::table('evals_adq')->where('id_revisor', auth()->user()->id)->latest()->paginate(15);

        foreach($evals as $eval){
        $eval->infoCurso = DB::table('cursos')->where('id', $eval->id_curso)->first();
        $eval->participantes = DB::table('participantes')->where('id_curso', $eval->infoCurso->id)->get();
        }

        
        return view('users.evaluar', [
            'evaluaciones' => $evals
        ]);
    }

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