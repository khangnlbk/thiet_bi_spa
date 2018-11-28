@extends('master')
@section('title', 'Sign Up')
@section('content')
	<div class="inner-header">
		<div class="container">
			<div class="pull-left">
				<h6 class="inner-title">ĐĂNG KÍ</h6>
			</div>
			<div class="pull-right">
				<div class="beta-breadcrumb">
					<a href="{{ route('trang-chu') }}">Trang chủ</a> / <span>Đăng kí</span>
				</div>
			</div>
			<div class="clearfix"></div>
		</div>
		<hr>
	</div>
	
	<div class="container">
		<div id="content">
			
			<form action="{{ route('dang-ky') }}" method="post" class="beta-form-checkout">
			<input type="hidden" name="_token" value="{{csrf_token()}}">
				<div class="row">
					<div class="col-sm-3"></div>
					@if(count($errors) > 0)
						<div class="alert alert-danger">
						@foreach($errors->all() as $err)
							{{$err}}<br>
						@endforeach
						</div>
					@endif
					@if(Session::has('thanh-cong'))
						<div class="alert alert-success">{{Session::get('thanh-cong')}}</div>
					@endif
					<div class="col-sm-6">
						<h4>Đăng kí</h4>
						<br>
						<div class="space20">&nbsp;</div>
						
						<div class="form-block">
							<label for="email">Địa chỉ email*</label>
							<input type="email" id="email" name="email" required>
						</div>

						<div class="form-block">
							<label for="your_last_name">Tên đầy đủ*</label>
							<input type="text" id="your_last_name" name="fullname" required>
						</div>

						<div class="form-block">
								<label>Giới tính* </label>
								<input id="gender" type="radio" class="input-radio" name="gender" value="Nam" style="width: 10%"><span style="margin-right: 10%">Nam</span>
								<input id="gender" type="radio" class="input-radio" name="gender" value="Nữ" style="width: 10%"><span>Nữ</span>
						</div>

						<div class="form-block">
							<label for="adress">Địa chỉ*</label>
							<input type="text" id="adress" name="address" required>
						</div>


						<div class="form-block">
							<label for="phone">Điện thoại*</label>
							<input type="text" id="phone" name="phone" required>
						</div>
						<div class="form-block">
							<label for="phone">Mật khẩu*</label>
							<input type="password" id="password" name="password" required>
						</div>
						<div class="form-block">
							<label for="phone">Nhập lại mật khẩu*</label>
							<input type="password" id="re_password" name="re_password" required>
						</div>
						<div class="form-block">
							<button type="submit" class="btn btn-primary">Đăng ký</button>
						</div>
					</div>
					<div class="col-sm-3"></div>
				</div>
			</form>
		</div> <!-- #content -->
	</div> <!-- .container -->
@endsection