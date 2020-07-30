@extends('adminlte::page')
@section('content')

<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Cancelar Contrato</h1>
    <!-- Select productor -->
    <div class="container">
      <div class="row">
      </div>
    </div>

    <form action="{{url ('cancelarcontratoR/'.$productor->idproductor.'/'.$proveedor->idproveedor.'')}}" method="POST">
        @csrf
      <h5 class="h3 mb-4 text-gray-800"></h5>
      <div class="card shadow mb-4">
        <div class="card-body">

            <h2>el productor {{$productor->nombre}} desea cancelar contrato con el proveedor {{$proveedor->nombre}}</h2>




        </div>
      </div>
      <div class="container">
       <div class="row">
           <div class="col-sm">
            <a>Motivo de Cancelacion:</a>
            <input type="text" name="motivo" id="motivo">
           </div>
           <div class="col-sm">
            <input type="submit" onclick="return confirm('¿Desea cancelar el contrato?')"/>
           </div>
       </div>
      </div>
      </form>
@endsection
