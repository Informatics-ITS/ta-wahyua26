<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>{{ GoogleTranslate::trans('Add Employee', app()->getLocale()) }}</title>

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
            <img class="img-circle elevation-5" src="{{ asset('AdminLTE/dist/img/Picture1.png') }}"
              class="img-fluid" alt="Sample image">
          </div>
          <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
            <div class="card">
                <h5 class="text-center mb-4"><b>{{ GoogleTranslate::trans('ADD EMPLOYEE', app()->getLocale()) }}</h5>
                @if ($errors->any())
                  <div class="alert alert-danger">
                      <ul>
                          @foreach ($errors->all() as $error)
                              <li>{{ $error }}</li>
                          @endforeach
                      </ul>
                  </div>
                @endif
                <form class="form-card" action="/pegawai" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row justify-content-between text-left">
                        <div class="form-group col-sm-6 flex-column d-flex">
                            <label class="form-control-label px-3">{{ GoogleTranslate::trans('Employee Position', app()->getLocale()) }}<span class="text-danger"> *</span></label>
                            <select id="jabatan" name="jabatan" class="form-control select" style="width: 100%;">
                                @foreach ($jabatan as $item)
                              <option value="{{ $item->id }}">{{ $item->jabatan }}</option>
                              @endforeach
                            </select>
                        </div>
                        <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label px-3">{{ GoogleTranslate::trans('Nama Lengkap', app()->getLocale()) }}<span class="text-danger"> *</span></label> <input type="text" id="name" name="name" placeholder="" value="{{ old('name') }}"> </div>
                    </div>
                    <div class="row justify-content-between text-left">
                        <div class="form-group col-sm-6 flex-column d-flex">
                            <label class="form-control-label px-3">{{ GoogleTranslate::trans('Status', app()->getLocale()) }}<span class="text-danger"> *</span></label>
                            <select id="status" name="status" class="form-control select" style="width: 100%;">
                              <option value="admin">{{ GoogleTranslate::trans('Admin', app()->getLocale()) }}</option>
                              <option value="pegawai">{{ GoogleTranslate::trans('Employee', app()->getLocale()) }}</option>
                            </select>
                        </div>
                        <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label px-3">{{ GoogleTranslate::trans('Tanggal Lahir', app()->getLocale()) }}<span class="text-danger"> *</span></label> <input type="date" id="tglLahir" name="tglLahir" placeholder="" value="{{ old('tglLahir') }}"> </div>
                    </div>
                    <div class="row justify-content-between text-left">
                        <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label px-3">{{ GoogleTranslate::trans('Foto Profil', app()->getLocale()) }}</label> <input type="file" id="foto" name="foto" placeholder="" > </div>
                          <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label px-3">{{ GoogleTranslate::trans(' Alamat Email', app()->getLocale()) }}<span class="text-danger"> *</span></label> <input type="email" id="email" name="email" placeholder="" value="{{ old('email') }}"> </div>
                    </div>
                    <div class="row justify-content-end">
                        <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label px-3">{{ GoogleTranslate::trans('Kata Sandi', app()->getLocale()) }}<span class="text-danger"> *</span></label> <input type="password" id="password" name="password" placeholder="" > </div>
                    </div>
                    <div class="row justify-content-end">
                        <div class="form-group col-sm-6"> <button type="submit" class="btn-block btn-primary">{{ GoogleTranslate::trans('Tambah', app()->getLocale()) }}</button> </div>
                    </div>
                </form>
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