 
<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html>
<head>
    <title>@lang('audiometri.title')</title>
    @include('layouts.head')
    <style>
      th {
        text-align: center;
      }
    </style>
</head>
<body class="hold-transition sidebar-mini">
            @if(Session::has('success'))
              <script type="text/javascript">
                  swal({
                      title:'Success!',
                      text:"{{Session::get('success')}}",
                      timer:5000,
                      type:'success',
                      icon: 'success'
                  }).then((value) => {
                    //location.reload();
                  }).catch(swal.noop);
              </script>
            @endif
            @if(Session::has('error'))
              <script type="text/javascript">
                  swal({
                      title:'Error!',
                      text:"{{Session::get('error')}}",
                      timer:5000,
                      type:'error',
                      icon: 'error'
                  }).then((value) => {
                    //location.reload();
                  }).catch(swal.noop);
              </script>
            @endif
            @if(isset($errors) && $errors->any())
              @foreach($errors->all() as $error)
                <script type="text/javascript">
                  swal({
                      title:'Error!',
                      text:"{{ $error }}",
                      timer:5000,
                      type:'error',
                      icon: 'error'
                  }).then((value) => {
                    //location.reload();
                  }).catch(swal.noop);
                </script>
              @endforeach
            @endif
<div class="wrapper ">

  <!-- Navbar -->
  @include('layouts.navbar')
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  {{-- @include('layouts.side') --}}
  <aside class="main-sidebar sidebar-light-primary elevation-4 bg-blue">
    <!-- Brand Logo -->
    @if (auth()->user()->status == 'admin')
    <a href="{{ route('home') }}" class="brand-link">
      <img src="{{ asset('AdminLTE/dist/img/group14.png') }}" alt="SIATP Logo" class="brand-image" style="opacity: 1">
      <span>
        SIATP
      </span>
    </a>
    @endif
    @if (auth()->user()->status == 'pegawai')
    <a href="/homePegawai/{{ auth()->user()->id }}" class="brand-link">
      <img src="{{ asset('AdminLTE/dist/img/group14.png') }}" alt="SIATP Logo" class="brand-image" style="opacity: 1">
      <span>
        SIATP
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
            <a href="{{ route('audiometri') }}" class="nav-link active">
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

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm">
            <h1 class="m-0 font-weight-bold">@lang('audiometri.h1')</h1>
          </div><!-- /.col -->
          <div class="col-sm">
            {{-- <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Daftar Karyawan</li>
            </ol> --}}
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="row">
        <div class="col"></div>
        <div class="col"></div>
        <div class="col"></div>
        <div class="col">
          <form method="GET" action="{{ route('audiometri') }}">
            <div class="input-group mb-3">
                <input type="text" class="form-control" name="query" placeholder="{{ GoogleTranslate::trans('Mencari hasil audiometri...', app()->getLocale()) }}"  value="{{ request('query') }}">
                <button class="btn btn-primary" type="submit"><i class="fas fa-search"></i></button>
            </div>
        </form>
        </div>
      </div>
      <div class="row">
        <div class="col">
          <table class="table table-striped projects text-center">
            <tr>
                <th><a href="{{ route('audiometri', ['sort' => 'users.name', 'direction' => $direction === 'asc' ? 'desc' : 'asc']) }}">
                      @lang('audiometri.nama') {{ $sort === 'users.name' ? ($direction === 'asc' ? '▲' : '▼') : '' }}
                    </a></th>
                <th><a href="{{ route('audiometri', ['sort' => 'audiometris.tanggal', 'direction' => $direction === 'asc' ? 'desc' : 'asc']) }}">
                      @lang('audiometri.tanggal') {{ $sort === 'audiometris.tanggal' ? ($direction === 'asc' ? '▲' : '▼') : '' }}
                    </a></th>
                <th>@lang('audiometri.waktu')</th>
                <th>@lang('audiometri.hasil')</th>
                <th>@lang('audiometri.aksi')</th>
            </tr> 
            @foreach ($hasil as $item)
            <tr>
                <td>{{ $item->name }}</td>
                <td>{{ $item->tanggal }}</td>
                <td>{{ $item->waktu }}</td>
                <td>{{ $item->keterangan }}</div></td>
                <td class="project-actions text-center">
                  <a href="/detail-audiometri/{{ $item->id }}" class="btn btn-info btn-sm">
                    <i class="fas fa-info-circle"></i> Detail
                  </a>
              </td>
            </tr> 
            @endforeach 
        </table>
        {{ $hasil->appends(['sort' => $sort, 'direction' => $direction])->links() }}
        </div>
      </div>
    </div>
      
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Main Footer -->
    @include('layouts.footer')  
<!-- ./wrapper -->

</div>
<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
@include('layouts.script')
</body>
</html>
