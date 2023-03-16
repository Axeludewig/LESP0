<?php

namespace App\Http\Controllers;
use App\Mail\Email;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Dompdf\Dompdf;
use Dompdf\Options;
use chillerlan\QRCode\QRCode;
use chillerlan\QRCode\QROptions;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EmailController extends Controller
{
    public function sendmail(){

    Mail::to(auth()->user()->email)->send(new Email);
        //
    }

    public function emailme(Request $request)
    {
        $formFields = $request->validate([
            'nombre' => 'required',
            'fecha_de_terminacion' => 'required',
            'nombre_user' => 'required',
            'valor_curricular' => 'required',
            'apellido_paterno' => 'required',
            'apellido_materno' => 'required'
        ]);

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
        $qrCodeContent = 'https://0e8c-2806-103e-5-9c10-497f-6006-5241-43c7.ngrok.io/validaciones/search?' . $query;

        $valor_curricular = $formFields['valor_curricular'];
        $nombre_usuario = $formFields['nombre_user'] . " " . $formFields['apellido_paterno'] . " " . $formFields['apellido_materno'];
        $nombre_del_curso = $formFields['nombre'];
        $user_id = auth()->user()->rfc;
        $tipo = DB::table('participantes')
        ->where('rfc_participante', $user_id)
        ->where('nombre_curso', $nombre_del_curso)
        ->value('tipo');

        $folio = DB::table('validaciones')
        ->where('nombre_curso', '=', $nombre_del_curso)
        ->where('nombre_usuario', '=', $nombre_usuario)
        ->value('folio');

        $qrcode = (new QRCode())->render($qrCodeContent);

        // Create a new instance of dompdf
        $pdf = new Dompdf();

        // Generate the PDF
        $pdf->loadHtml(view('pdf', compact(['formFields', 'pic', 'pic2', 'pic3', 'qrCodeContent', 'qrcode', 'tipo', 'folio'])));

        // Set paper size and orientation
        $pdf->setPaper('A4', 'vertical');

        // Render the PDF
        $pdf->render();

        $pdfContent = $pdf->output();

        $filename = $formFields['nombre'] . '.pdf';
        $data = [
            'title' => 'Demo Email',
            'body' => 'This is a demo email from Laravel.',
        ];

        $pdfFilename = uniqid() . '.pdf';
        $pdfPath = 'temp/' . $pdfFilename;
        
        Storage::put($pdfPath, $pdfContent);

        Mail::to('axelramirezludewig@gmail.com')->send(new Email($data), function($message) use ($pdfPath, $pdfFilename) {
            $message->attach(storage_path('app/' . $pdfPath), [
                'as' => $pdfFilename,
                'mime' => 'application/pdf',
            ]);
        });

        // Delete the temporary file
        Storage::delete($pdfPath);

        return 'Demo email sent';
        }

}