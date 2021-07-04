<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">

<!-- Sidebar -->
<div class="sidebar">
  <!-- Sidebar user panel (optional) -->
  <div class="user-panel mt-3 pb-3 mb-3 d-flex">
    <div class="info">
      <a class="d-block">Hello, <b>{{$user->name}}</b>!</a>
    </div>
  </div>

  <!-- Sidebar Menu -->
  <nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
      <!-- Add icons to the links using the .nav-icon class with font-awesome or any other icon font library -->          
      @if($user->role == 'admin')
      <li class="nav-item">
        <a href="{{route('persyaratan.index')}}" class="nav-link {{ (request()->is('persyaratan*') ? 'active' : '') }}">
          <i class="nav-icon far fa-image"></i>
          <p>
            Persyaratan
          </p>
        </a>
      </li>
      <li class="nav-item">
        <a href="{{route('pengumuman.index')}}" class="nav-link {{ (request()->is('pengumuman*') ? 'active' : '') }}">
          <i class="nav-icon far fa-image"></i>
          <p>
            Pengumuman
          </p>
        </a>
      </li>
      <li class="nav-item">
        <a href="{{route('dosen.index')}}" class="nav-link {{ (request()->is('dosen*') ? 'active' : '') }}">
          <i class="nav-icon far fa-image"></i>
          <p>
            Dosen Penyeleksi
          </p>
        </a>
      </li>
      <li class="nav-item {{ (request()->is('refrensi-tema*') ? 'menu-open' : '') }}">
        <a href="#" class="nav-link">
          <i class="nav-icon fas fa-tachometer-alt"></i>
          <p>
            Usulan Judul
            <i class="right fas fa-angle-left"></i>
          </p>
        </a>
        <ul class="nav nav-treeview">
          <li class="nav-item">
            <a href="{{route('refrensi-tema.index')}}" class="nav-link {{ (request()->is('refrensi-tema*') ? 'active' : '') }}">
              <i class="far fa-circle nav-icon"></i>
              <p>Refrensi Tema Dosen</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Rekap Judul TA</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Judul Diterima</p>
            </a>
          </li>
        </ul>
      </li>
      @elseif($user->role == 'dosen')
      <li class="nav-item {{ (request()->is('refrensi-tema*') ? 'menu-open' : '') }}">
        <a href="#" class="nav-link">
          <i class="nav-icon fas fa-tachometer-alt"></i>
          <p>
            Usulan Judul
            <i class="right fas fa-angle-left"></i>
          </p>
        </a>
        <ul class="nav nav-treeview">
          <li class="nav-item">
            <a href="{{route('refrensi-tema.index')}}" class="nav-link {{ (request()->is('refrensi-tema*') ? 'active' : '') }}">
              <i class="far fa-circle nav-icon"></i>
              <p>Refrensi Tema Dosen</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Rekap Judul TA</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Judul Diterima</p>
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