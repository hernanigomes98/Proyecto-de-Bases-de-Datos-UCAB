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

Route::resource('pedidoController', 'pedidoController');

Route::resource('confirmarpedido', 'confirmarPedidoController');

/////////////////////////////////////////////////////////////////////////////////////////
Route::resource('RecomendadorController', 'RecomendadorController');

Route::post('/guardar', 'prueba@store');

Route::post('/guardar2/{idproductor}/{idproveedor}', 'prueba@store2');

Route::post('/guardarR', 'RecomendadorController@store');

Route::post('/guardarproductor','cancelarContratoController@store');

Route::post('/guardarproductorpedido','pedidoController@store');

Route::post('/guardarempresaspedido/{idproductor}/','pedidoController@storeempresas');

Route::post('/guardarproveedor', 'confirmarPedidoController@store');

///////////////////////////////////////////////////////////////////////////////////////////////

Route::get('evaluacioninicial2/{idproductor}/{idproveedor}','prueba@redireccionar');

Route::get('evaluacion/{idproductor}/{idproveedor}','prueba@redireccionarevaluacion');

Route::get('evaluacion2/{idproductor}/{idproveedor}/{Ubi}/{envio}/{pago}/','prueba@redireccionarevaluacion2');

Route::get('Recomendador/{idproductor}/{idfamiliaolfativa}/{idperfume}','RecomendadorController@redireccionar');

Route::get('cancelarcontrato2/{idproductor}/','cancelarContratoController@redireccionar');

Route::get('pedido2/{idproductor}/','pedidoController@redireccionar');

Route::get('pedido3/{idproductor}/{idproveedor}','pedidoController@redireccionar2');

Route::get('confirmarpedido2/{idproveedor}', 'confirmarPedidoController@redireccionar');

Route::get('confirmarpedido3/{idproveedor}', 'confirmarPedidoController@redireccionar2');
///////////////////////////////////////////////////////////////////////////////////////////////

Route::post('aprobarpedido/{idpedido}','confirmarPedidoController@confirmar');

Route::post('rechazarpedido/{idpedido}','confirmarPedidoController@reprobar');

Route::post('crearcontrato/{idproductor}/{idproveedor}/','prueba@storeMetodos');

Route::post('crearevaluacion/{idproductor}/{idproveedor}/{Ubi}/{envio}/{pago}/{total}/','prueba@storeMetodos2');

Route::post('cancelarcontrato/{idproductor}','cancelarContratoController@storeContrato');

Route::post('crearpedido/{idproductor}/{idproveedor}','pedidoController@crearpedido');
////////////////////////////////////////////////////////////////////////////////////////////////

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

Route::get('evaluacionFallida', function(){
    return view('evaluacionFallida');
});

Route::get('evaluacionFallida2', function(){
    return view('evaluacionFallida2');
});
