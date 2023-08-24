<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Cursos;
use App\Models\participantes;
use App\Models\User;
use App\Models\carta;
use App\Models\validaciones;
use App\Models\Tema;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;
use chillerlan\QRCode\QRCode;
use chillerlan\QRCode\QROptions;
use Dompdf\Dompdf;
use Dompdf\Options;
use Illuminate\Support\Facades\Storage;
use LasseRafn;
use Spatie\ImageOptimizer\OptimizerChainFactory;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Auth;

class CursosController extends Controller
{
    public function update_curso(Request $request, Cursos $cursoid)
    {

        $fields = ['nombre', 'modalidad', 'tipo', 'coordinacion', 'dirigido', 'numero_de_asistentes', 'horas_teoricas', 'horas_practicas', 'categoria', 'auditorio', 'fecha_de_inicio', 'fecha_de_terminacion', 'objetivo_general', 'forma_de_evaluacion', 'porcentaje_asistencia', 'calificacion_requerida', 'evaluacion_adquirida'];

        // Update the Curso fields
        $fieldsToUpdate = $request->only($fields);
        $cursoid->update($fieldsToUpdate);

        // Loop through temas and update them
        $temasData = $request->input('tema', []);
        foreach ($temasData as $temaId => $temaData) {
            $tema = Tema::findOrFail($temaId);
            $tema->update($temaData);
        }

        // Redirect or return a response
        return back()->with('message', 'Modificado con éxito.'); // Redirect to a success page
    }



    public function edit(Cursos $cursoid)
    {
        return view('admin.edit_curso', [
            'curso' => $cursoid
        ]);
    }

    public function privacidad()
    {
        return view('users.privacidad');
    }

    public function generate_carta(Request $request, Cursos $cursoid)
    {
        $curso = $cursoid;
        $participantex = DB::table('participantes')->where('id_curso', $cursoid->id)->get();
        $temas = DB::table('temas')->where('id_curso', $cursoid->id)->get();

        $pdf = new Dompdf();
        $pdf->loadHtml(view('cartapdf', compact(['curso', 'participantex', 'temas'])));

        // Set paper size and orientation
        $pdf->setPaper('A4', 'landscape');

        // Render the PDF
        $pdf->render();
        $filename = $cursoid->nombre . '.pdf';
        $pdfStream = $pdf->output();

        return $pdf->stream($filename);
    }

    public function qrenlinea(Request $request, Cursos $listing)
    {
        if (auth()->user()->es_admin == 0) {
            return view('users.sinpermiso');
        }
        $qrCode = [];


        $options = new QROptions([
            'version' => 5,
            'outputType' => QRCode::OUTPUT_IMAGE_PNG,
            'imageBase64' => false,
            'imageTransparent' => false,
            'eccLevel' => QRCode::ECC_L,
            'scale' => 10,
            'addQuietzone' => true,
            'margin' => 10,
            'logoPath' => asset('/images/logolesp.png'), // Path to the logo file
            'logoWidth' => 150, // Width of the logo in pixels
        ]);

        $qrCodeContent = 'http://lespmich.hopto.org/users/xevalz/' . $listing->id;
        $qrCodeImage = (new QRCode($options))->render($qrCodeContent);
        $qrCode = [
            'name' => $listing->nombre,
            'image' => $qrCodeImage,
            'id_curso' => $listing->id
        ];

        return view('admin.qrenlinea', [
            'qrCode' => $qrCode
        ]);
    }

