<aside class="main-sidebar sidebar-light-primary elevation-4 bg-blue">
    <!-- Brand Logo -->
    @if (auth()->user()->status == 'admin')
    <a href="{{ route('home') }}" class="brand-link">
      <img src="{{ asset('AdminLTE/dist/img/group14.png') }}" alt="AudioVis Logo" class="brand-image" style="opacity: 1">
      <span>
        AVP
      </span>
    </a>
    @endif
    @if (auth()->user()->status == 'pegawai')
    <a href="/homePegawai/{{ auth()->user()->id }}" class="brand-link">
      <img src="{{ asset('AdminLTE/dist/img/group14.png') }}" alt="SIATP Logo" class="brand-image" style="opacity: 1">
      <span>
        AVP
      </span>
    </a>
    @endif

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ asset('storage/images/' . auth()->user()->foto) }}"  class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="/detail-akun/{{ auth()->user()->id }}" class="d-block">{{ auth()->user()->name }}</a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      {{-- <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div> --}}

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          {{-- <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-clock"></i>
              <p>
                Presensi
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('presensi-masuk') }}" class="nav-link">
                    <i class="fas fa-sign-in-alt"></i>
                  <p>Presensi Masuk</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('presensi-keluar') }}" class="nav-link">
                    <i class="fas fa-sign-out-alt"></i>
                  <p>Presensi Keluar</p>
                </a>
              </li>
            </ul>
          </li> --}}
          @if (auth()->user()->status == 'pegawai')
          <li class="nav-item">
            <a href="/audiometri-pegawai/{{ auth()->user()->id }}" class="nav-link">
              <i class="nav-icon fas fa-file-medical "></i>
              <p class="text-dark">@lang('side.menuAudiometri')</p>
            </a>
          </li>
          @endif
          @if (auth()->user()->status == 'admin')
          <li class="nav-item">
            <a href="{{ route('audiometri') }}" class="nav-link">
              <i class="nav-icon fas fa-file-medical "></i>
              <p class="text-dark">@lang('side.menuAudiometri')</p>
            </a>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-table"></i>
              <p>
                @lang('side.menuData')
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('pegawai') }}" class="nav-link">
                  <i class="fas fa-users"></i>
                  <p>@lang('side.dataPegawai')</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('jabatan') }}" class="nav-link">
                  <i class="fas fa-user-friends"></i>
                  <p>@lang('side.dataPosisi')</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('ruang') }}" class="nav-link">
                  <i class="fas fa-building"></i>
                  <p>@lang('side.dataRuangan')</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="{{ route('rekomendasi') }}" class="nav-link">
              <i class="nav-icon fas fa-clipboard "></i>
              <p class="text-dark">@lang('side.menuRekomendasi')</p>
            </a>
          </li>
          <br>
          @endif
        <li class="nav-item">
          <a href="{{ route('logout') }}" class="nav-link">
            <i class="fas fa-sign-out-alt"></i>
            <p>@lang('side.keluar')</p>
          </a>
        </li>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>