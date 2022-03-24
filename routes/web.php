<?php

use Illuminate\Support\Facades\Route;
use App\Models\User;
use App\Http\Controllers\MantenedorUser\UserController;
use App\Http\Controllers\MantenedorUser\UserLaravelQueryController;
use App\Http\Controllers\MantenedorUser\UserQueryPDOController;
use App\Http\Controllers\Mantenedores\ClienteController;
use App\Http\Controllers\DatatableController;
use App\Http\Controllers\JsController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SelectController;
use App\Http\Controllers\GraficoController;
use App\Http\Controllers\JobsYQueue\JobsController;
use App\Http\Controllers\JobsYQueue\QueueController;


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

Route::get('/', function () {
return view('welcome');})->name('welcome');

Route::get('/uikit', function () { 
$users = User::all();
return view('uikit.uikit', compact('users'));})->name('uikits1');

//Login y register
Route::get('/login', [LoginController::class,'login'])->name('login');

Route::get('/logeo', [LoginController::class,'logeo'])->name('logeo');

Route::get('/cierre', [LoginController::class,'cierre'])->name('cierre');

Route::post('/register', [LoginController::class,'register'])->name('register');

//Pagina ejemplos
Route::get('/ejemplos', function () {
return view('index');})->middleware('auth')->name('index');

Route::get('/ejemplos/datatable/datatable_basico', [DatatableController::class,'datatable_basico'])->name('datatable.basico');
Route::get('/ejemplos/datatable/datatable_eloquent_all', [DatatableController::class,'datatable_eloquent_all'])->name('datatable.eloquent');
Route::get('/ejemplos/datatable/datatable_remoto', [DatatableController::class,'datatable_remoto'])->name('datatable.remoto');
Route::get('/ejemplos/datatable/datatable_remoto_ajax', [DatatableController::class,'datatable_remoto_ajax'])->name('datatable.remoto.ajax');

Route::get('/ejemplos/js/binding', [JsController::class,'binding']);
Route::get('/ejemplos/select/select-anidado', [SelectControlle::class,'index'])->name('select');
Route::get('/listar-comunas', [SelectControlle::class,'listarComunas'])->name('select.listacomunas');
Route::get('/ejemplos/graficos/comunas', [GraficoController::class,'graficoBarrasComunas'])->name('graficos.comunas');


Route::group(['prefix' => 'clientes'], function () {

    Route::get('/', [ClienteController::class,'index'])->name('clientes.index');

    Route::get('/get-listado', [ClienteController::class,'getListaClientes'])->name('clientes.datos');

    Route::get('/show', [ClienteController::class,'show'])->name('clientes.show');

});

//Exportacion excel
Route::get('/Exportexcel', [UserLaravelQueryController::class,'exportazip'])->name('exportarexcel');
Route::get('/Exportexcelid/{id}', [UserLaravelQueryController::class,'exportexcelid'])->name('exportexcelid');

//Eloquent
Route::group(['prefix' => 'userEloquent'], function () {

    Route::get('/', [UserController::class,'index'])->middleware('auth')->name('user.index');
    
    Route::post('/AddEloquent', [UserController::class,'AddUser'])->middleware('auth')->name('user.AddUser');
    
    Route::put('/updateEloquent/{id}', [UserController::class,'EditUser'])->middleware('auth')->name('user.EditUser');

    Route::get('/deleteEloquent/{id}', [UserController::class,'DeleteUser'])->middleware('auth')->name('user.DeleteUser');
    
    });
    
//LaravelQuery
Route::group(['prefix' => 'userLaravelQuery'], function () {

    Route::get('/', [UserLaravelQueryController::class,'index'])->middleware('auth')->name('LaravelQuery');
    
    Route::post('/AddLaravelQuery', [UserLaravelQueryController::class,'AddUser'])->middleware('auth')->name('user.AddLaravelQuery');

    Route::put('/updateLaravelQuery/{id}', [UserLaravelQueryController::class,'EditUser'])->middleware('auth')->name('user.EditLaravelQuery');

    Route::get('/deleteLaravelQuery/{id}', [UserLaravelQueryController::class,'DeleteUser'])->middleware('auth')->name('user.DeleteLaravelQuery');

    Route::get('/envioemail', [UserLaravelQueryController::class,'emailusers'])->middleware('auth')->name('emailusers');
    
    Route::get('/comunas', [UserLaravelQueryController::class,'cargarcomunas'])->name('cargarcomunas');

    Route::get('/comunasedit', [UserLaravelQueryController::class,'cargarcomunasedit'])->name('cargarcomunasedit');

    //User laravelquery edit
    Route::get('/viewuseredit/{user_id}', [UserLaravelQueryController::class,'viewuseredit'])->middleware('auth')->name('viewuseredit');
    });

    
//QueryPDO
Route::group(['prefix' => 'userQueryPDO'], function () {
    
    Route::get('/', [UserQueryPDOController::class,'index'])->middleware('auth')->name('userQueryPDO');

    Route::post('/AddQueryPDO', [UserQueryPDOController::class,'AddUser'])->middleware('auth')->name('user.AddQueryPDO');
    
    Route::put('/updateQueryPDO/{id}', [UserQueryPDOController::class,'EditUser'])->middleware('auth')->name('user.EditQueryPDO');

    Route::get('/deleteQueryPDO/{id}', [UserQueryPDOController::class,'DeleteUser'])->middleware('auth')->name('user.DeleteQueryPDO');
    
    });

Route::group(['prefix' => 'userJobs'], function () {

    Route::get('/', [JobsController::class,'ListadoJobs'])->middleware('auth')->name('ListadoJobs');
  //Route::get('/updatefecha/{num}', [JobsController::class,'updatefecha'])->name('updatefecha');
    Route::post('/jobscontroller', [JobsController::class,'jobcontroller'])->middleware('auth')->name('jobcontroller');
     

});

Route::group(['prefix' => 'userQueue'], function () {

    Route::get('/', [QueueController::class,'ListadoQueue'])->middleware('auth')->name('ListadoQueue');

    Route::get('/queueemail', [QueueController::class,'emailusers'])->middleware('auth')->name('queueemail');

    Route::get('/emailusersfails', [QueueController::class,'emailusersfails'])->middleware('auth')->name('emailusersfails');

    Route::get('/sumadevalores', [QueueController::class,'calcular'])->middleware('auth')->name('calcular');

});

    

