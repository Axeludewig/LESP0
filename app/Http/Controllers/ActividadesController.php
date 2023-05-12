<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ActividadesController extends Controller
{
    public function create_actividad(){
        return view('admin.create_actividad');
    }
    //
}