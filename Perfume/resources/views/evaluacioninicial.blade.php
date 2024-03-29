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
                      <option value="{{$d->idproductor}}">{{$d->nombre}} {{$d->idproductor}}</option>
                          @endforeach
                      </select>
                    </div>
                    <div class="col-sm">
                      <a>Proveedor: </a>
                      <select id="proveedor" name="proveedor" class="select-css">
                          <option selected="selected" value="0"->Ninguno</option>
                          @foreach ($data2 as $d2)
                              <option value="{{$d2->idproveedor}}">{{$d2->nombre}} {{$d2->idproveedor}}</option>
                          @endforeach
                      </select>
                      <button type="submit"></button>
                    </div>
                  </div>

                </div>
            </form>
          <br>
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
