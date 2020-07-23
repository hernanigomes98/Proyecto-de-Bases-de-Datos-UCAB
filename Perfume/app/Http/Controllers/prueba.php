<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\productor;
use App\proveedor;
use App\metodo_envio;
use App\pais;
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
        $data3=Db::table('metodo_envio')->join('pais','metodo_envio.fkpais','=','pais.idpais')->where('fk_proveedor', '=', 2)->paginate();
        $data4=Db::table('metodo_pago')->where('fk_proveedor','=',2)->paginate();
        return view('evaluacioninicial', ["data" => $data, "data2" => $data2, "data3" => $data3, "data4"=>$data4]);
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
        //return view('evaluacioninicial', ["data" => $data, "data2" => $data2]);
        return redirect('evaluacioninicial2/'.$data2.'/'.$data.'');
    }

    public function redireccionar($idproductor,$idproveedor){
        $data=DB::table('productor')->where('idproductor','=',$idproductor)->first();
        $data2=DB::table('proveedor')->where('idproveedor','=',$idproveedor)->first();
        $data3=Db::table('metodo_envio')->join('pais','metodo_envio.fkpais','=','pais.idpais')->where('fk_proveedor', '=', $idproveedor)->paginate();
        $data4=Db::table('metodo_pago')->where('fk_proveedor','=',$idproveedor)->paginate();
        return view('evaluacioninicial2',["productor"=>$data,"proveedor"=>$data2,"metodo_envio"=>$data3,"metodo_pago"=>$data4]);
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
