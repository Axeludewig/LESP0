<?php

use App\Http\Controllers\CalificacionesController;
use App\Http\Controllers\CursosController;
use App\Http\Controllers\EmailController;
use App\Http\Controllers\EvaluacionEnLineaController;
use App\Http\Controllers\ExcelController;
use App\Http\Controllers\ListingController;
use App\Http\Controllers\participantesController;
use App\Http\Controllers\PdfController;
use App\Http\Controllers\SesionesController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ValidacionesController;
use App\Http\Controllers\WordController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Listing;
use App\Models\participantes;
use Illuminate\Auth\Events\Validated;
use Symfony\Component\Mailer\Test\Constraint\EmailCount;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Common Resource Routes:
// index - Show all listings
// show - Show single listing
// create - Show form to create new listing
// store - Store new listing
// edit - Show form to edit listing
// update - Update listing
// destroy - Delete listing  

// TODOS LOS CURSOS
Route::get('/', [CursosController::class, 'index']);

// TODOS LOS CURSOS
Route::get('/registro/{id_curso}', [participantesController::class, 'registro']);

// Formulario para crear 
Route::get('/listings/create', [ListingController::class, 'create'])->middleware('auth');

Route::get('/usuarios/editar', [UserController::class, 'update'])->middleware('auth');

// Formulario para crear 
Route::get('/usuarios', [UserController::class, 'usuarios']);

// AGREGAR USUARIOS CON .csv
Route::post('/usuarios', [UserController::class, 'mass_store']);

// ACTUALIZAR LA FOTO DE PERFIL
Route::post('/profilepic/{id_usuario}', [UserController::class, 'updateProfilePicture'])->middleware('auth');

//---- ADMIN ---- MOSTRAR EL PANEL DE CONTROL DE ADMIN
Route::get('/admin/paneldecontrol', [UserController::class, 'admincontrolpanel'])->middleware('auth');

// ----ADMIN ---- MOSTRAR AL ADMIN EL PANEL DE CONTROL DE CURSOS
Route::get('/admin/paneldecursos', [UserController::class, 'cursospanel'])->middleware('auth');

// --- USUARIO ---- PERFIL DE USUARIO
Route::get('/users/perfil', [UserController::class, 'perfil'])->middleware('auth');

// ---- USUARIO --- INFORMACIÓN PERSONAL -----
Route::get('/users/info/{user}', [UserController::class, 'info'])->middleware('auth');

// ---- USUARIO --- EXPERIENCIA -----
Route::get('/users/esco/{user}', [UserController::class, 'esco'])->middleware('auth');

// ---- USUARIO --- ESCOLARIDAD -----
Route::get('/users/exp/{user}', [UserController::class, 'exp'])->middleware('auth');

// ---- USUARIO --- INFORMACIÓN PERSONAL UPDATEEEE-----
Route::put('/users/info/{user}', [UserController::class, 'update_info'])->middleware('auth');

// ---- USUARIO --- INFORMACIÓN PERSONAL UPDATEEEE-----
Route::put('/users/esco/{user}', [UserController::class, 'update_esco'])->middleware('auth');

// ---- USUARIO --- INFORMACIÓN PERSONAL UPDATEEEE-----
Route::put('/users/exp/{user}', [UserController::class, 'update_exp'])->middleware('auth');

// EVALUACIÓN DE PRUEBA //////// USERS
Route::get('/users/eval', [UserController::class, 'eval'])->middleware('auth');

Route::get('/users/eval/{user}', [UserController::class, 'eval'])->middleware('auth');


/////// USERS ------ EVALUACIONES EN LINEA ---------

Route::get('/pdf_download/bitacora', [ValidacionesController::class, 'download_pdf_validacion'])->middleware('auth');

Route::get('/pdf_download/{id}', [CursosController::class, 'pdf_download'])->middleware('auth');

Route::get('/users/xeval/{eval}', [EvaluacionEnLineaController::class, 'evaluacion'])->middleware('auth');

Route::get('/users/xevalz/{curso}', [EvaluacionEnLineaController::class, 'xeval'])->middleware('auth');

Route::post('/users/xeval/{user}', [EvaluacionEnLineaController::class, 'eval_submit'])->middleware('auth');

Route::get('/users/showevals', [EvaluacionEnLineaController::class, 'show'])->middleware('auth');

Route::get('/users/showallevals', [EvaluacionEnLineaController::class, 'showall'])->middleware('auth');


// EXPEDIENTE /////////
Route::get('/users/expediente', [UserController::class, 'expediente'])->middleware('auth');

// -- USUARIO -- CAMBIAR DE CONTRASEÑA -- USUARIO
Route::get('/users/password', [UserController::class, 'pass'])->middleware('auth');

