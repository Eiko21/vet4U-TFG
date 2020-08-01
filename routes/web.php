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

Route::get('/perfil','UserController@index')->name('userIndex');
Route::get('/perfilveterinario','UserController@vetprofile')->name('vetIndex');

Route::get('/historialmedico','MedicalFileController@index')->name('medicalhistoryIndex');
Route::get('/historialmedico/{clientid}','MedicalFileController@vetIndex')->name('petMedicalHistoryIndex');
Route::get('/historialmedico/{idmascota}/{clientid}/create','MedicalFileController@create')->name('createFile');
Route::post('/historialmedico/{clientid}','MedicalFileController@store')->name('storeFile');
Route::get('/historialmedico/{id}/{clientid}/edit','MedicalFileController@edit')->name('editFile');
Route::put('/historialmedico/{id}/{clientid}','MedicalFileController@update')->name('updateFile');
Route::delete('/historialmedico/{id}/{clientid}','MedicalFileController@destroy')->name('deleteFile');
