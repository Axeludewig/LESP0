<?php

namespace App\Http\Controllers;

use App\Models\Escolaridad;
use App\Models\Evaluacion;
use App\Models\Experiencia_profesional;
use App\Models\InformacionPersonal;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;
use League\Csv\Reader;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use chillerlan\QRCode\QRCode;
use chillerlan\QRCode\QROptions;
use PhpOffice\PhpSpreadsheet\Reader\Xls\Escher;
use Dompdf\Dompdf;
use Dompdf\Options;

class UserController extends Controller
{
 

    
   

    public function eval(){
        return view('users.eval');
    }

    public function update_info(Request $request, InformacionPersonal $user){
        $formFields = $request->validate([
            'user_id' => 'required',
            'direccion' => 'nullable',
            'telefono' => 'nullable',
            'nacionalidad' => 'nullable',
            'lugar_de_nacimiento' => 'nullable',
            'fecha_de_nacimiento' => 'nullable',
        ]);
        
        $user->update($formFields);

        return back()->with('message', 'Información personal modificada correctamente.');;
    }

    public function update_esco(Request $request, Escolaridad $user){
        $formFields = $request->validate([
            'user_id' => 'required',
            'posgrado1' => 'nullable',
            'institucion_educativa_p1' => 'nullable',
            'periodo_de_realizacion_p1' => 'nullable',
            'posgrado2' => 'nullable',
            'institucion_educativa_p2' => 'nullable',
            'periodo_de_realizacion_p2' => 'nullable',
            'licenciatura' => 'nullable',
            'institucion_educativa_lic' => 'nullable',
            'cedula' => 'nullable',
            'periodo_de_realizacion_lic' => 'nullable',
            'carrera_tecnica' => 'nullable',
            'institucion_educativa_ct' => 'nullable',
            'periodo_de_realizacion_ct' => 'nullable',
            'preparatoria' => 'nullable',
            'institucion_educativa_prepa' => 'nullable',
            'periodo_de_realizacion_prepa' => 'nullable',
        ]);
        
        $user->update($formFields);

        return back()->with('message', 'Escolaridad modificada correctamente.');;
    }

    public function update_exp(Request $request, Experiencia_profesional $user){
        $formFields = $request->validate([
            'user_id' => 'required',
            'puesto1'=> 'nullable',
            'experiencia1'=> 'nullable',
            'periodo1'=> 'nullable',
            'puesto2'=> 'nullable',
            'experiencia2'=> 'nullable',
            'periodo2'=> 'nullable',
            'puesto3'=> 'nullable',
            'experiencia3'=> 'nullable',
            'periodo3'=> 'nullable',
            'puesto4'=> 'nullable',
            'experiencia4'=> 'nullable',
            'periodo4'=> 'nullable',
        ]);
        
        $user->update($formFields);

        return back()->with('message', 'Experiencia modificada correctamente.');;
    }

    public function info(InformacionPersonal $user){
        return view('users.info', [
            'info' => $user
        ]);
    }

    public function esco(Escolaridad $user){
        return view('users.esco', [
            'esco' => $user
        ]);
    }

    public function exp(Experiencia_profesional $user){
        return view('users.exp', [
            'exp' => $user
        ]);
    }

    public function cursos(){
        return view('users.cursos');
    }

    public function pass(){
        return view('users.password');
    }

    public function admin_STORE_pass(Request $request, User $user){
        // Retrieve form fields
        $formFields = $request->validate([
            'new_password' => 'required|min:6|confirmed',
        ]);
        
        // Update password
        $user->update([
            'password' => Hash::make($formFields['new_password']),
        ]);

        return redirect('/users/perfil')->with('message', 'Password actualizado correctamente.');
    }

