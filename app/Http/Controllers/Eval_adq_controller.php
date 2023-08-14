<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Eval_adq;
use App\Models\User;
use App\Models\OTP;
use App\Models\Evals_adq;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\DB;
use DateTime;
use DateInterval;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use PHPMailer\PHPMailer\PHPMailer;

class Eval_adq_controller extends Controller
{
    public function firmar_store(Request $request)
    {
        $input = $request->validate([
            'otp' => 'required',
        ]);

        $otpModel = OTP::latest()->first(); // Retrieve the latest stored OTP

        if (Hash::check($input['otp'], $otpModel->OTP)) {
            // OTP is correct
            // Proceed with the signature logic
            // ...
            return back()->with('message', 'Éxito, el código se ha confirmado correctamente.');
        } else {
            return back()->with('message', 'Invalid OTP');
        }
    }

    public function firmar(Eval_adq $evalid){
        $otp = mt_rand(100000, 999999);

        
        $mail = new PHPMailer(true);
        
        $mail->isSMTP();

        // LÍNEA PARA MOSTRAR LA PÁGINA CON DEBUG DATA EN EL BROWSER!
        //$mail->SMTPDebug = SMTP::DEBUG_SERVER;

        $mail->Host = 'smtp.gmail.com';
        $mail->Port = 465;
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
        $mail->SMTPAuth = true;
        $mail->Username = 'axelramirezludewig@gmail.com';
        $mail->Password = 'uppmigsgyglwqume';

        $mail->addAddress($mail->Username, "ADMIN");
         // Set up the email
        $mail->Subject = 'Saludos ' . "ADMIN";
        $mail->Body = 'Su código para confirmar la firma es: ' . $otp;

        
            if ($mail->send()) {
                $hashedOtp = Hash::make($otp);
        
                // Store the hashed OTP in the database
                $otpModel = new OTP();
                $otpModel->otp = $hashedOtp;
                $otpModel->save();
        
                return view('admin.firmar', [
                    'eval' => $evalid,
                    'otp' => $otpModel
                ]);
            } else {
                return back()->with('message', 'Error, no se ha podido enviar el código por correo.');
            }
    }

    public function show_detail(User $user_id, Evals_adq $eval_id)
    {
        $curso = DB::table('cursos')->where('id', $eval_id->id_curso)->first();

        return view('admin.show_detail_evaladq', [
            'user' => $user_id,
            'eval' => $eval_id,
            'curso' => $curso
        ]);
    }
    public function showeval(Eval_adq $evalid){

            $evalid->infoCurso = DB::table('cursos')->where('id', $evalid->id_curso)->first();
            $evalid->participantes = DB::table('participantes')->where('id_curso', $evalid->infoCurso->id)->get();
            

        return view ('admin.evaladqdetails', [
            'eval' => $evalid
        ]);
    }

    public function showparticipantes(Eval_adq $evaladqid){
        $evaladqid->infoCurso = DB::table('cursos')->where('id', $evaladqid->id_curso)->first();
        $evaladqid->participantes = DB::table('participantes')->where('id_curso', $evaladqid->infoCurso->id)->get();
        
        return view('users.showparticipantes', [
            'eval' => $evaladqid
        ]);
    }
    
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
            $eval->participantes = DB::table('participantes')->where('id_curso', $eval->id)->get();
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