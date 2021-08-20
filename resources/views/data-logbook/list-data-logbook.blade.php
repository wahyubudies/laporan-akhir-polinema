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
        <div class="card">  
          <div class="card-header">
            <a href="{{route('data-logbook.export')}}" class="btn btn-sm btn-secondary">Export Data</a>
            <div class="card-tools">
              <form action="{{route('list.logbook')}}" method="get">
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
          <div class="card-body">
            <table class="table text-nowrap">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Judul</th>
                  <th>Dosen Pembimbing</th>
                  <th>Mahasiswa</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                @forelse ($dataLogbooks as $dataLogbook)
                <tr>
                  <td>{{$dataLogbooks->firstItem() + $loop->index}}</td>
                  <td>{{ \Str::limit($dataLogbook->judul, 25)}}</td>
                  <td>
                    <ul>
                      <li>
                        {{$dataLogbook->dospem1}}
                      </li>
                      <li>
                        {{$dataLogbook->dospem2}}
                      </li>
                    </ul>
                  </td>
                  <td>
                    {{$dataLogbook->user->name}}
                  </td>
                  <td>
                    <a href="{{ route('logbook.show', $dataLogbook->user->id) }}" class="btn btn-sm btn-secondary">Detail</a>
                  </td>
                </tr>   
                @empty
                <tr>
                  <div class="alert alert-danger">
                      Data dosen belum Tersedia.
                  </div>                 
                </tr>
                @endforelse
              </tbody>
            </table>
          </div>
          <div class="card-footer">
            {{$dataLogbooks->links()}}
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection('content')