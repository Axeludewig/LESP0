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
    public function create(){
        return view('admin.create');
    }
    //
}