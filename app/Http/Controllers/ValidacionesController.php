<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Validaciones;
use Illuminate\Support\Facades\DB;
use Dompdf\Dompdf;
use Dompdf\Options;
use chillerlan\QRCode\QRCode;
use chillerlan\QRCode\QROptions;

class ValidacionesController extends Controller
{
    public function download_pdf_validacion(Request $request){
        $formFields = $request->validate([
            'folio' => 'required',
            'nombre_participante' => 'required',
            'nombre_capacitacion' => 'required',
            'tipo_participacion' => 'required',
            'fecha_capacitacion' => 'required',
            'valor_curricular' => 'required',
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
        
                $query = 'q=' . $formFields['nombre_participante'] . '&status=Verificado&curso=' . $formFields['nombre_capacitacion'];
                $qrCodeContent = 'https://135a-2806-103e-5-62a5-8d82-1b0a-36ba-fa41.ngrok.io/validaciones/search?' . $query;
        
                $qrcode = (new QRCode())->render($qrCodeContent);
        
                // Create a new instance of dompdf
                $pdf = new Dompdf();
        
                // Generate the PDF
                $pdf->loadHtml(view('pdf_bitacora', compact(['pic', 'pic2', 'pic3', 'qrCodeContent', 'qrcode', 'formFields'])));
        
                // Set paper size and orientation
                $pdf->setPaper('A4', 'vertical');
        
                // Render the PDF
                $pdf->render();
        
                $filename = $formFields['nombre_capacitacion'] . '.pdf';
                //return $pdf->stream($filename); 
    
                $pdfStream = $pdf->output();
    
                return $pdf->stream($filename);
        
    }

    public function store(Request $request) {
        $formFields = $request->validate([
            'nombre_curso' => 'required',
            'nombre_usuario' => 'required',
            'valor_curricular' => 'required',
            'status' => 'required',
            'tipo' => 'required',
            'folio' => 'required'
        ]);

        $nombre_curso = $formFields['nombre_curso'];
        $nombre_usuario = $formFields['nombre_usuario'];
        $valor_curricular = $formFields['valor_curricular'];
        $status = $formFields['status'];
        $rfc = auth()->user()->rfc;
        $folio = $formFields['folio'];

        $numero_de_participante = DB::table('participantes')
        ->where('rfc_participante', $rfc)
        ->where('nombre_curso', $nombre_curso)
        ->where('valor_curricular', $valor_curricular)
        ->select('id')
        ->value('id');

        $numero_de_participante = $numero_de_participante < 10 ? '0' . $numero_de_participante : $numero_de_participante;        
        
        $formFields['folio'] = $formFields['folio'] . $numero_de_participante;

        if (DB::table('validaciones')->where('folio', $formFields['folio'])->exists()) {
            return redirect('/cursos/misfinalizados')->with('message', 'Validación ya ha sido generada anteriormente.');
        } else {
            Validaciones::create($formFields);

            return redirect('/cursos/misfinalizados')->with('message', 'Validación generada.');
        }    
    }

    public function validar(Validaciones $validacion) {
        return view('validaciones.validar');
    }

    public function validaciones(Request $request) {
        $formFields = $request->validate([
            'id_curso' => 'required',
            'nombre_curso' => 'required',
            'valor_curricular' => 'required',
            'status' => 'required',
            'tipo' => 'required',
            'folio' => 'required'
        ]);

        $nombre_curso = $formFields['nombre_curso'];
        $valor_curricular = $formFields['valor_curricular'];
        $status = $formFields['status'];
        $tipo = $formFields['tipo'];
        $folio = $formFields['folio'];
        $id = $formFields['id_curso'];
        

        $participantes_del_curso = DB::table('participantes')
            ->where('nombre_curso', '=', $nombre_curso)
            ->get();

            $foliox = 1;

            $trufolio = $folio . sprintf('%02d', $foliox);
            $existe = DB::table('validaciones')->where('folio', $trufolio)->exists();

            if($existe){
                return back()->with('message', 'Ya se han generado anteriormente las validaciones.');
            } else {
                foreach ($participantes_del_curso as $participante) {
            
                    // $nombre_completo = $participante->nombre . ' ' . $participante->apellido_paterno . ' ' . $participante->apellido_materno;

                    if ($participante->id_user === null) {
                        $id_user = null;
                    } else {
                        $id_user = $participante->id_user;
                    }
                    
                        DB::table('validaciones')->insert([
                            'id_curso' => $id,
                            'id_user' => $id_user,
                            'nombre_curso' => $nombre_curso,
                            'nombre_usuario' => $participante->nombre_participante,
                            'valor_curricular' => $valor_curricular,
                            'status' => $status,
                            'tipo' => $tipo,
                            'folio' => $folio . sprintf('%02d', $foliox),
                        ]);
                        $foliox++;
                    }
           
                    return back()->with('message', 'Validación generada.');
            }
            
          
    }
}