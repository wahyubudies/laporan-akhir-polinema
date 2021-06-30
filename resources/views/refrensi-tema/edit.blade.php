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
            <div class="card-header">
              <h3 class="card-title">Data Refrensi Tema</h3>

              <div class="card-tools">
                <div class="input-group input-group-sm" style="width: 150px;">
                  <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                  <div class="input-group-append">
                    <button type="submit" class="btn btn-default">
                      <i class="fas fa-search"></i>
                    </button>
                  </div>
                </div>
              </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive" style="height: 300px;">
            <a href="{{route('refrensi-tema.index')}}" class="btn btn-sm btn-secondary mb-3 float-right" >Kembali</a>
              <form action="{{route('refrensi-tema.update', $refrensiTema->id)}}" method="post">
                @csrf
                @method('PUT')
                <div class="card-body">
                  <div class="form-group">
                    <label for="">Tema</label>
                    <input type="text" class="form-control @error('tema') is-invalid @enderror" name="tema" value="{{old('tema', $refrensiTema->tema)}}" id="" placeholder="Tema*">
                    @error('tema')
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
            <!-- /.card-footer -->
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
