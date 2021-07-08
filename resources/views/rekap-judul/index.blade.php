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
            @if(Auth::check())
            <div class="card-header">              
              <a href="{{route('rekap-judul.create')}}" class="btn btn-sm btn-success float-left" >Tambah</a>              
            </div>          
            @endif
            <div class="card-body table-responsive p-0" >
              <table class="table text-nowrap">
                <thead>
                  <tr>
                    <th class="text-center">No</th>
                    <th>Rekap Judul</th>
                    @if(Auth::check())
                    <th class="text-center">Action</th>
                    @endif
                  </tr>
                </thead>
                <tbody>
                  @forelse($rekap_juduls as $rekap_judul)
                  <tr>
                    <td class="text-center">{{$loop->iteration}}</td>
                    <td>
                      <a href="{{route('rekap-judul.detail', $rekap_judul->id)}}" class="btn-sm btn btn-primary">Tahun {{$rekap_judul->created_at->format('Y')}}</a>
                    </td>
                    @if(Auth::check())
                    <td class="text-center">
                      <form onsubmit="return confirm('Apakah anda yakin ?')" action="{{route('rekap-judul.destroy', $rekap_judul->id)}}" method="post">                          
                        <a href="{{route('rekap-judul.edit', $rekap_judul->id)}}" class="btn btn-sm btn-primary">Edit</a>                        
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                      </form>
                    </td>
                    @endif
                  </tr>
                  <tr>
                  @empty
                  <div class="alert alert-danger">
                      Data pengumuman belum Tersedia.
                  </div>
                  @endforelse
                </tbody>
              </table>
            </div>
            <div class="card-footer clearfix d-flex justify-content-end">
              {{$rekap_juduls->links()}}
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