    public function oneQR(Request $request, Cursos $listing)
    {
        if (auth()->user()->es_admin == 0) {
            return view('users.sinpermiso');
        }
        $qrCode = [];


        $options = new QROptions([
            'version' => 5,
            'outputType' => QRCode::OUTPUT_IMAGE_PNG,
            'imageBase64' => false,
            'imageTransparent' => false,
            'eccLevel' => QRCode::ECC_L,
            'scale' => 10,
            'addQuietzone' => true,
            'margin' => 10,
            'logoPath' => asset('/images/logolesp.png'), // Path to the logo file
            'logoWidth' => 150, // Width of the logo in pixels
        ]);

        $qrCodeContent = 'http://lespmich.hopto.org/listings/' . $listing->id;
        $qrCodeImage = (new QRCode($options))->render($qrCodeContent);
        $qrCode = [
            'name' => $listing->nombre,
            'image' => $qrCodeImage,
            'id_curso' => $listing->id
        ];

        return view('admin.qr', [
            'qrCode' => $qrCode
        ]);
    }

    public function qrpublico(Request $request, Cursos $listing)
    {
        if (auth()->user()->es_admin == 0) {
            return view('users.sinpermiso');
        }
        $qrCode = [];


        $options = new QROptions([
            'version' => 5,
            'outputType' => QRCode::OUTPUT_IMAGE_PNG,
            'imageBase64' => false,
            'imageTransparent' => false,
            'eccLevel' => QRCode::ECC_L,
            'scale' => 10,
            'addQuietzone' => true,
            'margin' => 10,
            'logoPath' => asset('/images/logolesp.png'), // Path to the logo file
            'logoWidth' => 150, // Width of the logo in pixels
        ]);

        $qrCodeContent = 'http://lespmich.hopto.org/registro/' . $listing->id;
        $qrCodeImage = (new QRCode($options))->render($qrCodeContent);
        $qrCode = [
            'name' => $listing->nombre,
            'image' => $qrCodeImage,
            'id_curso' => $listing->id
        ];

        return view('admin.qrpublico', [
            'qrCode' => $qrCode
        ]);
    }

    public function finalizarx(Request $request, Cursos $listing)
    {
        $ponente = $listing->nombre_del_responsable;

        // Check if the ponente has already been validated for this curso
        $existingValidation = DB::table('validaciones')
            ->where('id_curso', $listing->id)
            ->where('nombre_usuario', $ponente)
            ->first();

        if ($existingValidation) {
            $listing->status = "Finalizado";
            $listing->save();
            return  back()->with('message', 'El ponente ya ha sido validado, curso finalizado correctamente.');
        }
        $ponenteobj = DB::table('users')->where('nombre_completo', $ponente)->first();
        $participantes = DB::table('participantes')->where('id_curso', $listing->id)->get();
        $validaciones = DB::table('validaciones')->where('id_curso', $listing->id)->get();



        // Get the current year
        $currentYear = date('Y');

        // Get the total number of validated participants for the current curso
        $totalValidatedParticipants = count($validaciones) + 1;

        // Generate the folio
        $folio = "B2A" . $currentYear . "C" . $listing->numero_consecutivo . "F" . sprintf('%02d', $totalValidatedParticipants);

        $fecha_de_registro = date('Y-m-d'); // Set the current date as the value of $fecha_de_registro

        DB::table('validaciones')->insert([
            'id_curso' => $listing->id,
            'id_user' => $ponenteobj->id,
            'nombre_curso' => $listing->nombre,
            'nombre_usuario' => $ponenteobj->nombre_completo,
            'valor_curricular' => $listing->horas_teoricas + $listing->horas_practicas,
            'status' => "Verificado",
            'tipo' => "Ponente",
            'folio' => $folio,
            'fecha_de_registro' => $fecha_de_registro
        ]);

        $listing->status = "Finalizado";
        $listing->save();

        return back()->with('message', 'Curso modificado correctamente.');
    }


    public function create_presencial()
    {
        if (auth()->user()->es_admin == 0) {
            return view('users.sinpermiso');
        }

        return view('admin.create_presencial');
    }

    public function create_enlinea()
    {
        if (auth()->user()->es_admin == 0) {
            return view('users.sinpermiso');
        }

        return view('admin.create_enlinea');
    }

