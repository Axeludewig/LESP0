<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Cursos;
use App\Models\participantes;
use App\Models\User;
use App\Models\validaciones;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;
use chillerlan\QRCode\QRCode;
use chillerlan\QRCode\QROptions;
use Dompdf\Dompdf;
use Dompdf\Options;
use Illuminate\Support\Facades\Storage;
use LasseRafn;

class CursosController extends Controller
{
    public function prueba_pics_submit(Request $request, User $user){
        $avatar = new LasseRafn\InitialAvatarGenerator\InitialAvatar();

        $image = $avatar->name($user->nombre_completo)->fontSize(0.25)->size(256)->generate();
        return $image->stream('png', 100);
    }

    public function prueba_pics_nombre(Request $request, participantes $id){
        $avatar = new LasseRafn\InitialAvatarGenerator\InitialAvatar();

        $image = $avatar->name($id->nombre_participante)->fontSize(0.25)->size(256)->generate();
        return $image->stream('png', 100);
    }



    public function prueba_pics(){
        return view('admin.prueba_pics_2');
    }

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
            $qrCodeContent = 'https://42ae-2806-103e-5-62a5-cd82-300a-2a5e-7dc0.ngrok-free.app/validaciones/search?' . $query;
    
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
                            'status' => "Verificado",
                            'tipo' => $participante->tipo,
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

        $responsable = DB::table('users')->where('id', $formFields['nombre_del_responsable'])->first();

        $formFields['nombre_del_responsable'] = $responsable->nombre_completo;

        $currentYear = date("Y");
        if ($currentYear == "2023") {
            $pivot = DB::table('pivot_table2')->first();
            $consec = $pivot->consecutivo;
            $formFields['numero_consecutivo'] = $consec + 1;
            $pivot->consecutivo = $formFields['numero_consecutivo'];
            DB::table('pivot_table2')
                ->where('id', $pivot->id)
                ->update(['consecutivo' => $formFields['numero_consecutivo']]);
        } else {
            $lastConsec = DB::table('pivot_table2')
                ->where('year', $currentYear)
                ->max('consecutivo');
            $formFields['numero_consecutivo'] = ($lastConsec ?? 0) + 1;
            if (!$lastConsec) {
                // if there are no records for the current year, insert a new record into the pivot table
                DB::table('pivot_table2')->insert([
                    'consecutivo' => 1,
                    'year' => $currentYear,
                ]);
            }
        }

        if($request->hasFile('img')) {
            $formFields['img'] = $request->file('img')->store('images', 'public');
        }

        $curso = Cursos::create($formFields);

        $responsable_data = [];
        $responsable_data['id_user'] = $responsable->id;
        $responsable_data['id_curso'] = $curso->id;
        $responsable_data['nombre_curso'] = $curso->nombre;
        $responsable_data['rfc_participante'] = $responsable->rfc;
        $responsable_data['nombre_participante'] = $responsable->nombre_completo;
        $responsable_data['email_participante'] = $responsable->email;
        $responsable_data['ubicacion'] = $curso->auditorio;
        $responsable_data['fecha_de_inicio'] = $curso->fecha_de_inicio;
        $valor_curricular = $curso->horas_teoricas + $curso->horas_practicas;
        $responsable_data['fecha_de_terminacion']= $curso->fecha_de_terminacion;
        $responsable_data['valor_curricular'] = $valor_curricular;
        $responsable_data['tipo'] = "Ponente";
        $responsable_data['img'] = $curso->img;

        Participantes::create($responsable_data);

        return redirect('/')->with('message', 'Curso creado correctamente.');
    }

    public function destroy(Cursos $listing) {
        $listing->delete();
        return redirect('/admin/showallcursos')->with('message', 'Curso eliminado correctamente.');
    }

    public function qrs(){
        
        $cursos = DB::table('cursos')->get();
        
        $qrCodes = [];

        $options = new QROptions([
            'version' => 5,
            'outputType' => QRCode::OUTPUT_IMAGE_PNG,
            'imageBase64' => false,
            'imageTransparent' => false,
            'eccLevel' => QRCode::ECC_L,
            'scale' => 10,
            'addQuietzone' => true,
            'margin' => 10,
            'logoPath' => asset('/images/logolesp.png'),// Path to the logo file
            'logoWidth' => 150, // Width of the logo in pixels
        ]);
        

        foreach ($cursos as $curso){
            $qrCodeContent = 'http://189.243.1.21/registro/' . $curso->id;
            $qrCodeImage = (new QRCode($options))->render($qrCodeContent);
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

        $qrCodeContent = 'http://189.243.1.21/registro/' . $id_curso;

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