@extends('layouts.default')
@section('content')
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-12">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item"><a href="#">Judul Diterima</a></li>
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
            <a href="{{route('judul-diterima.index')}}" class="btn btn-sm btn-secondary mb-3 float-right" >Kembali</a>
              <form action="{{route('judul-diterima.update', $judul_diterima->id)}}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="card-body">
                  <div class="form-group">
                    <label for="">NIM</label>
                    <input type="text" class="form-control @error('nim') is-invalid @enderror" name="nim" value="{{old('nim', $judul_diterima->nim)}}" id="" placeholder="NIM*" readonly>
                    @error('nim')
                      <div class="alert alert-danger mt-2">
                        {{$message}}
                      </div>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="">Nama</label>
                    <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" value="{{old('nama', $judul_diterima->nama)}}" id="" placeholder="dosen*">
                    @error('nama')
                      <div class="alert alert-danger mt-2">
                        {{$message}}
                      </div>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="">Kelas</label>
                    <input type="text" class="form-control @error('kelas') is-invalid @enderror" name="kelas" value="{{old('kelas', $judul_diterima->kelas)}}" id="" placeholder="dosen*">
                    @error('kelas')
                      <div class="alert alert-danger mt-2">
                        {{$message}}
                      </div>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="">Judul</label>
                    <input type="text" class="form-control @error('judul') is-invalid @enderror" name="judul" value="{{old('judul', $judul_diterima->judul)}}" id="" placeholder="dosen*">
                    @error('judul')
                      <div class="alert alert-danger mt-2">
                        {{$message}}
                      </div>
                    @enderror
                  </div>
                  <div class="form-group">
                    <button type="submit" class="btn btn-sm btn-primary">Submit</button>
                  </div>                    
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
