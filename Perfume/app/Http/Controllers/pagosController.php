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

class pagosController extends Controller
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
        return view('generarpago', ["data" => $data]);
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
        return redirect('generarpago2/'.$data.'/');
    }

    public function redireccionar($idproductor){
        $data=DB::table('productor')->where('idproductor','=',$idproductor)->first();
        $data2=DB::table('pedido')->where('fk_idprod','=',$idproductor)->paginate();
        if($data2!=null){
            for ($c=0;$c<count($data2);$c++){

            }
        }
        return view('generarpago2',["productor"=>$data,"contrato"=>$data2]);
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
