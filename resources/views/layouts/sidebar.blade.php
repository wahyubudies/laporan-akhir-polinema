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
        <a href="{!!URL::to('admin/persyaratan')!!}" class="nav-link {{ (request()->is('admin/persyaratan*') ? 'active' : '') }}">
          <i class="nav-icon far fa-image"></i>
          <p>
            Persyaratan            
          </p>
        </a>
      </li>
      <li class="nav-item">
        <a href="{!!URL::to('admin/pengumuman')!!}" class="nav-link {{ (request()->is('admin/pengumuman*') ? 'active' : '') }}">
          <i class="nav-icon far fa-image"></i>
          <p>
            Pengumuman
          </p>
        </a>
      </li>
      <li class="nav-item">
        <a href="{!!URL::to('admin/dosen')!!}" class="nav-link {{ (request()->is('admin/dosen*') ? 'active' : '') }}">
          <i class="nav-icon far fa-image"></i>
          <p>
            Dosen Penyeleksi
          </p>
        </a>
      </li>
      <li class="nav-item {{ (request()->is('admin/refrensi-tema*') | request()->is('admin/judul-diterima*') | request()->is('admin/form-pendaftaran*') | request()->is('admin/rekap-laporan*') | request()->is('admin/penilaian-laporan*') ? 'menu-open' : '') }}">
        <a href="#" class="nav-link">
          <i class="nav-icon fas fa-tachometer-alt"></i>
          <p>
            Laporan Akhir
            <i class="right fas fa-angle-left"></i>
          </p>
        </a>
        <ul class="nav nav-treeview">
          <li class="nav-item">
            <a href="{!!URL::to('admin/refrensi-tema')!!}" class="nav-link {{ (request()->is('admin/refrensi-tema*') ? 'active' : '') }}">
              <i class="far fa-circle nav-icon"></i>
              <p>Refrensi Tema Dosen</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{!!URL::to('admin/form-pendaftaran')!!}" class="nav-link {{ (request()->is('admin/form-pendaftaran') ? 'active' : '') }}">
              <i class="far fa-circle nav-icon"></i>
              <p>Rekap Judul Proposal LA</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{!!URL::to('admin/rekap-laporan')!!}" class="nav-link {{ (request()->is('admin/rekap-laporan*') ? 'active' : '') }}">
              <i class="far fa-circle nav-icon"></i>
              <p>Rekap Laporan Akhir</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{!!URL::to('admin/penilaian-laporan')!!}" class="nav-link {{ (request()->is('admin/penilaian-laporan*') ? 'active' : '') }}">
              <i class="far fa-circle nav-icon"></i>
              <p>Penilaian Laporan Akhir</p>
            </a>
          </li>
        </ul>
      </li>     
      @elseif(Auth::user()->role === 'pembimbing')
      <li class="nav-item">
        <a href="{!!URL::to('pembimbing/persyaratan')!!}" class="nav-link {{ (request()->is('pembimbing/persyaratan*') ? 'active' : '') }}">
          <i class="nav-icon far fa-image"></i>
          <p>
            Persyaratan
          </p> 
        </a>
      </li>
      <li class="nav-item">
        <a href="{!!URL::to('pembimbing/pengumuman')!!}" class="nav-link {{ (request()->is('pembimbing/pengumuman*') ? 'active' : '') }}">
          <i class="nav-icon far fa-image"></i>
          <p>
            Pengumuman
          </p>
        </a>
      </li>
      <li class="nav-item">
        <a href="{!!URL::to('pembimbing/dosen')!!}" class="nav-link {{ (request()->is('pembimbing/dosen*') ? 'active' : '') }}">
          <i class="nav-icon far fa-image"></i>
          <p>
            Dosen Penyeleksi
          </p>
        </a>
      </li>
      <li class="nav-item {{ (request()->is('pembimbing/refrensi-tema*') | request()->is('pembimbing/judul-diterima*') | request()->is('pembimbing/form-pendaftaran*') | request()->is('pembimbing/rekap-laporan*') | request()->is('pembimbing/penilaian-laporan*') ? 'menu-open' : '') }}">
        <a href="#" class="nav-link">
          <i class="nav-icon fas fa-tachometer-alt"></i>
          <p>
            Laporan Akhir
            <i class="right fas fa-angle-left"></i>
          </p>
        </a>
        <ul class="nav nav-treeview">
          <li class="nav-item">
            <a href="{!!URL::to('pembimbing/refrensi-tema')!!}" class="nav-link {{ (request()->is('pembimbing/refrensi-tema*') ? 'active' : '') }}">
              <i class="far fa-circle nav-icon"></i>
              <p>Refrensi Tema Dosen</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{!!URL::to('pembimbing/form-pendaftaran')!!}" class="nav-link {{ (request()->is('pembimbing/form-pendaftaran') ? 'active' : '') }}">
              <i class="far fa-circle nav-icon"></i>
              <p>Rekap Judul Proposal LA</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{!!URL::to('pembimbing/rekap-laporan')!!}" class="nav-link {{ (request()->is('pembimbing/rekap-laporan*') ? 'active' : '') }}">
              <i class="far fa-circle nav-icon"></i>
              <p>Rekap Laporan Akhir</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{!!URL::to('pembimbing/penilaian-laporan')!!}" class="nav-link {{ (request()->is('pembimbing/penilaian-laporan*') ? 'active' : '') }}">
              <i class="far fa-circle nav-icon"></i>
              <p>Penilaian Laporan Akhir</p>
            </a>
          </li>
        </ul>
      </li>             
      @elseif(Auth::user()->role === 'mahasiswa')
      <li class="nav-item">
        <a href="{!!URL::to('mahasiswa/persyaratan')!!}" class="nav-link {{ (request()->is('mahasiswa/persyaratan*') ? 'active' : '') }}">
          <i class="nav-icon far fa-image"></i>
          <p>
            Persyaratan
          </p>
        </a>
      </li>
      <li class="nav-item">
        <a href="{!!URL::to('mahasiswa/pengumuman')!!}" class="nav-link {{ (request()->is('mahasiswa/pengumuman*') ? 'active' : '') }}">
          <i class="nav-icon far fa-image"></i>
          <p>
            Pengumuman
          </p>
        </a>
      </li>
      <li class="nav-item">
        <a href="{!!URL::to('mahasiswa/dosen')!!}" class="nav-link {{ (request()->is('mahasiswa/dosen*') ? 'active' : '') }}">
          <i class="nav-icon far fa-image"></i>
          <p>
            Dosen Penyeleksi
          </p>
        </a>
      </li>
      <li class="nav-item {{ (request()->is('mahasiswa/refrensi-tema*') | request()->is('mahasiswa/judul-diterima*') | request()->is('mahasiswa/form-pendaftaran*') | request()->is('mahasiswa/rekap-laporan*') | request()->is('mahasiswa/penilaian-laporan*') ? 'menu-open' : '') }}">
        <a class="nav-link">
          <i class="nav-icon fas fa-tachometer-alt"></i>
          <p>
            Laporan Akhir
            <i class="right fas fa-angle-left"></i>
          </p>
        </a>
        <ul class="nav nav-treeview">
          <li class="nav-item">
            <a href="{{ URL::to('mahasiswa/refrensi-tema') }}" class="nav-link {{ (request()->is('mahasiswa/refrensi-tema*') ? 'active' : '') }}">
              <i class="far fa-circle nav-icon"></i>
              <p>Refrensi Tema Dosen</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{!!URL::to('mahasiswa/form-pendaftaran/create')!!}" class="nav-link {{ (request()->is('mahasiswa/form-pendaftaran/create') ? 'active' : '') }}">
              <i class="far fa-circle nav-icon"></i>
              <p>Form Pendaftaran Proposal LA</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{!!URL::to('mahasiswa/form-pendaftaran')!!}" class="nav-link {{ (request()->is('mahasiswa/form-pendaftaran') ? 'active' : '') }}">
              <i class="far fa-circle nav-icon"></i>
              <p>Rekap Judul Proposal LA</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{!!URL::to('mahasiswa/rekap-laporan')!!}" class="nav-link {{ (request()->is('mahasiswa/rekap-laporan*') ? 'active' : '') }}">
              <i class="far fa-circle nav-icon"></i>
              <p>Rekap Laporan Akhir</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{!!URL::to('mahasiswa/penilaian-laporan')!!}" class="nav-link {{ (request()->is('mahasiswa/penilaian-laporan*') ? 'active' : '') }}">
              <i class="far fa-circle nav-icon"></i>
              <p>Penilaian Laporan Akhir</p>
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