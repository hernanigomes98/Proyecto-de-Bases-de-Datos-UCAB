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

class cancelarContratoController extends Controller
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
        return view('cancelarcontrato', ["data" => $data]);
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
        return redirect('cancelarcontrato2/'.$data.'/');
    }

    public function redireccionar($idproductor){
        $data=DB::table('productor')->where('idproductor','=',$idproductor)->first();
        $data2=Db::table('contrato')->join('proveedor','contrato.fk_proveedor','=','proveedor.idproveedor')->where('fk_productor', '=', $idproductor)->where('fechacancelacion','=',null)->paginate();
        return view('cancelarcontrato2',["productor"=>$data,"contrato"=>$data2]);
    }

    public function storeContrato(Request $request){
        $contrato=$request->get('contratoe');
        $motivo=$request->get('motivo');
        $cancelar=contrato::findOrFail($contrato);
        $cancelar->fechacancelacion=date('Y-m-d', strtotime('now'));
        $cancelar->motivocancelacion=$motivo;
        $cancelar->update();
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
