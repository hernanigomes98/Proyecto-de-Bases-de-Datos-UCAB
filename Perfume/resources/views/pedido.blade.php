@extends('adminlte::page')
@section('content')

<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800">Realizar pedido</h1>
    <div clas="container-fluid">
        <form action="{{url ('guardarproductorpedido')}}" method="POST">
        @csrf
        <div class="row">
            <div class="col-sm">
              <a>Productor: </a>
              <select name="productor" class="select-css">
                  <option selected="selected" value="0"->Ninguno</option>
                  @foreach ($data as $d)
              <option value="{{$d->idproductor}}">{{$d->nombre}}</option>
                  @endforeach
              </select>
              <button type="submit"> Seleccionar</button>
            </div>
        </div>
        </form>
    </div>
</div>

@endsection
