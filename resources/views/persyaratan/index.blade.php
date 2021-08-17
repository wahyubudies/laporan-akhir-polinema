@extends('layouts.default')
@section('content')
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-12">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Persyaratan</li>
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
            <a href="{{route('persyaratan.create')}}" class="btn btn-sm btn-success float-left" >Tambah</a>           
            @endif
              <div class="card-tools">
                <form action="{{route('persyaratan.index')}}" method="get">
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
            <div class="card-body table-responsive p-0">
              <table class="table text-nowrap">
                <thead>
                  <tr>
                    <th class="text-center">No</th>
                    <th class="text-center">Image</th>
                    <th>Content</th>
                    @if(Auth::user()->role === 'admin')
                    <th class="text-center">Action</th>
                    @endif
                  </tr>
                </thead>
                <tbody>
                  @forelse($persyaratans as $persyaratan)
                  <tr>
                    <td class="text-center">{{$persyaratans->firstItem() + $loop->index}}</td>
                    <td class="text-center">
                      <img src="{{ Storage::url('public/persyaratans/').$persyaratan->image }}" alt="" width="100px">
                    </td>
                    <td>{{$persyaratan->content}}</td>
                    @if(Auth::user()->role === 'admin')
                    <td class="text-center">
                      <form onsubmit="return confirm('Apakah anda yakin ?')" action="{{route('persyaratan.destroy', $persyaratan->id)}}" method="post">
                        <a href="{{route('persyaratan.edit', $persyaratan->id)}}" class="btn btn-sm btn-primary">Edit</a>
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
                      Data persyaratan belum Tersedia.
                  </div>
                  @endforelse
                </tbody>
              </table>
            </div>
            <div class="card-footer clearfix d-flex justify-content-end">
              {!!$persyaratans->links()!!}
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