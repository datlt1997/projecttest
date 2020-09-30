@extends('admin.master')
@section('title' ,'Admin | Add Post')

@section('breadcrub')
<div class="row mb-2">
  <div class="col-sm-6">
    <h1 class="m-0 text-dark">Thêm Bài Viết</h1>
  </div><!-- /.col -->
  <div class="col-sm-6">
    <ol class="breadcrumb float-sm-right">
      <li class="breadcrumb-item fix-breadcrumb"><a href="{{route('show-user')}}"><i class="fas fa-home"></i></a></li>
      <li class="breadcrumb-item fix-breadcrumb"><a href="{{route('show-post')}}">Post</a></li>
      <li class="breadcrumb-item fix-breadcrumb active">Add Post</li>
    </ol>
  </div><!-- /.col -->
</div>
@endsection

@section('main-content')
<!-- Main content -->
<section class="content">
	<div class="container-fluid">
		<div class="row">
			<!-- left column -->
			<div class="col-12">
				<!-- general form elements -->
				<div class="card card-primary">
					<div class="card-header">
						<h3 class="card-title">Hãy thêm Bài Viết Mới Vào đây</h3>
					</div>
					<!-- /.card-header -->
					<!-- form start -->
					<div class="row">
						<div class="col-md-12">
							<form action="{{route('save-post')}}" method="post">
								@csrf
								<div class="card-body">

									<div class="form-group">
										<label for="exampleInputEmail1">Tiêu Đề</label>
										<input type="text" class="form-control" placeholder="Vui lòng nhập tên" name="title" value="{{old('title')}}">
										@error('name')
										<div style="color:red;">{{ $message }}</div>
										@enderror
									</div>  
									<input type="hidden" name="status" value="{{config('constant.inactive')}}">   
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
															<textarea class="textarea" placeholder="Place some text here" name="content" value="{{old('content')}}"
															style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
														</div>
														<p class="text-sm mb-0">
													</div>
												</div>
											</div>
											<!-- /.col-->
										</div>
										<!-- ./row -->
									</section>       
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