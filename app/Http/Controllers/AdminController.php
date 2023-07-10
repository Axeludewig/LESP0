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
use Spatie\ImageOptimizer\OptimizerChainFactory;

class AdminController extends Controller
{
    public function destroy(Request $request, Validaciones $validacion){
        $validacion->delete();

        return back()->with('message', 'Validación eliminada.');
    }

    public function update(Request $request, Validaciones $validacion){
        if (auth()->user()->es_admin == 0) {
            return view('users.sinpermiso');
        }


        $formFields = $request->validate([
            'nombre_curso' => 'required',
            'nombre_usuario' => 'required',
            'valor_curricular' => 'required',
            'tipo' => 'required',
            'folio' => 'required',
            'fecha_de_registro' => 'required',
        ]); 


        $validacion->update($formFields);

    
        return back()->with('message', 'Validación modificada.');
    }
    
    

    public function editbitacora(){
        if (auth()->user()->es_admin == 0) {
            return view('users.sinpermiso');
        }
        
        return view('admin.editbitacora', [
            'validaciones' => Validaciones::orderBy('id', 'desc')->filter(request(['search']))->paginate(400)
        ]);
    }
    
    public function create(){
        if (auth()->user()->es_admin == 0) {
            return view('users.sinpermiso');
        }
        
        return view('admin.create');
    }
    //
}