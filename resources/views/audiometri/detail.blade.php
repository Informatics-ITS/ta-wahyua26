 
<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html>
<head>
    <title>@lang('detailAudiometri.title')</title>
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
  {{-- @include('layouts.navbar') --}}
  <nav class="main-header navbar navbar-expand navbar-white navbar-light bg-primary">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      {{-- <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Contact</a>
      </li> --}}
    </ul>

    {{-- <ul class="navbar-nav ml-auto">
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="fas fa-globe"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <a href="lang/id" class="dropdown-item">
            Indonesia
          </a>
          <div class="dropdown-divider"></div>
          <a href="lang/en" class="dropdown-item">
            English
          </a>
        </div>
      </li>
    </ul> --}}
    {{-- <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Navbar Search -->
      <li class="nav-item">
        <a class="nav-link" data-widget="navbar-search" href="#" role="button">
          <i class="fas fa-search"></i>
        </a>
        <div class="navbar-search-block">
          <form class="form-inline">
            <div class="input-group input-group-sm">
              <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
              <div class="input-group-append">
                <button class="btn btn-navbar" type="submit">
                  <i class="fas fa-search"></i>
                </button>
                <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                  <i class="fas fa-times"></i>
                </button>
              </div>
            </div>
          </form>
        </div>
      </li>

      <!-- Messages Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-comments"></i>
          <span class="badge badge-danger navbar-badge">3</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="dist/img/user1-128x128.jpg" alt="User Avatar" class="img-size-50 mr-3 img-circle">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  Brad Diesel
                  <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">Call me whenever you can...</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="dist/img/user8-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  John Pierce
                  <span class="float-right text-sm text-muted"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">I got your message bro</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="dist/img/user3-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  Nora Silvester
                  <span class="float-right text-sm text-warning"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">The subject goes here</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
        </div>
      </li>
      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-bell"></i>
          <span class="badge badge-warning navbar-badge">15</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-header">15 Notifications</span>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-envelope mr-2"></i> 4 new messages
            <span class="float-right text-muted text-sm">3 mins</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-users mr-2"></i> 8 friend requests
            <span class="float-right text-muted text-sm">12 hours</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-file mr-2"></i> 3 new reports
            <span class="float-right text-muted text-sm">2 days</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
          <i class="fas fa-th-large"></i>
        </a>
      </li>
    </ul> --}}
  </nav>
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
            <h1 class="m-0 font-weight-bold">@lang('detailAudiometri.h1')</h1>
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
    <section>
        <div class="container-fluid h-custom">
          <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="card text-center">
                <div class="card-body">
                    <div class="row font-weight-bold h3">
                        <div class="col">ID: {{ $detail->id }}</div>
                        <div class="col">{{ $detail->name }}</div>
                        <div class="col">{{ $detail->tanggal }} {{ $detail->waktu }}</div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col">
                            <div class="card">
                                <div class="font-weight-bold h4">@lang('detailAudiometri.kiri')</div>
                                <div class="card-body">
                                    {{-- <div>
                                        <canvas id="ChartKiri"></canvas>
                                        <input type="hidden" id="kiri1" name="kiri1" placeholder="" value="{{ $kiri1 }}">
                                        <input type="hidden" id="kiri2" name="kiri2" placeholder="" value="{{ $kiri2 }}">
                                        <input type="hidden" id="kiri3" name="kiri3" placeholder="" value="{{ $kiri3 }}">
                                        <input type="hidden" id="kiri4" name="kiri4" placeholder="" value="{{ $kiri4 }}">
                                        <input type="hidden" id="kiri5" name="kiri5" placeholder="" value="{{ $kiri5 }}">
                                    </div>
                                    <br> --}}
                                    <div class="card">
                                        <div class="h5 font-weight-bold">@lang('detailAudiometri.hasil')</div>
                                        <div class="card-body">
                                            <div id="gauge-kiri" style="width: 500px; height: 150px;"></div><br>
                                            <input type="hidden" id="hasilKiri" name="hasilKiri" placeholder="" value="{{ $detail->hasilKiri }}">
                                            <div class="text-center h5 font-weight-bold">{{ $detail->keteranganKiri }}</div>                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card">
                                <div class="font-weight-bold h4">@lang('detailAudiometri.kanan')</div>
                                <div class="card-body">
                                    {{-- <div>
                                        <canvas id="ChartKanan"></canvas>
                                        <input type="hidden" id="kanan1" name="kanan1" placeholder="" value="{{ $kanan1 }}">
                                        <input type="hidden" id="kanan2" name="kanan2" placeholder="" value="{{ $kanan2 }}">
                                        <input type="hidden" id="kanan3" name="kanan3" placeholder="" value="{{ $kanan3 }}">
                                        <input type="hidden" id="kanan4" name="kanan4" placeholder="" value="{{ $kanan4 }}">
                                        <input type="hidden" id="kanan5" name="kanan5" placeholder="" value="{{ $kanan5 }}">
                                    </div>
                                    <br> --}}
                                    <div class="card">
                                        <div class="h5 font-weight-bold">@lang('detailAudiometri.hasil')</div>
                                        <div class="card-body">
                                          {{-- <p id="imgKanan"></p><br> --}}
                                          <div id="gauge-kanan" style="width: 500px; height: 150px;"></div><br>
                                          <input type="hidden" id="hasilKanan" name="hasilKanan" placeholder="" value="{{ $detail->hasilKanan }}">
                                          <div class="text-center h5 font-weight-bold">{{ $detail->keteranganKanan }}</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="card">
                            <div class="font-weight-bold h4">@lang('detailAudiometri.seluruh')</div>
                            <div class="card-body">
                              {{-- <p id="img"></p><br> --}}
                              <div id="gauge" style="width: 500px; height: 150px;"></div><br>
                              <input type="hidden" id="hasil" name="hasil" placeholder="" value="{{ $detail->hasil }}">
                                <div class="text-center h5 font-weight-bold">{{ $detail->keterangan }}</div>
                            </div>
                        </div>
                    </div>
                    <div class="row justify-content-center">
                       {{-- <a href="/cetak-detail-audiometri/{{ $detail->id }}" class="btn btn-info my-2"><i class="fas fa-file-pdf"></i> Cetak Detail</a> --}}
                       <button onclick="window.print()" class="btn btn-info my-2"><i class="fas fa-file-pdf"></i> @lang('detailAudiometri.cetak')</button>
                     </div>
                </div>
              </div>
          </div>
        </div>
      </section>
      
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Main Footer -->
    @include('layouts.footer')  
