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
        $data3=Db::table('contrato')->select('motivocancelacion')->where('fk_productor', '=', $data2)->where('fk_proveedor', '=', $data)->orderBy('idcontrato','DESC')->first();

        if (($data == 0) || ($data2 == 0)) {
            return redirect('renovacionFallida/');

        }elseif ($data3 == null) {

        //return redirect('renovar2/'.$data2.'/'.$data.'');
        return redirect('renovacionFallida/');

        }elseif ($data3->motivocancelacion !== null) {

        return redirect('renovacionFallida/');
        //return redirect('renovar2/'.$data2.'/'.$data.'');

        }else {

            //return redirect('renovacionFallida/');
            return redirect('renovar2/'.$data2.'/'.$data.'');

        }
    }

    public function redireccionarenovacion($idproductor,$idproveedor){
        $data=DB::table('productor')->where('idproductor','=',$idproductor)->first();
        $data2=DB::table('proveedor')->where('idproveedor','=',$idproveedor)->first();
        $data3=Db::table('metodo_envio')->join('pais','metodo_envio.fkpais','=','pais.idpais')->where('fk_proveedor', '=', $idproveedor)->paginate();
        $data4=Db::table('metodo_pago')->where('fk_proveedor','=',$idproveedor)->paginate();
        $data5=Db::table('materiapriesencia')->where('fk_proveedor','=',$idproveedor)->paginate();
        $data6=Db::table('otroingrediente')->where('fk_proveedor','=',$idproveedor)->paginate();
        $data7=DB::table('pais')->where('idpais','=',$data2->fkpais)->first();
        return view('renovar2',["productor"=>$data,"proveedor"=>$data2,"metodo_envio"=>$data3,"metodo_pago"=>$data4, "producto1"=>$data5, "producto2"=>$data6, "ubicacion"=> $data7]);

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
