@extends('admin.master')
@section('title', 'Admin | Ứng Cử Viên')

@section('breadcrub')
<div class="row mb-2">
	<div class="col-sm-6">
		<h1 class="m-0 text-dark">Tất Cả Ứng Viên</h1>
	</div><!-- /.col -->
	<div class="col-sm-6">
		<ol class="breadcrumb float-sm-right">
			<li class="breadcrumb-item fix-breadcrumb"><a href="{{route('show-user')}}"><i class="fas fa-home"></i></a></li>
			<li class="breadcrumb-item fix-breadcrumb"><a href="{{route('show-candidate')}}">Ứng Viên</a></li>
			<li class="breadcrumb-item fix-breadcrumb active">List Candidate</li>
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
										<option value="{{config('constant.send')}}"
										@if(isset($selectcandidate) &&($selectcandidate == config('constant.send')))
										selected 
										@endif
										>Đang xem xét</option>

									<option value="{{config('constant.success')}}"
									@if(isset($selectcandidate) && ($selectcandidate == config('constant.success')))
									selected 
									@endif
									>Đã chọn</option>

								<option value="{{config('constant.deny')}}"
									@if(isset($selectcandidate) && ($selectcandidate == config('constant.deny')))
									selected 
									@endif
									>Từ chối</option>
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
							<th>Số Điện Thoại</th>
							<th>Vị Trí</th>
							<th>Trạng thái</th>
							<th style="width: 150px;">Tùy Chọn</th>
						</tr>
					</thead>
					<tbody>
						@foreach( $listCandidate as $key => $candidate)
						<tr style="height: 60px">
							<td> {{ ++$key + ($listCandidate->currentPage()-1)*config('constant.paginate') }} </td>
							<td> {{ $candidate->fullname}} </td>
							<td> {{ $candidate->phone}} </td>
							<td> {{ $candidate->recruitment }} </td>

							<td>
								@if ($candidate->status == config('constant.send'))
								<span class="badge bg-primary">Đang xem xét </span>
								@elseif($candidate->status == config('constant.success'))
								<span class="badge bg-danger">Đã chọn</span> 
								@else
								<span class="badge bg-danger">Từ chối</span>	
								@endif 
							</td>
							<td>
								@if($candidate->status == config('constant.send'))
								<a href="{{route('edit-candidate',$candidate->id)}}"><button class="btn btn-warning">Xem chi tiết</button></a>
								@endif
								@if( Auth::user()->role == config('constant.superadmin') && ($candidate->status == config('constant.deny')))
								<button type="button" class="btn btn-danger delete-item" data-toggle="modal" data-target="#delete" data-name="{{$candidate->fullname}}" data-id="{{ $candidate->id }}">Xóa</button>
								@endif
							</td>

						</tr>
						@endforeach
					</tbody>
				</table>
				<br>
				{{ $listCandidate->withQueryString()->links() }}
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