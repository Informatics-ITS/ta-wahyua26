 
<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html>
<head>
    <title>@lang('pegawai.title')</title>
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
  @include('layouts.side')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm">
            <h1 class="m-0 font-weight-bold">@lang('pegawai.h1')</h1>
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
      <div class="col">
        <div class="row">
          <div class="col"></div>
          <div class="col"></div>
          <div class="col"></div>
          <div class="col">
            <form method="GET" action="{{ route('pegawai') }}">
              <div class="input-group mb-3">
                  <input type="text" class="form-control" name="query" placeholder="{{ GoogleTranslate::trans('Searching for employee...', app()->getLocale()) }}"  value="{{ request('query') }}">
                  <button class="btn btn-primary" type="submit"><i class="fas fa-search"></i></button>
              </div>
          </form>
          </div>
          <div class="col">
            <div class="card">
              <a href="{{ route('tambah-pegawai') }}" class="btn btn-primary"><i class="fas fa-user-plus"></i> @lang('pegawai.tambah')</a>
            </div>
          </div>
        </div>
        <div class="row">
          <table class="table table-striped projects text-center">
            <tr>
              <th><a href="{{ route('pegawai', ['sort' => 'users.name', 'direction' => $direction === 'asc' ? 'desc' : 'asc']) }}">
                @lang('pegawai.nama') {{ $sort === 'users.name' ? ($direction === 'asc' ? '▲' : '▼') : '' }}
              </a></th>
                <th>@lang('pegawai.email')</th>
                <th><a href="{{ route('pegawai', ['sort' => 'users.tglLahir', 'direction' => $direction === 'asc' ? 'desc' : 'asc']) }}">
                  @lang('pegawai.tanggal') {{ $sort === 'users.tglLahir' ? ($direction === 'asc' ? '▲' : '▼') : '' }}
                </a></th>
                <th><a href="{{ route('pegawai', ['sort' => 'jabatans.jabatan', 'direction' => $direction === 'asc' ? 'desc' : 'asc']) }}">
                  @lang('pegawai.jabatan') {{ $sort === 'jabatans.jabatan' ? ($direction === 'asc' ? '▲' : '▼') : '' }}
                </a></th>
                <th><a href="{{ route('pegawai', ['sort' => 'workspaces.nama', 'direction' => $direction === 'asc' ? 'desc' : 'asc']) }}">
                  @lang('pegawai.ruang') {{ $sort === 'workspaces.nama' ? ($direction === 'asc' ? '▲' : '▼') : '' }}
                </a></th>
                <th><a href="{{ route('pegawai', ['sort' => 'users.status', 'direction' => $direction === 'asc' ? 'desc' : 'asc']) }}">
                  @lang('pegawai.status') {{ $sort === 'users.status' ? ($direction === 'asc' ? '▲' : '▼') : '' }}
                </a></th>
                <th>@lang('pegawai.aksi')</th>
            </tr> 
            @foreach ($pegawai as $item)
            <tr>
                <td>{{ $item->name }}</td>
                <td>{{ $item->email }}</td>
                <td>{{ $item->tglLahir }}</td>
                <td>{{ $item->jabatan }}</td>
                <td>{{ $item->nama }}</td>
                <td>{{ $item->status }}</td>
                <td class="project-actions text-center">
                  <a href="/edit-pegawai/{{ $item->id }}" class="btn btn-info btn-sm">
                      <i class="fas fa-pencil-alt">
                      </i>
                      @lang('pegawai.ubah')
                  </a>
                  <a onclick="return confirm('Apakah anda yakin?')" href="/hapus-pegawai/{{ $item->id }}" class="btn btn-danger btn-sm" href="#">
                      <i class="fas fa-trash">
                      </i>
                      @lang('pegawai.hapus')
                  </a>
              </td>
            </tr> 
            @endforeach 
        </table>
        {{ $pegawai->appends(['sort' => $sort, 'direction' => $direction])->links() }}
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
