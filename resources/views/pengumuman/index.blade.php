@extends('layouts.default')
@section('content')
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-12">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>            
            <li class="breadcrumb-item active">Pengumuman</li>
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
            @if(Auth::user()->role === 'admin')
            <a href="{{route('pengumuman.create')}}" class="btn btn-sm btn-success float-left" >Tambah</a>           
            @endif
              <div class="card-tools">
                <form action="{{route('pengumuman.index')}}" method="get">
                  <div class="input-group input-group-sm" style="width: 150px;">
                    <input type="text" name="q" class="form-control float-right" placeholder="Search">

                    <div class="input-group-append">
                      <button type="submit" class="btn btn-default">
                        <i class="fas fa-search"></i>
                      </button>
                    </div>
                  </div>
                </form>
              </div>
            </div>          
            <div class="card-body table-responsive p-0" >
              <table class="table text-nowrap">
                <thead>
                  <tr>
                    <th class="text-center">No</th>
                    <th>Informasi TA</th>                      
                    <th class="text-center">Action</th>
                  </tr>
                </thead>
                <tbody>
                  @forelse($pengumumans as $pengumuman)
                  <tr>
                    <td class="text-center">{{$pengumumans->firstItem() + $loop->index}}</td>
                    <td>{{$pengumuman->content}}</td>
                    <td class="text-center">                      
                      <form onsubmit="return confirm('Apakah anda yakin ?')" action="{{route('pengumuman.destroy', $pengumuman->id)}}" method="post">                          
                        @if(Auth::user()->role === 'admin')
                        <a href="{{route('pengumuman.edit', $pengumuman->id)}}" class="btn btn-sm btn-primary">Edit</a>
                        @endif
                        <a onclick="return confirm('Yakin ingin mengunduh file ?');" href="{{route('pengumuman.download', $pengumuman->id)}}" target="__blank" class="btn btn-sm btn-secondary">Download</a>
                        @if(Auth::user()->role === 'admin')
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                        @endif
                      </form>
                    </td>
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
              {{$pengumumans->links()}}
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