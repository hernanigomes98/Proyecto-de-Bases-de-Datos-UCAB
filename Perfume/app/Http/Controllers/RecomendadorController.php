<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\productor;
use App\proveedor;
use App\familia_olfativa;
use App\perfume;
use App\pe_fa;
use App\contrato;
use Illuminate\Support\Facades\DB;

class RecomendadorController extends Controller
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
        $data3=familia_olfativa::all();
        $data4=perfume::all();
        return view('FiltroRecomendador', ["data" => $data, "data2" => $data2, "data3" => $data3, "data4" => $data4]);

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
        //$data=$request->get('proveedor');
        $data2=$request->get('productor');
        $data3=$request->get('familiaolfativa');
        $data4=$request->get('EdadPerfume');
        //return view('evaluacioninicial', ["data" => $data, "data2" => $data2]);
        return redirect('Recomendador/'.$data2.'/'.$data3.'/'.$data4.'');
    }

    public function redireccionar($idproductor,$idfamiliaolfativa,$edad){
        $data=DB::table('productor')->where('idproductor','=',$idproductor)->first();
        $data3=DB::table('familia_olfativa')->where('idfamiliaolfativa','=',$idfamiliaolfativa)->paginate();
        $data4=DB::table('pe_fa')->where('idfamiliaolfativa','=',$idfamiliaolfativa)->first();
        $data5=DB::table('perfume')->where('edad','=',$edad)->where('fk_productor','=',$idproductor)->where('idperfume','=',$data4->idperfume)->paginate();
        return view('Recomendador',["productor"=>$data,"familia_olfativa"=>$data3,"perfume"=>$data5]);
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
