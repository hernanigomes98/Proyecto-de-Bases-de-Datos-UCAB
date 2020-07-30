@extends('adminlte::page')
@section('content')
<!-- Begin Page Content -->
        <div class="container-fluid">
          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800">Resultados</h1>
          <!-- Select productor -->
          <div class="container">
            <div class="row">
              <div class="col-sm">

            <form action="{{url ('crearevaluacionR/'.$productor->idproductor.'/'.$proveedor->idproveedor.'/'.$obtenido.'/'.$rango->rangoinicio.'')}}" method="POST">
            @csrf

            <h3>Evaluacion del Criterio ={{$obtenido}}%</h3>

            <h1> </h1>
            <h1> </h1>
            <h1> </h1>
            <h1> </h1>
            <h1> </h1>
            <h1> </h1>
            <h3>Criterio de exito={{$rango->rangoinicio}}%</h3>

          @if ($obtenido>=$rango->rangoinicio)
          <h1> </h1>
            <h1> </h1>
            <h1> </h1>
            <h1> </h1>
            <h1> </h1>
            <h1>Cumple con el minimo de aprobacion</h1>
            <button type="submit" onClick="alert('¿Desea generar contrato?')"> Aprobar Evalucion</button>
          @endif
        </form>

        <form action="{{url ('norenovar/'.$productor->idproductor.'/'.$proveedor->idproveedor.'')}}" method="post">
            @csrf
            <h1></h1><h1></h1><h1></h1>
            @if ($obtenido<$rango->rangoinicio)
            <h1> </h1>
            <h1> </h1>
            <h1> </h1>
            <h1> </h1>
            <h1> </h1>
            <h1>No cumple con el minimo de aprobacion</h1>
            <button type="submit" onClick="alert('si no aprueba, se le redireccionara para seleccionar otro proveedor o productor')">No aprobar</button>
            @endif
        </form>

        </div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>
@endsection
