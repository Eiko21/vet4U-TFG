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
Route::get('/perfilveterinario','UserController@vetprofile')->name('vetIndex');

// Como veterinario
Route::get('/informacionmascota/{id}/{clientid}/edit', 'PetController@edit')->name('editPetInfo');
Route::put('/informacionmascota/{id}/{clientid}','PetController@update')->name('updatePetInfo');

//Como dueño de mascota
Route::get('/historialmedico','MedicalFileController@index')->name('medicalhistoryIndex');

//Como veterinario
Route::get('/historialmedico/{clientid}','MedicalFileController@vetIndex')->name('petMedicalHistoryIndex');
Route::get('/historialmedico/{idmascota}/{clientid}/create','MedicalFileController@create')->name('createFile');
Route::post('/historialmedico/{clientid}','MedicalFileController@store')->name('storeFile');
Route::get('/historialmedico/{id}/{clientid}/edit','MedicalFileController@edit')->name('editFile');
Route::put('/historialmedico/{id}/{clientid}','MedicalFileController@update')->name('updateFile');
Route::delete('/historialmedico/{id}/{clientid}','MedicalFileController@destroy')->name('deleteFile');

//Como dueño de mascota y veterinario
Route::get('/imagenesficha/{idficha}/{clientid}','MedicalFileImageController@index')->name('indexImage');
//Como veterinario
Route::get('/imageneshistorialmedico/{idficha}/{clientid}/create','MedicalFileImageController@create')->name('createImages');
Route::post('/imageneshistorialmedico/{idficha}/{clientid}','MedicalFileImageController@store')->name('storeImages');

//Como dueño de mascota
Route::get('/vacunas','VaccineController@index')->name('vaccineIndex');
Route::get('/vacunas/{idmascota}/create','VaccineController@create')->name('createVaccine');
Route::post('/vacunas','VaccineController@store')->name('storeVaccine');
