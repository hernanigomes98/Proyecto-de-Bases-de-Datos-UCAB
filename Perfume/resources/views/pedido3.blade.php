@extends('adminlte::page')
@section('content')

<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Realizar pedido</h1>
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


    <form action="{{url ('crearpedido/'.$productor->idproductor.'/'.$proveedor->idproveedor.'')}}" method="POST">
        @csrf
      <h5 class="h3 mb-4 text-gray-800">Metodos de envio ofrecidos por el proveedor:</h5>
      <div class="card shadow mb-4">
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" name="envios" id="envios" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>Tipo de envio</th>
                  <th>Pais</th>
                  <th>Costo adicional</th>
                  <th></th>
                </tr>

                @foreach ($envios as $d3)
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
                    <td><input type="radio" id="envio" name="envio" value="{{$d3->id_conpart}}"></td>
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
                <table class="table table-bordered" name="pagos" id="pagos" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Tipo de pago</th>
                      <th>Porcentaje por cuota</th>
                      <th>Tiempo entre cuotas</th>
                      <th></th>
                    </tr>
                    @foreach ($pagos as $d4)
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
                      <td><input type="radio" id="pago" name="pago" value="{{$d4->id_conpart}}"></td>
                      </tr>
                    @endforeach
                  </tbody>
                </table>
                <br>
              </div>
            </div>
          </div>
          <h5 class="h3 mb-4 text-gray-800">Materias primas esencias ofrecidas por el proveedor:</h5>
          <div class="card shadow mb-4">
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" name="materiapriesen" id="materiapriesen" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Idcnumber</th>
                      <th>Nombre</th>
                      <th>Descripcion</th>
                      <th>Tipo extraccion</th>
                      <th>Solubilidad</th>
                      <th>Volumen</th>
                      <th>Precio</th>
                      <th></th>
                      <th>Cantidad</th>
                    </tr>
                    @foreach ($presentacion as $d5)
                      <tr>
                        <td>{{$d5->idcnumber}}</td>
                        <td>{{$d5->nombre}}</td>
                        <td>{{$d5->descripcion}}</td>
                            @if ($d5->tipoextraccion=="ma")
                                <td>Maceracion</td>
                            @endif
                            @if ($d5->tipoextraccion=="ex")
                                <td>Expresion</td>
                            @endif
                            @if ($d5->tipoextraccion=="de")
                                <td>Destilacion</td>
                            @endif
                            @if ($d5->tipoextraccion=="en")
                                <td>Enfleurage</td>
                            @endif
                        <td>{{$d5->solubilidad}} %</td>
                        <td>{{$d5->volml}} ml</td>
                        <td>{{$d5->precio}}</td>
                        <td><input type="checkbox" id="materipries" name="materiapries[]" value="{{$d5->idpresing}}"></td>
                        <td><input type="number" id="cantidadmapri" name="cantidadmapri[]"></td>
                      </tr>
                    @endforeach
                  </tbody>
                </table>
                <br>
              </div>
            </div>
          </div>
          <h5 class="h3 mb-4 text-gray-800">Otros ingredientes ofrecidos por el proveedor:</h5>
          <div class="card shadow mb-4">
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" name="otrosing" id="otrosing" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Ipc</th>
                      <th>Tscacas</th>
                      <th>Nombre</th>
                      <th>Descripcion</th>
                      <th>Volumen</th>
                      <th>Precio</th>
                      <th></th>
                      <th>Cantidad</th>
                    </tr>
                    @foreach ($otroing as $d6)
                      <tr>
                        <td>{{$d6->ipc}}</td>
                        <td>{{$d6->tscacas}}</td>
                        <td>{{$d6->nombre}}</td>
                        <td>{{$d6->descripcion}}</td>
                        <td>{{$d6->volml}}</td>
                        <td>{{$d6->precio}} $</td>
                        <td><input type="checkbox" id="otrosin" name="otrosin[]" value="{{$d6->idpresing}}"></td>
                        <td><input type="number" id="cantidadotrosing" name="cantidadotrosing[]"></td>
                      </tr>
                    @endforeach
                  </tbody>
                </table>
                <br>
              </div>
            </div>
          </div>
          <button type="submit" onclick="return confirm('¿Desea realizar el pedido?')"> Generar pedido</button>
    </form>
</div>

@endsection
