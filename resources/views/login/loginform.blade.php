
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Hệ Thống Training | Login</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('css/font-awesome.min.css')}}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="{{asset('css/ionicons.min.css')}}">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="{{asset('css/icheck-bootstrap.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('css/adminlte.min.css')}}">
  {{-- main css --}}
  <link rel="stylesheet" href="{{asset('css/main.css')}}">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="{{url('/')}}"><b>HỆ THỐNG TRAINING</b></a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">LOGIN</p>

      <form action="{{route('user-login')}}" method="post">
        @csrf
        @if(session('mess'))
              <div style="color:red; margin-bottom: 15px; text-align: center;">{{ session('mess') }}</div>
            @endif
        <div class="input-group"  
          @error('email')
            style="border: 1px solid red; color:red;"
          @enderror>
          <input type="text" class="form-control" placeholder="Nhập Email" name="email" value="{{old('email')}}">
        </div>
        <div class="col-12">
          @error('email')
            <div style="color:red;">{{ $message }}</div>
          @enderror
        </div>
        <br>
        <div class="input-group"
          @error('password')
            style="border: 1px solid red"
          @enderror>
          <input type="password" class="form-control" placeholder="Nhập Mật Khẩu Từ 6 ký tự" name="password">         
        </div>
        <div class="col-12">
          @error('password')
            <div style="color:red; ">{{ $message }}</div>
          @enderror
        </div>
        <br>
        <div class="row">
          
          <!-- /.col -->
          <div class="col-12">
            <button type="submit" class="btn btn-primary btn-block">Đăng nhập</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="{{asset('js/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('js/bootstrap.bundle.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('js/adminlte.min.js')}}"></script>

</body>
</html>
