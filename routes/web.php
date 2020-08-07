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
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//Como dueño de mascota y veterinario
Route::get('/perfil','UserController@index')->name('userIndex');
// Route::get('/perfilveterinario','UserController@vetprofile')->name('vetIndex');

//Como veterinario
Route::get('/clientes','VetClientController@index')->name('clientIndex');
Route::get('/clientes/create','VetClientController@create')->name('createClient');
Route::post('/clientes','VetClientController@store')->name('storeClient');
Route::delete('/clientes/{id}','VetClientController@destroy')->name('deleteClient');

// Como veterinario
Route::get('/informacionmascota/{id}/edit', 'PetController@edit')->name('editPetInfo');
Route::put('/informacionmascota/{id}','PetController@update')->name('updatePetInfo');

//Como dueño de mascota y veterinario
Route::get('/historialmedico/{id}','MedicalFileController@index')->name('medicalhistoryIndex');
//Como veterinario
Route::get('/historialmedico/{idmascota}/create','MedicalFileController@create')->name('createFile');
Route::post('/historialmedico/{idmascota}','MedicalFileController@store')->name('storeFile');
Route::get('/historialmedico/{id}/edit','MedicalFileController@edit')->name('editFile');
Route::put('/historialmedico/{id}','MedicalFileController@update')->name('updateFile');
Route::delete('/historialmedico/{id}','MedicalFileController@destroy')->name('deleteFile');

//Como dueño de mascota y veterinario
Route::get('/imagenesficha/{idficha}','MedicalFileImageController@index')->name('indexImage');
//Como veterinario
Route::get('/imageneshistorialmedico/{idficha}/create','MedicalFileImageController@create')->name('createImages');
Route::post('/imageneshistorialmedico/{idficha}','MedicalFileImageController@store')->name('storeImages');

//Como dueño de mascota
Route::get('/vacunas','VaccineController@indexclient')->name('vaccineClientIndex');
//Como veterinario
Route::get('/vacunas/{idmascota}','VaccineController@index')->name('vaccineIndex');
//Como veterinario
Route::get('/vacunas/{idmascota}/create','VaccineController@create')->name('createVaccine');
Route::post('/vacunas/{idmascota}','VaccineController@store')->name('storeVaccine');
Route::delete('/vacunas/{id}/{idmascota}','VaccineController@destroy')->name('deleteVaccine');

//Como dueño de mascota y veterinario
Route::get('/citas','AppointmentController@index')->name('appointmentsIndex');
Route::get('/citas/create','AppointmentController@create')->name('createAppointment');
Route::post('/citas','AppointmentController@store')->name('storeAppointment');
Route::get('/citas/{idcita}/edit','AppointmentController@edit')->name('editAppointment');
Route::put('/citas/{idcita}','AppointmentController@update')->name('updateAppointment');
Route::delete('/citas/{idcita}','AppointmentController@destroy')->name('deleteAppointment');
