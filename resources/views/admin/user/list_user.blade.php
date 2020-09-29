@extends('admin.master')

@section('title','Admin | List User')

@section('breadcrub')
<div class="row mb-2">
  <div class="col-sm-6">
    <h1 class="m-0 text-dark">Add User</h1>
  </div><!-- /.col -->
  <div class="col-sm-6">
    <ol class="breadcrumb float-sm-right">
      <li class="breadcrumb-item fix-breadcrumb"><a href="{{route('show-user')}}"><i class="fas fa-home"></i></a></li>
      <li class="breadcrumb-item fix-breadcrumb"><a href="{{route('show-user')}}">User</a></li>
      <li class="breadcrumb-item fix-breadcrumb active">List User</li>
    </ol>
  </div><!-- /.col -->
</div>
@endsection

@section('main-content')
<!-- Content Header (Page header) -->

<!-- /.container-fluid -->
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-xs-12 col-md-12">
        <div class="card">
          <div class="card-header">
            <button class="btn btn-success">
              <a href="{{route('add-user')}}" >Thêm mới</a>
            </button> 

            <div class="card-tools">

              <form class="form-inline ml-3" method="get" action="{{route('search-user')}}">
                <div class="input-group input-group-sm fix-border">
                  <input class="form-control form-control-navbar" type="search" placeholder="Tìm Kiếm" name="keyword"
                  @if(isset($keyword))
                  value="{{$keyword}}" 
                  @endif
                  >
                </div>
                <div class="input-group input-group-sm">
                  <select name="selectUser" id="box-select-user">
                    <option value="">Tất Cả</option>
                    <option value="{{config('constant.active')}}"
                    @if(isset($selectUser))
                    @if($selectUser == config('constant.active'))
                    selected 
                    @endif
                    @endif
                    >
                  Active</option>
                  <option value="{{config('constant.inactive')}}"
                  @if(isset($selectUser))
                  @if($selectUser == config('constant.inactive'))
                  selected 
                  @endif
                  @endif
                  >
                Inactive</option>
              </select>
            </div>
            <button class="edit-button" type="submit"> Tìm</button>
          </form>
        </div>
      </div>
      <!-- /.card-header -->
      <div class="card-body">
        <table class="table table-bordered">
          <thead>                  
            <tr>
              <th>ID</th>
              <th>Tên</th>
              <th>UserName</th>
              <th>Avatar</th>
              <th>Email</th>
              <th>Địa Chỉ</th>
              <th>Quyền</th>
              <th style="width: 100px;">Trạng Thái</th>
              <th style="width: 150px;">Tùy Chọn</th>
            </tr>
          </thead>
          <tbody>
            {{-- {{$i = $listUser->currentPage()}} --}}
            @foreach( $listUser as $key => $user)
            {{-- @if($user->role > Auth::user()->role) --}}
            <tr style="height: 60px">
              <td> {{ ++$key + ($listUser->currentPage()-1)*config('constant.paginate') }}</td>
              <td> {{ $user->name }} </td>
              <td> {{ $user->username }} </td>
              <td> <img src="{{asset('images/Admin/avatar/'.$user->avatar)}}" style="width: 100px;"> </td>
              <td> {{ $user->email }} </td>
              <td> {{ $user->address }} </td>
              <td>
                @if( $user->role == config('constant.superadmin'))
                @if(Auth::user()->role == config('constant.superadmin'))
                Super Admin
                @else
                @endif
                @elseif( $user->role == config('constant.admin'))
                Admin
                @else
                User
                @endif
              </td>
              <td>
                @if( $user->status == config('constant.active'))
                <span class="badge bg-primary">Hoạt Động</span>

                {{-- <span type="button" class="btn btn-block btn-outline-warning btn-xs change-item" data-toggle="modal" data-target="#change-status" data-name-status="Hoạt Động" data-id-status="{{ $user->id }}">Khóa</span> --}}

                <button type="button" class="btn btn-block btn-outline-warning btn-xs change-status" data-toggle="modal" data-target="#change-status" data-name-status="{{config('constant.lock')}}" data-id-status="{{ $user->id }}">Khóa</button>
                @else
                <span class="badge bg-danger">Khóa</span>

 {{--                <span type="button" class="btn btn-block btn-outline-warning btn-xs change-status" data-toggle="modal" data-target="#change-status" data-name-status="Khóa" data-id-status="{{ $user->id }}">Hoạt Động</span> --}}

                <button type="button" class="btn btn-block btn-outline-warning btn-xs change-status" data-toggle="modal" data-target="#change-status" data-name-status="{{config('constant.unlock')}}" data-id-status="{{ $user->id }}">Hoạt Động</button>
                @endif 
              </td>
              @if( Auth::user()->role < $user->role)
              <td><a href="{{route('edit-user',$user->id)}}"><button class="btn btn-warning">Sửa</button></a>
                <button type="button" class="btn btn-danger delete-item" data-toggle="modal" data-target="#delete" data-name="{{$user->name}}" data-id="{{ $user->id }}">Xóa</button>
              </td>
              @else
              <td>N/A</td>
              @endif
            </tr>
            {{-- @endif --}}
            @endforeach
          </tbody>
        </table>
        <br>
        {!! $listUser->render('vendor.pagination.bootstrap-4') !!}
      </div>
    </div>
  </div>
</div>
</div>
</section>
<div class="modal fade" id="delete" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Xóa User</h4>
      </div>
      <div class="modal-body">
        <p id="delete-name">Bạn thật sự muốn xóa người này?</p>
      </div>
      <div class="modal-footer">
        <form action = '' method="post" id="delete-modal">
          @csrf
          @method('delete')
          <button class="btn btn-danger delete-modal" type="submit"> Xóa</button>
        </form>

        <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
      </div>
    </div>

  </div>
</div>
<div class="modal fade" id="change-status" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Thay Đổi Trạng Thái Người Dùng</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p id="status-name"></p>
      </div>
      <div class="modal-footer">
        <form action = '' method="post" id="change-status-form">
          @csrf
          @method('put')
          <button type="submit" class="btn btn-primary">Lưu Thay Đổi</button>
        </form>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
      </div>
    </div>
  </div>
</div>
@endsection