Route::put('/users/password/STORE/{user}', [UserController::class, 'STORE_pass'])->middleware('auth');

// -- USUARIO -- ir a mis cursos -- USUARIO
Route::get('/users/cursos', [UserController::class, 'cursos'])->middleware('auth');

// -- USUARIO -- ACTUALIZAR EMAIL!!
Route::put('/users/email/{user}', [UserController::class, 'update_email'])->middleware('auth');








// ADMIN --- DESTRUIR CALIFICACIÓN 
Route::get('/store_bitacora', [ValidacionesController::class, 'mass_store']);

Route::post('/store_bitacora', [ValidacionesController::class, 'mass_store_validaciones']);

// ADMIN --- DESTRUIR CALIFICACIÓN 
Route::delete('/admin/reprobados/{id_calif}', [CalificacionesController::class, 'destroy']);

// ADMIN --- GET ALL VALIDACIONES (BITÁCORA)
Route::get('/bitacora', [CursosController::class, 'bitacora']);

// ADMIN --- VER PARTICIPANTES DEL CURSO 
Route::get('/admin/reprobados', [CalificacionesController::class, 'reprobados'])->middleware('auth');


// ADMIN --- VER PARTICIPANTES DEL CURSO 
Route::get('/admin/details/{id_curso}', [CursosController::class, 'details'])->middleware('auth');

// ADMIN --- ELIMINAR PARTICIPANTES DEL CURSO
Route::delete('/admin/destroyparticipante/{id}', [participantesController::class, 'destroy'])->middleware('auth');


// ADMIN --- EDITAR USUARIOS FORM
Route::get('/admin/update_user/{user}', [UserController::class, 'update'])->middleware('auth');

// ADMIN --- EDITAR USUARIOS
Route::put('/admin/update_user/STORE/{user}', [UserController::class, 'STORE_update'])->middleware('auth');

// -- ADMIN --- EDITAR PASSWORD DE USUARIO
Route::put('/admin/password/STORE/{user}', [UserController::class, 'admin_STORE_pass'])->middleware('auth');


//M --- ADMIN --- CREAR CURSO EN LÍNEA
Route::get('/admin/cursoenlinea', [EvaluacionEnLineaController::class, 'cursosenlinea'])->middleware('auth');

Route::get('/admin/cursosenlinea', [EvaluacionEnLineaController::class, 'cp'])->middleware('auth');

Route::get('/admin/permisos', [EvaluacionEnLineaController::class, 'permisos'])->middleware('auth');

//M --- ADMIN --- STOREEEE CURSO EN LÍNEA
Route::post('/admin/cursoenlinea', [EvaluacionEnLineaController::class, 'STORE_cursosenlinea'])->middleware('auth');

//Mostrar QRs de acceso a capacitaciones
Route::get('/admin/qrs', [CursosController::class, 'qrs'])->middleware('auth');

//Mostrar QRs de acceso a capacitaciones
Route::get('/admin/descargarqr', [CursosController::class, 'descargarqr'])->middleware('auth');

Route::get('/email', [EmailController::class, 'sendmail'])->middleware('auth');

Route::get('/emailme', [EmailController::class, 'test'])->middleware('auth');

Route::get('/emailall', [EmailController::class, 'testadmin2'])->middleware('auth');

Route::get('/wordtest', [WordController::class, 'wordtest'])->middleware('auth');

//MOSTRAR TODOS LOS USUARIOS
Route::get('/admin/showallusers', [UserController::class, 'index'])->middleware('auth');

//MOSTRAR TODOS LOS cursos
Route::get('/admin/showallcursos', [CursosController::class, 'showall'])->middleware('auth');

// CURSOS FINALIZADOS
Route::get('/admin/cursosfinalizados', [CursosController::class, 'showfinalizados'])->middleware('auth');

//MOSTRAR TODOS LOS USUARIOS
Route::get('/admin/cursosenproceso', [CursosController::class, 'showenproceso'])->middleware('auth');

//GENERAR CARTA DESCRIPTIVA
Route::get('/admin/cartadescriptiva', [ExcelController::class, 'cartadescriptiva'])->middleware('auth');

Route::get('cursos/export/', [ExcelController::class, 'export']);

///carta descriptiva vacía
Route::get('/cartavacia', [PdfController::class, 'cartavacia']);

//////////////// RUTAS DE SESIONES
//MOSTRAR PANEL DE SESIONES
Route::get('/admin/sesiones', [SesionesController::class, 'sesiones'])->middleware('auth');

//MOSTRAR FORMULARIO PARA CREAR NUEVA SESIÓN
Route::get('/admin/sesiones/crear', [SesionesController::class, 'create'])->middleware('auth');

//MOSTRAR FORMULARIO PARA CREAR NUEVA SESIÓN
Route::post('/admin/sesiones/store', [SesionesController::class, 'store'])->middleware('auth');

