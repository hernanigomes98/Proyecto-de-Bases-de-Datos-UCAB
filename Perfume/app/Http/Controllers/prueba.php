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

class prueba extends Controller
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

            return redirect('evaluacion/'.$data2.'/'.$data.'');
        //return redirect('evaluacionFallida/');

        }elseif ($data3->motivocancelacion !== null) {

        return redirect('evaluacion/'.$data2.'/'.$data.'');

        }else {

            return redirect('evaluacionFallida/');
        }

    }

    public function store2(Request $request, $idproductor, $idproveedor)
    {
        $data=$idproveedor;
        $data2=$idproductor;
        $data3=$request->get('Ubi');
        $data4=$request->get('envio');
        $data5=$request->get('pago');
        //$data3=Db::table('contrato')->select('motivocancelacion')->where('fk_productor', '=', $data2)->where('fk_proveedor', '=', $data)->orderBy('idcontrato','DESC')->first();

        return redirect('evaluacion2/'.$data2.'/'.$data.'/'.$data3.'/'.$data4.'/'.$data5.'');

    }

    public function redireccionarevaluacion($idproductor,$idproveedor){
        $data=DB::table('productor')->where('idproductor','=',$idproductor)->first();
        $data2=DB::table('proveedor')->where('idproveedor','=',$idproveedor)->first();
        $data3=Db::table('metodo_envio')->join('pais','metodo_envio.fkpais','=','pais.idpais')->where('fk_proveedor', '=', $idproveedor)->paginate();
        $data4=Db::table('metodo_pago')->where('fk_proveedor','=',$idproveedor)->paginate();
        $data5=Db::table('materiapriesencia')->where('fk_proveedor','=',$idproveedor)->paginate();
        $data6=Db::table('otroingrediente')->where('fk_proveedor','=',$idproveedor)->paginate();
        $data7=DB::table('pais')->where('idpais','=',$data2->fkpais)->first();
        return view('evaluacion',["productor"=>$data,"proveedor"=>$data2,"metodo_envio"=>$data3,"metodo_pago"=>$data4, "producto1"=>$data5, "producto2"=>$data6, "ubicacion"=> $data7]);

    }

    public function redireccionarevaluacion2($idproductor,$idproveedor,$Ubi,$envio,$pago){
        $data=DB::table('productor')->where('idproductor','=',$idproductor)->first();
        $data2=DB::table('proveedor')->where('idproveedor','=',$idproveedor)->first();
        $data3=Db::table('criterio')->where('descripcion', '=', "evaluacion de ubicacion de proveedor")->first();
        $data4=Db::table('criterio')->where('descripcion', '=', "evaluacion de un metodo de envio")->first();
        $data5=Db::table('criterio')->where('descripcion', '=', "evaluacion de un metodo de pago")->first();
        $data6=$Ubi;
        $data7=$envio;
        $data8=$pago;
        $data9=(($Ubi+$envio+$pago)/3);
        return view('evaluacion2',["productor"=>$data,"proveedor"=>$data2,"data3"=>$data3,"data4"=>$data4, "data5"=>$data5, "ubicacion"=>$data6, "envio"=>$data7, "pago"=>$data8, "total"=>$data9]);

    }

    public function redireccionar($idproductor,$idproveedor){
        $data=DB::table('productor')->where('idproductor','=',$idproductor)->first();
        $data2=DB::table('proveedor')->where('idproveedor','=',$idproveedor)->first();
        $data3=Db::table('metodo_envio')->join('pais','metodo_envio.fkpais','=','pais.idpais')->where('fk_proveedor', '=', $idproveedor)->paginate();
        $data4=Db::table('metodo_pago')->where('fk_proveedor','=',$idproveedor)->paginate();
        $data5=Db::table('materiapriesencia')->where('fk_proveedor','=',$idproveedor)->paginate();
        $data6=Db::table('otroingrediente')->where('fk_proveedor','=',$idproveedor)->paginate();
        return view('evaluacioninicial2',["productor"=>$data,"proveedor"=>$data2,"metodo_envio"=>$data3,"metodo_pago"=>$data4, "producto1"=>$data5, "producto2"=>$data6]);
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

        $materia=$request->get("materia");

        for ($i=0;$i<count($materia);$i++) {
            $producto=$materia[$i];
            $m= new com_mapri;
            $m->idcontrato=$c->idcontrato;
            $m->idproveedor=$idproveedor;
            $m->idproductor=$idproductor;
            $m->idotrosing=null;
            $m->idmateriapries=$producto;
            $m->save();
        }

        $otro=$request->get("otro");

        for ($i=0;$i<count($otro);$i++) {
            $producto2=$otro[$i];
            $m= new com_mapri;
            $m->idcontrato=$c->idcontrato;
            $m->idproveedor=$idproveedor;
            $m->idproductor=$idproductor;
            $m->idotrosing=$producto2;
            $m->idmateriapries=null;
            $m->save();
        }

        return redirect('/');
    }

    public function storeMetodos2(Request $request,$idproductor,$idproveedor,$Ubi,$nevio,$pago,$total){
        $int_cast = (int)$total;

        $resul= new resultado;
        $resul->fechaevaluado=date('Y-m-d', strtotime('now'));
        $resul->resultado="a";
        $resul->tipoevaluacion="i";
        $resul->fk_proveedor=$idproveedor;
        $resul->fk_productor=$idproductor;
        $resul->save();

        $cp1= new criterio_peso;
        $cp1->fechainicio=date('Y-m-d', strtotime('now'));
        $cp1->fechafin=null;
        $cp1->peso=$int_cast;
        $cp1->tipoformula="((Criterio Ubicacion+Criterio envio+Criterio Pago)/3)";
        $cp1->fk_criterio=6;
        $cp1->fk_productor=$idproductor;
        $cp1->save();

        $cp2= new criterio_peso;
        $cp2->fechainicio=date('Y-m-d', strtotime('now'));
        $cp2->fechafin=null;
        $cp2->peso=$int_cast;
        $cp2->tipoformula="((Criterio Ubicacion+Criterio envio+Criterio Pago)/3)";
        $cp2->fk_criterio=1;
        $cp2->fk_productor=$idproductor;
        $cp2->save();

        $cp3= new criterio_peso;
        $cp3->fechainicio=date('Y-m-d', strtotime('now'));
        $cp3->fechafin=null;
        $cp3->peso=$int_cast;
        $cp3->tipoformula="((Criterio Ubicacion+Criterio envio+Criterio Pago)/3)";
        $cp3->fk_criterio=2;
        $cp3->fk_productor=$idproductor;
        $cp3->save();



        return redirect('evaluacioninicial2/'.$idproductor.'/'.$idproveedor.'');
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
