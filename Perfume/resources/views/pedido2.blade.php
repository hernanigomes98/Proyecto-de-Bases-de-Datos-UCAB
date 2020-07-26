@extends('adminlte::page')
@section('content')

<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Realizar pedido</h1>
    <!-- Select productor -->
    <div class="container">
    <form action="{{url ('guardarempresaspedido/'.$productor->idproductor)}}" method="POST">
      @csrf
          <div class="row">

              <div class="col-sm">
                <a>Productor: </a>
                <label>{{$productor->nombre}}</label>
              </div>
              <div class="col-sm">
                <a>Proveedor: </a>
                <select id="proveedor" name="proveedor" class="select-css">
                    <option selected="selected" value="0"->Ninguno</option>
                    @foreach ($contrato as $d2)
                        <option value="{{$d2->idproveedor}}">{{$d2->nombre}}</option>
                    @endforeach
                </select>
              </div>
              <div class="col-sm">
                  <button type="submit"> Seleccionar</button>
              </div>
            </div>

          </div>
      </form>
    <br>
  </div>



@endsection
