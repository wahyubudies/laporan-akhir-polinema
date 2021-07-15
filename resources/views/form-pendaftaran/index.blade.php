@extends('layouts.default')
@section('content')
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-12">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>            
            <li class="breadcrumb-item active">Form Pendaftaran</li>
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
              <div class="card-tools">
                @if(Auth::user()->role === 'admin')
                <form action="{{route('form-pendaftaran.index')}}" method="get">
                @else
                <form action="{{route('form-pendaftaran.guest')}}" method="get">
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
                    <th>NIM Mhs 1</th>                      
                    <th>Nama Mhs 1</th>
                    <th>Judul</th>
                    <th>Dosen Penyeleksi 1</th>                    
                    <th>Action</th>                                        
                  </tr>
                </thead>
                <tbody>
                  @forelse($forms as $form)
                  <tr>
                    <td class="text-center">{{$loop->iteration}}</td>
                    <td>{{$form->nim_mhs_1}}</td>
                    <td>{{$form->nama_mhs_1}}</td>
                    <td>{{$form->judul}}</td>
                    <td>{{$form->dosen_penyeleksi_1}}</td>
                    
                    <td>                                            
                      @if(Auth::user()->role === 'admin')
                      <form onsubmit="return confirm('Apakah anda yakin ?')" action="{{route('form-pendaftaran.destroy', $form->id)}}" method="post">                          
                        <a href="{{route('form-pendaftaran.edit', $form->id)}}" class="btn btn-sm btn-primary">Edit</a>                                                
                        <a href="{{route('form-pendaftaran.show', $form->id)}}" class="btn btn-sm btn-secondary">Detail</a>
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                      </form>
                      @elseif(Auth::user()->role === 'mahasiswa')
                        <a href="{{route('form-pendaftaran.detail', $form->id)}}" class="btn btn-sm btn-secondary">Detail</a>
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
              {{$forms->links()}}
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