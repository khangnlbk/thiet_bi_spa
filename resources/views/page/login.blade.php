@extends('master')
@section('content')
	<div class="inner-header">
		<div class="container">
			<div class="pull-left">
				<h6 class="inner-title">Đăng nhập</h6>
			</div>
			<div class="pull-right">
				<div class="beta-breadcrumb">
					<a href="{{ route('trang-chu') }}">Trang chủ</a> / <span>Đăng nhập</span>
				</div>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
	
	<div class="container">
		<div id="content">
			@if(count($errors) > 0)
				<div class="alert alert-danger">
				@foreach($errors->all() as $err)
					{{$err}}<br>
				@endforeach
				</div>
			@endif
			@if(Session::get('flag') === 'danger')
				<div class="row alert alert-danger">{{Session::get('message')}}</div> 
			@endif
			@if(Session::get('flag') === 'success')
				<div class="row alert alert-success">{{Session::get('message')}}</div> 
			@else
			<form action="{{ route('dang-nhap') }}" method="post" class="beta-form-checkout">
			<input type="hidden" name="_token" value="{{csrf_token()}}">
				<div class="row">
					<div class="col-sm-3"></div>
					<div class="col-sm-6">
						<h4>Đăng nhập</h4>
						<div class="space20">&nbsp;</div>
						
						<div class="form-block">
							<label for="email">Email*</label>
							<input type="email" id="email" name="email" required>
						</div>
						<div class="form-block">
							<label for="phone">Mật khẩu*</label>
							<input type="password" id="phone" name="password" required>
						</div>
						<div class="form-block">
							<button type="submit" name="submit" class="btn btn-primary">Đăng nhập</button>
						</div>
					<div class="col-sm-3"></div>
				</div>
			</form>
			@endif
		</div> <!-- #content -->
	</div> <!-- .container -->
@endsection