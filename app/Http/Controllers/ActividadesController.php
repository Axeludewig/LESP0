<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Actividades;
use App\Models\Cursos;
use App\Models\participantes;
use App\Models\Ponentes;
use App\Models\Revision;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ActividadesController extends Controller
{
    public function show_evidencias(Revision $revision){
        return view('users.evidencias', [
            'revision' => $revision
        ]);
    }

    public function store_revision(Request $request){
        $formFields = $request->validate([
            'id_user' => 'required',
            'id_curso' => 'required',
            'id_actividad' => 'required',
        ]);

        $revision_data = [];
        $revision_data['id_user'] = $formFields['id_user'];
        $revision_data['id_curso'] = $formFields['id_curso'];
        $revision_data['id_actividad'] = $formFields['id_actividad'];
        $revision_data['archivo1'] = "";
        $revision_data['archivo2'] = "";
        $revision_data['archivo3'] = "";

        if($request->hasFile('archivo1')) {
            $revision_data['archivo1'] = $request->file('archivo1')->store('apoyos', 'public');
        }
        if($request->hasFile('archivo2')) {
            $revision_data['archivo2'] = $request->file('archivo2')->store('apoyos', 'public');
        }
        if($request->hasFile('archivo3')) {
            $revision_data['archivo3'] = $request->file('archivo3')->store('apoyos', 'public');
        }

        Revision::create($revision_data);

        return redirect('/users/actividades')->with('message', 'Evidencia guardada correctamente.');
    }

    public function details(Cursos $actividad){
        return view('users.actividades_details', [
            'actividad' => $actividad
        ]);
    }

    public function CP(){
  
    $registrados = DB::table('participantes')
        ->where('id_user', auth()->user()->id)
        ->pluck('id_curso'); // Retrieve only the 'id' column from the query results
        
        
    return view('users.actividades', [
        'listings' => Cursos::latest()
            ->where('tipo', 'Actividad')
            ->whereIn('id', $registrados) // Use 'whereIn' to filter by an array of IDs
            ->filter(request(['tag', 'search']))
            ->paginate(6)
    ]);
    }


    public function create_actividad(){
        if (auth()->user()->es_admin == 0){
            return view('users.sinpermiso');
        }

        return view('admin.create_actividad');
    }
    //

    public function store_actividad(Request $request){
        if (auth()->user()->es_admin == 0){
            return view('users.sinpermiso');
        }

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

        $ff2 = $request -> validate(['descripcion' => 'required']);



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

        participantes::create($responsable_data);

        $actividad_data = [];
        $actividad_data['id_user'] = "";
        $actividad_data['id_curso'] = "";
        $actividad_data['id_ponente'] = "";
        $actividad_data['archivo1'] = "";
        $actividad_data['archivo2'] = "";
        $actividad_data['archivo3'] = "";
        $actividad_data['status'] = "";

        $ponente_data = [];
        $ponente_data['id_user'] = "";
        $ponente_data['id_curso'] = "";
        $ponente_data['archivo1'] = "";
        $ponente_data['archivo2'] = "";
        $ponente_data['archivo3'] = "";
        $ponente_data['especial'] = "";

        $ponente_data['id_user'] = $responsable->id;
        $ponente_data['id_curso'] = $curso->id;

        if($request->hasFile('pdf')) {
            $actividad_data['archivo1'] = $request->file('pdf')->store('apoyos', 'public');
            $ponente_data['archivo1'] = $actividad_data['archivo1'];
        } else {
            $actividad_data['archivo1'] = "";
            $ponente_data['archivo1'] = "";
        }

        if($request->hasFile('pdf2')) {
            $actividad_data['archivo2'] = $request->file('pdf2')->store('apoyos', 'public');
            $ponente_data['archivo2'] = $actividad_data['archivo2'];
        } else {
            $actividad_data['archivo2'] = "";
            $ponente_data['archivo2'] = "";
        }

        if($request->hasFile('pdf3')) {
            $actividad_data['archivo3'] = $request->file('pdf3')->store('apoyos', 'public');
            $ponente_data['archivo3'] = $actividad_data['archivo3'];
        } else {
            $actividad_data['archivo3'] = "";
            $ponente_data['archivo3'] = "";            
        }

        

        $ponente_data['especial'] = "";
        $ponente = Ponentes::create($ponente_data);

        $actividad_data['id_user'] = $responsable->id;
        $actividad_data['id_curso'] = $curso->id;
        $actividad_data['id_ponente'] = $ponente->id;        

        $actividad_data['status'] = "Disponible";
        $actividad_data['nombre'] = $curso->nombre;
        $actividad_data['descripcion'] = $ff2['descripcion'];
        
        Ponentes::create($ponente_data);
        Actividades::create($actividad_data);

        return redirect('/')->with('message', 'Curso creado correctamente.');
    }
}