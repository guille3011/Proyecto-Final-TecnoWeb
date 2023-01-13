<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PeriodoController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ActivityController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\GraficaController;
use Illuminate\Support\Facades\Artisan;

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

/*Route::get('/', function () {
    return view('pagina');
})->middleware('auth');


/*Route::get('/', function () {
    return view('auth.login');
});

Route::view('dashboard', 'pagina')->name('dashboard')->middleware('auth');
Route::view('login', 'auth.login')->name('login');*/

Route::get('/', function () {
    return view('welcome');
});

Route::view('login', 'auth.login')->name('login');
Route::view('dashboard', 'pagina')->name('dashboard')->middleware('auth');

Route::post('login', function(){
    $credencial=  request()->only('email', 'password');
    if (Auth::attempt($credencial)){
        request()->session()->regenerate();
        return redirect('dashboard');
    }
    return redirect()->route('login');
});

//NO TOCAR!
Route::get('/turuta', function(){
    Artisan::call('storage:link');
});
//--------

Route::resource('periodo',PeriodoController::class)->names('periodo');
Route::resource('user',UserController::class)->names('user');
Route::get('editaruser',[UserController::class,'editaruser'])->name('editaruser');
Route::get('grafica',[GraficaController::class, 'grafica'])->name('grafica');


//----Gestionar Actividad-------

Route::get('/ActividadView',[ActivityController::class,'viewActividadesAutoridad'])->name('actividad.view');
Route::get('/ActividadViewUser',[ActivityController::class,'viewActividadesUser'])->name('actividadU.view');
Route::get('/ActividadNuevo',[ActivityController::class,'crearActividadView'])->name('crearActividad.view');
Route::post('/ActividadNuevo',[ActivityController::class,'crearActividad'])->name('crearActividad');
Route::get('/ActividadEditA/{actividad}',[ActivityController::class,'editarActividadView'])->name('editarActividadA.view');
Route::post('/ActividadEditA/{actividad}',[ActivityController::class,'editarActividad'])->name('editarActividadA');
Route::get('/ActividadEdit/{actividad}',[ActivityController::class,'editarActividadViewUser'])->name('editarActividadU.view');
Route::post('/ActividadEdit/{actividad}',[ActivityController::class,'editarActividadUser'])->name('editarActividadU');
Route::delete('/ActividadDestroy/{actividad}',[ActivityController::class,'eliminarActividad'])->name('eliminarActividad');

//---------------------------------

//-------Gestionar Documentos---------
Route::get('/DocumentosActividadView',[DocumentController::class,'viewActividades'])->name('DocActividad.view');
Route::get('/DocumentosActividadViewUser',[DocumentController::class,'viewActividadesUser'])->name('DocActividadU.view');
Route::get('/DocumentoView/{actividad}',[DocumentController::class,'viewDocumentos'])->name('documento.view');
Route::get('/DocumentoNuevo/{actividad}',[DocumentController::class,'crearDocumentoView'])->name('crearDocumento.view');
Route::post('/DocumentoNuevo/{actividad}',[DocumentController::class,'crearDocumento'])->name('crearDocumento');
Route::get('/DocumentoEdit/{documento}/{actividad}',[DocumentController::class,'editarDocumentoView'])->name('editarDocumento.view');
Route::post('/DocumentoEdit/{documento}/{actividad}',[DocumentController::class,'editarDocumento'])->name('editarDocumento');
Route::delete('/DocumentoDestroy/{documento}/{actividad}',[DocumentController::class,'eliminarDocumento'])->name('eliminarDocumento');
//------------------------------------

//--------Gestionar Tareas------------
Route::get('/TareasActividadView',[TaskController::class,'viewActividades2'])->name('TareaActividad.view');
Route::get('/TareasActividadViewUser',[TaskController::class,'viewActividadesUser'])->name('TareaActividadU.view');
Route::get('/TareaView/{actividad}',[TaskController::class,'viewTareas'])->name('tarea.view');
Route::get('/TareaNuevo/{actividad}',[TaskController::class,'crearTareaView'])->name('crearTarea.view');
Route::post('/TareaNuevo/{actividad}',[TaskController::class,'crearTarea'])->name('crearTarea');
Route::get('/TareaEdit/{tarea}/{actividad}',[TaskController::class,'editarTareaView'])->name('editarTarea.view');
Route::post('/TareaEdit/{tarea}/{actividad}',[TaskController::class,'editarTarea'])->name('editarTarea');
Route::delete('/TareaDestroy/{tarea}/{actividad}',[TaskController::class,'eliminarTarea'])->name('eliminarTarea');
//------------------------------------

