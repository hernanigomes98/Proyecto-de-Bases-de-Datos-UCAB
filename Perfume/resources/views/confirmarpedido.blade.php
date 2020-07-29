@extends('adminlte::page')
@section('content')

<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800">Confirmar pedido</h1>
    <div clas="container-fluid">
        <form action="{{url ('guardarproveedor')}}" method="POST">
        @csrf
        <div class="row">
            <div class="col-sm">
              <a>Proveedor: </a>
              <select name="proveedor" class="select-css">
                  <option selected="selected" value="0"->Ninguno</option>
                  @foreach ($data as $d)
                    <option value="{{$d->idproveedor}}">{{$d->nombre}}</option>
                  @endforeach
              </select>
              <button type="submit"> Seleccionar</button>
            </div>
        </div>
        </form>
    </div>
</div>

@endsection
