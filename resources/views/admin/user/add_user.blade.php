@extends('admin.master')

@section('title')
Admin | Add User
@endsection

@section('main-content')
<div class="register-box fix-form">
  <div class="card">
    <div class="card-body register-card-body">
      <p class="login-box-msg">Register a new membership</p>

      <form action="{{route('save-user')}}" method="post">
        @csrf
        <div class="input-group fix-input">
          <input type="text" class="form-control" placeholder="Vui lòng nhập tên" name="name" value="{{old('name')}}">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
         @error('name')
            <div style="color:red;">{{ $message }}</div>
          @enderror
        <div class="input-group fix-input">
          <input type="text" class="form-control" placeholder="vui lòng nhập Email" name="email" value="{{old('email')}}">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
         @error('email')
            <div style="color:red;">{{ $message }}</div>
          @enderror
        <div class="input-group fix-input">
          <input type="password" class="form-control" placeholder=" Vui lòng nhập password" name="password" >
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
         @error('password')
            <div style="color:red;">{{ $message }}</div>
          @enderror
        <div class="input-group fix-input">
          <input type="text" class="form-control" placeholder="Vui lòng nhập địa chỉ" name="address" value="{{old('address')}}">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-address-card"></span>
            </div>
          </div>
        </div>
         @error('address')
            <div style="color:red;">{{ $message }}</div>
          @enderror
        @if(Auth::user()->role == 1)
        <div class="input-group fix-input">
          <input type="text" class="form-control" placeholder="Quyền Truy Cập 2:Admin, 3:User" name="role">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
         @error('role')
            <div style="color:red;">{{ $message }}</div>
          @enderror
        @else
          <input type="hidden" name="role" value="{{config('constant.user')}}">
        @endif
        <div class="row fix-button">
          <!-- /.col -->
          <div class="col-12">
            <button type="submit" class="btn btn-primary btn-block">Đăng Ký</button>
          </div>
          <!-- /.col -->
        </div>
      </form>
    </div>
    <!-- /.form-box -->
  </div><!-- /.card -->
</div>
<!-- /.register-box -->
@endsection