 
<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html>
<head>
    <title>Home</title>
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
            <h1 class="m-0 font-weight-bold">DASHBOARD</h1>
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
        <div class="col">
          <div>
            <canvas id="chart"></canvas>
            <input type="hidden" id="januari" value="{{ $januari }}">
            <input type="hidden" id="februari" value="{{ $februari }}">
            <input type="hidden" id="maret" value="{{ $maret }}">
            <input type="hidden" id="april" value="{{ $april }}">
            <input type="hidden" id="mei" value="{{ $mei }}">
            <input type="hidden" id="juni" value="{{ $juni }}">
          </div>
        </div>
        <div class="col">
          {{-- @lang('home.keterangan') --}}
          {{ GoogleTranslate::trans('Keterangan: (*) Rata-rata', app()->getLocale()) }}
          <table id="example2" class="table table-bordered table-striped table-hover dataTable dtr-inline" aria-describedby="example2_info">
            <thead>
              <tr>
                <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1">@lang('home.ruang')</th>
                <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1">@lang('home.bising')</th>
                <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" >@lang('home.hasil')*</th>
                <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" >@lang('home.usia')*</th>
                <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" >@lang('home.rekomendasi')</th>
              </tr>
            </thead>
            <tbody class="text-center">
              @foreach ($rekap as $item)
              <tr>
                  <td>{{ $item->nama }}</td>
                  <td>{{ $item->bising }} dB</td>
                  <td>{{ $item->rataHasil }}%</td>
                  <td>{{ $item->rataUsia }} @lang('home.tahun')</td>
                  <td>{{ $item->rekomendasi }}</td>
              </tr> 
              @endforeach 
            </tbody>
          </table>
        </div>
      </div>
      <br>
      <div class="row">
        <div class="col"></div>
        <div class="col-lg-3">
          <div class="small-box text-white">
            <div class="inner">
              <h3>{{ $audiometri }}</h3>
              <p>@lang('home.menuAudiometri')</p>
            </div>
            <div class="icon">
              <i class="nav-icon fas fa-file-medical"></i>
            </div>
            <a href="{{ route('audiometri') }}" class="small-box-footer text-white">@lang('home.lihat') <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <div class="col-lg-3">
          <div class="small-box text-white">
            <div class="inner">
              <h3 class="h3">5</h3>
              <p>@lang('home.menuData')</p>
            </div>
            <div class="icon">
              <i class="nav-icon fas fa-table"></i>
            </div>
            <a href="{{ route('menu') }}" class="small-box-footer text-white">@lang('home.lihat') <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <div class="col-lg-3">
          <div class="small-box text-white">
            <div class="inner">
              <h3>{{ $rekomendasi }}</h3>
              <p>@lang('home.menuRekomendasi')</p>
            </div>
            <div class="icon">
              <i class="nav-icon fas fa-clipboard"></i>
            </div>
            <a href="{{ route('rekomendasi') }}" class="small-box-footer text-white">@lang('home.lihat') <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <div class="col"></div>
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
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
  const januari = document.getElementById('januari').value;
  const februari = document.getElementById('februari').value;
  const maret = document.getElementById('maret').value;
  const april = document.getElementById('april').value;
  const mei = document.getElementById('mei').value;
  const juni = document.getElementById('juni').value;
  
  const ctx = document.getElementById('chart');
  var labels = @json($bulan);
  var label = @json($label);

  new Chart(ctx, {
    type: 'line',
    data: {
      labels: labels,
      datasets: [{
        label: label,
        data: [januari, februari, maret, april, mei, juni],
        borderWidth: 1
      }]
    },
    options: {
      scales: {
        y: {
          beginAtZero: true
        }
      }
    }
  });
</script>
<!-- jQuery -->
@include('layouts.script')
</body>
</html>
