@extends('user.home')
@section('title', 'Register Form')

@section('content')

<!-- Content Header (Page header) -->

<!-- Main content -->
<section class="content">
	<div class="container-fluid">
		<div class="row">
			<!-- left column -->
			<div class="col-md-12">
				<!-- general form elements -->
				<div class="card card-primary">
					<div class="card-header">
						<h3 class="card-title">Thông Tin Cá Nhân</h3>
					</div>
					<!-- /.card-header -->
					<!-- form start -->
					<form role="form" action="{{route('register')}}" method="post" enctype="multipart/form-data">
						@csrf
						<div class="card-body">
							<div class="form-group">
								<label for="inputName">Họ Và Tên</label>
								<input type="text" class="form-control" name="fullname" value="{{old('fullname')}}" id="inputName" placeholder="Nhập tên đầy đủ của bạn">
							</div>
							<div class="form-group">
								<label>Ngày Tháng Năm Sinh</label>

								<div class="row">
									<div class="col-4">
										<input type="text" class="form-control" name="date" value="{{old('date')}}" placeholder="Nhập Ngày">
									</div>
									<div class="col-4">
										<input type="text" class="form-control" name="month" value="{{old('month')}}" placeholder="Nhập Tháng">
									</div>
									<div class="col-4">
										<input type="text" class="form-control" name="year" value="{{old('year')}}" placeholder="Nhập Năm">
									</div>
								</div>
							</div>
							<div class="form-group">
								<label for="inputphone">Số điện thoại</label>
								<input type="text" class="form-control" id="inputphone" name="phone" value="{{old('phone')}}" placeholder="Vui lòng nhập số điện thoại">
							</div>
							<div class="form-group">
								<label for="inputrecruitment">Vị trí ứng tuyển</label>
								<input type="text" class="form-control" id="inputrecruitment" name="recruitment" value="{{old('recruitment')}}" placeholder="Vui lòng nhập vị trí ứng tuyển">
							</div>
							<div class="form-group">
								<label for="inputlanguage">Ngôn ngữ lập trình hay mảng muốn thay đổi</label>
								<input type="text" class="form-control" id="inputlanguage" name="language" value="{{old('language')}}" placeholder="Vui nhập ngôn ngữ lập trình hay mảng muốn thay đổi">
							</div>
							<!-- textarea -->
							<div class="form-group">
								<label for="inputtechnical">Kĩ năng chuyên môn</label>
								<textarea class="form-control" rows="3" id="inputtechnical" name="technical" value="{{old('technical')}}" placeholder="Nhập kỹ năng chuyên môn"></textarea>
							</div>
							<div class="form-group">
								<label for="inputspecialskill">Kĩ năng đăc biệt</label>
								<textarea class="form-control" rows="3" id="inputspecialskill" name="specialskill" value="{{old('specialskill')}}" placeholder="Nhập kỹ năng đặc biệt"></textarea>
							</div>
							<div class="form-group">
								<label for="inputachievement">Thanh tích đạt được</label>
								<textarea class="form-control" rows="3" id="inputachievement" name="achievement" value="{{old('achievement')}}" placeholder="Thành tích đạt được"></textarea>
							</div>
							<div class="form-group">
								<label>Mục tiêu cụ thể</label>
								<textarea class="form-control mb-1" rows="1" name="sixmonth" value="{{old('sixmonth')}}" placeholder="-6 tháng tới"></textarea>
								<textarea class="form-control mb-1" rows="1" name="oneyear" value="{{old('oneyear')}}" placeholder="-1 năm tới"></textarea>
								<textarea class="form-control mb-1" rows="1" name="threeyear" value="{{old('threeyear')}}" placeholder="-3 năm tới"></textarea>
							</div>
							<div class="form-group">
								<label for="inputproject">Phân tích cơ bản về đồ án, dự án tâm huyết đã làm</label>
								<textarea class="form-control" id="inputproject" rows="3" name="project" value="{{old('project')}}" placeholder="Phân tích cơ bản về đồ án, dự án tâm huyết đã làm"></textarea>
							</div>
							<div class="form-group">
								<label for="inputincome">Mức thu nhập mong muốn khi vào công ty</label>
								<input type="text" class="form-control" id="inputincome" name="income" value="{{old('income')}}" placeholder="Nhập mức thu nhập mong muốn">
							</div>
							<div class="input-group mb-3">
								<div class="input-group-prepend">
									<span class="input-group-text"><i class="fas fa-envelope"></i></span>
								</div>
								<input type="text" name="email" value="{{old('email')}}" class="form-control" placeholder="Email của bạn">
							</div>

							<div class="form-group">
								<label for="exampleInputFile">File CV</label>
								<div class="input-group">
									<div class="custom-file">
										<input type="file" class="custom-file-input" name="filepdf" id="exampleInputFile">
										<label class="custom-file-label" for="exampleInputFile">Choose file</label>
									</div>
								</div>
							</div>
						</div>
						<!-- /.card-body -->

						<div class="card-footer">
							<button type="submit" class="btn btn-primary">Submit</button>
						</div>
					</form>
				</div>
				<!-- /.card -->
			</div>
		</div>
	</div>
</section>




@endsection