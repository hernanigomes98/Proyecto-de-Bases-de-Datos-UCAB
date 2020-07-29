@extends('adminlte::page')
@section('content')

<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Detalles pedido</h1>
    <!-- Select productor -->
    <div class="container">
      <div class="row">
        <div class="col-sm">
            <a>Productor: </a>
            <label>{{$productor->nombre}}</label>
        </div>
        <div class="col-sm">
          <a>Proveedor: </a>
          <label>{{$proveedor->nombre}}</label>
        </div>
        <div class="col-sm">
            <a>Fecha de solicitud: </a>
            <label>{{$pedido->fecha}}</label>
        </div>
      </div>
      @if ($envio!=null)
      <br>
      <h5 class="h3 mb-4 text-gray-800">Metodo de envio:</h5>
      <div class="row">
        <div class="col-sm">
            <a>Tipo de envio: </a>
            @if ($envio->tipoenvio=="t")
                <label>Terrestre</label>
            @endif
            @if ($envio->tipoenvio=="m")
                <label>Maritimo</label>
            @endif
            @if ($envio->tipoenvio=="a")
                <label>Aereo</label>
            @endif
        </div>
        <div class="col-sm">
          <a>Pais: </a>
          <label>{{$pais->nombrepais}}</label>
        </div>
        <div class="col-sm">
            <a>Costo adicional: </a>
            <label>{{$envio->costoadicional}}</label>
        </div>
      </div>
      @endif
      <br>
      <h5 class="h3 mb-4 text-gray-800">Metodo de pago:</h5>
      <div class="row">
        <div class="col-sm">
            <a>Tipo de Pago: </a>
            @if ($pago->tipopago=="ch")
                <label>Cheque</label>
            @endif
            @if ($pago->tipopago=="tr")
                <label>Transferencia</label>
            @endif
            @if ($pago->tipopago=="cr")
                <label>Credito</label>
            @endif
            @if ($pago->tipopago=="de")
                <label>Debito</label>
            @endif
        </div>
        <div class="col-sm">
          <a>Porcentaje por cuota: </a>
          <label>{{$pago->porcentajecuota}} %</label>
        </div>
        <div class="col-sm">
            <a>Tiempo entre cuotas: </a>
            <label>{{$pago->tiempocuota}} meses</label>
        </div>
      </div>
    </div>
    <br>
    <h5 class="h3 mb-4 text-gray-800">Materias Primas solicitados:</h5>

    <div class="card shadow mb-4">
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" name="materiapri" id="materiapri" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>Idc Number</th>
                  <th>nombre</th>
                  <th>Descripcion</th>
                  <th>Volumen</th>
                  <th>Precio</th>
                  <th>Cantidad</th>
                </tr>

                @foreach ($materiapri as $m)
                <tr>
                    <td>{{$m->idcnumber}}</td>
                    <td>{{$m->nombre}}</td>
                    <td>{{$m->descripcion}}</td>
                    <td>{{$m->volml}}</td>
                    <td>{{$m->precio}}</td>
                    <td>{{$m->cantidad}}</td>
                </tr>
                @endforeach

              </tbody>
            </table>
          </div>
        </div>
    </div>
    <br>

    @if ($otrosing!=null)
    <h5 class="h3 mb-4 text-gray-800">Otros Ingredientes solicitados:</h5>

    <div class="card shadow mb-4">
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" name="otrosing" id="otrosing" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>Ipc</th>
                  <th>Tsc acas</th>
                  <th>Nombre</th>
                  <th>Descripcion</th>
                  <th>Volumen</th>
                  <th>Precio</th>
                  <th>Cantidad</th>
                </tr>

                @foreach ($otrosing as $o)
                <tr>
                    <td>{{$o->ipc}}</td>
                    <td>{{$o->tscacas}}</td>
                    <td>{{$o->nombre}}</td>
                    <td>{{$o->descripcion}}</td>
                    <td>{{$o->volml}}</td>
                    <td>{{$o->precio}}</td>
                    <td>{{$o->cantidad}}</td>
                </tr>
                @endforeach

              </tbody>
            </table>
          </div>
        </div>
    </div>
    @endif
    <div class="row">
        <div class="col">
            <form action="{{url ('aprobarpedido/'.$pedido->idpedido.'')}}" method="post">
                @csrf
                <a>Numero de Factura:</a>
                <input type="number" id="factura" name="factura">
                <button type="submit">Aprobar</button>
            </form>
        </div>
        <div class="col">
            {{-- <form action="{{url ('rechazarpedido/'.$pedido->idpedido.'')}}" method="post">
                <button type="submit">Rechazar</button>
            </form> --}}
        </div>
    </div>
@endsection
