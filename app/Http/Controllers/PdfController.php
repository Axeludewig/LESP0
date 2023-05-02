<?php


namespace App\Http\Controllers;


use Illuminate\Support\Facades\Mail;
use App\Models\Cursos;
use App\Models\User;
use App\Models\Validaciones;
use Dompdf\Dompdf;
use Dompdf\Options;
use Illuminate\Http\Request;
use BaconQrCode\Renderer\Image\Png;
use BaconQrCode\Writer;
use BaconQrCode\Renderer\ImageRenderer;
use BaconQrCode\Renderer\RendererStyle\RendererStyle;
use chillerlan\QRCode\QRCode;
use chillerlan\QRCode\QROptions;
use Illuminate\Support\Facades\DB;
use App\Models\participantes;
use Illuminate\Support\Facades\Storage;
use App\Mail\Email;


class PdfController extends Controller
{

    public function generatePdf(Request $request)
    {
        dd($request);

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
        $qrCodeContent = 'https://135a-2806-103e-5-62a5-8d82-1b0a-36ba-fa41.ngrok.io/validaciones/search?' . $query;

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

        $filename = $formFields['nombre'] . '.pdf';
        return $pdf->stream($filename);

        $pdfContents = $pdf->output();

        

    }

    public function generatePdf2(Request $request)
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
        $qrCodeContent = 'https://6dc8-2806-103e-5-9c10-80aa-8d23-33dc-b0e5.ngrok.io/validaciones/search?' . $query;

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

        $filename = $formFields['nombre'] . '.pdf';
        return $pdf->stream($filename);

        $pdfContents = $pdf->output();
        $pdfPath = 'pdf/' . $filename;
        Storage::put($pdfPath, $pdfContents);

        Mail::to('axelramirezludewig@gmail.com')->send(new Email($data, $pdfPath, $filename));
        

    }

    public function cartadescriptiva(Request $request)
    {
        $formFields = $request->validate([
     
        ]);

        // Create a new instance of dompdf
        $pdf = new Dompdf();

        // Generate the PDF
        $pdf->loadHtml(view('carta', compact('formFields')));

        // Set paper size and orientation
        $pdf->setPaper('A4', 'landscape');

        // Render the PDF
        $pdf->render();

        $filename = 'cartadescriptiva' . '.pdf';
        return $pdf->stream($filename);
    }

    public function cartavacia(){
        return view('participantes.cartavacia');
    }

    
    
}