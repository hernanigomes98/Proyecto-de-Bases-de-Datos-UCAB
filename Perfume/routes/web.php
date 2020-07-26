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
// use PHPJasper\PHPJasper;

// Route::get('/compilarReporte', function () {
//    $input = base_path() .
//     '/vendor/geekcom/phpjasper/examples/hello_world.jrxml';

//      $jasper = new PHPJasper;
//      $jasper->compile($input)->execute();

//      return response()->json([
//          'status' => 'ok',
//          'msj' => '¡Reporte compilado!'
//      ]);
//  });

//  Route::get('/reporte', function () {
//      $input = base_path() .
//      '/vendor/geekcom/phpjasper/examples/hello_world.jasper';
//      $output = base_path() .
//      '/vendor/geekcom/phpjasper/examples';
//      $options = [
//          'format' => ['pdf']

//      ];

//      $jasper = new PHPJasper;

//      $jasper->process(
//          $input,
//          $output,
//          $options
//      )->execute();

//      $pathToFile = base_path() .
//      '/vendor/geekcom/phpjasper/examples/merged.pdf';
//     return response()->file($pathToFile);
//  });

// Route::get('/listarParametrosReporte', function () {
//     $input = base_path() .
//     '/vendor/geekcom/phpjasper/examples/hello_world_params.jrxml';

//     $jasper = new PHPJasper;
//     $output = $jasper->listParameters($input)->execute();

//     return response()->json([
//         'status' => 'ok',
//         'parms' => $output
//     ]);
// });

// Route::get('/compilarReporteParametros', function () {
//     $input = base_path() .
//     '/vendor/geekcom/phpjasper/examples/hello_world_params.jrxml';

//     $jasper = new PHPJasper;
//     $jasper->compile($input)->execute();

//     return response()->json([
//         'status' => 'ok',
//         'msj' => '¡Reporte compilado!'
//     ]);
// });

// Route::get('/reporteParametros', function () {
//     $input = base_path() .
//     '/vendor/geekcom/phpjasper/examples/hello_world_params.jasper';
//     $output = base_path() .
//     '/vendor/geekcom/phpjasper/examples';
//     $options = [
//         'format' => ['pdf'],
//         'params' => [
//             'myInt' => 7,
//             'myDate' => date('y-m-d'),
//             'myImage' => base_path() .
//             '/vendor/geekcom/phpjasper/examples/jasperreports_logo.png',
//             'myString' => 'Hola Mundo!'
//         ]
//     ];

//     $jasper = new PHPJasper;

//     $jasper->process(
//         $input,
//         $output,
//         $options
//     )->execute();

//     $pathToFile = base_path() .
//     '/vendor/geekcom/phpjasper/examples/hello_world_params.pdf';
//     return response()->file($pathToFile);
// });





Route::get('/', function () {
    return view('welcome');
});

Route::resource('prueba', 'prueba');

Route::resource('cancelarContratoController', 'cancelarContratoController');

Route::resource('RecomendadorController', 'RecomendadorController');

Route::post('/guardar', 'prueba@store');

Route::post('/guardarR', 'RecomendadorController@store');

Route::post('/guardarproductor','cancelarContratoController@store');

Route::get('evaluacioninicial2/{idproductor}/{idproveedor}','prueba@redireccionar');

Route::get('Recomendador/{idproductor}/{idfamiliaolfativa}/{idperfume}','RecomendadorController@redireccionar');

Route::get('cancelarcontrato2/{idproductor}/','cancelarContratoController@redireccionar');

Route::post('crearcontrato/{idproductor}/{idproveedor}/','prueba@storeMetodos');

Route::post('cancelarcontrato/{idproductor}','cancelarContratoController@storeContrato');

Route::get('reporteproveedor', function(){
    return view('reporteproveedor');
});

Route::get('cancelarcontrato', function(){
    return view('cancelarcontrato');
});

Route::get('FiltroRecomendador',function(){
    return view('FiltroRecomendador');
});

Route::get('Recomendador', function(){
    return view('Recomendador');
});
