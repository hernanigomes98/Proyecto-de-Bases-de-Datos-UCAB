<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\productor;
use Illuminate\Support\Facades\DB;
use App\pedido;
use App\com_mapri;
use App\cond_part;
use App\detalle_pedido;
use App\metodo_envio;
use App\metodo_pago;
use App\materiapriesencia;
use App\otroingrediente;
use App\pres_ing;

class confirmarPedidoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data=db::table('proveedor')->paginate();
        return view('confirmarpedido', ["data" => $data]);
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
        //
        $data=$request->get('proveedor');
        return redirect('confirmarpedido2/'.$data.'/');
    }

    public function redireccionar($idproveedor){
        $data=Db::table('pedido')->join('productor','pedido.fk_idprod','=','productor.idproductor')->where('fk_idprov','=',$idproveedor)->where('status','=','p')->paginate();
        $data2=DB::table('proveedor')->where('idproveedor','=',$idproveedor)->first();
        return view('confirmarpedido2',["proveedor"=>$data2,"pedidos"=>$data]);
    }

    public function redireccionar2($idproveedor,Request $request){
        $idpedido=$request->get("pedido");
        $data=DB::table('pedido')->where('idpedido','=',$idpedido)->first();
        $data2=DB::table('proveedor')->where('idproveedor','=',$idproveedor)->first();
        $data3=DB::table('productor')->where('idproductor','=',$data->fk_idprod)->first();
        $data4=DB::table('cond_part')->join('metodo_envio','cond_part.fk_metenvio','=','metodo_envio.idmetenvio')->where('id_conpart','=',$data->fk_condpartenvio)->first();
        if($data4!=null){
            $data5=DB::table('pais')->where('idpais','=',$data4->fkpais)->first();
        }
        else $data5=null;
        $data6=DB::table('cond_part')->join('metodo_pago','cond_part.fk_metpago','=','metodo_pago.idmetpago')->where('id_conpart','=',$data->fk_condpartpago)->first();
        $data7=DB::table('detalle_pedido')->join('pres_ing','detalle_pedido.fk_presing','=','pres_ing.idpresing')->join('materiapriesencia','pres_ing.idmateriapries','=','materiapriesencia.idcnumber')->where('fk_pedido','=',$data->idpedido)->paginate();
        $data8=DB::table('detalle_pedido')->join('pres_ing','detalle_pedido.fk_presing','=','pres_ing.idpresing')->join('otroingrediente','pres_ing.idotrosing','=','otroingrediente.idotrosing')->where('fk_pedido','=',$data->idpedido)->paginate();
        return view('confirmarpedido3',["pedido"=>$data,"proveedor"=>$data2,"productor"=>$data3,"envio"=>$data4,"pais"=>$data5,"pago"=>$data6,"materiapri"=>$data7,"otrosing"=>$data8]);
    }

    public function confirmar($idpedido, Request $request){
        $factura=$request->get("factura");
        $aprobar=pedido::findOrFail($idpedido);
        $aprobar->status="a";
        $aprobar->fechaconfir=date('Y-m-d', strtotime('now'));
        $aprobar->nfactura=$factura;
        $aprobar->update();
        return redirect('/');
    }

    public function reprobar($idpedido){
        $reprobar=pedido::findOrFail($idpedido);
        $reprobar->status="r";
        $reprobar->fechaconfir=date('Y-m-d', strtotime('now'));
        $reprobar->update();
        return redirect('/');
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