<!-- ./wrapper -->

</div>
<!-- REQUIRED SCRIPTS -->
<script>
    const hasilKiri = parseInt(document.getElementById('hasilKiri').value);
    //console.log(hasilKiri);

    if(hasilKiri <= 100 && hasilKiri >= 90){
      document.getElementById('imgKiri').innerHTML = "<img src=\"{{ asset('AdminLTE/dist/img/normal.png') }}\">";
    }
    else if(hasilKiri <= 89 && hasilKiri >= 75){
      document.getElementById('imgKiri').innerHTML = "<img src=\"{{ asset('AdminLTE/dist/img/tuliringan.png') }}\">";
    }
    else if(hasilKiri <= 74 && hasilKiri >= 60){
      document.getElementById('imgKiri').innerHTML = "<img src=\"{{ asset('AdminLTE/dist/img/tulisedang.png') }}\">";
    }
    else if(hasilKiri <= 59 && hasilKiri >= 50){
      document.getElementById('imgKiri').innerHTML = "<img src=\"{{ asset('AdminLTE/dist/img/tuliberat.png') }}\">";
    }
    else if(hasilKiri <= 49 && hasilKiri >= 0){
      document.getElementById('imgKiri').innerHTML = "<img src=\"{{ asset('AdminLTE/dist/img/gangguankomunikasi.png') }}\">";
    }

    const hasilKanan = parseInt(document.getElementById('hasilKanan').value);
    //console.log(hasilKanan);

    if(hasilKanan <= 100 && hasilKanan >= 90){
      document.getElementById('imgKanan').innerHTML = "<img src=\"{{ asset('AdminLTE/dist/img/normal.png') }}\">";
    }
    else if(hasilKanan <= 89 && hasilKanan >= 75){
      document.getElementById('imgKanan').innerHTML = "<img src=\"{{ asset('AdminLTE/dist/img/tuliringan.png') }}\">";
    }
    else if(hasilKanan <= 74 && hasilKanan >= 60){
      document.getElementById('imgKanan').innerHTML = "<img src=\"{{ asset('AdminLTE/dist/img/tulisedang.png') }}\">";
    }
    else if(hasilKanan <= 59 && hasilKanan >= 50){
      document.getElementById('imgKanan').innerHTML = "<img src=\"{{ asset('AdminLTE/dist/img/tuliberat.png') }}\">";
    }
    else if(hasilKanan <= 49 && hasilKanan >= 0){
      document.getElementById('imgKanan').innerHTML = "<img src=\"{{ asset('AdminLTE/dist/img/gangguankomunikasi.png') }}\">";
    }

    const hasil = parseInt(document.getElementById('hasil').value);
    //console.log(hasil);

    if(hasil <= 100 && hasil >= 90){
      document.getElementById('img').innerHTML = "<img src=\"{{ asset('AdminLTE/dist/img/normal.png') }}\">";
    }
    else if(hasil <= 89 && hasil >= 75){
      document.getElementById('img').innerHTML = "<img src=\"{{ asset('AdminLTE/dist/img/tuliringan.png') }}\">";
    }
    else if(hasil <= 74 && hasil >= 60){
      document.getElementById('img').innerHTML = "<img src=\"{{ asset('AdminLTE/dist/img/tulisedang.png') }}\">";
    }
    else if(hasil <= 59 && hasil >= 50){
      document.getElementById('img').innerHTML = "<img src=\"{{ asset('AdminLTE/dist/img/tuliberat.png') }}\">";
    }
    else if(hasil <= 49 && hasil >= 0){
      document.getElementById('img').innerHTML = "<img src=\"{{ asset('AdminLTE/dist/img/gangguankomunikasi.png') }}\">";
    }
