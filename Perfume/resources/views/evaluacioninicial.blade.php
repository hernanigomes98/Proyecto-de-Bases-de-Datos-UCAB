@extends('adminlte::page')
@section('content')

<!-- Begin Page Content -->
        <div class="container-fluid">
          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800">Realizar evaluacion</h1>
          <!-- Select productor -->
          <div class="container">
          <form action="{{url ('guardar')}}" method="POST">
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
                    </div>
                    <div class="col-sm">
                      <a>Proveedor: </a>
                      <select id="proveedor" name="proveedor" class="select-css">
                          <option selected="selected" value="0"->Ninguno</option>
                          @foreach ($data2 as $d2)
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
