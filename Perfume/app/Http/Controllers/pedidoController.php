<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\productor;
use Illuminate\Support\Facades\DB;
use App\pedido;
use App\com_mapri;
use App\cond_part;
use App\metodo_envio;
use App\metodo_pago;
use App\materiapriesencia;
use App\otroingrediente;
use App\pres_ing;
class pedidoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data=db::table('productor')->paginate();
        return view('pedido', ["data" => $data]);
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
        $data=$request->get('productor');
        return redirect('pedido2/'.$data.'/');
    }

    public function redireccionar($idproductor){
        $data=DB::table('productor')->where('idproductor','=',$idproductor)->first();
        $data2=Db::table('contrato')->join('proveedor','contrato.fk_proveedor','=','proveedor.idproveedor')->where('fk_productor', '=', $idproductor)->where('fechacancelacion','=',null)->paginate();
        return view('pedido2',["productor"=>$data,"contrato"=>$data2]);
    }

    public function storeempresas( $idproductor, Request $request)
    {
        //
        $data2=$request->get('proveedor');
        return redirect('pedido3/'.$idproductor.'/'.$data2.'/');
    }

    public function redireccionar2($idproductor,$idproveedor){
        $data=DB::table('productor')->where('idproductor','=',$idproductor)->first();
        $data2=DB::table('proveedor')->where('idproveedor','=',$idproveedor)->first();
        $contrato=DB::table('contrato')->where('fk_productor','=',$idproductor)->where('fk_proveedor','=',$data2->idproveedor)->where('fechacancelacion','=',null)->first();
        $data3=DB::table('com_mapri')->join('materiapriesencia','com_mapri.idmateriapries','=','materiapriesencia.idcnumber')->where('idcontrato','=',$contrato->idcontrato)->where('idotrosing','=',null)->paginate();
        $data4=Db::table('cond_part')->join('metodo_envio','cond_part.fk_metenvio','=','metodo_envio.idmetenvio')->join('pais','metodo_envio.fkpais','=','pais.idpais')->where('fk_contrato','=',$contrato->idcontrato)->where('fk_metenvio','!=',null)->paginate();
        $data5=Db::table('cond_part')->join('metodo_pago','cond_part.fk_metpago','=','metodo_pago.idmetpago')->where('fk_contrato','=',$contrato->idcontrato)->where('fk_metpago','!=',null)->paginate();
        $data6=DB::table('com_mapri')->join('otroingrediente','com_mapri.idotrosing','=','otroingrediente.idotrosing')->where('idcontrato','=',$contrato->idcontrato)->where('idmateriapries','=',null)->paginate();
        $data7 = DB::table('materiapriesencia')
            ->join('com_mapri', 'com_mapri.idmateriapries', '=', 'materiapriesencia.idcnumber')
            ->join('pres_ing', 'pres_ing.idmateriapries', '=', 'materiapriesencia.idcnumber')
            ->where('com_mapri.idcontrato', '=', $contrato->idcontrato)
            ->select('materiapriesencia.*', 'pres_ing.volml', 'pres_ing.precio')
            ->paginate();
        $data8 = DB::table('otroingrediente')
            ->join('com_mapri', 'com_mapri.idotrosing', '=', 'otroingrediente.idotrosing')
            ->join('pres_ing', 'pres_ing.idotrosing', '=', 'otroingrediente.idotrosing')
            ->where('com_mapri.idcontrato', '=', $contrato->idcontrato)
            ->select('otroingrediente.*', 'pres_ing.volml', 'pres_ing.precio')
            ->paginate();
        return view('pedido3',["productor"=>$data,"proveedor"=>$data2,"esencias"=>$data3,"envios"=>$data4,"pagos"=>$data5,"otrosin"=>$data6,"presentacion"=>$data7,"otroing"=>$data8]);
    }

    public function crearpedido ($productor,$proveedor){
        $p= new pedido;


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
