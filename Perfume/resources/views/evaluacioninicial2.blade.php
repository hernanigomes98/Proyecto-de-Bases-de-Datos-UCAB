@extends('adminlte::page')
@section('content')
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
          <form action="{{url ('crearcontrato/'.$productor->idproductor.'/'.$proveedor->idproveedor.'')}}" method="POST">
            @csrf
          <h5 class="h3 mb-4 text-gray-800">Metodos de envio ofrecidos por el proveedor:</h5>
          <div class="card shadow mb-4">
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" name="metodos_envio" id="metodos_envio" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Tipo de envio</th>
                      <th>Pais</th>
                      <th>Costo adicional</th>
                      <th></th>
                    </tr>

                    @foreach ($metodo_envio as $d3)
                    <tr>
                        @if ($d3->tipoenvio=="t")
                            <td>Terrestre</td>
                        @endif
                        @if ($d3->tipoenvio=="a")
                            <td>Aereo</td>
                        @endif
                        @if ($d3->tipoenvio=="m")
                            <td>Maritimo</td>
                        @endif
                        <td>{{$d3->nombrepais}}</td>
                        <td>{{$d3->costoadicional}}</td>
                        <td><input type="checkbox" id="envio" name="envio[]" value="{{$d3->idmetenvio}}"></td>
                    </tr>
                    @endforeach

                  </tbody>
                </table>
              </div>
            </div>
          </div>

          <h5 class="h3 mb-4 text-gray-800">Metodos de pago ofrecidos por el proveedor:</h5>
          <div class="card shadow mb-4">
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" name="metodos_pago" id="metodos_pago" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Tipo de pago</th>
                      <th>Porcentaje por cuota</th>
                      <th>Tiempo entre cuotas</th>
                      <th></th>
                    </tr>
                    @foreach ($metodo_pago as $d4)
                      <tr>
                        @if ($d4->tipopago=="cr")
                            <td>Credito</td>
                        @endif
                        @if ($d4->tipopago=="de")
                            <td>Debito</td>
                        @endif
                        @if ($d4->tipopago=="tr")
                            <td>Transferencia</td>
                        @endif
                        @if ($d4->tipopago=="ch")
                            <td>Cheque</td>
                        @endif
                        <td>{{$d4->porcentajecuota}} %</td>
                        <td>{{$d4->tiempocuota}} meses</td>
                      <td><input type="checkbox" id="envio" name="pago[]" value="{{$d4->idmetpago}}"></td>
                      </tr>
                    @endforeach
                  </tbody>
                </table>

              </div>
            </div>
          </div>





          <h5 class="h3 mb-4 text-gray-800">Materia Prima y Esencias:</h5>
          <div class="card shadow mb-4">
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" name="materia_prima" id="materia_prima" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>nombre</th>
                      <th>Descripción</th>
                      <th>Tipo Extracción</th>
                      <th>Solubilidad</th>
                      <th></th>
                    </tr>
                    @foreach ($producto1 as $pro1)
                    <tr>
                    <td>{{$pro1->nombre}}</td>
                    <td>{{$pro1->descripcion}}</td>
                        @if ($pro1->tipoextraccion=="ma")
                            <td>Maceración</td>
                        @endif
                        @if ($pro1->tipoextraccion=="ex")
                            <td>Expresión</td>
                        @endif
                        @if ($pro1->tipoextraccion=="de")
                            <td>Destilación</td>
                        @endif
                        @if ($pro1->tipoextraccion=="en")
                            <td>Enfleurage</td>
                        @endif
                        <td>{{$pro1->solubilidad}}%</td>
                      <td><input type="checkbox" id="materia" name="materia[]" value="{{$pro1->idcnumber}}"></td>
                      </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div>


          <h5 class="h3 mb-4 text-gray-800">Otros ingredientes:</h5>
          <div class="card shadow mb-4">
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" name="otro_ingrediente" id="otro_ingrediente" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>nombre</th>
                      <th>Descripción</th>
                      <th></th>
                    </tr>
                    @foreach ($producto2 as $pro2)
                    <tr>
                    <td>{{$pro2->nombre}}</td>
                    <td>{{$pro2->descripcion}}</td>
                      <td><input type="checkbox" id="otro" name="otro[]" value="{{$pro2->idotrosing}}"></td>
                      </tr>
                    @endforeach
                  </tbody>
                </table>
                <br>
                <button type="submit" onClick="alert('Se ha registrado el contrato exitosamente')"> Generar Contrato</button>
              </div>
            </div>
          </div>





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
