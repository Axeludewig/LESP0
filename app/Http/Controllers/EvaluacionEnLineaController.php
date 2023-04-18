<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Cuestionario;
use App\Models\Evaluacion;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use chillerlan\QRCode\QRCode;
use chillerlan\QRCode\QROptions;
use Dompdf\Dompdf;
use Dompdf\Options;
use PhpParser\Node\Expr\Eval_;

class EvaluacionEnLineaController extends Controller
{

    public function permisos(){
        $evals = DB::table('evaluaciones')->get();
        $users = DB::table('users')->get();

        return view('admin.permisos',[
            'evals' => $evals,
            'users' => $users
        ]);
    }
    
    public function cp(){
        return view('admin.cursosenlinea');
    }

    public function show(){
        $user_id = auth()->user()->id;
        $permisos = DB::table('permisos_eval')->where('id_usuario',$user_id)->get();

        if ($permisos->count() > 0) {
        $evaluaciones = DB::table('evaluaciones')
        ->select('evaluaciones.id as id', 'permisos_eval.id as permisos_eval_id', 'nombre')
            ->join('permisos_eval', 'evaluaciones.id', '=', 'permisos_eval.id_eval')
            ->whereIn('permisos_eval.id', $permisos->pluck('id')->toArray())
            ->get();

        return view('users.showevals', [
            'evaluaciones' => $evaluaciones
        ]);
        } else {
            return view('users.showevals-sinpermiso');
        }
    }

    public function eval_submit(Request $request, User $user){
        $formFields = $request->validate([
            'eval_id' => 'required',
            'nombre' => 'required',
            'q1' => 'required',
            'q2' => 'required',
            'q3' => 'required',
            'q4' => 'required',
            'q5' => 'required',
            'fecha_de_terminacion' => 'required',
            'nombre_user' => 'required',
            'valor_curricular' => 'required',
            'apellido_paterno' => 'required',
            'apellido_materno' => 'required'
        ]);

        $eval_id= $formFields['eval_id'];
        $respuestas= DB::table('cuestionarios')->where('id', $eval_id)->first();
        $respuesta1 = $respuestas->pregunta1_respuesta;
        $respuesta2 = $respuestas->pregunta2_respuesta;
        $respuesta3 = $respuestas->pregunta3_respuesta;
        $respuesta4 = $respuestas->pregunta4_respuesta;
        $respuesta5 = $respuestas->pregunta5_respuesta;
        $r1 = $formFields['q1'];
        $r2 = $formFields['q2'];
        $r3 = $formFields['q3'];
        $r4 = $formFields['q4'];
        $r5 = $formFields['q5'];
        $puntos = 0;

        if($respuesta1==$r1){++$puntos;}
        if($respuesta2==$r2){++$puntos;}
        if($respuesta3==$r3){++$puntos;}
        if($respuesta4==$r4){++$puntos;}
        if($respuesta5==$r5){++$puntos;}


    
        if ($puntos >= 4){
            $path = base_path('FIRMAS.png');
            $type = pathinfo($path, PATHINFO_EXTENSION);
            $data = file_get_contents($path); 
            $pic = 'data:image/' . $type . ';base64,' . base64_encode($data);
    
            $path2 = base_path('gob.jpg');
            $type2 = pathinfo($path2, PATHINFO_EXTENSION);
            $data2 = file_get_contents($path2);
            $pic2 = 'data:image/' . $type2 . ';base64,' . base64_encode($data2);
    
            $path3 = base_path('SS1.png');
            $type3 = pathinfo($path3, PATHINFO_EXTENSION);
            $data3 = file_get_contents($path3);
            $pic3 = 'data:image/' . $type3 . ';base64,' . base64_encode($data3);
    
            $query = 'q=' . $formFields['apellido_paterno'] . '+' . $formFields['apellido_materno'] . '&status=Verificado&curso=' . $formFields['nombre'];
            $qrCodeContent = 'https://135a-2806-103e-5-62a5-8d82-1b0a-36ba-fa41.ngrok.io/validaciones/search?' . $query;
    
            $valor_curricular = $formFields['valor_curricular'];
            $nombre_usuario = $formFields['nombre_user'] . " " . $formFields['apellido_paterno'] . " " . $formFields['apellido_materno'];
            $nombre_del_curso = $formFields['nombre'];
            $user_id = auth()->user()->rfc;
            $tipo = 'Asistente';
    
            $folio = 'test';
    
            $qrcode = (new QRCode())->render($qrCodeContent);
    
            // Create a new instance of dompdf
            $pdf = new Dompdf();
    
            // Generate the PDF
            $pdf->loadHtml(view('pdf', compact(['formFields', 'pic', 'pic2', 'pic3', 'qrCodeContent', 'qrcode', 'tipo', 'folio'])));
    
            // Set paper size and orientation
            $pdf->setPaper('A4', 'vertical');
    
            // Render the PDF
            $pdf->render();
    
            $filename = $formFields['nombre'] . '.pdf';
            return $pdf->stream($filename);
        } else {
            echo 'reprobaoOOOOo';
        }

    
    }

    public function evaluacion(Evaluacion $eval){

        $cuestionario = DB::table('cuestionarios')->where('id', $eval->id)->first();
        return view('users.evaluacion', [
            'eval' => $eval,
            'cuestionario' => $cuestionario
        ]);
    }
    public function cursosenlinea(){
        return view('admin.CREATE_evaluacion');
    }
    //
    public function STORE_cursosenlinea(Request $request){
        $validatedData = $request->validate([
            'nombre' => 'required',
            'numero_consecutivo' => 'required',
            'video' => 'file|max:250000', // Max file size of 50MB
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

            return redirect()->back()->with('message', 'Curso creado correctamente.');;
        }        
    }
}