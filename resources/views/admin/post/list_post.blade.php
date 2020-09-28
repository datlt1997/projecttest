@extends('admin.master')
@section('title', 'Admin | List Post')
@section('main-content')
<!-- Content Header (Page header) -->
<section class="content-header">
	<div class="container-fluid">
		<div class="row mb-2">
			<div class="col-xs-6">
				<h1>Tất cả bài viết</h1>
			</div>
		</div>
	</div>
</section>
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
										<option value="{{config('constant.selectall')}}">Tất Cả</option>
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
							<td>{{ $post->user->name}}</td>
							<td>
								@if( $post->status == config('constant.active'))
								<span class="badge bg-primary">Xuất Bản</span>
								@else
								<span class="badge bg-danger">Đang Duyệt</span>
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
@endsection