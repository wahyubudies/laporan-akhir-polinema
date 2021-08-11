@extends('layouts.default')
@section('content')
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-12">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>            
            <li class="breadcrumb-item active">Penilaian Laporan Akhir</li>
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
              <a href="{{ route('penilaian-laporan.export') }}" class="btn btn-sm btn-secondary">Export Data</a>
              @if(Auth::user()->role !== 'mahasiswa')
              <a href="{{route('penilaian-laporan.create')}}" class="btn btn-sm btn-success">Tambah</a>
              @endif
              <div class="card-tools">
                @if(Auth::user()->role !== 'mahasiswa')
                <form action="{{route('penilaian-laporan.index')}}" method="get">
                @else
                <form action="{{route('penilaian-laporan.guest')}}" method="get">
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
                    <th>Dosen Pembimbing - Nilai</th>          
                    <th>Dosen Penguji - Nilai</th>               
                    @if(Auth::user()->role !== 'mahasiswa')
                    <th>Action</th>                        
                    @endif                
                  </tr>
                </thead>
                <tbody>
                  @forelse($penilaianLaporans as $pl)
                  <tr>
                    <td class="text-center">{{$penilaianLaporans->firstItem() + $loop->index}}</td>
                    <td>
                      {{ \Str::limit($pl->judul, 25) }}
                    </td>
                    <td>
                      <ul>
                        <li>{{\Str::limit($pl->dosen_pembimbing_1, 15)}} - {{$pl->nilai_dospem_1}}</li>
                        <li>{{\Str::limit($pl->dosen_pembimbing_2, 15)}} - {{$pl->nilai_dospem_2}}</li>
                      </ul>
                    </td>
                    <td>
                      <ul>
                        <li>{{\Str::limit($pl->dosen_penguji_1, 15)}} - {{$pl->nilai_dospeng_1}}</li>
                        <li>{{\Str::limit($pl->dosen_penguji_2, 15)}} - {{$pl->nilai_dospeng_2}}</li>
                      </ul>
                    </td>
                    
                    <td>                                            
                      @if(Auth::user()->role !== 'mahasiswa')
                      <form onsubmit="return confirm('Apakah anda yakin ?')" action="{{route('penilaian-laporan.destroy', $pl->id)}}" method="post">                          
                        <a href="{{route('penilaian-laporan.edit', $pl->id)}}" class="btn btn-sm btn-primary">Edit</a>
                        <a href="{{route('penilaian-laporan.show', $pl->id)}}" class="btn btn-sm btn-secondary">Detail</a>
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
                      Data pengumuman belum Tersedia.
                  </div>
                  @endforelse
                </tbody>
              </table>
            </div>
            <div class="card-footer clearfix d-flex justify-content-end">
              {{$penilaianLaporans->links()}}
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