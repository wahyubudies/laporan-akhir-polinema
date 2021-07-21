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
              <form action="{{route('rekap-laporan.store')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="">Judul Laporan</label>
                    <input type="text" class="form-control @error('nim_mhs_1') is-invalid @enderror" name="judul" value="{{old('judul')}}" id="" placeholder="judul*">
                    @error('judul')
                      <div class="alert alert-danger mt-2">
                        {{$message}}
                      </div>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="">Dosen Pembimbing 1</label>
                    <input type="text" class="form-control @error('dosen_pembimbing_1') is-invalid @enderror" name="dosen_pembimbing_1" value="{{old('dosen_pembimbing_1')}}" id="" placeholder="dosen pembimbing 1*">
                    @error('dosen_pembimbing_1')
                      <div class="alert alert-danger mt-2">
                        {{$message}}
                      </div>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="">Dosen Pembimbing 2</label>
                    <input type="text" class="form-control @error('dosen_pembimbing_2') is-invalid @enderror" name="dosen_pembimbing_2" value="{{old('dosen_pembimbing_2')}}" id="" placeholder="dosen pembimbing 2*">
                    @error('dosen_pembimbing_2')
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
