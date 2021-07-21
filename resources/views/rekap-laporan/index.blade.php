@extends('layouts.default')
@section('content')
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-12">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>            
            <li class="breadcrumb-item active">Rekap Laporan Akhir</li>
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
              <a href="{{route('rekap-laporan.export')}}" class="btn btn-sm btn-secondary">Export Data</a>            
              @if(Auth::user()->role !== 'mahasiswa')
              <a href="{{route('rekap-laporan.create')}}" class="btn-sm btn btn-success">Tambah</a>
              @elseif(Auth::user()->role === 'mahasiswa')
              <a href="{{route('rekap-laporan.insertLink')}}" class="btn-sm btn btn-success">Masukkan Link</a>
              @endif
              <div class="card-tools">
                @if(Auth::user()->role !== 'mahasiswa')
                <form action="{{route('rekap-laporan.index')}}" method="get">
                @else
                <form action="{{route('rekap-laporan.guest')}}" method="get">
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
                    <th>Judul Laporan</th>                      
                    <th>Dosen Pembimbing</th>
                    <th>Link Drive Mahasiswa</th> 
                    @if(Auth::user()->role !== 'mahasiswa')                 
                    <th>Action</th>                        
                    @endif                
                  </tr>
                </thead>
                <tbody>
                  @forelse($rekapLaporans as $rl)
                  <tr>
                    <td class="text-center">{{$rekapLaporans->firstItem() + $loop->index}}</td>
                    <td>
                      {{$rl->judul}}
                    </td>
                    <td>
                      <ul>
                        <li>{{$rl->dosen_pembimbing_1}}</li>
                        <li>{{$rl->dosen_pembimbing_2}}</li>
                      </ul>
                    </td>
                    <td><a href="{{$rl->link_drive}}" target="_blank">{{\Str::limit($rl->link_drive, 35)}}</a></td>
                    
                    <td>                                            
                      @if(Auth::user()->role !== 'mahasiswa')
                      <form onsubmit="return confirm('Apakah anda yakin ?')" action="{{route('rekap-laporan.destroy', $rl->id)}}" method="post">                          
                        <a href="{{route('rekap-laporan.edit', $rl->id)}}" class="btn btn-sm btn-primary">Edit</a>                        
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                      </form>                      
                      @endif
                    </td>                    
                  </tr>
                  <tr>
                  @empty
                  <div class="alert alert-danger">
                      Data Rekap Laporan belum Tersedia.
                  </div>
                  @endforelse
                </tbody>
              </table>
            </div>
            <div class="card-footer clearfix d-flex justify-content-end">
              {{$rekapLaporans->links()}}
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