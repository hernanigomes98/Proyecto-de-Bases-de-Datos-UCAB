@extends('adminlte::page')
@section('content')

@php
$cont1 = 0;
$cont2 = 0;
@endphp

<!-- Begin Page Content -->
        <div class="container-fluid">
          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800">Realizar evaluacion</h1>
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
            </div>
          </div>
          <br>



          <h5 class="h3 mb-4 text-gray-800">Pedidos:</h5>
          <div class="card shadow mb-4">
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" name="metodos_envio" id="metodos_envio" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Fecha</th>
                      <th>Total</th>
                      <th>Productor</th>
                      <th>Proveedor</th>


                    </tr>

                    @foreach ($pedidos as $p)
                    <tr>
                        <td>{{$p->fecha}}</td>
                        <td>{{$p->total}}</td>
                        <td>{{$productor->nombre}}</td>
                        <td>{{$proveedor->nombre}}</td>

                    </tr>
                    @php
                    $cont1 = $cont1+1;
                    @endphp
                    @endforeach

                  </tbody>
                </table>
                <h1>{{$cont1}}</h1>
                @php
                $cont3 = $cont1;
                @endphp
              </div>
            </div>
          </div>

          <h5 class="h3 mb-4 text-gray-800">Pedidos aprobados:</h5>
          <div class="card shadow mb-4">
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" name="metodos_pago" id="metodos_pago" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                        <th>Fecha</th>
                        <th>Total</th>
                        <th>Productor</th>
                        <th>Proveedor</th>

                    </tr>
                    @foreach ($pedidoa as $p2)
                    <tr>
                        <td>{{$p2->fecha}}</td>
                        <td>{{$p2->total}}</td>
                        <td>{{$productor->nombre}}</td>
                        <td>{{$proveedor->nombre}}</td>

                    </tr>
                    @php
                    $cont2 = $cont2+1;
                    @endphp
                    @endforeach
                  </tbody>
                </table>
                <h1>{{$cont2}}</h1>
                @php
                $cont4 = $cont2;
                @endphp
              </div>
            </div>
          </div>


          <form action="{{url ('compararCri/'.$productor->idproductor.'/'.$proveedor->idproveedor.'/'.$cont3.'/'.$cont4.'')}}" method="POST">
            @csrf

          <button type="submit" onClick="alert('¿Desea Evaluar al Proveedor?')"> Evaluar Proveedor</button>


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