    public function prueba_pics_submit(Request $request, User $user)
    {
        $avatar = new LasseRafn\InitialAvatarGenerator\InitialAvatar();

        $image = $avatar->name($user->nombre_completo)->fontSize(0.25)->size(256)->generate();
        return $image->stream('png', 100);
    }

    public function prueba_pics_nombre(Request $request, participantes $id)
    {
        $avatar = new LasseRafn\InitialAvatarGenerator\InitialAvatar();

        $image = $avatar->name($id->nombre_participante)->fontSize(0.25)->size(256)->generate();
        return $image->stream('png', 100);
    }



    public function prueba_pics()
    {
        return view('admin.prueba_pics_2');
    }

    public function pdf_download(Cursos $id)
    {
        $me = auth()->user();

        $nombre_curso = $id->nombre;

        $validacion = DB::table('validaciones')->where('id_curso', $id->id)->where('id_user', $me->id)->first();

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

    public function bitacora()
    {
        return view('users.validaciones', [
            'validaciones' => Validaciones::orderBy('id', 'desc')->filter(request(['search']))->paginate(50)
        ]);
    }

    public function details(Request $request, Cursos $id_curso)
    {
        return view('admin.details', [
            'listing' => $id_curso
        ]);
    }

    public function update_final(Request $request, Cursos $listing)
    {
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

        if ($existe) {
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

    public function update(Request $request, Cursos $listing)
    {
        if (auth()->user()->es_admin == 0) {
            return view('users.sinpermiso');
        }
        $formFields = $request->validate([
            'status' => 'required'
        ]);

        if ($listing->update($formFields)) {

            return back()->with('message', 'Curso modificado correctamente.');
        } else {
            return back()->with('message', 'Error.');
        }
    }

    //MUESTRA TODOS LOS CURSOS
    public function index()
    {

        if (Auth::check() && auth()->user()->email === "sin registro") {
            return view('users.email');
        }

        return view('listings.index', [
            'listings' => Cursos::latest()->where('status', 'Disponible')->filter(request(['tag', 'search']))->paginate(6)
        ]);
    }

    public function showfinalizados()
    {
        if (auth()->user()->es_admin == 0) {
            return view('users.sinpermiso');
        }

        return view('admin.finalizados', [
            'listings' => Cursos::latest()->where('status', 'Finalizado')->filter(request(['tag', 'search']))->paginate(6)
        ]);
    }

    public function showenproceso()
    {
        return view('admin.enproceso', [
            'listings' => Cursos::latest()->where('status', 'En proceso')->filter(request(['tag', 'search']))->paginate(6)
        ]);
    }

    public function showall()
    {
        if (auth()->user()->es_admin == 0) {
            return view('users.sinpermiso');
        }

        $listings = Cursos::latest()->filter(request(['tag', 'search']))->paginate(6);

        return view('admin.showallcursos', [
            'listings' => $listings,
        ]);
    }

    //MUESTRA UN SOLO CURSO
    public function show(Cursos $listing)
    {
        return view('listings.show', [
            'listing' => $listing
        ]);
    }

    public function create()
    {
        if (auth()->user()->es_admin == 0) {
            return view('users.sinpermiso');
        }
        return view('listings.create');
    }

    public function store(Request $request)
    {
        if (auth()->user()->es_admin == 0) {
            return view('users.sinpermiso');
        }


        $formFields = $request->validate([
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
        ]);

        $formFields2 = $request->validate([
            'temas' => 'required',
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
                ->orderBy('consecutivo', 'desc')
                ->limit(1)
                ->value('consecutivo');
            $formFields['numero_consecutivo'] = ($lastConsec ?? 0) + 1;
            if (!$lastConsec) {
                // if there are no records for the current year, insert a new record into the pivot table
                DB::table | ('pivot_table2')->insert([
                    'consecutivo' => 1,
                    'year' => $currentYear,
                ]);
            }
        }

        if ($request->hasFile('img')) {
            $relativePath = $request->file('img')->store('images', 'public');

            $optimizerChain = OptimizerChainFactory::create();
            $optimizerChain->optimize(public_path('storage/' . $relativePath));

            $formFields['img'] = $relativePath;
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
        $responsable_data['fecha_de_terminacion'] = $curso->fecha_de_terminacion;
        $responsable_data['valor_curricular'] = $valor_curricular;
        $responsable_data['tipo'] = "Ponente";
        $responsable_data['img'] = $curso->img;

        $participantex = Participantes::create($responsable_data);

        $temasArray = $formFields2['temas'];

        if (!empty($temasArray)) {
            foreach ($temasArray as $tema) {
                Tema::create([
                    'id_curso' => $curso->id,
                    'numero' => $tema['numero'],
                    'fechayhora' => $tema['fechayhora'],
                    'contenido_tematico' => $tema['contenido'],
                    'objetivos' => $tema['objetivos'],
                    'tecnica' => $tema['tecnica'],
                    'responsable' => $tema['responsable'],
                    'horas_teoricas' => $tema['horasTeoricas'],
                    'horas_practicas' => $tema['horasPracticas'],
                    'referencia' => $tema['referencia'],
                ]);
            }
        }

        $temas = DB::table('temas')->where('id_curso', $curso->id)->get();

        $pdf = new Dompdf();

        // Generate the PDF
        $pdf->loadHtml(view('cartapdf', compact(['curso', 'participantex', 'temas'])));

        // Set paper size and orientation
        $pdf->setPaper('A4', 'landscape');

        // Render the PDF
        $pdf->render();

        $pdfContent = $pdf->output();
        $filename = $curso->nombre . '.pdf';

        Storage::disk('public')->put($filename, $pdfContent);

        $encodedFilename = rawurlencode($filename); // Use rawurlencode() for %20 encoding
        $storagePath = 'storage/' . $encodedFilename; // Use the encoded filename in the path

        $publicPath = url($storagePath);

        carta::create([
            'id_curso' => $curso->id,
            'carta' => $publicPath
        ]);

        return redirect('/')->with('message', 'Curso creado correctamente.');
    }

    public function destroy(Cursos $listing)
    {
        $listing->delete();
        return redirect('/admin/showallcursos')->with('message', 'Curso eliminado correctamente.');
    }

    public function qrs(Request $request)
    {
        if (auth()->user()->es_admin == 0) {
            return view('users.sinpermiso');
        }

        $search = $request->query('search');

        $cursos = DB::table('cursos')
            ->where('nombre', 'like', "%$search%")
            ->get();

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
            'logoPath' => asset('/images/logolesp.png'), // Path to the logo file
            'logoWidth' => 150, // Width of the logo in pixels
        ]);

        foreach ($cursos as $curso) {
            $qrCodeContent = 'http://lespmich.hopto.org/registro/' . $curso->id;
            $qrCodeImage = (new QRCode($options))->render($qrCodeContent);
            $qrCodes[] = [
                'name' => $curso->nombre,
                'image' => $qrCodeImage,
                'id_curso' => $curso->id
            ];
        }

        $perPage = 6;
        $page = Paginator::resolveCurrentPage('page');
        $items = array_slice($qrCodes, ($page - 1) * $perPage, $perPage);
        $total = count($qrCodes);

        $paginatedQrCodes = new LengthAwarePaginator($items, $total, $perPage, $page, [
            'path' => Paginator::resolveCurrentPath(),
        ]);

        return view('admin.qrs', [
            'qrCodes' => $paginatedQrCodes
        ]);
    }



    public function descargarqr(Request $request)
    {
        $formFields = $request->validate([
            'id_curso' => 'required',
            'nombre_curso' => 'required'
        ]);

        $id_curso = $formFields['id_curso'];

        $qrCodeContent = 'http://lespmich.hopto.org/registro/' . $id_curso;

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
