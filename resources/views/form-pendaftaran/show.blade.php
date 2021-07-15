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
            <div class="card-body table-responsive">
              @if(Auth::user()->role === 'admin')
              <a href="{{route('form-pendaftaran.index')}}" class="btn btn-sm btn-secondary mb-3 float-right" >Kembali</a>
              @else
              <a href="{{route('form-pendaftaran.guest')}}" class="btn btn-sm btn-secondary mb-3 float-right" >Kembali</a>
              @endif
              <form action="{{route('form-pendaftaran.store')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="">NIM Mhs 1</label>
                    <input type="text" class="form-control" name="nim_mhs_1" value="{{$form->nim_mhs_1}}" readonly>                    readonly 
                  </div>
                  <div class="form-group">
                    <label for="">Nama Mhs 1</label>
                    <input type="text" class="form-control" name="nama_mhs_1" value="{{$form->nama_mhs_1}}" readonly>
                  </div>
                  <div class="form-group">
                    <label for="">NIM Mhs 2</label>
                    <input type="text" class="form-control" name="nim_mhs_2" value="{{$form->nim_mhs_2}}" readonly>
                  </div>
                  <div class="form-group">
                    <label for="">Nama Mhs 2</label>
                    <input type="text" class="form-control" name="nama_mhs_2" value="{{$form->nama_mhs_2}}" readonly>
                  </div>
                  <div class="form-group">
                    <label for="">Judul</label>
                    <input type="text" class="form-control" name="judul" value="{{$form->judul}}" readonly>
                  </div>
                  <div class="form-group">
                    <label for="">Dosen penyeleksi 1</label>
                    <input type="text" class="form-control" name="dosen_penyeleksi_1" value="{{$form->dosen_penyeleksi_1}}" readonly>
                  </div>
                  <div class="form-group">
                    <label for="">Dosen penyeleksi 2</label>
                    <input type="text" class="form-control" name="dosen_penyeleksi_2" value="{{$form->dosen_penyeleksi_2}}" readonly>
                  </div>
                  <div class="form-group">
                    <label for="">Dosen penyeleksi 3</label>
                    <input type="text" class="form-control" name="dosen_penyeleksi_3" value="{{$form->dosen_penyeleksi_3}}" readonly>
                  </div>
                  @if(Auth::user()->role === 'admin')
                  <div class="form-group">
                    <label for="">File Upload</label>
                    <input type="text" class="form-control" name="dosen_penyeleksi_3" value="public/storage/{{$form->file_upload}}" readonly>
                  </div>
                  @endif
                </div>
                <!-- /.card-body -->                  
              </form>
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
