@extends('layouts.default')
@section('content')
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-12">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>            
            <li class="breadcrumb-item active">Rekap Judul</li>
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
              @if(Auth::check())   
              <a href="{{route('rekap-judul.index')}}" class="btn btn-sm btn-secondary mb-3 float-right" >Kembali</a>              
              @else
              <a href="{{route('rekap-judul.guest')}}" class="btn btn-sm btn-secondary mb-3 float-right" >Kembali</a>              
              @endif
              <embed src="{{Storage::url('public/rekap_juduls/').$rekap_judul->rekap_judul}}" type="application/pdf" class="mt-3" style="width:100%; height:500px">
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