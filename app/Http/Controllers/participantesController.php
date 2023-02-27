<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\participantes;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class participantesController extends Controller
{
    public function store(Request $request) {
        $formFields = $request->validate([
            'nombre_curso' => 'required',
            'rfc_participante' => 'required',
            'nombre_participante' => 'required',
            'ubicacion' => 'required',
            'fecha_de_inicio' => 'required',
            'fecha_de_terminacion' => 'required',
            'valor_curricular' => 'required',
            'img' => 'required'
        ]);

        participantes::create($formFields);

        return redirect('/')->with('message',
        'Te has registrado correctamente.');
    }

        // Manage Listings
        public function index() {
            return view('participantes.index', [
                'listings' => participantes::latest()->filter(request(['tag', 'search']))->paginate(6)
            ]);
        }

    //
}