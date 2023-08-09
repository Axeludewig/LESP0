<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Cursos;
use App\Models\participantes;
use App\Models\posts;
use App\Models\User;
use App\Models\validaciones;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;
use chillerlan\QRCode\QRCode;
use chillerlan\QRCode\QROptions;
use Dompdf\Dompdf;
use Dompdf\Options;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;
use LasseRafn;
use League\Csv\Reader;
use League\Csv\Writer;
use Spatie\ImageOptimizer\OptimizerChainFactory;
use Maatwebsite\Excel;

class AdminController extends Controller
{
    public function generarpass(Request $request){
        $request->validate([
            'file' => 'required|mimes:csv,txt'
        ]);

          // Store the uploaded file to a temporary location
    $path = $request->file('file')->store('temp');

    // Open the CSV file and read the data
    $csv = Reader::createFromPath(storage_path('app/' . $path), 'r');
    $csv->setHeaderOffset(0);

    $passwords = [];

    foreach ($csv as $row) {
        // Generate a password using user and area data
        $user = $row['user'];
        $area = $row['area'];

        // Extract initials from user's full name
        $nameParts = explode(' ', $user);
        $initials = '';
        foreach ($nameParts as $part) {
            $initials .= strtoupper($part[0]);
        }

        // Generate a random 3-digit number
        $randomNumbers = mt_rand(100, 999);

        // Combine user initials, area, and random numbers to create the password
        $password = $initials . substr($area, 0, 2) . $randomNumbers;

        $passwords[] = [
            'user' => $user,
            'area' => $area,
            'password' => $password
        ];
    }

    // Generate a new CSV file with the passwords
    $passwordCsvFile = fopen(storage_path("app/passwords.csv"), 'w');
    $csvWriter = Writer::createFromStream($passwordCsvFile);
    $csvWriter->insertOne(['user', 'area', 'password']); // CSV header

    foreach ($passwords as $row) {
        $csvWriter->insertOne([
            $row['user'],
            $row['area'],
            $row['password']
        ]);
    }

    fclose($passwordCsvFile);

    // Offer the generated CSV file as a download with explicit encoding and content type
    return response()->download(storage_path("app/passwords.csv"), 'passwords.csv', [
        'Content-Type' => 'text/csv; charset=UTF-8',
    ]);
    }

    
    public function excelcirce(Request $request) {
        $request->validate([
            'file' => 'required|mimes:csv,txt'
        ]);
    
        // Store the uploaded file to a temporary location
        $path = $request->file('file')->store('temp');
    
        // Open the CSV file and read the data
        $csv = Reader::createFromPath(storage_path('app/' . $path), 'r');
        $csv->setHeaderOffset(0);
    
        $groupedData = [];
    
        foreach ($csv as $row) {
            // Modify the data as needed
            $marcaModelo = $row['marca'] . ' ' . $row['modelo'];
            $nserie = 'S/N: ' . $row['nserie'];
    
            $cellContent = 'CPU: ' . $marcaModelo . "\n" . $nserie;
    
            if ($row['descripcion'] === 'Monitor') {
                $cellContent = 'Monitor: ' . $marcaModelo . "\n" . $nserie;
            }
    
            $user = $row['usuario'];
    
            if (!isset($groupedData[$user])) {
                $groupedData[$user] = [
                    'usuario' => $user,
                    'concatenated' => $cellContent
                ];
            } else {
                $groupedData[$user]['concatenated'] .= "\n" . $cellContent;
            }
        }
    
        $modifiedData = array_values($groupedData); // Convert associative array back to indexed array
    
        // Sort the modified data by 'usuario' (user) name
        usort($modifiedData, function($a, $b) {
            return strcmp($a['usuario'], $b['usuario']);
        });
    
        // Generate a new CSV file with the sorted modified data
        $sortedCsvFile = fopen(storage_path("app/sorted_data.csv"), 'w');
        $csvWriter = Writer::createFromStream($sortedCsvFile);
        $csvWriter->insertOne(['usuario', 'concatenated']); // CSV header
    
        foreach ($modifiedData as $row) {
            $csvWriter->insertOne([
                $row['usuario'],
                $row['concatenated']
            ]);
        }
    
        fclose($sortedCsvFile);
    
        // Offer the generated CSV file as a download with explicit encoding and content type
        return response()->download(storage_path("app/sorted_data.csv"), 'sorted_data.csv', [
            'Content-Type' => 'text/csv; charset=UTF-8',
        ]);
    }
    
