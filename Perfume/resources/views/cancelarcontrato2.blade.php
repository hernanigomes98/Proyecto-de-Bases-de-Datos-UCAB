@extends('adminlte::page')
@section('content')

<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Cancelar Contrato</h1>
    <!-- Select productor -->
    <div class="container">
      <div class="row">
        <div class="col-sm">
          <a>Productor: </a>
          <label>{{$productor->nombre}}</label>
        </div>
      </div>
    </div>

    <form action="{{url ('cancelarcontrato/'.$productor->idproductor.'/')}}" method="POST">
        @csrf
      <h5 class="h3 mb-4 text-gray-800">Contratos activos del productor:</h5>
      <div class="card shadow mb-4">
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" name="contrato" id="contrato" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>Proveedor</th>
                  <th>Fecha de emision</th>
                  <th></th>
                </tr>

                @foreach ($contrato as $d3)
                <tr>
                    <td>{{$d3->nombre}}</td>
                    <td>{{$d3->fechaemision}}</td>
                    <td><input type="radio" id="contratoe" name="contratoe" value="{{$d3->idcontrato}}"></td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
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
