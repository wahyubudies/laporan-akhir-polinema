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
            <li class="breadcrumb-item active">Edit</li>
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
            <a href="{{route('form-pendaftaran.index')}}" class="btn btn-sm btn-secondary mb-3 float-right" >Kembali</a>
              <form action="{{route('form-pendaftaran.update', $form->id)}}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="card-body">
                  <div class="form-group">                                        
                    <label for="">NIM Mhs 1</label>
                    <input type="text" class="form-control @error('nim_mhs_1') is-invalid @enderror" name="nim_mhs_1" value="{{old('nim_mhs_1', $form->nim_mhs_1)}}" id="" placeholder="nim_mhs_1*">
                    @error('nim_mhs_1')
                      <div class="alert alert-danger mt-2">
                        {{$message}}
                      </div>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="">Nama Mhs 1</label>
                    <input type="text" class="form-control @error('nama_mhs_1') is-invalid @enderror" name="nama_mhs_1" value="{{old('nama_mhs_1', $form->nama_mhs_1)}}" id="" placeholder="nama_mhs_1*">
                    @error('nama_mhs_1')
                      <div class="alert alert-danger mt-2">
                        {{$message}}
                      </div>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="">NIM Mhs 2</label>
                    <input type="text" class="form-control @error('nim_mhs_2') is-invalid @enderror" name="nim_mhs_2" value="{{old('nim_mhs_2', $form->nim_mhs_2)}}" id="" placeholder="nim_mhs_2*">
                    @error('nim_mhs_2')
                      <div class="alert alert-danger mt-2">
                        {{$message}}
                      </div>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="">Nama Mhs 2</label>
                    <input type="text" class="form-control @error('nama_mhs_2') is-invalid @enderror" name="nama_mhs_2" value="{{old('nama_mhs_2', $form->nama_mhs_2)}}" id="" placeholder="nama_mhs_2*">
                    @error('nama_mhs_2')
                      <div class="alert alert-danger mt-2">
                        {{$message}}
                      </div>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="">Judul</label>
                    <input type="text" class="form-control @error('judul') is-invalid @enderror" name="judul" value="{{old('judul', $form->judul)}}" id="" placeholder="judul*">
                    @error('judul')
                      <div class="alert alert-danger mt-2">
                        {{$message}}
                      </div>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="">Dosen penyeleksi 1</label>
                    <input type="text" class="form-control @error('dosen_penyeleksi_1') is-invalid @enderror" name="dosen_penyeleksi_1" value="{{old('dosen_penyeleksi_1', $form->dosen_penyeleksi_1)}}" id="" placeholder="dosen_penyeleksi_1*">
                    @error('dosen_penyeleksi_1')
                      <div class="alert alert-danger mt-2">
                        {{$message}}
                      </div>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="">Dosen penyeleksi 2</label>
                    <input type="text" class="form-control @error('dosen_penyeleksi_2') is-invalid @enderror" name="dosen_penyeleksi_2" value="{{old('dosen_penyeleksi_2', $form->dosen_penyeleksi_2)}}" id="" placeholder="dosen_penyeleksi_2*">
                    @error('dosen_penyeleksi_2')
                      <div class="alert alert-danger mt-2">
                        {{$message}}
                      </div>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="">Dosen penyeleksi 3</label>
                    <input type="text" class="form-control @error('dosen_penyeleksi_3') is-invalid @enderror" name="dosen_penyeleksi_3" value="{{old('dosen_penyeleksi_3', $form->dosen_penyeleksi_3)}}" id="" placeholder="dosen_penyeleksi_3*">
                    @error('dosen_penyeleksi_3')
                      <div class="alert alert-danger mt-2">
                        {{$message}}
                      </div>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="exampleInputFile">File Upload</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input @error('file_upload') is-invalid @enderror" name="file_upload" id="exampleInputFile">
                        <label class="custom-file-label" for="">Choose file*</label>                          
                      </div>
                      <div class="input-group-append">
                        <span class="input-group-text">Upload</span>
                      </div>
                    </div>
                    @error('file_upload')
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