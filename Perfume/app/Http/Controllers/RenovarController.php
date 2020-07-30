<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\productor;
use App\proveedor;
use App\metodo_envio;
use App\pais;
use App\materiapriesencia;
use App\otroingrediente;
use App\com_mapri;
use App\cond_part;
use App\contrato;
use App\criterio_peso;
use App\resultado;
use Illuminate\Support\Facades\DB;

class RenovarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data=db::table('productor')->paginate();
        $data2=proveedor::all();
        $data5=Db::table('historico_membresia')->paginate();
        return view('renovar1', ["data" => $data, "data2" => $data2, 'data5'=>$data5]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data=$request->get('proveedor');
        $data2=$request->get('productor');

        return redirect('renovar2/'.$data2.'/'.$data.'');

    }

    public function store2(Request $request,$idproductor,$idproveedor,$cont1,$cont2)
    {
        $data=$idproveedor;
        $data2=$idproductor;

        return redirect('renovar3/'.$data2.'/'.$data.'/'.$cont1.'/'.$cont2.'');
    }

    public function store3($idproductor,$idproveedor)
    {
        $data=$idproveedor;
        $data2=$idproductor;

        return redirect('cancelarRenovar/'.$data2.'/'.$data.'');
    }

    public function store4($idproductor,$idproveedor,$obtenido,$rango)
    {

        $resul= new resultado;
        $resul->fechaevaluado=date('Y-m-d', strtotime('now'));
        $resul->resultado="a";
        $resul->tipoevaluacion="a";
        $resul->fk_proveedor=$idproveedor;
        $resul->fk_productor=$idproductor;
        $resul->save();

        $cp1= new criterio_peso;
        $cp1->fechainicio=date('Y-m-d', strtotime('now'));
        $cp1->fechafin=null;
        $cp1->peso=$obtenido;
        $cp1->tipoformula="(Criterio de pedidos comparado al Criterio de exito)";
        $cp1->fk_criterio=3;
        $cp1->fk_productor=$idproductor;
        $cp1->save();

        $cp2= new criterio_peso;
        $cp2->fechainicio=date('Y-m-d', strtotime('now'));
        $cp2->fechafin=null;
        $cp2->peso=$obtenido;
        $cp2->tipoformula="(Criterio de pedidos comparado al Criterio de exito)";
        $cp2->fk_criterio=5;
        $cp2->fk_productor=$idproductor;
        $cp2->save();

        $contrato=DB::table('contrato')->where('fk_proveedor','=',$idproveedor)->where('fk_productor','=',$idproductor)->orderBy('idcontrato','DESC')->first();
        $motivo="renovacion";
        $cancelar=contrato::findOrFail($contrato->idcontrato);
        $cancelar->fechacancelacion=date('Y-m-d', strtotime('now'));
        $cancelar->motivocancelacion=$motivo;
        $cancelar->update();

        return redirect('evaluacioninicial2/'.$idproductor.'/'.$idproveedor.'');
    }

    public function storeContrato(Request $request,$idproductor,$idproveedor){
        $contrato=DB::table('contrato')->where('fk_proveedor','=',$idproveedor)->where('fk_productor','=',$idproductor)->orderBy('idcontrato','DESC')->first();
        $motivo=$request->get('motivo');
        $cancelar=contrato::findOrFail($contrato->idcontrato);
        $cancelar->fechacancelacion=date('Y-m-d', strtotime('now'));
        $cancelar->motivocancelacion=$motivo;
        $cancelar->update();
        return redirect('/');
    }

    public function redireccionarenovacion($idproductor,$idproveedor){
        $data=DB::table('productor')->where('idproductor','=',$idproductor)->first();
        $data2=DB::table('proveedor')->where('idproveedor','=',$idproveedor)->first();
        $data3=Db::table('pedido')->where('fk_idprov', '=', $idproveedor)->where('fk_idprod', '=', $idproductor)->paginate();
        $data4=Db::table('pedido')->where('fk_idprov', '=', $idproveedor)->where('fk_idprod', '=', $idproductor)->where('status', '=', "a")->paginate();
        return view('renovar2',["productor"=>$data,"proveedor"=>$data2,"pedidos"=>$data3,"pedidoa"=>$data4]);

    }

    public function redireccionarenovacion2($idproductor,$idproveedor,$cont1,$cont2){
        $data=DB::table('productor')->where('idproductor','=',$idproductor)->first();
        $data2=DB::table('proveedor')->where('idproveedor','=',$idproveedor)->first();
        $data3=Db::table('pedido')->where('fk_idprov', '=', $idproveedor)->where('fk_idprod', '=', $idproductor)->paginate();
        $data4=Db::table('pedido')->where('fk_idprov', '=', $idproveedor)->where('fk_idprod', '=', $idproductor)->where('status', '=', "a")->paginate();
        $calc=($cont2*100)/$cont1;
        $int_cast = (int)$calc;
        $data5=$int_cast;
        $data6=DB::table('escala')->where('fk_productor','=',$idproductor)->first();

        return view('renovar3',["productor"=>$data,"proveedor"=>$data2,"pedidos"=>$data3,"pedidoa"=>$data4,"obtenido"=>$data5,"rango"=>$data6]);

    }

    public function redireccionarenovacion3($idproductor,$idproveedor){
        $data=DB::table('productor')->where('idproductor','=',$idproductor)->first();
        $data2=DB::table('proveedor')->where('idproveedor','=',$idproveedor)->first();
        return view('cancelarRenovar',["productor"=>$data,"proveedor"=>$data2]);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
