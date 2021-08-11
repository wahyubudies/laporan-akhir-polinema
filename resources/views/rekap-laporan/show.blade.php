@extends('layouts.default')
@section('content')
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-12">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item"><a href="#">Rekap Laporan</a></li>
            <li class="breadcrumb-item active">Add</li>
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
            <div class="card-body table-responsive">
              <a href="{{route('rekap-laporan.index')}}" class="btn btn-sm btn-secondary mb-3 float-right" >Kembali</a>
              <div class="card-body">
                  <table class="table table-striped">
                      <tr>
                        <th>Judul</th>
                      </tr>
                      <tr>
                        <td>{{ $rekapLaporan->judul }}</td>
                      </tr>
                      <tr>
                        <th>Dosen Pembimbing</th>                      
                      </tr>
                      <tr>
                        <td>
                          <ul>                    
                            <li>{{ $rekapLaporan->dosen_pembimbing_1 }}</li>
                            <li>{{ $rekapLaporan->dosen_pembimbing_2 }}</li>
                          </ul>
                        </td>
                      </tr>
                      <tr>
                        <th>Link Google Drive</th>
                      </tr>
                      <tr>
                        <td><a href="{{ $rekapLaporan->link_drive }}" target="__blank">{{ $rekapLaporan->link_drive }}</a></td>
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
