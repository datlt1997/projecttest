@extends('admin.master')

@section('title','Admin | List User')

@section('main-content')
<!-- Content Header (Page header) -->
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Tất cả thành viên</h1>
      </div>
    </div>
  </div><!-- /.container-fluid -->
</section>
<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-header">
        <button class="btn btn-success">
          <a href="{{route('add-user')}}" >Thêm mới</a>
        </button> 

        <div class="card-tools">

          <form class="form-inline ml-3" action="{{route('search-user')}}" method="get">
            <div class="input-group input-group-sm fix-border">
              <input class="form-control form-control-navbar" type="search" placeholder="Tìm Kiếm" name="keyword" 
              @if(isset($keyword))
              value="{{$keyword}}" 
              @endif
              >
            </div>
            <div class="input-group input-group-sm">
              <select name="selectUser" id="box-select-user">
                <option value="{{config('constant.selectall')}}">Tất Cả</option>
                <option value="{{config('constant.active')}}"
                @if(isset($selectUser))
                @if($selectUser == config('constant.active'))
                selected 
                @endif
                @endif
                >
                Active 
              </option>
              <option value="{{config('constant.inactive')}}"
              @if(isset($selectUser))
              @if($selectUser == config('constant.inactive'))
              selected 
              @endif
              @endif
              >
              Inactive
            </option>
          </select>
        </div>
        <button class="edit-button" type="submit"> Tìm</button>
      </form>
    </div>
  </div>
  <!-- /.card-header -->
  <div class="card-body table-responsive p-0" style="min-height: 300px;">
    <table class="table table-head-fixed text-nowrap">
      <thead>
        <tr>
          <th>ID</th>
          <th>Tên</th>
          <th>Email</th>
          <th>Địa Chỉ</th>
          <th>Quyền</th>
          <th>Trạng Thái</th>
          <th colspan="2">Tùy Chọn</th>
        </tr>
      </thead>
      <tbody>
        @foreach( $list_user as $key => $user)
        <tr>
          <td> {{ $user->id }} </td>
          <td> {{ $user->name }} </td>
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
            @else
            <span class="badge bg-danger">Khóa</span>
            @endif 
          </td>
          @if( Auth::user()->role < $user->role)
          <td><button class="btn btn-warning"> <a href="{{route('edit-user',$user->id)}}"> Sửa</a></button>
            <button type="button" class="btn btn-danger delete-product" data-toggle="modal" data-target="#delete" data-name="{{$user->name}}" data-id="{{ $user->id }}">Xóa</button>
          </td>
          @else
          <td>N/A</td>
          @endif
        </tr>
        @endforeach
      </tbody>
    </table>
    {{$list_user->links()}}
  </div>
  <!-- /.card-body -->
</div>
<!-- /.card -->
</div>
</div>
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

        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
@endsection