</script>

<script src="https://cdn.jsdelivr.net/npm/raphael@2.3.0/raphael.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/justgage@1.3.5/justgage.min.js"></script>
<script>
  document.addEventListener("DOMContentLoaded", function () {
    var hasil = parseFloat(document.getElementById("hasil").value) || 0;

    var g = new JustGage({
      id: "gauge",
      value: hasil,
      min: 0,
      max: 100,
      label: "%",
      pointer: true,
      gaugeWidthScale: 0.6,
      levelColors: ["#8B0000", "#FF0000", "#90EE90", "#006400"],
      customSectors: [{
        color: "#8B0000",
        lo: 0,
        hi: 20
      }, {
        color: "#FF0000",
        lo: 20,
        hi: 40
      }, {
        color: "#90EE90",
        lo: 40,
        hi: 70
      }, {
        color: "#006400",
        lo: 70,
        hi: 100
      }]
    });
  });
</script>

<script>
  document.addEventListener("DOMContentLoaded", function () {
    var hasil = parseFloat(document.getElementById("hasilKanan").value) || 0;

    var g = new JustGage({
      id: "gauge-kanan",
      value: hasil,
      min: 0,
      max: 100,
      label: "%",
      pointer: true,
      gaugeWidthScale: 0.6,
      levelColors: ["#8B0000", "#FF0000", "#90EE90", "#006400"],
      customSectors: [{
        color: "#8B0000",
        lo: 0,
        hi: 20
      }, {
        color: "#FF0000",
        lo: 20,
        hi: 40
      }, {
        color: "#90EE90",
        lo: 40,
        hi: 70
      }, {
        color: "#006400",
        lo: 70,
        hi: 100
      }]
    });
  });
</script>


<script>
  document.addEventListener("DOMContentLoaded", function () {
    var hasil = parseFloat(document.getElementById("hasilKiri").value) || 0;

    var g = new JustGage({
      id: "gauge-kiri",
      value: hasil,
      min: 0,
      max: 100,
      label: "%",
      pointer: true,
      gaugeWidthScale: 0.6,
      levelColors: ["#8B0000", "#FF0000", "#90EE90", "#006400"],
      customSectors: [{
        color: "#8B0000",
        lo: 0,
        hi: 20
      }, {
        color: "#FF0000",
        lo: 20,
        hi: 40
      }, {
        color: "#90EE90",
        lo: 40,
        hi: 70
      }, {
        color: "#006400",
        lo: 70,
        hi: 100
      }]
    });
  });
</script>

{{-- 
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
  const kiri1 = document.getElementById('kiri1').value*100;
  const kiri2 = document.getElementById('kiri2').value*100;
  const kiri3 = document.getElementById('kiri3').value*100;
  const kiri4 = document.getElementById('kiri4').value*100;
  const kiri5 = document.getElementById('kiri5').value*100;

  const ctx = document.getElementById('ChartKiri');

  new Chart(ctx, {
    type: 'line',
    data: {
      labels: ['1', '2', '3', '4', '5'],
      datasets: [{
        label: 'Persentase Deret',
        data: [kiri1, kiri2, kiri3, kiri4, kiri5],
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

  const kanan1 = document.getElementById('kanan1').value*100;
  const kanan2 = document.getElementById('kanan2').value*100;
  const kanan3 = document.getElementById('kanan3').value*100;
  const kanan4 = document.getElementById('kanan4').value*100;
  const kanan5 = document.getElementById('kanan5').value*100;

  const chart = document.getElementById('ChartKanan');

  new Chart(chart, {
    type: 'line',
    data: {
      labels: ['1', '2', '3', '4', '5'],
      datasets: [{
        label: 'Persentase Deret',
        data: [kanan1, kanan2, kanan3, kanan4, kanan5],
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
</script> --}}
<!-- jQuery -->
@include('layouts.script')
</body>
</html>
