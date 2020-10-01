@extends('admin.master')
@section('title' ,'Admin | Edit Candidate')

@section('breadcrub')
<div class="row mb-2">
	<div class="col-sm-6">
		<h1 class="m-0 text-dark">Xem chi tiết ứng viên</h1>
	</div><!-- /.col -->
	<div class="col-sm-6">
		<ol class="breadcrumb float-sm-right">
			<li class="breadcrumb-item fix-breadcrumb"><a href="{{route('show-user')}}"><i class="fas fa-home"></i></a></li>
			<li class="breadcrumb-item fix-breadcrumb"><a href="{{route('show-candidate')}}">Candidate</a></li>
			<li class="breadcrumb-item fix-breadcrumb active">Chọn ứng viên</li>
		</ol>
	</div><!-- /.col -->
</div>
@endsection
@section('main-content')

<!-- Main content -->
<section class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-3">
				<!-- Profile Image -->
				<div class="card card-primary card-outline">
					<div class="card-body box-profile">

						<h3 class="profile-username text-center">{{$editCandidate['fullname']}}</h3>

						<p class="text-muted text-center">{{$editCandidate['phone']}}</p>

						<ul class="list-group list-group-unbordered mb-3">
							<li class="list-group-item">
								<b>Ngày sinh:</b> <a class="float-right">{{$editCandidate['date']}}/{{$editCandidate['month']}}/{{$editCandidate['year']}}</a>
							</li>
							<li class="list-group-item">
								<b>Vị trí ứng tuyển:</b> <a class="float-right">{{$editCandidate['recruitment']}}</a>
							</li>
							<li class="list-group-item">
								<b>Ngôn ngữ lập trình Yêu thích:</b> <a class="float-right">{{$editCandidate['language']}}</a>
							</li>
							<li class="list-group-item">
								<b>Mức lương:</b> <a class="float-right">{{$editCandidate['income']}}</a>
							</li>
						</ul>
					</div>
					<!-- /.card-body -->
				</div>
				<!-- /.card -->

				<!-- skill Box -->
				<div class="card card-primary">
					<div class="card-header">
						<h3 class="card-title">Skills</h3>
					</div>
					<!-- /.card-header -->
					<div class="card-body">
						<strong><i class="fas fa-book mr-1"></i>Kĩ năng chuyên môn</strong>
						<p class="text-muted">{{$editCandidate['technical']}}</p>
						<hr>
						<strong><i class="fas fa-map-marker-alt mr-1"></i>Kỹ năng đặc biệt</strong>
						<p class="text-muted">{{$editCandidate['specialskill']}}</p>
						<hr>
						<strong><i class="fas fa-pencil-alt mr-1"></i> Thành tích đạt được</strong>

						<p class="text-muted">
							<p class="text-muted">{{$editCandidate['achievement']}}</p>
						</p>

						<hr>

						<strong><i class="far fa-file-alt mr-1"></i> Mục Tiêu Cụ Thể</strong>

						<p class="text-muted">-6 tháng : {{$editCandidate['sixmonth']}}</p>
						<p class="text-muted">-1 năm: {{$editCandidate['oneyear']}}</p>
						<p class="text-muted">-3 năm: {{$editCandidate['threeyear']}}</p>
					</div>
					<!-- /.card-body -->
				</div>
				<!-- /.card -->
			</div>
			<!-- /.col -->


			<div class="col-md-9">
				<div class="card">
					<div class="card card-primary">
						<div class="card-header">
							<h3 class="card-title">Other</h3>
						</div>
						<!-- /.card-header -->
						<div class="card-body">
							<strong><i class="fas fa-book mr-1"></i>Project</strong>

							<p class="text-muted">
								{{$editCandidate['project']}}
							</p>

							<hr>
							<strong><i class="far fa-bookmark mr-1"></i>File CV</strong>
							<hr>
							<iframe src="{{asset('Upload/CV/'. $editCandidate['filepdf'])}}" style="width:100%; height:700px;" frameborder="0"></iframe>
							
						</div>
						<!-- /.card-body -->

					</div>
					<form action="{{route('update-candidate', $editCandidate->id)}}" method="post">
						@csrf
						@method('put')
						<div class="card-body">
							@if(Auth::user()->role == config('constant.superadmin'))
							<strong><i class="fas fa-book mr-1"></i>Trạng Thái</strong>
							<div class="form-group mt-1">
								<div class="row">
									<div class="col-xs-4">
										<div class="form-check">
											<input type="radio" id="Admin" name="status" value="{{config('constant.send')}}" checked >
											<label for="Admin">Đang Duyệt</label><br>
										</div>
									</div>
									<div class="col-xs-4">
										<div class="form-check">
											<input type="radio" id="User" name="status" value="{{config('constant.success')}}">
											<label for="User">Đã Chọn</label><br>
										</div>
									</div>
									<div class="col-xs-4">
										<div class="form-check">
											<input type="radio" id="User" name="status" value="{{config('constant.deny')}}">
											<label for="User">Từ Chối</label><br>
										</div>
									</div>
								</div>            
							</div>
							@endif
							<div class="row">
								<!-- /.col -->
								<div class="col-sx-6">
									<button type="submit" class="btn btn-primary btn-block">Hoàn Thành</button>
								</div>
								<!-- /.col -->
							</div>
						</div>
					</form>
				</div><!-- /.card-body -->
			</div>
			<!-- /.nav-tabs-custom -->
		</div>
	</div>
</section>
<!-- /.content -->


@endsection