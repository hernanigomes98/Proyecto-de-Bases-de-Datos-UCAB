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

            <form action="{{url ('crearevaluacion/'.$productor->idproductor.'/'.$proveedor->idproveedor.'/'.$ubicacion.'/'.$envio.'/'.$pago.'/'.$total.'')}}" method="POST">
            @csrf

            <h3>{{$data3->descripcion}}={{$ubicacion}}</h3>
            <h3>{{$data4->descripcion}}={{$envio}}</h3>
            <h3>{{$data5->descripcion}}={{$pago}}</h3>
            <h3>Total={{$total}}%</h3>

            <h1></h1>
            <h1></h1>
            <h1></h1>
          <button type="submit" onClick="alert('¿Desea aprobar al proveedor?')"> Aprobar Evalucion</button>
        </form>

        <form action="{{url ('prueba')}}" method="resource">
            <h1></h1><h1></h1><h1></h1>
            <button type="submit" onClick="alert('si no aprueba, se le redireccionara para seleccionar otro proveedor o productor')">No aprobar</button>
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
