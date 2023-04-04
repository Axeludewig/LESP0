<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Cursos;
use App\Models\participantes;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;
use chillerlan\QRCode\QRCode;
use chillerlan\QRCode\QROptions;
use Dompdf\Dompdf;
use Dompdf\Options;

class CursosController extends Controller
{

    public function update(Request $request, Cursos $listing) {
        $formFields = $request->validate([
            'status' => 'required'
        ]);

        $listing->update($formFields);

        return redirect('/admin/paneldecursos')->with('message', 'Curso modificado correctamente.');
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
        return view('admin.showallcursos', [
            'listings' => Cursos::latest()->filter(request(['tag', 'search']))->paginate(6)
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