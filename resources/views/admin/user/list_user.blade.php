@extends('admin.master')

@section('title')
	List User
@endsection

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
        <!-- Main content -->
<section class="content">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Đây là danh sách tất cả các thành viên của website</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
            	<button class="btn btn-default">
            		<a href="{{route('add-user')}}" >Thêm thành viên</a>



            	</button>
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>Số Thứ Tự</th>
                  <th>Tên</th>
                  <th>Email</th>
                  <th>Địa Chỉ</th>
                  <th>Quyền</th>
                  <th>Hoạt Động</th>
                  <th colspan="2">Tùy Chọn</th>
                </tr>
                </thead>
                <tbody>
                	@foreach( $list_user as $key => $user)
                <tr>
                  <td> {{ $key+1 }} </td>
                  <td> {{ $user->name }} </td>
                  <td> {{ $user->email }} </td>
                  <td> {{ $user->address }} </td>
                  <td>
                  	@if( $user->role == config('constant.superadmin'))
                  	Super Admin
                  	@elseif( $user->role == config('constant.admin'))
                  	Admin
                  	@elseif( $user->role == config('constant.user'))
                  	User
                  	@else
                  	Old User
                  	@endif
                  </td>
                  <td>
                  	@if( $user->active == config('constant.active'))
                  	Hoạt Động
                  	@else
                  	Không Hoạt Động
                  	@endif 
                  </td>
                  @if( Auth::user()->role < $user->role)
                  <td><button class="button_option"> <a href="{{route('edit-user',$user->id)}}"> Sửa</a></button></td>
                  <td>
                  	<form action = "{{route('delete-user',$user->id)}}" method="post">
                  		@csrf
                  		@method('delete')
                  		<button class="button_option" type="submit"> Xóa</button>
                  	</form>
                  </td>
                  @else
                  <td>N/A</td>
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

          
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
   <!-- /.content -->
@endsection