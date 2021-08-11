@extends('layouts.default')
@section('content')
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-12">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>            
            <li class="breadcrumb-item active">Refrensi Tema</li>
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
            @if(Auth::user()->role !== 'mahasiswa')
            <a href="{{route('refrensi-tema.create')}}" class="btn btn-sm btn-success float-left" >Tambah</a>           
            @endif
              <div class="card-tools">
                @if(Auth::user()->role !== 'mahasiswa')
                <form action="{{route('refrensi-tema.index')}}" method="get">
                @else
                <form action="{{route('refrensi-tema.guest')}}" method="get">
                @endif
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
                    <th>Nama Dosen</th>                      
                    <th>Daftar Refrensi Tema</th>
                  </tr>
                </thead>
                <tbody>
                  @forelse($dosens as $dosen)
                  <tr>
                    <td class="text-center">{{$dosens->firstItem() + $loop->index}}</td>
                    <td>
                      {{ $dosen->nama_dosen }} <br>
                      @if(!$dosen->refrensi_temas->isEmpty())
                      <a href="{{route('refrensi-tema.show', $dosen->id)}}" class="badge badge-secondary">detail</a>
                      @endif
                    </td>
                    <td>                                              
                        @forelse($dosen->refrensi_temas as $rt)
                        <ul>
                          <li>
                            {{ \Str::limit($rt->tema, 35)}} <br>
                            @if(Auth::user()->role !== 'mahasiswa')
                            <form onsubmit="return confirm('Apakah anda yakin ?')" action="{{route('refrensi-tema.destroy', $rt->id)}}" method="post">                        
                              <a href="{{route('refrensi-tema.edit', $rt->id)}}" class="badge badge-primary">edit</a>                                
                              @csrf
                              @method('DELETE')
                              <button type="submit" class="badge badge-danger border-0">Hapus</button>
                            </form>                            
                            @endif
                          </li>
                        </ul>
                        @empty                          
                          <div class="badge badge-warning">
                            Tidak ada refrensi tema
                          </div>                          
                        @endforelse                      
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
              {{$dosens->links()}}
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