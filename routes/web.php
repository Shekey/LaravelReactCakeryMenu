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
use App\Artikli;
use App\Http\Resources\Artikli as ArtikliResource;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/api/artikli', function(){
    return ArtikliResource::collection(Artikli::with('podkategorija')->get());
});

Route::get('/create/kategorija', ['as' => 'kreirajKategoriju', 'uses' => 'KategorijaController@create']);
Route::get('/create/podkategorija', ['as' => 'kreirajPodKategoriju', 'uses' => 'podKategorijaController@create']);
Route::get('/create/artikal', ['as' => 'kreirajArtikal', 'uses' => 'ArtikliController@create']);

Route::post('/create/kategorija','KategorijaController@store');
Route::post('/create/podkategorija','podKategorijaController@store');
Route::post('/create/artikal','ArtikliController@store');

Route::get('/kategorije', ['as' => 'kategorije', 'uses' => 'KategorijaController@index']);
Route::get('/podkategorije', ['as' => 'podKategorije', 'uses' => 'podKategorijaController@index']);
Route::get('/artikli', ['as' => 'artikli', 'uses' => 'ArtikliController@index']);

Route::get('/edit/kategorija/{id}','KategorijaController@edit');
Route::get('/edit/podkategorija/{id}','podKategorijaController@edit');
Route::get('/edit/artikal/{id}','ArtikliController@edit');

Route::patch('/edit/kategorija/{id}','KategorijaController@update');
Route::patch('/edit/podkategorija/{id}','podKategorijaController@update');
Route::patch('/edit/artikal/{id}','ArtikliController@update');

Route::delete('/delete/kategorija/{id}','KategorijaController@destroy');
Route::delete('/delete/podkategorija/{id}','podKategorijaController@destroy');
Route::delete('/delete/artikal/{id}','ArtikliController@destroy');
