<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">

<!-- Sidebar -->
<div class="sidebar">
  <!-- Sidebar user panel (optional) -->
  <div class="user-panel pt-3 pb-3 d-flex">
    <div class="info">
      <h3 class="mb-0 text-white"><b>Hi</b>, {{ Auth::user()->name }}</h3>
      <p class="mb-0 text-muted">{{ Auth::user()->role }}</p>
    </div>
  </div>
  <!-- Sidebar Menu -->
  <nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
      @if(Auth::user()->role === 'admin')
      <li class="nav-item">
        <a href="{!!URL::to('persyaratan')!!}" class="nav-link {{ (request()->is('persyaratan*') ? 'active' : '') }}">
          <i class="nav-icon far fa-image"></i>
          <p>
            Persyaratan            
          </p>
        </a>
      </li>
      <li class="nav-item">
        <a href="{!!URL::to('pengumuman')!!}" class="nav-link {{ (request()->is('pengumuman*') ? 'active' : '') }}">
          <i class="nav-icon far fa-image"></i>
          <p>
            Pengumuman
          </p>
        </a>
      </li>
      <li class="nav-item">
        <a href="{!!URL::to('dosen')!!}" class="nav-link {{ (request()->is('dosen*') ? 'active' : '') }}">
          <i class="nav-icon far fa-image"></i>
          <p>
            Dosen Penyeleksi
          </p>
        </a>
      </li>
      <li class="nav-item {{ (request()->is('refrensi-tema*') | request()->is('judul-diterima*') | request()->is('form-pendaftaran*') | request()->is('rekap-laporan*') | request()->is('penilaian-laporan*') ? 'menu-open' : '') }}">
        <a href="#" class="nav-link">
          <i class="nav-icon fas fa-tachometer-alt"></i>
          <p>
            Laporan Akhir
            <i class="right fas fa-angle-left"></i>
          </p>
        </a>
        <ul class="nav nav-treeview">
          <li class="nav-item">
            <a href="{!!URL::to('refrensi-tema')!!}" class="nav-link {{ (request()->is('refrensi-tema*') ? 'active' : '') }}">
              <i class="far fa-circle nav-icon"></i>
              <p>Refrensi Tema Dosen</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{!!URL::to('form-pendaftaran')!!}" class="nav-link {{ (request()->is('form-pendaftaran*') ? 'active' : '') }}">
              <i class="far fa-circle nav-icon"></i>
              <p>Rekap Judul Proposal LA</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{!!URL::to('rekap-laporan')!!}" class="nav-link {{ (request()->is('rekap-laporan*') ? 'active' : '') }}">
              <i class="far fa-circle nav-icon"></i>
              <p>Rekap Laporan Akhir</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{!!URL::to('penilaian-laporan')!!}" class="nav-link {{ (request()->is('penilaian-laporan*') ? 'active' : '') }}">
              <i class="far fa-circle nav-icon"></i>
              <p>Penilaian Laporan Akhir</p>
            </a>
          </li>
        </ul>
      </li>     
      @elseif(Auth::user()->role === 'pembimbing')
      <li class="nav-item">
        <a href="{!!URL::to('persyaratan')!!}" class="nav-link {{ (request()->is('persyaratan*') ? 'active' : '') }}">
          <i class="nav-icon far fa-image"></i>
          <p>
            Persyaratan
          </p> 
        </a>
      </li>
      <li class="nav-item">
        <a href="{!!URL::to('pengumuman')!!}" class="nav-link {{ (request()->is('pengumuman*') ? 'active' : '') }}">
          <i class="nav-icon far fa-image"></i>
          <p>
            Pengumuman
          </p>
        </a>
      </li>
      <li class="nav-item">
        <a href="{!!URL::to('dosen')!!}" class="nav-link {{ (request()->is('dosen*') ? 'active' : '') }}">
          <i class="nav-icon far fa-image"></i>
          <p>
            Dosen Penyeleksi
          </p>
        </a>
      </li>
      <li class="nav-item {{ (request()->is('refrensi-tema*') | request()->is('judul-diterima*') | request()->is('form-pendaftaran*') | request()->is('rekap-laporan*') | request()->is('penilaian-laporan*') ? 'menu-open' : '') }}">
        <a href="#" class="nav-link">
          <i class="nav-icon fas fa-tachometer-alt"></i>
          <p>
            Laporan Akhir
            <i class="right fas fa-angle-left"></i>
          </p>
        </a>
        <ul class="nav nav-treeview">
          <li class="nav-item">
            <a href="{!!URL::to('refrensi-tema')!!}" class="nav-link {{ (request()->is('refrensi-tema*') ? 'active' : '') }}">
              <i class="far fa-circle nav-icon"></i>
              <p>Refrensi Tema Dosen</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{!!URL::to('form-pendaftaran')!!}" class="nav-link {{ (request()->is('form-pendaftaran') ? 'active' : '') }}">
              <i class="far fa-circle nav-icon"></i>
              <p>Rekap Judul Proposal LA</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{!!URL::to('rekap-laporan')!!}" class="nav-link {{ (request()->is('rekap-laporan*') ? 'active' : '') }}">
              <i class="far fa-circle nav-icon"></i>
              <p>Rekap Laporan Akhir</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{!!URL::to('logbook/list-logbook')!!}" class="nav-link {{ (request()->is('logbook*') ? 'active' : '') }}">
              <i class="far fa-circle nav-icon"></i>
              <p>
                Logbook
              </p>
            </a>        
          </li>
          <li class="nav-item">
            <a href="{!!URL::to('penilaian-laporan')!!}" class="nav-link {{ (request()->is('penilaian-laporan*') ? 'active' : '') }}">
              <i class="far fa-circle nav-icon"></i>
              <p>Penilaian Laporan Akhir</p>
            </a>
          </li>
        </ul>
      </li>             
      @elseif(Auth::user()->role === 'mahasiswa')
      <li class="nav-item">
        <a href="{!!URL::to('persyaratan')!!}" class="nav-link {{ (request()->is('persyaratan*') ? 'active' : '') }}">
          <i class="nav-icon far fa-image"></i>
          <p>
            Persyaratan
          </p>
        </a>
      </li>
      <li class="nav-item">
        <a href="{!!URL::to('pengumuman')!!}" class="nav-link {{ (request()->is('pengumuman*') ? 'active' : '') }}">
          <i class="nav-icon far fa-image"></i>
          <p>
            Pengumuman
          </p>
        </a>
      </li>
      <li class="nav-item">
        <a href="{!!URL::to('dosen')!!}" class="nav-link {{ (request()->is('dosen*') ? 'active' : '') }}">
          <i class="nav-icon far fa-image"></i>
          <p>
            Dosen Penyeleksi
          </p>
        </a>
      </li>
      <li class="nav-item {{ (request()->is('refrensi-tema*') | request()->is('judul-diterima*') | request()->is('form-pendaftaran*') | request()->is('pendaftaran/create') | request()->is('rekap-laporan*') | request()->is('penilaian-laporan*') | request()->is('logbook*') ? 'menu-open' : '') }}">
        <a class="nav-link">
          <i class="nav-icon fas fa-tachometer-alt"></i>
          <p>
            Laporan Akhir
            <i class="right fas fa-angle-left"></i>
          </p>
        </a>
        <ul class="nav nav-treeview">
          <li class="nav-item">
            <a href="{{ URL::to('refrensi-tema') }}" class="nav-link {{ (request()->is('refrensi-tema*') ? 'active' : '') }}">
              <i class="far fa-circle nav-icon"></i>
              <p>Refrensi Tema Dosen</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{!!URL::to('pendaftaran/create')!!}" class="nav-link {{ (request()->is('pendaftaran/create') ? 'active' : '') }}">
              <i class="far fa-circle nav-icon"></i>
              <p>Form Pendaftaran Proposal LA</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{!!URL::to('form-pendaftaran')!!}" class="nav-link {{ (request()->is('form-pendaftaran*') ? 'active' : '') }}">
              <i class="far fa-circle nav-icon"></i>
              <p>Rekap Judul Proposal LA</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{!!URL::to('rekap-laporan')!!}" class="nav-link {{ (request()->is('rekap-laporan*') ? 'active' : '') }}">
              <i class="far fa-circle nav-icon"></i>
              <p>Rekap Laporan Akhir</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{!!URL::to('logbook')!!}" class="nav-link {{ (request()->is('logbook*') ? 'active' : '') }}">
              <i class="far fa-circle nav-icon"></i>
              <p>Logbook Laporan Akhir</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{!!URL::to('penilaian-laporan')!!}" class="nav-link {{ (request()->is('penilaian-laporan*') ? 'active' : '') }}">
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