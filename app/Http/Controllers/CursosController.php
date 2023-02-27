<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Cursos;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class CursosController extends Controller
{
    //MUESTRA TODOS LOS CURSOS
    public function index() {
        return view('listings.index', [
            'listings' => Cursos::latest()->filter(request(['tag', 'search']))->paginate(6)
        ]);
    }

    //MUESTRA UN SOLO CURSO
    public function show(Cursos $listing) {
        return view('listings.show', [
            'listing' => $listing
        ]);
    }
}
