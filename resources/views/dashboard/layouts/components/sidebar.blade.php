<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-light-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ asset('index.php') }}" class="brand-link">
      <img src="{{ asset('admin/dist/img/LOGO.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Desa Mangkujajar</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ Storage::url(auth()->user()->foto) }}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#">{{ auth()->user()->name }}</a>
          <a href="#" class="d-block">{{ auth()->user()->role }}</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class with font-awesome or any other icon font library -->
          <li class="nav-item menu-open">
            <a href="{{ route('dashboard') }}" class="nav-link {{ request()->is('dashboard') ? 'active' : ''}}">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-header">FITUR</li>
          <li class="nav-item">
            <a href="{{ route('biodata') }}" class="nav-link {{ request()->is('dashboard/biodata') ? 'active' : ''}}">
              <i class="nav-icon fas fa-user"></i>
              <p>
                Biodata
              </p>
            </a>
          </li>
          @if (auth()->user()->role == 'penduduk')
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-edit"></i>
              <p>
                Pengajuan Surat
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ asset('sktm.php') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>SKTM</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ asset('pengantarktp.php') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Surat Pengantar KTP</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ asset('suratkematian.php') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Surat Keterangan Kematian</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="{{ asset('statusrequest.php') }}" class="nav-link">
              <i class="nav-icon fas fa-book"></i>
              <p>
                Status Request Surat
              </p>
            </a>
          </li>
          @endif
          @if (auth()->user()->role == 'pegawai')
          <li class="nav-item">
            <a href="{{ asset('permohonan.php') }}" class="nav-link">
              <i class="nav-icon fas fa-file-alt"></i>
              <p>
                Permohonan Surat Masuk
              </p>
            </a>
          </li>
          @endif
          @if (auth()->user()->role == 'admin' || auth()->user()->role == 'pegawai')
          <li class="nav-item">
            <a href="{{ asset('laporan.php') }}" class="nav-link">
              <i class="nav-icon fab fa-blogger"></i>
              <p>
                Laporan
              </p>
            </a>
          </li>
          @endif
          @if (auth()->user()->role == 'admin')
          <li class="nav-item">
            <a href="{{ asset('user.php') }}" class="nav-link">
              <i class="nav-icon fas fa-user-cog"></i>
              <p>
                Pengaturan User
              </p>
            </a>
          </li>
          @endif
          <li class="nav-header">SETTING</li>
          <li class="nav-item">
            <a href="{{ asset('ubahpassword.php') }}" class="nav-link">
              <i class="nav-icon fas fa-user-lock"></i>
              <p>
                Ubah Password
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" id="logout-link" class="nav-link">
              <i class="nav-icon fas fa-sign-out-alt"></i>
              <p>
                Logout
              </p>
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
              <!-- Tambahkan input token CSRF jika diperlukan -->
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
            </form>
          </li>
          <script>
            document.getElementById('logout-link').addEventListener('click', function(event) {
              event.preventDefault(); // Mencegah perpindahan halaman saat tautan diklik
              document.getElementById('logout-form').submit();
            });
          </script>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
