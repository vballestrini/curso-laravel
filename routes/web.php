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

Route::get('/series', 'SeriesController@index')
    ->name('series.index');

Route::get('/series/criar', 'SeriesController@create')
    ->name('form_criar');

Route::post('/series/criar', 'SeriesController@store');

Route::delete('/series/remover/{id}', 'SeriesController@destroy');

Route::get('/series/{serieId}/temporadas', 'TemporadasController@index');

Route::post('/series/{id}/editaNome', 'SeriesController@editaNome');

Route::get('/temporadas/{temporada}/episodios', 'EpisodiosController@index');

Route::post('/temporadas/{temporada}/episodios/assistir', 'EpisodiosController@assistir');