    public function excelcirceold(Request $request) {
        $request->validate([
            'file' => 'required|mimes:csv,txt'
        ]);
    
        // Store the uploaded file to a temporary location
        $path = $request->file('file')->store('temp');
    
        // Open the CSV file and read the data
        $csv = Reader::createFromPath(storage_path('app/' . $path), 'r');
        $csv->setHeaderOffset(0);
    
        $modifiedData = [];
    
        foreach ($csv as $row) {
            // Modify the data as needed
            $marcaModelo = $row['marca'] . ' ' . $row['modelo'];
            $nserie = 'S/N: ' . $row['nserie'];
    
            $cellContent = 'CPU: ' . $marcaModelo . "\n" . $nserie;
    
            if ($row['descripcion'] === 'Monitor') {
                $cellContent = 'Monitor: ' . $marcaModelo . "\n" . $nserie;
            }
    
            $modifiedData[] = [
                'usuario' => $row['usuario'],
                'concatenated' => $cellContent
            ];
        }
    
        // Sort the modified data by 'usuario' (user) name
        usort($modifiedData, function($a, $b) {
            return strcmp($a['usuario'], $b['usuario']);
        });
    
        // Generate a new CSV file with the sorted modified data
        $sortedCsvFile = fopen(storage_path("app/sorted_data.csv"), 'w');
        $csvWriter = Writer::createFromStream($sortedCsvFile);
        $csvWriter->insertOne(['usuario', 'concatenated']); // CSV header
    
        foreach ($modifiedData as $row) {
            $csvWriter->insertOne([
                $row['usuario'],
                $row['concatenated']
            ]);
        }
    
        fclose($sortedCsvFile);
    
        // Offer the generated CSV file as a download with explicit encoding and content type
        return response()->download(storage_path("app/sorted_data.csv"), 'sorted_data.csv', [
            'Content-Type' => 'text/csv; charset=UTF-8',
        ]);
    }
    

    public function excel(){
        return view('admin.excel');
    }

    public function export_bitacora()
    {
        $data = validaciones::all()->toArray();
    
        $pdf = new Dompdf();
    
        // Generate the PDF
        $pdf->loadHtml(view('pdf.export', compact('data')));
    
        // Set paper size and orientation
        $pdf->setPaper('A4', 'landscape');
    
        // Render the PDF
        $pdf->render();
    
        return $pdf->stream('export.pdf');
    }
    

    public function save_edited_post(Request $request, posts $post){
        $formFields = $request->validate([
            'content' => 'required'
        ]);

        $post->update($formFields);

        return back()->with('message', 'Aviso editado correctamente.');
    }

    public function edit_post(posts $post){
        return view('admin.edit_post', [
            'post' => $post
        ]);
    }

    public function destroy_post(Request $request, posts $post){
        $post->delete();

        return back()->with('message', 'Aviso eliminado.');
    }

    public function avisos(){
        return view('admin.avisos', [
            'avisos' => posts::orderBy('id', 'desc')->paginate(10)
        ]);
    }

    public function post(Request $request, posts $postid){


        return view('admin.post',  compact('postid'));
    }

    public function posts()
    {
        $posts = posts::latest('created_at')->take(5)->get();
    
        return view('admin.posts', compact('posts'));
    }
    
    public function editor(){
        return view('admin.editor');
    }

    public function editor_post(Request $request){

        $formFields = $request->validate([
            'autor' => 'required',
            'content' => 'required',
        ]);

        DB::table('posts')->insert($formFields);

        return back()->with('message', 'Post creado.');
    }
    
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