@extends('adminlte::page')
@section('content')

<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Realizar pedido</h1>
    <!-- Select productor -->
    <div class="container">
      <div class="row">
        <div class="col-sm">
          <a>Proveedor: </a>
          <label>{{$proveedor->nombre}}</label>
        </div>
      </div>
    </div>
    <br>

    <form action="{{url ('confirmarpedido3/'.$proveedor->idproveedor.'')}}" method="get">
        @csrf
      <h5 class="h3 mb-4 text-gray-800">Pedidos pendientes por aprobacion:</h5>
      <div class="card shadow mb-4">
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" name="pedidos" id="pedidos" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>Id pedido</th>
                  <th>Productor</th>
                  <th>Fecha de solicitud</th>
                  <th>Total</th>
                  <th></th>
                </tr>

                @foreach ($pedidos as $p)
                <tr>
                    <td>{{$p->idpedido}}</td>
                    <td>{{$p->nombre}}</td>
                    <td>{{$p->fecha}}</td>
                    <td>{{$p->total}}</td>
                    <td><input type="radio" id="pedido" name="pedido" value="{{$p->idpedido}}"></td>
                </tr>
                @endforeach

              </tbody>
            </table>
          </div>
        </div>
      </div>
      <button type="submit"> Ver detalles</button>
    </form>
</div>


@endsection
