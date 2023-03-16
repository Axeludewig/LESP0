<?php

use App\Http\Controllers\CursosController;
use App\Http\Controllers\EmailController;
use App\Http\Controllers\ExcelController;
use App\Http\Controllers\ListingController;
use App\Http\Controllers\participantesController;
use App\Http\Controllers\PdfController;
use App\Http\Controllers\SesionesController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ValidacionesController;
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

// Formulario para crear 
Route::post('/usuarios', [UserController::class, 'mass_store']);

//MOSTRAR EL PANEL DE CONTROL DE ADMIN
Route::get('/admin/paneldecontrol', [UserController::class, 'admincontrolpanel'])->middleware('auth');

// MOSTRAR AL ADMIN EL PANEL DE CONTROL DE CURSOS
Route::get('/admin/paneldecursos', [UserController::class, 'cursospanel'])->middleware('auth');

// PERFIL DE USUARIO
Route::get('/users/perfil', [UserController::class, 'perfil'])->middleware('auth');

// EXPEDIENTE
Route::get('/users/expediente', [UserController::class, 'expediente'])->middleware('auth');

//Mostrar QRs de acceso a capacitaciones
Route::get('/admin/qrs', [CursosController::class, 'qrs'])->middleware('auth');

//Mostrar QRs de acceso a capacitaciones
Route::get('/admin/descargarqr', [CursosController::class, 'descargarqr'])->middleware('auth');

Route::get('/email', [EmailController::class, 'sendmail'])->middleware('auth');

Route::get('/emailme', [EmailController::class, 'emailme'])->middleware('auth');

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



// FINALIZAR CURSO
Route::put('/listings/{listing}', [CursosController::class, 'update'])->middleware('auth');

// REGISTRARSE
Route::post('/listings', [participantesController::class, 'store'])->middleware('auth');

// REGISTRARSE SIN CUENTA
Route::post('/participantes', [participantesController::class, 'storeeasy']);

// CREAR CURSO
Route::post('/cursos/crear', [cursosController::class, 'store'])->middleware('auth');

// GENERAR VALIDACIÓN
Route::post('/validaciones/generar', [ValidacionesController::class, 'store'])->middleware('auth');

//QUERY VALIDACIONES
Route::get('/validaciones/search', function () {
    $query = request()->query('q'); // get the value of the 'q' query parameter
    $query2 = request()->query('curso'); 
    $query3 = request()->query('status'); 
    $listings = App\Models\Validaciones::where('nombre_usuario', 'like', "%$query%")->where('nombre_curso', 'like', "%$query2%")->where('status', 'like', "%$query3%", )->get(); // replace YourModel and column_name with your actual model and column name

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