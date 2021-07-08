<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Form Laporan AKhir</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="https://adminlte.io/themes/v3/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="https://adminlte.io/themes/v3/dist/css/adminlte.min.css">
  <!-- Toastr -->
  <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
</head>
<body class="hold-transition login-page">
<div class="login-box ">
  <!-- /.login-logo -->
  <div class="card card-secondary mt-5 mb-5">
    <div class="card-header">
      <h3 class="card-title">Formulir Upload Laporan Akhir</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form action="{{ route('form.store') }}" method="post" enctype="multipart/form-data">
      @csrf
      <div class="card-body">
        <div class="form-group">
          <label for="">NIM Mahasiswa 1</label>
          <input type="text" class="form-control @error('nim_mhs_1') is-invalid @enderror" name="nim_mhs_1" placeholder="Enter NIM Mahasiswa 1..">
            @error('nim_mhs_1')
              <div class="alert alert-danger mt-2">
                {{$message}}
              </div>
            @enderror
        </div>
        <div class="form-group">
          <label for="">Nama Mahasiswa 1</label>
          <input type="text" class="form-control @error('nama_mhs_1') is-invalid @enderror" name="nama_mhs_1" placeholder="Enter Nama Mahasiswa 1..">
            @error('nama_mhs_1')
              <div class="alert alert-danger mt-2">
                {{$message}}
              </div>
            @enderror
        </div>
        <div class="form-group">
          <label for="">NIM Mahasiswa 2</label>
          <input type="text" class="form-control @error('nim_mhs_2') is-invalid @enderror" name="nim_mhs_2" placeholder="Enter NIM Mahasiswa 2..">
            @error('nim_mhs_2')
              <div class="alert alert-danger mt-2">
                {{$message}}
              </div>
            @enderror
        </div>
        <div class="form-group">
          <label for="">Nama Mahasiswa 2</label>
          <input type="text" class="form-control @error('nama_mhs_2') is-invalid @enderror" name="nama_mhs_2" placeholder="Enter Nama Mahasiswa 2..">
            @error('nama_mhs_2')
              <div class="alert alert-danger mt-2">
                {{$message}}
              </div>
            @enderror
        </div>
        <div class="form-group">
          <label for="">Judul Laporan Akhir (Sesudah revisi)</label>
          <input type="text" class="form-control @error('judul') is-invalid @enderror" name="judul" placeholder="Enter Judul Laporan Akhir (Sesudah revisi)..">
            @error('judul')
              <div class="alert alert-danger mt-2">
                {{$message}}
              </div>
            @enderror
        </div>
        <div class="form-group">
          <label for="">Dosen Pembimbing 1</label>
          <input type="text" class="form-control @error('dosen_pmb_1') is-invalid @enderror" name="dosen_pmb_1" placeholder="Enter Dosen Pembimbing 1..">
            @error('dosen_pmb_1')
              <div class="alert alert-danger mt-2">
                {{$message}}
              </div>
            @enderror
        </div>
        <div class="form-group">
          <label for="">Dosen Penguji 2</label>
          <input type="text" class="form-control @error('dosen_pmb_2') is-invalid @enderror" name="dosen_pmb_2" placeholder="Enter Dosen Penguji 2..">
            @error('dosen_pmb_2')
              <div class="alert alert-danger mt-2">
                {{$message}}
              </div>
            @enderror
        </div>
        <div class="form-group">
          <label for="">Dosen Penguji 1</label>
          <input type="text" class="form-control @error('dosen_pgj_1') is-invalid @enderror" name="dosen_pgj_1" placeholder="Enter Dosen Penguji 1..">
            @error('dosen_pgj_1')
              <div class="alert alert-danger mt-2">
                {{$message}}
              </div>
            @enderror
        </div>
        <div class="form-group">
          <label for="">Dosen Penguji 2</label>
          <input type="text" class="form-control @error('dosen_pgj_2') is-invalid @enderror" name="dosen_pgj_2" placeholder="Enter Dosen Penguji 2..">
            @error('dosen_pgj_2')
              <div class="alert alert-danger mt-2">
                {{$message}}
              </div>
            @enderror
        </div>
        <div class="form-group">
          <label for="exampleInputFile">File input</label>
          <div class="input-group">            
            <div class="custom-file">
              <input type="file" class="custom-file-input @error('file_upload') is-invalid @enderror" name="file_upload" id="exampleInputFile">
              <label class="custom-file-label" for="exampleInputFile">Choose file</label>
            </div>
            <div class="input-group-append">
              <span class="input-group-text">Upload</span>
            </div>
          </div>
          @error('file_upload')
            <div class="alert alert-danger mt-2">
              {{$message}}
            </div>
          @enderror
        </div>
      </div>
      <!-- /.card-body -->
      <div class="card-footer">
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>
    </form>
  </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="https://adminlte.io/themes/v3/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="https://adminlte.io/themes/v3/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="https://adminlte.io/themes/v3/dist/js/adminlte.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script>
  @if(session()->has('success'))  
    toastr.success('{{session('success')}}', 'Berhasil!!');
  @elseif(session()->has('error'))
    toastr.success('{{session('error')}}', 'Gagal!!');
  @endif
</script>
</body>
</html>
