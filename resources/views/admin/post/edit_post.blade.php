@extends('admin.master')
@section('title' ,'Admin | Edit Post')

@section('main-content')
<!-- Content Wrapper. Contains page content -->
<!-- Content Header (Page header) -->
<section class="content-header">
	<div class="container-fluid">
		<div class="row mb-2">
			<div class="col-sm-12">
				<h1>Sửa Bài Viết</h1>
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
						<h3 class="card-title">Sửa Bài Viết</h3>
					</div>
					<!-- /.card-header -->
					<!-- form start -->
					<div class="row">
						<div class="col-md-12">
							<form action="{{route('update-post', $editPost->id)}}" method="post">
								@csrf
								@method('put')
								<div class="card-body">

									<div class="form-group">
										<label for="exampleInputEmail1">Tiêu Đề</label>
										<input type="text" class="form-control" placeholder="Vui lòng nhập tên" name="title" value="{{$editPost->title}}">
										@error('name')
										<div style="color:red;">{{ $message }}</div>
										@enderror
									</div>  
									<section class="content">
										<div class="row">
											<div class="col-md-12">
												<div class="card card-outline card-info">
													<div class="card-header">
														<h3 class="card-title">
															Nội Dung Bài Viết
														</h3>
														<!-- tools box -->
														<div class="card-tools">
															<button type="button" class="btn btn-tool btn-sm" data-card-widget="collapse" data-toggle="tooltip"
															title="Collapse">
															<i class="fas fa-minus"></i></button>
															<button type="button" class="btn btn-tool btn-sm" data-card-widget="remove" data-toggle="tooltip"
															title="Remove">
															<i class="fas fa-times"></i></button>
														</div>
														<!-- /. tools -->
													</div>
													<!-- /.card-header -->
													<div class="card-body pad">
														<div class="mb-3">
															<textarea class="textarea" placeholder="Place some text here" name="content"
															style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">{{$editPost->content}}</textarea>
														</div>
														<p class="text-sm mb-0">
														</div>
													</div>
												</div>
												<!-- /.col-->
											</div>
											<!-- ./row -->
										</section> 
										@if(Auth::user()->role == config('constant.superadmin') )
										<div class="form-group">
											<label for="exampleInputPassword1">Trạng Thái</label>
											<div class="form-check">
												<input type="radio" id="Active" name="status" value="{{config('constant.active')}}"  
												@if($editPost->status == config('constant.active'))
												checked 
												@endif
												>
												<label for="Active">Xuất Bản</label><br>
											</div>
											<div class="form-check">
												<input type="radio" id="Inactive" name="status" value="{{config('constant.inactive')}}"
												@if($editPost->status == config('constant.inactive'))
												checked 
												@endif
												>
												<label for="Inactive">Đang Duyệt</label><br>
											</div>
											@error('status')
											<div style="color:red;">{{ $message }}</div>
											@enderror
										</div>   
										@endif      
										<div class="row">
											<!-- /.col -->
											<div class="col-12 fix-button">
												<button type="submit" class="btn btn-primary btn-block">Thêm Bài Viết</button>
											</div>
											<!-- /.col -->
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