<?php

use Illuminate\Support\Facades\Route;

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
    return view('welcome');
})->name('welcome');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::middleware(['auth','checkRole:admin'])->group(function(){
    Route::get('/usuariosregistrados','UserController@index')->name('usersIndex');
});

Route::middleware(['auth','checkRole:veterinario,cliente'])->group(function(){
    Route::get('/perfilcliente/{id}','UserController@show')->name('userShow');
    Route::get('/perfilcliente/{id}/edit','UserController@edit')->name('userEdit');
    Route::put('/perfilcliente/{id}','UserController@update')->name('userUpdate');
});

Route::middleware(['auth','checkRole:admin,veterinario,cliente'])->group(function(){
    Route::delete('/perfil/{id}','UserController@destroy')->name('userDestroy');
});

Route::middleware(['auth','checkRole:veterinario'])->group(function(){
    Route::get('/clientes','VetClientController@index')->name('clientIndex');
    Route::get('/clientes/create','VetClientController@create')->name('createClient');
    Route::post('/clientes','VetClientController@store')->name('storeClient');
    Route::delete('/clientes/{id}','VetClientController@destroy')->name('deleteClient');
    Route::get('/informacionmascota/{id}/edit', 'PetController@edit')->name('editPetInfo');
    Route::put('/informacionmascota/{id}','PetController@update')->name('updatePetInfo');
});

Route::middleware(['auth','checkRole:veterinario,cliente'])->group(function(){
    Route::get('/historialmedico/{id}','MedicalFileController@index')->name('medicalhistoryIndex');
});

Route::middleware(['auth','checkRole:veterinario'])->group(function(){
    Route::get('/historialmedico/{id}/create','MedicalFileController@create')->name('createFile');
    Route::post('/historialmedico/{id}','MedicalFileController@store')->name('storeFile');
    Route::get('/historialmedico/{id}/edit','MedicalFileController@edit')->name('editFile');
    Route::put('/historialmedico/{idficha}/{id}','MedicalFileController@update')->name('updateFile');
    Route::delete('/historialmedico/{idficha}/{id}','MedicalFileController@destroy')->name('deleteFile');
});

Route::middleware(['auth','checkRole:veterinario,cliente'])->group(function(){
    Route::get('/imagenesficha/{idficha}/{idmascota}','MedicalFileImageController@index')->name('indexImage');
});

Route::middleware(['auth','checkRole:veterinario'])->group(function(){
    Route::get('/imageneshistorialmedico/{idficha}/create','MedicalFileImageController@create')->name('createImages');
    Route::post('/imageneshistorialmedico/{idficha}','MedicalFileImageController@store')->name('storeImages');
});

Route::middleware(['auth','checkRole:cliente'])->group(function(){
    Route::get('/vacunas','VaccineController@indexclient')->name('vaccineClientIndex');
});

Route::middleware(['auth','checkRole:veterinario'])->group(function(){
    Route::get('/vacunas/{id}','VaccineController@index')->name('vaccineIndex');
    Route::get('/vacunas/{id}/create','VaccineController@create')->name('createVaccine');
    Route::post('/vacunas/{id}','VaccineController@store')->name('storeVaccine');
    Route::delete('/vacunas/{idvacuna}/{id}','VaccineController@destroy')->name('deleteVaccine');
});

Route::middleware(['auth','checkRole:veterinario,cliente'])->group(function(){
    Route::get('/citas','AppointmentController@index')->name('appointmentsIndex');
    Route::get('/citas/create','AppointmentController@create')->name('createAppointment');
    Route::post('/citas','AppointmentController@store')->name('storeAppointment');
    Route::get('/citas/{idcita}/edit','AppointmentController@edit')->name('editAppointment');
    Route::put('/citas/{idcita}','AppointmentController@update')->name('updateAppointment');
    Route::delete('/citas/{idcita}','AppointmentController@destroy')->name('deleteAppointment');
});

Route::middleware(['auth','checkRole:veterinario'])->group(function(){
    Route::get('/tareas','TaskController@index')->name('indexTasks');
    Route::get('/proximastareas','TaskController@nextTasksindex')->name('indexNextTasks');
    Route::get('/tareas/create','TaskController@create')->name('createTask');
    Route::post('/tareas','TaskController@store')->name('storeTask');
    Route::get('/tareas/{idtarea}/edit','TaskController@edit')->name('editTask');
    Route::put('/tareas/{idtarea}','TaskController@update')->name('updateTask');
    Route::delete('/tareas/{idtarea}','TaskController@destroy')->name('deleteTask');
});
