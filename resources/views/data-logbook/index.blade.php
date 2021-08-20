@extends('layouts.default')
@section('content')
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-12">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>            
            <li class="breadcrumb-item active">Logbook</li>
          </ol>
        </div>
      </div>
    </div>
  </div>
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          @if(isset($DataLogbook) && isset($Logbook))
          <div class="card">
            <div class="card-header">                  
                <b>Data Logbook</b>       
                @if(Auth::user()->role !== 'mahasiswa' )
                <a href="{{ route('list.logbook') }}" class="btn btn-sm btn-secondary float-right">Kembali</a>
                @endif
            </div>          
            <div class="card-body table-responsive p-0" >              
                <div class="card-body">
                  <table class="table table-striped">
                      <tr>
                        <th>Judul</th>
                      </tr>
                      <tr>
                        <td>{{ $DataLogbook->judul }}</td>
                      </tr>
                      <tr>
                        <th>Dosen Pembimbing 1</th>
                      </tr>
                      <tr>
                        <td> 
                          {{ $DataLogbook->dospem1 }}
                          @if(is_null($DataLogbook->qrcode_dospem1) && Auth::user()->role !== 'mahasiswa')
                            <form onsubmit="return confirm('Apakah anda yakin untuk memberikan qr code ?')" action="{{ route('data-logbook.code1', $DataLogbook->id) }}" method="post">
                              @csrf
                              @method('put')
                              <button type="submit" class="border-0 badge badge-success">Generate QR Code</button>
                            </form>
                          @endif
                        </td>
                      </tr>
                      <tr>
                        <th>QR Code Dosen Pembimbing 1</th>
                      </tr>
                      <tr>
                        <td>
                          @if(is_null($DataLogbook->qrcode_dospem1) || $DataLogbook->qrcode_dospem1 == '')
                            -
                          @else
                            <img src="{{ asset('storage/qrcode/' . $DataLogbook->qrcode_dospem1) }}" alt="">
                          @endif
                        </td>
                      </tr>
                      <tr>
                        <th>Dosen Pembimbing 2</th>
                      </tr>
                      <tr>
                        <td>
                          {{ $DataLogbook->dospem2 }} 
                          @if(is_null($DataLogbook->qrcode_dospem2) && Auth::user()->role !== 'mahasiswa')
                            <form onsubmit="return confirm('Apakah anda yakin untuk memberikan qr code ?')" action="{{ route('data-logbook.code2', $DataLogbook->id) }}" method="post">
                              @csrf
                              @method('put')
                              <button type="submit" class="border-0 badge badge-success">Generate QR Code</button>
                            </form>
                          @endif
                        </td>
                      </tr>
                      <tr>
                        <th>QR Code Dosen Pembimbing 2</th>
                      </tr>
                      <tr>
                        <td>
                          @if(is_null($DataLogbook->qrcode_dospem2) || $DataLogbook->qrcode_dospem2 == '')
                            -
                          @else
                            <img src="{{ asset('storage/qrcode/' . $DataLogbook->qrcode_dospem2) }}" alt="">
                          @endif
                        </td>
                      </tr>
                      <tr>
                        <th>Dibuat tanggal</th>
                      </tr>
                      <tr>
                        <td>{{ $DataLogbook->created_at->format('d M Y') }}</td>                    
                      </tr>                    
                  </table>
                </div>
            </div>
            <div class="card-footer clearfix d-flex justify-content-end">              
            </div>
          </div>
          <div class="card">
            <div class="card-header">
              <b>Narasi Logbook</b>
            </div>
            <div class="card-body table-responsive">
              @if(Auth::user()->role == 'mahasiswa')          
              <form class="mb-5" action="{{ route('logbook.store-narasi', $DataLogbook->id) }}" method="post">
                  @csrf
                  <div class="row">
                    <div class="col-lg-12">
                      <div class="form-group">
                        <label for="">Narasi</label>
                        <textarea class="form-control @error('narasi') is-invalid @enderror" name="narasi" cols="30" rows="5" placeholder="Narasi*">{{old('narasi')}}</textarea>
                        @error('narasi')
                          <div class="alert alert-danger mt-2">
                            {{$message}}
                          </div>
                        @enderror
                        <button type="submit" class="btn btn-sm btn-success float-right mt-3">Submit</button>
                        <a href="{{route('logbook.export', $DataLogbook->id)}}" class="btn btn-sm btn-secondary float-right mt-3 mr-3">Export Logbook</a>
                      </div>   
                    </div>
                  </div>
              </form>
              @endif
              <table class="table text-nowrap">
                  <thead>
                    <tr>
                      <th class="text-center">No</th>
                      <th>Tanggal</th>
                      <th>Narasi</th> 
                      @if(Auth::user()->role == 'mahasiswa')
                      <th>Action</th>                       
                      @endif
                    </tr>
                  </thead>
                  <tbody>
                    @forelse ($Logbook as $logbook)
                    <tr>
                      <td class="text-center">{{$loop->iteration}}</td>
                      <td>{{ $logbook->created_at->format('d M Y') }}</td>
                      <td>{{ $logbook->narasi }}</td>
                      @if(Auth::user()->role == 'mahasiswa')
                      <td>
                        <form onsubmit="return confirm('Apakah anda yakin ?')" action="{{ route('logbook.delete-narasi', $logbook->id) }}" method="post">
                          @csrf
                          @method('DELETE')
                          <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                        </form>
                      </td>
                      @endif
                    </tr>
                    @empty
                    <tr>
                      <td class="text-center" colspan="4">
                        No Records
                      </td>
                    </tr>
                    @endforelse
                  </tbody>
              </table>              
            </div>
          </div>
          @else
            <div class="card">
              <div class="card-body">
                <small class="text-red">*Hanya bisa diisi sekali, harap isi data dengan benar dan teliti.</small>
                <form action="{{route('logbook.store')}}" method="post">
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
                      <input type="text" class="form-control @error('dospem_1') is-invalid @enderror" name="dospem_1" value="{{old('dospem_1')}}" id="" placeholder="dosen pembimbing 1*">
                      @error('dospem_1')
                        <div class="alert alert-danger mt-2">
                          {{$message}}
                        </div>
                      @enderror
                    </div>
                    <div class="form-group">
                      <label for="">Dosen Pembimbing 2</label>
                      <input type="text" class="form-control @error('dospem_2') is-invalid @enderror" name="dospem_2" value="{{old('dospem_2')}}" id="" placeholder="dosen pembimbing 2*">
                      @error('dospem_2')
                        <div class="alert alert-danger mt-2">
                          {{$message}}
                        </div>
                      @enderror
                    </div>
                    <div class="form-group">
                      <button type="submit" class="btn btn-sm btn-primary">Submit</button>
                    </div>                    
                  </div>                  
                </form>
              </div>
              <div class="card-footer"></div>
            </div>
          @endif
        </div>
      </div>
    </div>
  </div>
@endsection('content')