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
Route::resource('films', 'FilmController');
Route::get('/films/lang/{lang}', "FilmController@listbyoriglang");
Route::get('/films/langtrans/{lang}', "FilmController@listbytranslang");
Route::resource('languages', 'LanguageController');
Route::resource('actors', 'ActorsController');
Route::get('/glumci', "ActorsController@index");

Route::get('/mojtest', function () {
    return view('prvi.mojtest', ['name' => 'Mali Perica']);
});

Route::redirect('/here', '/there',301);
Route::get('/there', function () {
    return "Dobrodosli u There";
});

Route::post('/test', function () {
    return "Opa, znaci radi i POST !!!";
});
Route::get('/test', function () {
    return "Cestitam, vas test je uspio";
});
Route::get('/', function () {
    return view('welcome');
});

