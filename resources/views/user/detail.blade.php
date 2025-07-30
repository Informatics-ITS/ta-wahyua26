<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>{{ GoogleTranslate::trans('Detail Akun', app()->getLocale()) }}</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('AdminLTE/plugins/fontawesome-free/css/all.min.css') }}">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="{{ asset('AdminLTE/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('AdminLTE/dist/css/adminlte.min.css') }}">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>
  <link href='{{ asset('AdminLTE/dist/img/logo1.png') }}' rel='shortcut icon'>
  <style>
    .divider:after,
    .divider:before {
      content: "";
      flex: 1;
      height: 1px;
      background: #eee;
    }
    .h-custom {
      height: calc(100% - 73px);
    }
    @media (max-width: 450px) {
      .h-custom {
      height: 100%;
    }}
    body{color: #000;overflow-x: hidden;height: 100%;background-image: url("https://i.imgur.com/GMmCQHC.png");background-repeat: no-repeat;background-size: 100% 100%}.card{padding: 30px 40px;margin-top: 60px;margin-bottom: 60px;border: none !important;box-shadow: 0 6px 12px 0 rgba(0,0,0,0.2)}.blue-text{color: #00BCD4}.form-control-label{margin-bottom: 0}input, textarea, button{padding: 8px 15px;border-radius: 5px !important;margin: 5px 0px;box-sizing: border-box;border: 1px solid #ccc;font-size: 18px !important;font-weight: 300}input:focus, textarea:focus{-moz-box-shadow: none !important;-webkit-box-shadow: none !important;box-shadow: none !important;border: 1px solid #00BCD4;outline-width: 0;font-weight: 400}.btn-block{text-transform: uppercase;font-size: 15px !important;font-weight: 400;height: 43px;cursor: pointer}.btn-block:hover{color: #fff !important}button:focus{-moz-box-shadow: none !important;-webkit-box-shadow: none !important;box-shadow: none !important;outline-width: 0}
  </style>
</head>
<body>
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

    @if(Session::has('fail'))
    <script type="text/javascript">
        swal({
            title:'Oops!',
            text:"{{Session::get('fail')}}",
            type:'error',
            timer:5000,
            icon: 'error'
        }).then((value) => {
          //location.reload();
        }).catch(swal.noop);
    </script>
    @endif
    <section>
      <div class="container-fluid h-custom">
        <div class="row d-flex justify-content-center align-items-center h-100">
          <div class="col-md-9 col-lg-6 col-xl-5">
            @if (auth()->user()->status == 'admin')
            <a href="/home" ><img class="img-circle elevation-5" src="{{ asset('AdminLTE/dist/img/Picture1.png') }}"
              class="img-fluid" alt="Sample image"></a>
            @endif
            @if (auth()->user()->status == 'pegawai')
            <a href="/homePegawai/{{ $user->id }}" ><img class="img-circle elevation-5" src="{{ asset('AdminLTE/dist/img/Picture1.png') }}"
              class="img-fluid" alt="Sample image"></a>
            @endif
          </div>
          <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
            <div class="card">
                <div class="text-center"> 
                    <a href="#" data-toggle="modal" data-target="#importFoto">
                      <img class="profile-user-img img-fluid img-circle" src="{{ asset('storage/images/' . $user->foto) }}" alt="User profile picture">
                    </a>

                    <div class="modal fade" id="importFoto" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                        <form method="post" action="{{ route('update-foto-profile') }}" enctype="multipart/form-data">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel">{{ GoogleTranslate::trans('Import Foto Profil', app()->getLocale()) }}</h5>
                            </div>
                            <div class="modal-body">
                 
                              {{ csrf_field() }}
                 
                              <label>{{ GoogleTranslate::trans('Pilih Foto Profil', app()->getLocale()) }}</label>
                              <div class="form-group">
                                <input type="file" name="foto" required="required" accept="image/png, image/jpeg, image/jpg">
                                <input type="hidden" name="id" value="{{ $user->id }}">
                              </div>
                 
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ GoogleTranslate::trans('Back', app()->getLocale()) }}</button>
                              <button type="submit" class="btn btn-primary">{{ GoogleTranslate::trans('Pilih', app()->getLocale()) }}</button>
                            </div>
                          </div>
                        </form>
                      </div>
                    </div>

                        <h3 class="mt-2">{{ $user->name }}</h3>
                        <span class="mt-1 clearfix">{{ $user->jabatan }}</span>
                        
                        <hr class="line">
                         
                        <div class="tab-content profile-tab" id="myTabContent">
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>{{ GoogleTranslate::trans('Nama Lengkap', app()->getLocale()) }}</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>{{ $user->name }}</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>{{ GoogleTranslate::trans('Alamat Email', app()->getLocale()) }}</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>{{ $user->email }}</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>{{ GoogleTranslate::trans('Tanggal Lahir', app()->getLocale()) }}</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>{{ $user->tglLahir }}</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>{{ GoogleTranslate::trans('Posisi Pegawai', app()->getLocale()) }}</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>{{ $user->jabatan }}</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>{{ GoogleTranslate::trans('Ruang Kerja', app()->getLocale()) }}</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>{{ $user->nama }}</p>
                                            </div>
                                        </div>
                            </div>
                        
                         <button class="profile_button px-5 bg-primary"><a href="/edit-akun/{{ $user->id }}">{{ GoogleTranslate::trans('Ubah Detail Akun', app()->getLocale()) }}</a></button>
            
                    </div>
                           
                    </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <div
        class="d-flex flex-column flex-md-row text-center text-md-start justify-content-between py-4 px-4 px-xl-5 bg-primary">
        <!-- Copyright -->
        <div class="text-white mb-3 mb-md-0">
          Copyright © 2023. All rights reserved.
        </div>
        <!-- Copyright -->
    
        <!-- Right -->
        <div>
          <a href="#!" class="text-white me-4">AudioVis Pro</a>
        </div>
        <!-- Right -->
      </div>
<!-- jQuery -->
@include('layouts.script')
</body>
</html>