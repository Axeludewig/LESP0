<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\participantes;
use App\Models\Cursos;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;
use League\Csv\Reader;

class participantesController extends Controller
{
    public function import(Request $request, Cursos $cursoid)
    {
        $request->validate([
            'file' => 'required|mimes:csv'
        ]);
        // Store the uploaded file to a temporary location
        $path = $request->file('file')->store('temp');

        // Open the CSV file and read the data
        $csv = Reader::createFromPath(storage_path('app/' . $path), 'r');
        $csv->setHeaderOffset(0);

        foreach ($csv as $row) {
            $participante = new participantes();
            $participante->id_curso = $cursoid->id;
            $participante->nombre_curso = $cursoid->nombre;
            $participante->nombre_participante = $row['nombre_participante'];
            $participante->email_participante = $row['email_participante'];
            $participante->ubicacion = $cursoid->auditorio;
            $participante->fecha_de_inicio = $cursoid->fecha_de_inicio;
            $participante->fecha_de_terminacion = $cursoid->fecha_de_terminacion;
            $participante->valor_curricular = $cursoid->horas_teoricas + $cursoid->horas_practicas;
            $participante->tipo = $row['tipo'];
            $participante->save();
        }

        return back()->with('message', 'Participantes agregados con éxito.');
    }

    public function agregar_user(Request $request)
    {

        $formFields = $request->validate([
            'id_curso' => 'required',
            'nombre_del_responsable' => 'required' // Validate the selected users
        ]);


        $cursoId = $formFields['id_curso'];
        $real_curso = DB::table('cursos')->where('id', $cursoId)->first();

        $existingParticipants = participantes::where('id_curso', $cursoId)
            ->whereIn('id_user', $formFields['nombre_del_responsable'])
            ->get();


        $existingUserIds = $existingParticipants->pluck('id_user')->toArray();

        $newParticipants = array_diff($formFields['nombre_del_responsable'], $existingUserIds);

        foreach ($newParticipants as $userId) {
            $real_user = DB::table('users')->where('id', $userId)->first();
            participantes::create([
                'id_curso' => $cursoId,
                'id_user' => $userId,
                'nombre_curso' => $real_curso->nombre,
                'rfc_participante' => $real_user->rfc,
                'nombre_participante' => $real_user->nombre_completo,
                'email_participante' => $real_user->email ?? "",
                'ubicacion' => $real_curso->auditorio,
                'fecha_de_inicio' => $real_curso->fecha_de_inicio,
                'fecha_de_terminacion' => $real_curso->fecha_de_terminacion,
                'valor_curricular' => $real_curso->horas_practicas + $real_curso->horas_teoricas,
                'tipo' => "Asistente",
            ]);
        }

        return back()->with('message', 'Usuarios agregados como participantes.');
    }

    public function destroy(participantes $id)
    {
        $id->delete();
        return back()->with('message', 'Participante eliminado correctamente.');
    }

    public function store(Request $request)
    {
        $formFields = $request->validate([
            'id_user' => 'required',
            'id_curso' => 'required',
            'nombre_curso' => 'required',
            'rfc_participante' => 'required',
            'nombre_participante' => 'required',
            'email_participante' => 'required',
            'ubicacion' => 'required',
            'fecha_de_inicio' => 'required',
            'fecha_de_terminacion' => 'required',
            'valor_curricular' => 'required',
            'tipo' => 'required',
            'img' => 'required'
        ]);


        $nombre_curso = $formFields['nombre_curso'];
        $rfc_participante = $formFields['rfc_participante'];
        $id_curso = $formFields['id_curso'];
        $id_user = $formFields['id_user'];

        if (DB::table('participantes')->where('id_curso', $id_curso)->where('id_user', $id_user)->exists()) {
            return redirect('/')->with('message', 'Ya te has registrado anteriormente.');
        } else {
            participantes::create($formFields);
            return redirect('/')->with('message', 'Te has registrado correctamente.');
        }
    }

    public function storeeasy(Request $request)
    {
        $formFields = $request->validate([
            'id_curso' => 'required',
            'nombre_curso' => 'required',
            'rfc_participante' => 'required',
            'nombre_participante' => 'required',
            'email_participante' => 'required',
            'ubicacion' => 'required',
            'fecha_de_inicio' => 'required',
            'fecha_de_terminacion' => 'required',
            'valor_curricular' => 'required',
            'tipo' => 'required',
            'img' => 'required'
        ]);

        $nombre_curso = $formFields['nombre_curso'];
        $nombre_participante = $formFields['nombre_participante'];

        if (DB::table('participantes')->where('nombre_curso', $nombre_curso)->where('nombre_participante', $nombre_participante)->exists()) {
            return redirect('/')->with('message', 'Ya te has registrado anteriormente.');
        } else {
            participantes::create($formFields);
            return redirect('/')->with('message', 'Te has registrado correctamente.');
        }
    }

    // Manage Listings
    public function index()
    {
        $registrados = DB::table('participantes')
            ->where('id_user', auth()->user()->id)
            ->pluck('id_curso'); // Retrieve only the 'id' column from the query results


        return view('participantes.index', [
            'listings' => Cursos::latest()
                ->whereIn('id', $registrados) // Use 'whereIn' to filter by an array of IDs
                ->filter(request(['tag', 'search']))
                ->paginate(6)
        ]);
    }


    public function indexfinish()
    {

        $user_id = auth()->user()->rfc;
        $finished_courses = DB::table('participantes')
            ->where('rfc_participante', $user_id)
            ->join('cursos', 'participantes.nombre_curso', '=', 'cursos.nombre')
            ->where('cursos.status', 'Finalizado')
            ->select('cursos.*')
            ->get();

        return view('participantes.mis-finalizados', ['listings' => $finished_courses]);
    }

    public function registro(Cursos $id_curso)
    {
        return view('participantes.registrosinauth', [
            'curso' => $id_curso
        ]);
    }

    public function fakes()
    {
        $fake = 0;
        $email = "ejemplo";
        $terminacion_email = "@gmail.com";
        while ($fake < 101) {
            $full_email = $email . $fake . $terminacion_email;
            DB::table('participantes')
                ->insert([
                    'nombre_curso' => 'Salud Mental',
                    'rfc_participante' => 'XXXX',
                    'nombre_participante' => 'ejemplouwu',
                    'email_participante' => $full_email,
                    'ubicacion' => 'Auditorio',
                    'fecha_de_inicio' => '2023-03-29',
                    'fecha_de_terminacion' => '2023-03-29',
                    'valor_curricular' => '16',
                    'tipo' => 'Asistente',
                    'img' => 'https://www.google.com/images/branding/googlelogo/2x/googlelogo_color_272x92dp.png'
                ]);
            $fake++;
        }
    }
}
