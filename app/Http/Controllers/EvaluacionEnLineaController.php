<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Calificaciones;
use App\Models\Cuestionario;
use App\Models\Cursos;
use App\Models\Evaluacion;
use App\Models\User;
use App\Models\Validaciones;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use chillerlan\QRCode\QRCode;
use chillerlan\QRCode\QROptions;
use Dompdf\Dompdf;
use Dompdf\Options;
use PhpParser\Node\Expr\Eval_;

class EvaluacionEnLineaController extends Controller
{

    public function xeval(Cursos $curso){

        $eval = DB::table('evaluaciones')->where('id_curso', $curso->id)->first();

        $cuestionario = DB::table('cuestionarios')->where('id', $eval->id)->first();

        $trucalif = DB::table('calificaciones')->where('id_evaluacion', $eval->id)->where('id_user', auth()->user()->id)->get();
        

        if (count($trucalif) >= 2){
                return view('users.oportunidades', [
                    'id_eval' => $eval->id,
                ]);
        }

        return view('users.evaluacion', [
            'eval' => $eval,
            'cuestionario' => $cuestionario
        ]);
    
}

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

    public function showall(){
        $evals = DB::table('evaluaciones')
        ->join('cursos', 'evaluaciones.id_curso', '=', 'cursos.id')
        ->where('cursos.status', '<>', 'Finalizado')
        ->get();

        return view ('users.showallevals', [
            'evaluaciones' => $evals
        ]);
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

        $eval_id = $formFields['eval_id'];
        $eval = DB::table('evaluaciones')->where('id', $eval_id)->first();
        $curso_id = $eval->id_curso;

        $idx = auth()->user()->id;
        $tru = DB::table('validaciones')->where('id_user', $idx)->where('id_curso', $curso_id)->first();

        if (isset($tru)) {
            return redirect()->back()->with('message', 'Ya habías aprobado esta evaluación antes.');;
        }      

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
            
            $valor_curricular = $formFields['valor_curricular'];
            $nombre_usuario = $formFields['nombre_user'] . " " . $formFields['apellido_paterno'] . " " . $formFields['apellido_materno'];
            $nombre_del_curso = $formFields['nombre'];

            $tipo = 'Asistente';

            // el objeto de la eval
            $eval = DB::table('evaluaciones')->where('id', $eval_id)->first();
            //el id que tiene linkeado
            $id_curso = $eval->id_curso;
            //el curso de ese ID
            $curso = DB::table('cursos')->where('id', $id_curso)->first();
            //el numero consecutivo de ese curso
            $numero_consecutivo = $curso->numero_consecutivo;

            $currentYear = date('Y');
            $prefolio = 'B2A' . $currentYear . 'C' . $numero_consecutivo . 'F';

            $count = DB::table('validaciones')->where('nombre_curso', $nombre_del_curso)->count();

            if ($count === 0) {
                // If there are no matching records, set a new variable with value 01
                $newVar = '01';
            } else {
                // If there are matching records, generate the next number with leading zeros if needed
                $newVar = str_pad($count + 1, 2, '0', STR_PAD_LEFT);
            }

            $folio = $prefolio . $newVar;

            $validacion = [];

            $validacion['id_user']=auth()->user()->id;
            $validacion['id_curso']=$id_curso;
            $validacion['nombre_curso']=$nombre_del_curso;
            $validacion['nombre_usuario']=$nombre_usuario;
            $validacion['valor_curricular']=$valor_curricular;
            $validacion['valor_curricular']=$valor_curricular;
            $validacion['status']='Verificado';
            $validacion['tipo']='Asistente';
            $validacion['folio'] = $folio;

            Validaciones::create($validacion);
            

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


            $trucalif = DB::table('calificaciones')->where('id_evaluacion', $eval_id)->where('id_user', auth()->user()->id)->first();
          

            if (isset($trucalif)){
                $oportunidad = $trucalif->oportunidad;

                if ($oportunidad == '1'){
                    $calif = (($puntos * 100) / 5);

                    $calificacion = [];
                    $calificacion['id_evaluacion'] = $eval_id;
                    $calificacion['id_user'] = auth()->user()->id;
                    $calificacion['oportunidad'] = 2;
                    $calificacion['calificacion'] = $calif;
        
                    Calificaciones::create($calificacion);
        
                    return back()->with('message', 'No has aprobado. Tienes otra oportunidad.');
                }
            }

            $calif = (($puntos * 100) / 5);

            $calificacion = [];
            $calificacion['id_evaluacion'] = $eval_id;
            $calificacion['id_user'] = auth()->user()->id;
            $calificacion['oportunidad'] = 1;
            $calificacion['calificacion'] = $calif;

            Calificaciones::create($calificacion);

            return back()->with('message', 'No has aprobado. Tienes otra oportunidad.');
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
            'modalidad' => 'required',
            'tipo' => 'required',
            'nombre_del_responsable' => 'required',
            'coordinacion' => 'required',
            'dirigido' => 'required',
            'numero_de_asistentes' => 'required',
            'horas_teoricas' => 'required',
            'horas_practicas' => 'required',
            'categoria' => 'required',
            'auditorio' => 'required',
            'fecha_de_inicio' => 'required',
            'fecha_de_terminacion' => 'required',
            'objetivo_general' => 'required',
            'forma_de_evaluacion' => 'required',
            'porcentaje_asistencia' => 'required',
            'calificacion_requerida' => 'required',
            'evaluacion_adquirida' => 'required',
            'status' => 'required',
            'tags' => 'required',
            'video' => 'file|max:250000',
            'pdf' => 'file|max:150000' // Max file size of 50MB
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

        $curso_data=[];

        $curso_data['nombre'] = $validatedData['nombre'];
        $curso_data['numero_consecutivo'] = $validatedData['numero_consecutivo'];
        $curso_data['modalidad'] = $validatedData['modalidad'];
        $curso_data['tipo'] = $validatedData['tipo'];
        $curso_data['nombre_del_responsable'] = $validatedData['nombre_del_responsable'];
        $curso_data['coordinacion'] = $validatedData['coordinacion'];
        $curso_data['dirigido'] = $validatedData['dirigido'];
        $curso_data['numero_de_asistentes'] = $validatedData['numero_de_asistentes'];
        $curso_data['horas_teoricas'] = $validatedData['horas_teoricas'];
        $curso_data['horas_practicas'] = $validatedData['horas_practicas'];
        $curso_data['categoria'] = $validatedData['categoria'];
        $curso_data['auditorio'] = $validatedData['auditorio'];
        $curso_data['fecha_de_inicio'] = $validatedData['fecha_de_inicio'];
        $curso_data['fecha_de_terminacion'] = $validatedData['fecha_de_terminacion'];
        $curso_data['objetivo_general'] = $validatedData['objetivo_general'];
        $curso_data['forma_de_evaluacion'] = $validatedData['forma_de_evaluacion'];
        $curso_data['porcentaje_asistencia'] = $validatedData['porcentaje_asistencia'];
        $curso_data['calificacion_requerida'] = $validatedData['calificacion_requerida'];
        $curso_data['evaluacion_adquirida'] = $validatedData['evaluacion_adquirida'];
        $curso_data['status'] = $validatedData['status'];
        $curso_data['tags'] = $validatedData['tags'];
        $curso_data['img'] = '/images/logolesp.png';

                
        $newCurso = Cursos::create($curso_data);

        $evaluacion_data = [];

        $evaluacion_data['id_curso'] = $newCurso->id;
        $evaluacion_data['nombre'] = $newCurso->nombre;
        $evaluacion_data['video'] = $validatedData['video'];
        $evaluacion_data['pdf'] = $validatedData['pdf'];
        $evaluacion_data['numero_consecutivo'] = $newCurso->numero_consecutivo;


        if($request->hasFile('video')) {
            if($request->hasFile('pdf')) {
            // Store the new video file in the storage directory
            $evaluacion_data['video'] = $request->file('video')->store('videos', 'public');

            $evaluacion_data['pdf'] = $request->file('pdf')->store('apoyos', 'public');

            $evalz = Evaluacion::create($evaluacion_data);

            $validatedData2['id_evaluacion'] = $evalz->id;

            $uwu = Cuestionario::create($validatedData2);

            return redirect()->back()->with('message', 'Curso creado correctamente.');;
            }
        }      
    }
}