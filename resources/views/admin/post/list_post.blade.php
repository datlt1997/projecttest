@extends('admin.master')
@section('title', 'Admin | List Post')

@section('breadcrub')
<div class="row mb-2">
	<div class="col-sm-6">
		<h1 class="m-0 text-dark">Tất Cả Bài Viết</h1>
	</div><!-- /.col -->
	<div class="col-sm-6">
		<ol class="breadcrumb float-sm-right">
			<li class="breadcrumb-item fix-breadcrumb"><a href="{{route('show-user')}}"><i class="fas fa-home"></i></a></li>
			<li class="breadcrumb-item fix-breadcrumb"><a href="{{route('show-post')}}">Post</a></li>
			<li class="breadcrumb-item fix-breadcrumb active">List Post</li>
		</ol>
	</div><!-- /.col -->
</div>
@endsection

@section('main-content')

<!-- /.container-fluid -->
<section class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-xs-12 col-md-12">
				<div class="card">
					<div class="card-header">
						<button class="btn btn-success">
							<a href="{{route('add-post')}}" >Thêm mới</a>
						</button> 

						<div class="card-tools">

							<form class="form-inline ml-3" method="get" action="{{route('search-post')}}">
								<div class="input-group input-group-sm fix-border">
									<input class="form-control form-control-navbar" type="search" placeholder="Tìm Kiếm" name="keyword"
									@if(isset($keyword))
									value="{{$keyword}}" 
									@endif
									>
								</div>
								<div class="input-group input-group-sm">
									<select name="selectpost" id="box-select-user">
										<option value="">Tất Cả</option>
										<option value="{{config('constant.active')}}"
										@if(isset($selectpost) &&($selectpost == config('constant.active')))
										selected 
										@endif
										>
									Xuất Bản</option>
									<option value="{{config('constant.inactive')}}"
									@if(isset($selectpost) && ($selectpost == config('constant.inactive')))
									selected 
									@endif
									>
								Đang Duyệt</option>
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
							<th>Tiêu đề</th>
							<th>Nội dung</th>
							<th>Tác giả</th>
							<th>Trạng thái</th>
							<th> Xuất bản</th>
							<th style="width: 150px;">Tùy Chọn</th>
						</tr>
					</thead>
					<tbody>
						@foreach( $listPost as $key => $post)
						<tr style="height: 60px">
							<td> {{ $post->id }} </td>
							<td> {{ $post->title }} </td>
							
							<td> {!! $post->content !!} </td>
							<td> {{ $post->author }} </td>

							<td>
								@if( $post->status == config('constant.active'))
								<span class="badge bg-primary">Xuất bản</span>
								@if((Auth::user()->role == config('constant.superadmin'))||(Auth::user()->role == config('constant.admin')))
								<button type="button" class="btn btn-block btn-outline-warning btn-xs change-status" data-toggle="modal" data-target="#change-status" data-name-status="{{config('constant.wait')}}" data-id-status="{{ $post->id }}">Đang duyệt</button>
								@endif
								@else
								<span class="badge bg-danger">Đang duyệt</span>
								@if((Auth::user()->role == config('constant.superadmin'))||(Auth::user()->role == config('constant.admin')))
								<button type="button" class="btn btn-block btn-outline-warning btn-xs change-status" data-toggle="modal" data-target="#change-status" data-name-status="{{config('constant.publish')}}" data-id-status="{{ $post->id }}">Xuất bản</button>
								@endif
								@endif 
							</td>





							<td>{{ $post->updated_at }}</td>
							<td><a href="{{route('edit-post',$post->id)}}"><button class="btn btn-warning">Sửa</button></a>
								@if( Auth::user()->role == config('constant.superadmin'))
								<button type="button" class="btn btn-danger delete-item" data-toggle="modal" data-target="#delete" data-name="{{$post->title}}" data-id="{{ $post->id }}">Xóa</button>
								@endif
							</td>

						</tr>
						@endforeach
					</tbody>
				</table>
				<br>
				{{ $listPost->withQueryString()->links() }}
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
				<h4 class="modal-title">Xóa Post</h4>
			</div>
			<div class="modal-body">
				<p id="delete-name">Bạn thật sự muốn xóa Bài Viêt Này?</p>
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
<div class="modal fade" id="change-status" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Thay Đổi Trạng Thái Bài Viết</h5>
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