    public function STORE_pass(Request $request, User $user){
        
        // Retrieve form fields
        $formFields = $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|min:6|confirmed',
        ]);
        
        
        // Verify current password
        if (!Hash::check($formFields['current_password'], $user->password)) {
            return redirect()->back()->withErrors(['current_password' =>        'Incorrect current password']);
        }
        // Update password
        $user->update([
            'password' => Hash::make($formFields['new_password']),
        ]);
        
        return redirect('/users/perfil')->with('message', 'Password actualizado correctamente.');
    }
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

        //Create empty personal info
        $infoPersonal = new InformacionPersonal();
        $infoPersonal->user_id = $user->id;
        $infoPersonal->direccion = "n/a";
        $infoPersonal->telefono = "n/a";
        $infoPersonal->nacionalidad = "n/a";
        $infoPersonal->lugar_de_nacimiento = "n/a";
        $infoPersonal->fecha_de_nacimiento = "n/a";
        $infoPersonal->save();

        //Create empty professional experience
        $experiencia_profesional = new Experiencia_profesional();
        $experiencia_profesional->user_id = $user->id;
        $experiencia_profesional->puesto1 = "n/a";
        $experiencia_profesional->experiencia1 = "n/a";
        $experiencia_profesional->periodo1 = "n/a";
        $experiencia_profesional->puesto2 = "n/a";
        $experiencia_profesional->experiencia2 = "n/a";
        $experiencia_profesional->periodo2 = "n/a";
        $experiencia_profesional->puesto3 = "n/a";
        $experiencia_profesional->experiencia3 = "n/a";
        $experiencia_profesional->periodo3 = "n/a";
        $experiencia_profesional->puesto4 = "n/a";
        $experiencia_profesional->experiencia4 = "n/a";
        $experiencia_profesional->periodo4 = "n/a";
        $experiencia_profesional->save();

        $escolaridad= new Escolaridad();
        $escolaridad->user_id=$user->id;
        $escolaridad->posgrado1="n/a";
        $escolaridad->institucion_educativa_p1="n/a";
        $escolaridad->periodo_de_realizacion_p1="n/a";
        $escolaridad->posgrado2="n/a";
        $escolaridad->institucion_educativa_p2="n/a";
        $escolaridad->periodo_de_realizacion_p2="n/a";
        $escolaridad->licenciatura="n/a";
        $escolaridad->institucion_educativa_lic="n/a";
        $escolaridad->cedula="n/a";
        $escolaridad->periodo_de_realizacion_lic="n/a";
        $escolaridad->carrera_tecnica="n/a";
        $escolaridad->institucion_educativa_ct="n/a";
        $escolaridad->periodo_de_realizacion_ct="n/a";
        $escolaridad->preparatoria="n/a";
        $escolaridad->institucion_educativa_prepa="n/a";
        $escolaridad->periodo_de_realizacion_prepa="n/a";
        $escolaridad->save();


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

            if($userRecord->nombre == "admin"){ 
                $userRecord->es_admin = "1";
            } else {
                $userRecord->es_admin = "0";
            }
            
            $userRecord->password = Hash::make($password);
            // Save the user record to the database
            $userRecord->save();

            $infoPersonal = new InformacionPersonal();
            $infoPersonal->user_id = $userRecord->id;
            $infoPersonal->direccion = "n/a";
            $infoPersonal->telefono = "n/a";
            $infoPersonal->nacionalidad = "n/a";
            $infoPersonal->lugar_de_nacimiento = "n/a";
            $infoPersonal->fecha_de_nacimiento = "n/a";
            $infoPersonal->save();

            //Create empty professional experience
        $experiencia_profesional = new Experiencia_profesional();
        $experiencia_profesional->user_id = $userRecord->id;
        $experiencia_profesional->puesto1 = "n/a";
        $experiencia_profesional->experiencia1 = "n/a";
        $experiencia_profesional->periodo1 = "n/a";
        $experiencia_profesional->puesto2 = "n/a";
        $experiencia_profesional->experiencia2 = "n/a";
        $experiencia_profesional->periodo2 = "n/a";
        $experiencia_profesional->puesto3 = "n/a";
        $experiencia_profesional->experiencia3 = "n/a";
        $experiencia_profesional->periodo3 = "n/a";
        $experiencia_profesional->puesto4 = "n/a";
        $experiencia_profesional->experiencia4 = "n/a";
        $experiencia_profesional->periodo4 = "n/a";
        $experiencia_profesional->save();

        $escolaridad= new Escolaridad();
        $escolaridad->user_id=$userRecord->id;
        $escolaridad->posgrado1="n/a";
        $escolaridad->institucion_educativa_p1="n/a";
        $escolaridad->periodo_de_realizacion_p1="n/a";
        $escolaridad->posgrado2="n/a";
        $escolaridad->institucion_educativa_p2="n/a";
        $escolaridad->periodo_de_realizacion_p2="n/a";
        $escolaridad->licenciatura="n/a";
        $escolaridad->institucion_educativa_lic="n/a";
        $escolaridad->cedula="n/a";
        $escolaridad->periodo_de_realizacion_lic="n/a";
        $escolaridad->carrera_tecnica="n/a";
        $escolaridad->institucion_educativa_ct="n/a";
        $escolaridad->periodo_de_realizacion_ct="n/a";
        $escolaridad->preparatoria="n/a";
        $escolaridad->institucion_educativa_prepa="n/a";
        $escolaridad->periodo_de_realizacion_prepa="n/a";
        $escolaridad->save();
        }

        // Redirect the user back to the upload form
        return redirect()->back()->with('success', 'Usuarios creados exitosamente!');
    }
    
    public function update(User $user) {
        $usuario = DB::table('users')->where('id', $user->id)->first();

        return view('admin.update_user', [
            'user' => $usuario
        ]);
    }

    public function STORE_update(Request $request, User $user) {
        $formFields = $request->validate([
            'rfc' => 'nullable',
            'apellido_paterno' => 'nullable',
            'apellido_materno' => 'nullable',
            'nombre' => 'nullable',
            'email' =>  ['nullable', 'email'],
            'proyecto' => 'nullable',
            'puesto' => 'nullable',
            'descripcion_puesto' => 'nullable',
            'curp' => 'nullable',
            'turno' => 'nullable',
            'coordinacion' => 'nullable',
            'area' => 'nullable',
            'funcion' => 'nullable',
            'tipo' => 'nullable',
            'status' => 'nullable',
            'observaciones' => 'nullable',  
        ]);
        

        $user->update($formFields);

        return back()->with('message', 'Usuario modificado correctamente.');;
    }

    public function update_email(Request $request, User $user){
        $formFields = $request->validate([
            'email' =>  ['required', 'email'],
        ]);
        
        $user->update($formFields);

        return back()->with('message', 'Email modificado correctamente.');;
    }

    
    public function usuarios(){
        return view('admin.import');
    }

    public function updateProfilePicture(Request $request, User $id_usuario)
    {
    // Validate the file upload
    $validatedData = $request->validate([
        'profile_pic' => 'image|max:2048', // Max file size of 2MB
    ]);

    $oldProfilePicPath = '/storage' . $id_usuario->profile_pic;

    if($request->hasFile('profile_pic')) {
        // Store the new profile picture file in the storage directory
        $validatedData['profile_pic'] = $request->file('profile_pic')->store('images', 'public');

         // Delete the old profile picture file if it exists
         if ($oldProfilePicPath && Storage::exists($oldProfilePicPath)) {
            Storage::delete($oldProfilePicPath);
    }

        $id_usuario->update($validatedData);

        return redirect()->back();
    }
}
}