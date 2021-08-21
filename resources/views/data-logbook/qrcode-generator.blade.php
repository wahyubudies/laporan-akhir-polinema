@extends('layouts.default')
@section('content')
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-12">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item"><a href="#">Logbook</a></li>
          <li class="breadcrumb-item active">QR Code Generator</li>
        </ol>
      </div>
    </div>
  </div>
</div>
<div class="content">
  <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <b>QR Code Generator</b>
              <a href="{{route('list.logbook')}}" class="btn btn-sm btn-secondary float-right">Kembali</a>
            </div>
            <div class="card-body">
              <form action="{{route('qrcode-generator.store')}}" method="post">
                @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="">Nama Pembimbing</label>
                    <input type="text" class="form-control @error('pembimbing') is-invalid @enderror" name="pembimbing" value="{{old('pembimbing')}}" id="" placeholder="Pembimbing*">
                    @error('pembimbing')
                      <div class="alert alert-danger mt-2">
                        {{$message}}
                      </div>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="">Nama Mahasiswa</label>
                    <input type="text" class="form-control @error('mahasiswa') is-invalid @enderror" name="mahasiswa" value="{{old('mahasiswa')}}" id="" placeholder="Mahasiswa*">
                    @error('mahasiswa')
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
          </div>

        </div>
      </div>
  </div>
</div>
@endsection('content')