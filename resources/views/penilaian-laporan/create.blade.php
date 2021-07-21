@extends('layouts.default')
@section('content')
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-12">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item"><a href="#">Penilaian Laporan Akhir</a></li>
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
            <a href="{{route('penilaian-laporan.index')}}" class="btn btn-sm btn-secondary mb-3 float-right" >Kembali</a>
              <form action="{{route('penilaian-laporan.store')}}" method="post">
                @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="">Judul</label>
                    <input type="text" class="form-control @error('judul') is-invalid @enderror" name="judul" value="{{old('judul')}}" id="" placeholder="judul*">
                    @error('judul')
                      <div class="alert alert-danger mt-2">
                        {{$message}}
                      </div>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="">Dosen Pembimbing 1</label>
                    <input type="text" class="form-control @error('dosen_pembimbing_1') is-invalid @enderror" name="dosen_pembimbing_1" value="{{old('dosen_pembimbing_1')}}" id="" placeholder="dosen_pembimbing_1*">
                    @error('dosen_pembimbing_1')
                      <div class="alert alert-danger mt-2">
                        {{$message}}
                      </div>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="">Nilai Pembimbing 1</label>
                    <input type="number" class="form-control @error('nilai_dospem_1') is-invalid @enderror" name="nilai_dospem_1" value="{{old('nilai_dospem_1')}}" id="" placeholder="nilai_dospem_1*">
                    @error('nilai_dospem_1')
                      <div class="alert alert-danger mt-2">
                        {{$message}}
                      </div>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="">Dosen Pembimbing 2</label>
                    <input type="text" class="form-control @error('dosen_pembimbing_2') is-invalid @enderror" name="dosen_pembimbing_2" value="{{old('dosen_pembimbing_2')}}" id="" placeholder="dosen_pembimbing_2*">
                    @error('dosen_pembimbing_2')
                      <div class="alert alert-danger mt-2">
                        {{$message}}
                      </div>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="">Nilai Pembimbing 2</label>
                    <input type="number" class="form-control @error('nilai_dospem_2') is-invalid @enderror" name="nilai_dospem_2" value="{{old('nilai_dospem_2')}}" id="" placeholder="nilai_dospem_2*">
                    @error('nilai_dospem_2')
                      <div class="alert alert-danger mt-2">
                        {{$message}}
                      </div>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="">Dosen penguji 1</label>
                    <input type="text" class="form-control @error('dosen_penguji_1') is-invalid @enderror" name="dosen_penguji_1" value="{{old('dosen_penguji_1')}}" id="" placeholder="dosen_penguji_1*">
                    @error('dosen_penguji_1')
                      <div class="alert alert-danger mt-2">
                        {{$message}}
                      </div>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="">Nilai Penguji 1</label>
                    <input type="number" class="form-control @error('nilai_dospeng_1') is-invalid @enderror" name="nilai_dospeng_1" value="{{old('nilai_dospeng_1')}}" id="" placeholder="nilai_dospeng_1*">
                    @error('nilai_dospeng_1')
                      <div class="alert alert-danger mt-2">
                        {{$message}}
                      </div>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="">Dosen penguji 2</label>
                    <input type="text" class="form-control @error('dosen_penguji_2') is-invalid @enderror" name="dosen_penguji_2" value="{{old('dosen_penguji_2')}}" id="" placeholder="dosen_penguji_2*">
                    @error('dosen_penguji_2')
                      <div class="alert alert-danger mt-2">
                        {{$message}}
                      </div>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="">Nilai Penguji 2</label>
                    <input type="number" class="form-control @error('nilai_dospeng_2') is-invalid @enderror" name="nilai_dospeng_2" value="{{old('nilai_dospeng_2')}}" id="" placeholder="nilai_dospeng_2*">
                    @error('nilai_dospeng_2')
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
