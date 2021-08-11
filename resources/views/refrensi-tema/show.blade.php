@extends('layouts.default')
@section('content')
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-12">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item"><a href="#">Refrensi Tema</a></li>
            <li class="breadcrumb-item active">Detail</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->
  <!-- Main content -->
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-body">
              <a href="{{route('refrensi-tema.index')}}" class="btn btn-sm btn-secondary mb-3 float-right" >Kembali</a>                                   
              <div class="card-body">
                <table class="table table-striped">
                    <tr>
                      <th>Nama Dosen</th>
                    </tr>
                    <tr>
                      <td>{{ $dosen->nama_dosen }}</td>
                    </tr>
                    <tr>
                      <th>Tema</th>                      
                    </tr>
                    <tr>
                      <td>
                        <ul>                    
                          @forelse($dosen->refrensi_temas as $rt)
                            <li>
                              {{ $rt->tema }}
                            </li>
                          @endforeach
                        </ul>

                      </td>
                    </tr>
                </table>
              </div>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
      </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content -->
@endsection('content')
