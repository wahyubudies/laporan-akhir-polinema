@extends('layouts.default')
@section('content')
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-12">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item"><a href="#">Penilaian Laporan</a></li>
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
              <a href="{{route('penilaian-laporan.index')}}" class="btn btn-sm btn-secondary mb-3 float-right" >Kembali</a>                                   
              <div class="card-body">
                <table class="table table-striped">
                    <tr>
                      <th>Judul</th>
                    </tr>
                    <tr>
                      <td>{{ $penilaianLaporan->judul }}</td>
                    </tr>
                    <tr>
                      <th>Dosen Pembimbing 1</th>
                    </tr>
                    <tr>
                      <td>{{ $penilaianLaporan->dosen_pembimbing_1 }}</td>
                    </tr>
                    <tr>
                      <th>Dosen Pembimbing 2</th>
                    </tr>
                    <tr>
                      <td>{{ $penilaianLaporan->dosen_pembimbing_2 }}</td>
                    </tr>
                    <tr>
                      <th>Nilai Pembimbing 1</th>
                    </tr>
                    <tr>
                      <td>{{ $penilaianLaporan->nilai_dospem_1 }}</td>
                    </tr>
                    <tr>
                      <th>Nilai Pembimbing 2</th>
                    </tr>
                    <tr>
                      <td>{{ $penilaianLaporan->nilai_dospem_2 }}</td>
                    </tr>
                    <tr>
                      <th>Dosen Penguji 1</th>
                    </tr>
                    <tr>
                      <td>{{ $penilaianLaporan->dosen_penguji_1 }}</td>
                    </tr>
                    <tr>
                      <th>Dosen Penguji 2</th>
                    </tr>
                    <tr>
                      <td>{{ $penilaianLaporan->dosen_penguji_2 }}</td>
                    </tr>
                    <tr>
                      <th>Nilai Penguji 1</th>
                    </tr>
                    <tr>
                      <td>{{ $penilaianLaporan->nilai_dospeng_1 }}</td>
                    </tr>
                    <tr>
                      <th>Nilai Penguji 2</th>
                    </tr>
                    <tr>
                      <td>{{ $penilaianLaporan->nilai_dospeng_2 }}</td>
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
