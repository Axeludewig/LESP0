<?php


namespace App\Http\Controllers;



use App\Models\Cursos;
use App\Models\User;
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


class PdfController extends Controller
{

    public function generatePdf(Request $request)
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
        $qrCodeContent = 'https://177a-189-243-47-109.ngrok.io/validaciones/search?' . $query;

        $nombre_del_curso = $formFields['nombre'];
        $user_id = auth()->user()->rfc;
        $tipo = DB::table('participantes')
        ->where('rfc_participante', $user_id)
        ->where('nombre_curso', $nombre_del_curso)
        ->value('tipo');

        $qrcode = (new QRCode())->render($qrCodeContent);

        // Create a new instance of dompdf
        $pdf = new Dompdf();

        // Generate the PDF
        $pdf->loadHtml(view('pdf', compact(['formFields', 'pic', 'pic2', 'pic3', 'qrCodeContent', 'qrcode', 'tipo'])));

        // Set paper size and orientation
        $pdf->setPaper('A4', 'vertical');

        // Render the PDF
        $pdf->render();

        $filename = $formFields['nombre'] . '.pdf';
        return $pdf->stream($filename);
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