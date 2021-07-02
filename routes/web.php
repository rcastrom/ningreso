<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FichaController;
use App\Http\Controllers\PropeController;
use App\Http\Controllers\SessionsController;

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
    return view('welcome');
});*/
Route::get('/', [SessionsController::class,'index']);
//Route::get('/login', 'SessionsControllercreate');
/*Route::group(['middleware'=>'App\Http\Middleware\MemberMiddleware'],function (){
    Route::match(['get','post'],'/ficha',[FichaController::class, 'index');
});
*/
Route::group(['prefix'=>'ficha','middleware'=>'auth'],function (){
    Route::get('/', [FichaController::class, 'index'])
        ->name('ficha.inicio');
    Route::get('/cambiar',[FichaController::class, 'cambio']);
    Route::post('/modificar',[FichaController::class, 'update1'])->name('ficha.update1');
    Route::get('/aspirante/modificar',[FichaController::class,'update5']);
    Route::post('/actualizar',[FichaController::class, 'update6'])->name('ficha.update6');
    Route::post('/actualizar2',[FichaController::class, 'update7'])->name('ficha.update7');
    Route::get('/contra2',[FichaController::class, 'cambio2'])
        ->name('ficha.cambio2');
    Route::post('/personal2',[FichaController::class, 'update2'])->name('ficha.update2');
    Route::get('/info1',[FichaController::class, 'error1'])
        ->name('ficha.error1');
    Route::get('/pagos',[FichaController::class, 'pagos']);
    Route::post('/recibos.pdf.php',[FichaController::class, 'imprimir']);
    Route::get('/info2',[FichaController::class, 'error2'])
        ->name('ficha.error2');
    Route::get('/montos',[FichaController::class, 'montos']);
    Route::post('/monto_n',[FichaController::class, 'nmonto1'])->name('ficha.paguitos');
    Route::post('/monto2',[FichaController::class, 'nmonto2'])->name('ficha.pagotes');
    Route::get('/crear',[FichaController::class, 'crear']);
    Route::post('/nficha',[FichaController::class, 'update3'])->name('ficha.nficha');
    Route::get('/fechas',[FichaController::class, 'fentrega']);
    Route::post('/fechas2',[FichaController::class, 'update4'])->name('ficha.nficha2');
    Route::get('/lista',[FichaController::class, 'listado']);
    Route::post('/lista2',[FichaController::class, 'listado2'])->name('ficha.preficha');
    Route::get('/kill',[FichaController::class, 'aniquila']);
    Route::post('/kill_bill',[FichaController::class, 'cuello'])->name('ficha.cuello');
    Route::post('/kill_bill2',[FichaController::class, 'cuello2'])->name('ficha.cuello2');
    Route::post('/kill_bill3',[FichaController::class, 'cuello3'])->name('ficha.cuello3');
    Route::get('/estadistica',[FichaController::class, 'concentrado']);
    Route::group(['prefix'=>'prope','middleware'=>'auth'],function(){
        Route::get('alta_grupo',[PropeController::class, 'alta_grupos']);
        Route::post('mat_alta',[PropeController::class,'alta_materias'])->name('prope.alta');
        Route::get('docente',[PropeController::class,'alta_docente1']);
        Route::post('docente1',[PropeController::class,'alta_docente2'])->name('docente.alta');
        Route::get('edit',[PropeController::class,'editar_docente1']);
        Route::post('edicion1',[PropeController::class,'editar_docente2'])->name('docente.datos');
        Route::post('edicion2',[PropeController::class,'editar_docente3'])->name('docente.contra');
        Route::get('delete',[PropeController::class,'editar_docente4']);
        Route::get('asignar',[PropeController::class,'docente_a_grupo1']);
        Route::get('dmateria',[PropeController::class,'docente_a_grupo2']);
        Route::post('asignacion',[PropeController::class,'docente_a_grupo3'])->name('docente.asignar');
        Route::get('delmateria',[PropeController::class,'docente_a_grupo4']);
        Route::get('inscribir',[PropeController::class,'inscripcion1']);
        Route::post('inscripción',[PropeController::class,'inscripcion2'])->name('prope.inscribir1');
        Route::get('materias',[PropeController::class,'inscripcion3']);
        Route::post('alta_prope_gpo',[PropeController::class,'inscripcion4'])->name('prope.inscribir2');
    });
});

/*Route::get('/prepa',[FichaController::class, 'create2')
->name('ficha.prepa')
->middleware('auth');
Route::get('/muni_prepas',[FichaController::class, 'muni_prepas')->name('fichas.municipios.estados');
Route::post('/pers/captura1', 'AspiranteControllercreate1')->middleware('auth');
Route::get('/datos',[FichaController::class, 'create3')
->name('ficha.socio')
->middleware('auth');
Route::get('/emergencia',[FichaController::class, 'create4')
->name('ficha.emer')
->middleware('auth');
Route::get('/verifica', [FichaController::class, 'verificar')->middleware('auth');
Route::put('/actualiza',[FichaController::class, 'update')
->name('ficha.modifica')
->middleware('auth');
Route::post('/personales',[FichaController::class, 'alta1')->name('ficha.create1');
Route::post('/preparatoria',[FichaController::class, 'alta2')->name('ficha.create2');
Route::post('/socioeconomico',[FichaController::class, 'alta3')->name('ficha.create3');
Route::post('/emergencia',[FichaController::class, 'alta4')->name('ficha.create4');
Route::get('/convocatoria',[FichaController::class, 'convocatoria')
->middleware('auth');
Route::get('/requisitos',[FichaController::class, 'requisitos')
->middleware('auth');
Route::get('/info',[FichaController::class, 'error')
->name('ficha.error')
->middleware('auth');
Route::get('/register', 'RegistrationControllercreate');
Route::get('/convocatoria', 'ConvocatoriaControllerindex');
Route::post('register', 'RegistrationControllerstore');
Route::get('/login', 'SessionsControllercreate')->name('login');*/
Route::post('/login', [SessionsController::class,'store']);
Route::get('/logout', [SessionsController::class,'destroy']);