//MOSTRAR SESIONES ABIERTAS
Route::get('/admin/sesiones/show', [SesionesController::class, 'show'])->middleware('auth');

//MOSTRAR SESIONES CERRADAS
Route::get('/admin/sesiones/showcerradas', [SesionesController::class, 'showcerradas'])->middleware('auth');


//MOSTRAR HISTORIAL DE SESIONES
Route::get('/admin/sesiones/history', [SesionesController::class, 'history'])->middleware('auth');

// CERRAR SESIÓN
Route::put('/admin/sesiones/{sesionid}', [SesionesController::class, 'cerrarsesion'])->middleware('auth');

// ADMIN ELIMINAR SESIONES
Route::delete('/admin/sesiones/{id_sesion}', [SesionesController::class, 'destroy'])->middleware('auth');

// USER VER SESIONES ABIERTAS
//MOSTRAR SESIONES ABIERTAS
Route::get('/sesiones/show', [SesionesController::class, 'showmisabiertas'])->middleware('auth');

//USER REGISTRAR ASISTENCIA
Route::post('/sesiones/asistencia', [SesionesController::class, 'store_asistencia'])->middleware('auth');

//MOSTRAR MIS ASISTENCIAS
Route::get('/sesiones/misasistencias', [SesionesController::class, 'misasistencias'])->middleware('auth');

//////////////// TERMINAN RUTAS DE SESIONES



// FINALIZAR CURSO /////////////////////////
Route::put('/listings/{listing}', [CursosController::class, 'update'])->middleware('auth');

Route::put('/listingsfinal/{listing}', [CursosController::class, 'update_final'])->middleware('auth');

// REGISTRARSE
Route::post('/listings', [participantesController::class, 'store'])->middleware('auth');

// REGISTRARSE SIN CUENTA
Route::post('/participantes', [participantesController::class, 'storeeasy']);

// CREAR CURSO
Route::post('/cursos/crear', [cursosController::class, 'store'])->middleware('auth');

// GENERAR VALIDACIÓN
Route::post('/validaciones/generar', [ValidacionesController::class, 'store'])->middleware('auth');

// GENERAR TODAS LAS VALIDACIONES
Route::post('/validaciones', [ValidacionesController::class, 'validaciones'])->middleware('auth');

//QUERY VALIDACIONES
Route::get('/validaciones/search', function () {
    $query = request()->query('q'); // get the value of the 'q' query parameter
    $query2 = request()->query('curso'); 
    $query3 = request()->query('status'); 
    $listings = App\Models\Validaciones::where('nombre_usuario', 'like', "%$query%")->where('nombre_curso', 'like', "%$query2%")->where('status', 'like', "%$query3%", )->get(); // replace YourModel and column_name with your actual model and column name

    return view('validaciones.validar', compact('listings'));
});

Route::get('/validacionesx/search', function () {
    $query = request()->query('usuario'); // get the value of the 'q' query parameter
    $query2 = request()->query('curso'); 
    $listings = App\Models\Validaciones::where('nombre_usuario', 'like', "%$query%")->where('nombre_curso', 'like', "%$query2%")->get(); // replace YourModel and column_name with your actual model and column name

    return view('validaciones.validar', compact('listings'));
});

// MIS CRUSOS FINALIZADOS
Route::get('/cursos/misfinalizados', [participantesController::class, 'indexfinish'])->middleware('auth');

// Show Edit Form
Route::get('/listings/{listing}/edit', [ListingController::class, 'edit'])->middleware('auth');


// ADMIN ELIMINAR CURSO
Route::delete('/listings/{listing}', [CursosController::class, 'destroy'])->middleware('auth');

// ADMIN ELIMINAR USUARIO
Route::delete('/users/{listing}', [UserController::class, 'destroy'])->middleware('auth');

// Manage Listings
Route::get('/listings/manage', [participantesController::class, 'index'])->middleware('auth');

// Single Listing
Route::get('/listings/{listing}', [CursosController::class, 'show']);

// Show Register/Create Form
Route::get('/register', [UserController::class, 'create'])->middleware('guest');

// Create New Usertag
Route::post('/users', [UserController::class, 'store']);

// Log User Out
Route::post('/logout', [UserController::class, 'logout'])->middleware('auth');

// Show Login Form
Route::get('/login', [UserController::class, 'login'])->name('login')->middleware('guest');

// Log In User
Route::post('/users/authenticate', [UserController::class, 'authenticate']);

// PRUEBA GENERAR PDFS
Route::get('/pdf', [PdfController::class, 'generatePdf'])->name('pdf.generate');

Route::get('/fakes', [participantesController::class, 'fakes'])->middleware('auth');