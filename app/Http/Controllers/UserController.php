<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;
use League\Csv\Reader;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    // Show Register/Create Form
    public function create() {
        return view('users.register');
    }

    public function cursospanel() {
        return view('admin.CPcursos');
    }

    public function admincontrolpanel() {
        return view('admin.CP');
    }

    public function index() {
        return view('admin.showallusers', [
            'listings' => User::latest()->filter(request(['tag', 'search']))->paginate(10)
        ]);
    }

    public function perfil() {
        return view('users.perfil');
    }

    public function expediente() {
        $user_id = auth()->user()->rfc;
        $finished_courses = DB::table('participantes')
            ->where('rfc_participante', $user_id)
            ->join('cursos', 'participantes.nombre_curso', '=', 'cursos.nombre')
            ->where('cursos.status', 'Finalizado')
            ->select('cursos.*')
            ->get();

 

        return view('participantes.expediente', ['listings' => $finished_courses]);
    }

    // Create New User
    public function store(Request $request) {
        $formFields = $request->validate([
            'rfc' => ['required', 'min:3', Rule::unique('users', 'rfc')],
            'password' => 'required|confirmed|min:6',
            'apellido_paterno' => ['required', 'min:3'],
            'apellido_materno' => ['required', 'min:3'],
            'nombre' => ['required', 'min:3'],
            'email' =>  ['required', 'email', Rule::unique('users', 'email')],
            'proyecto' => ['required', 'min:3'],
            'puesto' => ['required', 'min:3'],
            'descripcion_puesto' => ['required', 'min:3'],
            'turno' => ['required', 'min:3'],
            'coordinacion' => ['required', 'min:3'],
            'area' => ['required', 'min:3'],
            'funcion' => ['required', 'min:3'],
            'tipo' => ['required', 'min:3'],
            'status' => ['required', 'min:3'],
            'observaciones' => ['required', 'min:3'],  
            'es_admin' => ['required', 'min:1'],          
        ]);

        // Hash Password
        $formFields['password'] = bcrypt($formFields['password']);

        // Create User
        $user = User::create($formFields);

        // Login
        auth()->login($user);

        return redirect('/')->with('message', 'Usuario creado y sesión iniciada!');
    }

    // Logout User
    public function logout(Request $request) {
        auth()->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/')->with('message', 'Tu sesión ha sido cerrada!');

    }

    // Show Login Form
    public function login() {
        return view('users.login');
    }

    // Authenticate User
    public function authenticate(Request $request) {
        $formFields = $request->validate([
            'rfc' => 'required',
            'password' => 'required'
        ]);

        if(auth()->attempt($formFields)) {
            $request->session()->regenerate();

            return redirect('/')->with('message', 'Tu sesión ha sido iniciada!');
        }

        return back()->withErrors(['rfc' => 'Credenciales Invalidas'])->onlyInput('rfc');
    }

    public function destroy(User $listing) {
        $listing->delete();
        return redirect('/')->with('message', 'Usuario eliminado correctamente.');
    }

    public function mass_store(Request $request)
    {
        // Validate the file upload
        $request->validate([
            'file' => 'required|mimes:csv,txt'
        ]);

        // Store the uploaded file to a temporary location
        $path = $request->file('file')->store('temp');

        // Open the CSV file and read the data
        $csv = Reader::createFromPath(storage_path('app/' . $path), 'r');
        $csv->setHeaderOffset(0);

        foreach ($csv as $row) {
            // Create a new user record
            $userRecord = new User();
            $userRecord->rfc = $row['RFC'];
            $userRecord->apellido_paterno = $row['PATERNO'];
            $userRecord->apellido_materno = $row['MATERNO'];
            $userRecord->nombre = $row['NOMBRE'];
            $userRecord->email = "sin registro";
            $userRecord->proyecto = $row['PROYECTO'];
            $userRecord->puesto = $row['PUESTO'];
            $userRecord->descripcion_puesto = $row['DES_PUESTO'];
            $userRecord->curp = $row['CURP'];
            $userRecord->turno = $row['TURNO'];
            $userRecord->coordinacion = $row['COORDINACION'];
            $userRecord->area = $row['AREA'];   
            $userRecord->funcion = $row['FUNCION'];
            $userRecord->tipo = $row['TIPO'];
            $userRecord->status = $row['ESTATUS ACTUAL'];
            $password = "123456";
            
            $userRecord->observaciones = "sin registro";
            $userRecord->es_admin = "0";
            $userRecord->password = Hash::make($password);
            // Save the user record to the database
            $userRecord->save();
        }

        // Redirect the user back to the upload form
        return redirect()->back()->with('success', 'Usuarios creados exitosamente!');
    }
    
    public function update(Request $request, User $listing) {
        $formFields = $request->validate([
            'status' => 'required'
        ]);

        $listing->update($formFields);

        return redirect('/admin/paneldecursos')->with('message', 'Curso modificado correctamente.');
    }
    
    public function usuarios(){
        return view('admin.import');
    }
}