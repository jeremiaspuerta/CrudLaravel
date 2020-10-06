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

// ENVIAR VARIABLES
// Route::get('/', function () {
//     $nombre = "Bla bla bla";
    // Primera forma para enviar variables a las views
//     return view('home')->with('nombre',$nombre);

//     Segunda forma de enviar variables a las views
//     return view('home')->with(['nombre'=> $nombre]);

//     Tercer forma de enviar variables a las views
//     return view('home',['nombre'=> $nombre]);

//     Cuarta forma de enviar variables a las views
//     Siempre y cuando la variable tenga el mismo nombre
//     en ambos lados
//     return view('home',compact('nombre'));
// })-> name('home');

#ENVIAR VARIABLES 2

#Recomendable para páginas que no tienen mucha lógica
// Route::view('/', 'home',['nombre'=> 'Jeremias'])->name('nameOfRoute');

#######################

#PAGINAS DE POCA LÓGICA
Route::get('/', 'PersonaController@index')->name('personas.index');
Route::get('/personas/crear', 'PersonaController@create')-> name('personas.create');
Route::get('/personas/{personas}', 'PersonaController@show')-> name('personas.show');
Route::post('/personas', 'PersonaController@store')-> name('personas.store');
Route::get('/personas/actualizar/{personas}', 'PersonaController@edit')-> name('personas.actualizar');
Route::patch('/personas/actualizar/{personas}', 'PersonaController@update')-> name('personas.update');
Route::delete('/personas/{personas}','PersonaController@destroy')-> name('personas.destroy');

#NAMED ROUTES
// Route::get('contactanos', function () {
//     return "Sección de contactos";
// }) -> name('contactos'); #Se le establece un NOMBRE A LA RUTA  ("Named routes")

// Route::get('/', function () {
//     #route('contactos'') hace referencia al nombre de la ruta
//     echo "<a href=' " . route('contactos') . "'>Contactos 1 </a><br>";
// });

#El parametro $nombre no es obligatorio porque se le coloca signo de interrogación
#Además se le establece un valor por defecto ("invitado")
// Route::get('/hola/{nombre?}', function ($nombre = "Invitado"){
//     return "Hola ". $nombre;
// });

#El parametro $nombre es obligatorio
// Route::get('/hola/{nombre}', function ($nombre){
//     return "Hola ". $nombre;
// });

// Route::post('users/{id}', function ($id) {

// });
