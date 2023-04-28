<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Cursos;
use App\Models\participantes;
use App\Models\validaciones;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;
use chillerlan\QRCode\QRCode;
use chillerlan\QRCode\QROptions;
use Dompdf\Dompdf;
use Dompdf\Options;

class CursosController extends Controller
{
    public function pdf_download(Cursos $id){
        $me = auth()->user();

        $nombre_curso = $id->nombre;

        $validacion = DB::table('validaciones')->where('id_curso',$id->id)->where('id_user', $me->id)->first();

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
    
            $query = 'q=' . $me->apellido_paterno . '+' . $me->apellido_materno . '&status=Verificado&curso=' . $id->nombre;
            $qrCodeContent = 'https://135a-2806-103e-5-62a5-8d82-1b0a-36ba-fa41.ngrok.io/validaciones/search?' . $query;
    
            $qrcode = (new QRCode())->render($qrCodeContent);
    
            // Create a new instance of dompdf
            $pdf = new Dompdf();
    
            // Generate the PDF
            $pdf->loadHtml(view('pdf_cursovirtual', compact(['pic', 'pic2', 'pic3', 'qrCodeContent', 'qrcode', 'me', 'validacion'])));
    
            // Set paper size and orientation
            $pdf->setPaper('A4', 'vertical');
    
            // Render the PDF
            $pdf->render();
    
            $filename = $nombre_curso . '.pdf';
            //return $pdf->stream($filename); 

            $pdfStream = $pdf->output();

            return $pdf->stream($filename);
    }

    public function bitacora(){
        return view('users.validaciones', [
            'validaciones' => Validaciones::orderBy('id', 'desc')->filter(request(['search']))->paginate(400)
        ]);
    }

    public function details(Request $request, Cursos $id_curso){
        return view('admin.details', [
            'listing' => $id_curso
        ]);
    }

    public function update_final(Request $request, Cursos $listing) {
        //dd($request);

        $formFields = $request->validate([
            'status' => 'required'
        ]);

        $listing->update($formFields);

        $formFields = $request->validate([
            'id_curso' => 'required',
            'nombre_curso' => 'required',
            'valor_curricular' => 'required',
            'status' => 'required',
            'tipo' => 'required',
            'folio' => 'required',
            'fecha_de_registro' => 'required',
        ]);

        $nombre_curso = $formFields['nombre_curso'];
        $valor_curricular = $formFields['valor_curricular'];
        $status = $formFields['status'];
        $tipo = $formFields['tipo'];
        $folio = $formFields['folio'];
        $id = $formFields['id_curso'];
        $fecha_de_registro = $formFields['fecha_de_registro'];
        

        $participantes_del_curso = DB::table('participantes')
            ->where('id_curso', '=', $id)
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
                            'fecha_de_registro' => $fecha_de_registro
                        ]);
                        $foliox++;
                    }
                    
                    return back()->with('message', 'Éxito, curso finalizado. Validaciones generadas.');
            }
    }

    public function update(Request $request, Cursos $listing) {
        $formFields = $request->validate([
            'status' => 'required'
        ]);

        $listing->update($formFields);

        return back()->with('message', 'Curso modificado correctamente.');
    }
    
    //MUESTRA TODOS LOS CURSOS
    public function index() {
        return view('listings.index', [
            'listings' => Cursos::latest()->where('status', 'Disponible')->filter(request(['tag', 'search']))->paginate(6)
        ]);
    }

    public function showfinalizados() {
        return view('admin.finalizados', [
            'listings' => Cursos::latest()->where('status', 'Finalizado')->filter(request(['tag', 'search']))->paginate(6)
        ]);
    }

    public function showenproceso() {
        return view('admin.enproceso', [
            'listings' => Cursos::latest()->where('status', 'En proceso')->filter(request(['tag', 'search']))->paginate(6)
        ]);
    }

    public function showall() {
        $listings = Cursos::latest()->filter(request(['tag', 'search']))->paginate(6);

        return view('admin.showallcursos', [
            'listings' => $listings,
        ]);
    }

    //MUESTRA UN SOLO CURSO
    public function show(Cursos $listing) {
        return view('listings.show', [
            'listing' => $listing
        ]);
    }

    public function create() {
        return view('listings.create');
    }

    public function store(Request $request) {
        $formFields = $request->validate([
            'nombre' => 'required',
            'numero_consecutivo' => 'required',
            'modalidad'=> 'required',
            'tipo'=> 'required',
            'nombre_del_responsable'=> 'required',
            'coordinacion'=> 'required',
            'dirigido'=> 'required',
            'numero_de_asistentes'=> 'required',
            'horas_teoricas'=> 'required',
            'horas_practicas'=> 'required',
            'categoria'=> 'required',
            'auditorio'=> 'required',
            'fecha_de_inicio'=> 'required',
            'fecha_de_terminacion'=> 'required',
            'objetivo_general'=> 'required',
            'forma_de_evaluacion'=> 'required',
            'porcentaje_asistencia'=> 'required',
            'calificacion_requerida'=> 'required',
            'evaluacion_adquirida'=> 'required',
            'status' => 'required',
            'tags' => 'required',
        ]);

        if($request->hasFile('img')) {
            $formFields['img'] = $request->file('img')->store('images', 'public');
        }

        Cursos::create($formFields);

        return redirect('/')->with('message', 'Curso creado correctamente.');
    }

    public function destroy(Cursos $listing) {
        $listing->delete();
        return redirect('/admin/showallcursos')->with('message', 'Curso eliminado correctamente.');
    }

    public function qrs(){
        
        $cursos = DB::table('cursos')->get();
        
        $qrCodes = [];

        foreach ($cursos as $curso){
            $qrCodeContent = 'https://8eca-2806-103e-5-62a5-bd47-7f34-32e5-aea3.ngrok.io/registro/' . $curso->id;
            $qrCodeImage = (new QRCode())->render($qrCodeContent);
            $qrCodes[] = [
                'name' => $curso->nombre,
                'image' => $qrCodeImage,
                'id_curso' => $curso->id
            ];
        }


        return view('admin.qrs', [
            'qrCodes' => $qrCodes, // Pass the array of QR codes to the view
        ]);
    }

    public function descargarqr(Request $request){
        $formFields = $request->validate([
            'id_curso' => 'required',
            'nombre_curso' => 'required'
        ]);

        $id_curso = $formFields['id_curso'];

        $qrCodeContent = 'https://8eca-2806-103e-5-62a5-bd47-7f34-32e5-aea3.ngrok.io/registro/' . $id_curso;

        $nombre_curso = $formFields['nombre_curso'];
        
        $qrcode = (new QRCode())->render($qrCodeContent);

        // Create a new instance of dompdf
        $pdf = new Dompdf();

        // Generate the PDF
        $pdf->loadHtml(view('qracceso', compact(['qrcode', 'nombre_curso'])));

        // Set paper size and orientation
        $pdf->setPaper('A4', 'vertical');

        // Render the PDF
        $pdf->render();

        $filename = 'QR' . '.pdf';
        return $pdf->stream($filename);
    }
}