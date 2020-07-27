<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\productor;
use App\proveedor;
use App\metodo_envio;
use App\pais;
use App\cond_part;
use App\contrato;
use Illuminate\Support\Facades\DB;

class prueba extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$data4=Db::table('proveedor')->where('nombre', '=', $request->get('proveedor'))->paginate();
        $data=db::table('productor')->paginate();
        $data2=proveedor::all();
        $data3=Db::table('contrato')->where('fk_productor', '=', 4)->where('fk_proveedor', '=', 4)->paginate();
        $data4=Db::table('metodo_pago')->where('fk_proveedor','=',2)->paginate();
        $data5=Db::table('historico_membresia')->paginate();
        return view('evaluacioninicial', ["data" => $data, "data2" => $data2, "data3" => $data3, "data4"=>$data4, 'data5'=>$data5]);
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
        $data3=Db::table('contrato')->select('motivocancelacion')->where('fk_productor', '=', $data2)->where('fk_proveedor', '=', $data)->orderBy('idcontrato','DESC')->first();

        if (($data == 0) || ($data2 == 0)) {
            return redirect('evaluacionFallida2/');

        }elseif ($data3 == null) {

            return redirect('evaluacioninicial2/'.$data2.'/'.$data.'');
        //return redirect('evaluacionFallida/');

        }elseif ($data3->motivocancelacion !== null) {

        return redirect('evaluacioninicial2/'.$data2.'/'.$data.'');

        }else {

            return redirect('evaluacionFallida/');
        }

    }

    public function redireccionar($idproductor,$idproveedor){
        $data=DB::table('productor')->where('idproductor','=',$idproductor)->first();
        $data2=DB::table('proveedor')->where('idproveedor','=',$idproveedor)->first();
        $data3=Db::table('metodo_envio')->join('pais','metodo_envio.fkpais','=','pais.idpais')->where('fk_proveedor', '=', $idproveedor)->paginate();
        $data4=Db::table('metodo_pago')->where('fk_proveedor','=',$idproveedor)->paginate();
        $data5=Db::table('historico_membresia')->where('fechafin','=',null)->paginate();
        return view('evaluacioninicial2',["productor"=>$data,"proveedor"=>$data2,"metodo_envio"=>$data3,"metodo_pago"=>$data4, "membresia"=>$data5]);
    }

    public function storeMetodos(Request $request,$idproductor,$idproveedor){
        $datametodosenvio=$request->get("envio");
        $c=new contrato;
        $c->fechaemision=date('Y-m-d', strtotime('now'));
        $c->exclusivo=false;
        $c->fk_proveedor=$idproveedor;
        $c->fk_productor=$idproductor;
        $c->fechacancelacion=null;
        $c->motivocancelacion=null;
        $c->descuento=null;
        $c->recargo=null;
        $c->tiempodescuento=null;
        $c->save();
        for ($i=0;$i<count($datametodosenvio);$i++){
            $envios=$datametodosenvio[$i];
            $pais=DB::table('metodo_envio')->select('fkpais')->where('idmetenvio','=',$envios)->first();
            $e= new cond_part;
            $e->fk_contrato=$c->idcontrato;
            $e->fk_provcont=$idproveedor;
            $e->fk_prodcont=$idproductor;
            $e->fk_metenvio=$envios;
            $e->fk_pais=$pais->fkpais;
            $e->fk_proveedorenv=$idproveedor;
            $e->fk_metpago=null;
            $e->fk_proveedorpago=null;
            $e->save();
        }
        $datametodospago=$request->get("pago");
        for ($i=0;$i<count($datametodospago);$i++){
            $pagos=$datametodospago[$i];
            $p= new cond_part;
            $p->fk_contrato=$c->idcontrato;
            $p->fk_provcont=$idproveedor;
            $p->fk_prodcont=$idproductor;
            $p->fk_metenvio=null;
            $p->fk_pais=null;
            $p->fk_proveedorenv=null;
            $p->fk_metpago=$pagos;
            $p->fk_proveedorpago=$idproveedor;
            $p->save();
        }
        return redirect('/');
    }

    public function redireccionar2($envios,$pagos){

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
    public function update(Request $request, $idproveedor)
    {

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
