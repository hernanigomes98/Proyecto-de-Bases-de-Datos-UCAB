@extends('adminlte::page')
@section('content')

<!-- Begin Page Content -->
        <div class="container-fluid">
          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800">Reporte Proveedor</h1>
          <!-- Select productor -->
          <div class="container">
            <select name="productor" class="select-css">
                <option selected="selected" value="0"->Ninguno</option>
                <option  value="0"->IFF</option>
                <option  value="0"->Ultra International Limited</option>
                <option  value="0"->Agan Aroma</option>
                <option  value="0"->Bordas</option>
                <option  value="0"->Fraccaroli Brasil</option>
            </select>
            <button type="submit"> Seleccionar</button>
          <div>
        </div>
@endsection
