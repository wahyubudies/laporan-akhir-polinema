<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">

<!-- Sidebar -->
<div class="sidebar">
  <!-- Sidebar user panel (optional) -->
  <div class="user-panel mt-3 pb-3 mb-3 d-flex">
    <div class="info">
      <a class="d-block"> <b>Sistem Informasi</b> <br> Laporan Akhir <br> Prodi Teknik Telekomunikasi</a>
    </div>
  </div>

  <!-- Sidebar Menu -->
  <nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
      @if(Auth::user()->role === 'admin')
      <li class="nav-item">
        <a href="{{route('persyaratan.index')}}" class="nav-link {{ (request()->is('admin/persyaratan*') ? 'active' : '') }}">
          <i class="nav-icon far fa-image"></i>
          <p>
            Persyaratan            
          </p>
        </a>
      </li>
      <li class="nav-item">
        <a href="{{route('pengumuman.index')}}" class="nav-link {{ (request()->is('admin/pengumuman*') ? 'active' : '') }}">
          <i class="nav-icon far fa-image"></i>
          <p>
            Pengumuman
          </p>
        </a>
      </li>
      <li class="nav-item">
        <a href="{{route('dosen.index')}}" class="nav-link {{ (request()->is('admin/dosen*') ? 'active' : '') }}">
          <i class="nav-icon far fa-image"></i>
          <p>
            Dosen Penyeleksi
          </p>
        </a>
      </li>
      <li class="nav-item {{ (request()->is('admin/refrensi-tema*') | request()->is('admin/judul-diterima*') | request()->is('admin/form-pendaftaran*') ? 'menu-open' : '') }}">
        <a href="#" class="nav-link">
          <i class="nav-icon fas fa-tachometer-alt"></i>
          <p>
            Usulan Judul
            <i class="right fas fa-angle-left"></i>
          </p>
        </a>
        <ul class="nav nav-treeview">
          <li class="nav-item">
            <a href="{{route('refrensi-tema.index')}}" class="nav-link {{ (request()->is('admin/refrensi-tema*') ? 'active' : '') }}">
              <i class="far fa-circle nav-icon"></i>
              <p>Refrensi Tema Dosen</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('form-pendaftaran.index')}}" class="nav-link {{ (request()->is('admin/form-pendaftaran') ? 'active' : '') }}">
              <i class="far fa-circle nav-icon"></i>
              <p>Rekap Judul Proposal TA</p>
            </a>
          </li>
        </ul>
      </li>            
      @elseif(Auth::user()->role === 'mahasiswa')
      <li class="nav-item">
        <a href="{{route('persyaratan.guest')}}" class="nav-link {{ (request()->is('mahasiswa/persyaratan*') ? 'active' : '') }}">
          <i class="nav-icon far fa-image"></i>
          <p>
            Persyaratan
          </p>
        </a>
      </li>
      <li class="nav-item">
        <a href="{{route('pengumuman.guest')}}" class="nav-link {{ (request()->is('mahasiswa/pengumuman*') ? 'active' : '') }}">
          <i class="nav-icon far fa-image"></i>
          <p>
            Pengumuman
          </p>
        </a>
      </li>
      <li class="nav-item">
        <a href="{{route('dosen.guest')}}" class="nav-link {{ (request()->is('mahasiswa/dosen*') ? 'active' : '') }}">
          <i class="nav-icon far fa-image"></i>
          <p>
            Dosen Penyeleksi
          </p>
        </a>
      </li>
      <li class="nav-item {{ (request()->is('mahasiswa/refrensi-tema*') | request()->is('mahasiswa/judul-diterima*') | request()->is('mahasiswa/form-pendaftaran*') ? 'menu-open' : '') }}">
        <a class="nav-link">
          <i class="nav-icon fas fa-tachometer-alt"></i>
          <p>
            Usulan Judul
            <i class="right fas fa-angle-left"></i>
          </p>
        </a>
        <ul class="nav nav-treeview">
          <li class="nav-item">
            <a href="{{ route('refrensi-tema.guest') }}" class="nav-link {{ (request()->is('mahasiswa/refrensi-tema*') ? 'active' : '') }}">
              <i class="far fa-circle nav-icon"></i>
              <p>Refrensi Tema Dosen</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('form-pendaftaran.create')}}" class="nav-link {{ (request()->is('mahasiswa/form-pendaftaran/create') ? 'active' : '') }}">
              <i class="far fa-circle nav-icon"></i>
              <p>Form Pendaftaran Proposal TA</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('form-pendaftaran.guest')}}" class="nav-link {{ (request()->is('mahasiswa/form-pendaftaran') ? 'active' : '') }}">
              <i class="far fa-circle nav-icon"></i>
              <p>Rekap Judul Proposal TA</p>
            </a>
          </li>
        </ul>
      </li> 
      @endif
    </ul>
  </nav>
  <!-- /.sidebar-menu -->
</div>
<!-- /.sidebar -->
</aside>