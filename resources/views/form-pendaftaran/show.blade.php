@extends('layouts.default')
@section('content')
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-12">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item"><a href="#">Form Pendaftaran</a></li>
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
              <a href="{{route('form-pendaftaran.index')}}" class="btn btn-sm btn-secondary mb-3 float-right" >Kembali</a>
              <div class="card-body">
                <table class="table table-striped">
                    <tr>
                      <th>NIM Mahasiswa 1</th>
                    </tr>
                    <tr>
                      <td>{{ $form->nim_mhs_1 }}</td>
                    </tr>
                    <tr>
                      <th>Nama Mahasiswa 1</th>
                    </tr>
                    <tr>
                      <td>{{ $form->nama_mhs_1 }}</td>
                    </tr>
                    <tr>
                      <th>NIM Mahasiswa 2</th>
                    </tr>
                    <tr>
                      <td>{{ $form->nim_mhs_2 }}</td>
                    </tr>
                    <tr>
                      <th>Nama Mahasiswa 2</th>
                    </tr>
                    <tr>
                      <td>{{ $form->nama_mhs_2 }}</td>
                    </tr>
                    <tr>
                      <th>Judul</th>
                    </tr>
                    <tr>
                      <td>{{ $form->judul }}</td>
                    </tr>
                    <tr>
                      <th>Dosen Penyeleksi 1</th>
                    </tr>
                    <tr>
                      <td>{{ $form->dosen_penyeleksi_1 }}</td>
                    </tr>
                    <tr>
                      <th>Dosen Penyeleksi 2</th>
                    </tr>
                    <tr>
                      <td>{{ $form->dosen_penyeleksi_2 }}</td>
                    </tr>
                    <tr>
                      <th>Dosen Penyeleksi 3</th>
                    </tr>
                    <tr>
                      <td>{{ $form->dosen_penyeleksi_3 }}</td>
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
