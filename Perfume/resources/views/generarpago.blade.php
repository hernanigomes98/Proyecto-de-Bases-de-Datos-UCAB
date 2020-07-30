@extends('adminlte::page')
@section('content')

<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800">Generar pago</h1>
    <div clas="container-fluid">
            <div class="row">
                <div class="col">
                    <a>Id pedido: </a>
                    <label>{{$pedido->idpedido}}</label>
                </div>
                <div class="col">
                    <a>Fecha pedido: </a>
                    <label>{{$pedido->fecha}}</label>
                </div>
                <div class="col">
                    <a>Fecha de respuesta: </a>
                    <label>{{$pedido->fechaconfir}}</label>
                </div>
                <div class="col">
                    <a>Total: </a>
                    <label>{{$pedido->total}}</label>
                </div>
            </div>
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
        <div class="row">
            <div class="col">
                <a>Numero de cuotas:</a>
                <label>{{$numcuotas}}</label>
            </div>
            <div class="col">
                <a>Cantidad a pagar por cuotas: </a>
                <label>{{$totalcuotas}} dolares</label>
            </div>
        </div>
    </div>
            <form action="{{url ('generarpagostodos/'.$pedido->idpedido.'/'.$numcuotas.'/'.$totalcuotas.'')}}" method="post">
                @csrf
                <button type="submit" onclick="return confirm('¿Desea generar pagos?')">Generar pagos</button>
            </form>

</div>

@endsection
