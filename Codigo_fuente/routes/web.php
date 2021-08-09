<?php

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

Auth::routes();

Route::get('/', function () {
    return view('welcome');
});


Route::get('/logout', function() {
    Auth::logout();
    Session::flush();
	if(!Session::has('tipo'))
	{
	  return redirect('login');
	}
});

Route::post('/login', [
    'uses'          => 'Auth\LoginController@login',
    'middleware'    => 'checkstatus',
]);

Route::get('admin', function () {
    return view('admin_template');
});
Route::get('usuarios-sistema', 'UsuarioController@sistema');
Route::post('usuarios-sistema/agregar', 'UsuarioController@crearUsuarioSistema');
Route::post('usuarios-sistema/editar', 'UsuarioController@editarUsuarioSistema');

Route::get('usuarios-director', 'UsuarioController@director');
Route::post('usuarios-director/agregar', 'UsuarioController@crearUsuarioDocente');
Route::post('usuarios-director/editar', 'UsuarioController@editarUsuarioDocente');
Route::get('perfil-usuario', 'UsuarioController@perfil');

Route::get('investigadores', 'InvestigadorController@index');
Route::post('investigadores/agregar', 'InvestigadorController@agregar');
Route::post('investigadores/editar', 'InvestigadorController@editar');
Route::post('investigadores/eliminar', 'InvestigadorController@eliminar');
Route::post('investigadores/info-grupo', 'InvestigadorController@obtenerInfoGrupo');


Route::group(['middleware' => 'auth'], function() {
    Route::get('gestion-grupos', 'GestionGruposController@index');
});

Route::post('gestion-grupos/agregar', 'GestionGruposController@crear');
Route::post('gestion-grupos/editar', 'GestionGruposController@editar');
Route::post('gestion-grupos/aprobar', 'GestionGruposController@aprobar');

Route::get('pre-registro-grupo', 'GestionGruposController@preregistro');
Route::post('pre-registro-grupo/agregar', 'PreregistroController@agregar');

Route::get('solicitud-horas', 'SolicitudHorasController@index');
Route::post('solicitud-horas/crear', 'SolicitudHorasController@crear');
Route::post('solicitud-horas/revisado', 'SolicitudHorasController@revisado');

Route::get('informe-gestion', 'InformeGestionController@index');
Route::post('informe-gestion/productos', 'InformeGestionController@obtenerProductos');
Route::post('informe-gestion/cumplimiento', 'InformeGestionController@agregarCumplimiento');

Route::get('plan-accion', 'PlanAccionController@index');
Route::post('plan-accion/crear', 'PlanAccionController@crear');
Route::post('plan-accion/agregar-producto', 'PlanAccionController@agregarProducto');
Route::post('plan-accion/info-grupo', 'PlanAccionController@obtenerInfoGrupo');
Route::post('plan-accion/actividades', 'PlanAccionController@obtenerActividades');
Route::post('plan-accion/agregar', 'PlanAccionController@agregar');

Route::get('actividades', 'ActividadesInvestigativasController@index');
Route::post('actividades/agregar', 'ActividadesInvestigativasController@agregar');
Route::post('actividades/editar', 'ActividadesInvestigativasController@editar');
Route::post('actividades/eliminar', 'ActividadesInvestigativasController@eliminar');
Route::post('actividades/info-grupo', 'ActividadesInvestigativasController@obtenerInfoGrupo');

Route::get('notificaciones', 'NotificacionesController@index');


Route::get('/home', 'HomeController@index')->name('home');
