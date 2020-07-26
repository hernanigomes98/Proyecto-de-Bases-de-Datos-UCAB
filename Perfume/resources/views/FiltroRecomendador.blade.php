@extends('adminlte::page')
@section('content')

<!-- Begin Page Content -->
        <div class="container-fluid">
          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800">Filtrar Producto</h1>
          <!-- Select productor -->
          <div class="container">
          <form action="{{url ('guardarR')}}" method="POST">
            @csrf
                <div class="row">

                    <div class="col-sm">
                      <a>Productor: </a>
                      <select id="productor" name="productor" class="select-css">
                          <option selected="selected" value="0"->Ninguno</option>
                          @foreach ($data as $d)
                      <option value="{{$d->idproductor}}">{{$d->nombre}}</option>
                          @endforeach
                      </select>
                    </div>
                    <div class="col-sm">
                      <a>Familia Olfativa: </a>
                      <select id="familiaolfativa" name="familiaolfativa" class="select-css">
                          <option selected="selected" value="0"->Ninguno</option>
                          @foreach ($data3 as $d3)
                              <option value="{{$d3->idfamiliaolfativa}}">{{$d3->nombre}}</option>
                          @endforeach
                      </select>
                    </div>
                    <div class="col-sm">
                        <a>Edad de Perfume: </a>
                        <select id="EdadPerfume" name="EdadPerfume" class="select-css">
                            <option selected="selected" value="0"->Ninguno</option>

                                <option value="jo">joven</option>
                                <option value="ad">adulto</option>
                                <option value="at">atemporal</option>

                        </select>
                    </div>
                    <div class="col-sm">
                        <button type="submit">Filtrar</button>
                    </div>
                  </div>

                </div>
            </form>
          <br>
        </div>

@endsection
