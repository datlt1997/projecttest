@extends('admin.master')
@section('title', 'Admin | Edit user')
@section('main-content')
<!-- Content Wrapper. Contains page content -->
<!-- Content Header (Page header) -->
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-12">
        <h1>Edit User</h1>
      </div>
    </div>
  </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <!-- left column -->
      <div class="col-12">
        <!-- general form elements -->
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">Edit a new membership</h3>
          </div>
          <!-- /.card-header -->
          <!-- form start -->
          <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
              <form action="{{route('update-user',$editUser->id)}}" method="post">
                @csrf
                @method('put')
                <div class="card-body">

                  <div class="form-group">
                    <label for="exampleInputEmail1">Tên Người Dùng</label>
                    <input type="text" class="form-control" placeholder="Vui lòng nhập tên" name="name" value="{{$editUser->name}}">
                    @error('name')
                    <div style="color:red;">{{ $message }}</div>
                    @enderror
                  </div>                  

                  <div class="form-group">
                    <label for="exampleInputPassword1">Email</label>
                    <input type="text" class="form-control" placeholder="vui lòng nhập Email" name="email" value="{{$editUser->email}}">
                    @error('email')
                    <div style="color:red;">{{ $message }}</div>
                    @enderror
                  </div>
                  

                  <div class="form-group">
                    <label for="exampleInputPassword1">Địa Chỉ</label>
                    <input type="text" class="form-control" placeholder="Vui lòng nhập địa chỉ" name="address" value="{{$editUser->address}}">
                    @error('address')
                    <div style="color:red;">{{ $message }}</div>
                    @enderror
                  </div>
                  

                  @if(Auth::user()->role == config('constant.superadmin'))
                  <div class="form-group">
                    <label for="exampleInputPassword1">Quyền</label>
                    <div class="form-check">
                      <input type="radio" id="Admin" name="role" value="{{config('constant.admin')}}"
                      @if($editUser->role == config('constant.admin'))
                      checked 
                      @endif
                      >
                      <label for="Admin">Admin</label><br>
                    </div>
                    <div class="form-check">
                      <input type="radio" id="User" name="role" value="{{config('constant.user')}}"
                      @if($editUser->role == config('constant.user'))
                      checked 
                      @endif
                      >
                      <label for="User">User</label><br>
                    </div>
                    @else
                    <input type="hidden" name="role" value="{{config('constant.user')}}">
                    @endif
                    @error('role')
                    <div style="color:red;">{{ $message }}</div>
                    @enderror
                  </div>

                  <div class="form-group">
                    <label for="exampleInputPassword1">Trạng Thái</label>
                    <div class="form-check">
                      <input type="radio" id="Active" name="status" value="{{config('constant.active')}}"  
                      @if($editUser->status == config('constant.active'))
                      checked 
                      @endif
                      >
                      <label for="Active">Active</label><br>
                    </div>
                    <div class="form-check">
                      <input type="radio" id="Inactive" name="status" value="{{config('constant.inactive')}}"
                      @if($editUser->status == config('constant.inactive'))
                      checked 
                      @endif
                      >
                      <label for="Inactive">InActive</label><br>
                    </div>
                    @error('status')
                    <div style="color:red;">{{ $message }}</div>
                    @enderror
                  </div>

                  <div class="form-group">
                    <label for="exampleInputFile">Upload Avatar</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" id="exampleInputFile">
                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                      </div>
                      <div class="input-group-append">
                        <span class="input-group-text" id="">Upload</span>
                      </div>
                    </div>
                    @error('avatar')
                    <div style="color:red;">{{ $message }}</div>
                    @enderror
                  </div>

                  <div class="row">
                    <!-- /.col -->
                    <div class="col-12 fix-button">
                      <button type="submit" class="btn btn-primary btn-block">Sửa User</button>
                    </div>
                    <!-- /.col -->
                  </div>
                </div>       
              </div>
            </form>
          </div>
        </div>
      </div>
      <!-- /.card -->
    </div>
  </div>
</div>
</section>

@endsection