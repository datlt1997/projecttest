@extends('admin.master')

@section('title')
Admin | Edit User
@endsection

@section('main-content')
<div class="register-box fix-form">
  <div class="card ">
    <div class="card-body register-card-body">
      <p class="login-box-msg">Edit a membership</p>

      <form action="{{route('update-user',$editUser->id)}}" method="post">
        @csrf
        @method('put')
        <div class="input-group fix-input">
          <input type="text" class="form-control" placeholder="Vui lòng nhập tên" name="name" value="{{$editUser->name}}">
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
          <input type="text" class="form-control" placeholder="vui lòng nhập Email" name="email" value="{{$editUser->email}}">
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
          <input type="text" class="form-control" placeholder="Vui lòng nhập địa chỉ" name="address" value="{{$editUser->address}}">
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
          <input type="text" class="form-control" placeholder="Quyền truy cập 2: Admin 3: User" name="role" value="{{$editUser->role}}">
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
        <div class="input-group fix-input">
          <input type="text" class="form-control" placeholder="1:Active 0: Inactive" name="active" value="{{$editUser->active}}">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fab fa-creative-commons-by"></span>
            </div>
          </div>
        </div>
        @error('active')
        <div style="color:red;">{{ $message }}</div>
        @enderror
        <div class="row">
          <!-- /.col -->
          <div class="col-12 fix-button">
            <button type="submit" class="btn btn-primary btn-block">Sửa thông tin</button>
          </div>
          <!-- /.col -->
        </div>
      </form>
    </div>
    <!-- /.form-box -->
  </div><!-- /.card -->
</div>
@endsection