<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\View;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('vista1', ['nombre' => 'juan']);
// });


if (View::exists('vista2')) {

    Route::get('/', function () {
        return view('vista2',);
    });
    
}else{
    Route::get('/', function () {
        return 'la vista no existe';
    });
    
}






//ejmplo1
Route::get('/texto', function () {
    return'<h1> es es un texto de prueba </h1>';
});

//ejemplo 2
Route::get('/arreglo', function () {
    $arreglo = [
        'Id' => '1',
        'descripcion' => 'prudunto1'
    ];
    return $arreglo;
});

//ejmplo 3
Route::get('/nombre/{nombre}', function ($nombre) {
    return '<h1> el nombre es: ' . $nombre . '</h1>' ;

});

//ejmplo 4
Route::get('/cliente/{cliente?}', function ($cliente='Cliente Geneal' ) {
    return '<h1> el cliente es: ' . $cliente . '</h1>' ;

});

Route::get('/ruta1', function () {
    return '<h1> esta la vista de la ruta 1 </h1>';
})->name('rutaNro1');

Route::get('/ruta2', function () {
    // return '<h1> esta la vista de la ruta 2 </h1>';
    return redirect()->route('rutaNro1');
});



//ejemplo numero 6
Route::get('/usuario/{usuario}', function ($usuario) {
    return 'El usuario es: ' .$usuario;
})->where('usuario', '[0-9]+');



Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
