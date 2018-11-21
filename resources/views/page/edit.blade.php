@extends('master')
@section('title', 'Edit Information')
@section('content')
	<div class="inner-header">
		<div class="container">
			<div class="pull-left">
				<h6 class="inner-title">Chỉnh sửa thông tin</h6>
			</div>
			<div class="pull-right">
				<div class="beta-breadcrumb">
					<a href="{{ route('trang-chu') }}">Home</a> / <span>Chỉnh sửa thông tin</span>
				</div>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
	
	<div class="container">
		<div id="content">
			
			<form action="{{ route('chinh-sua') }}" method="post" class="beta-form-checkout">
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
					@if(Session::has('sua-that-bai'))
						<div class="alert alert-danger">{{Session::get('sua-that-bai')}}</div>
					@endif
					@if(Session::has('sua-that-bai-2'))
						<div class="alert alert-danger">{{Session::get('sua-that-bai-2')}}</div>
					@endif
					@if(Session::has('sua-thanh-cong'))
						<div class="alert alert-success">{{Session::get('sua-thanh-cong')}}</div>
					@endif
					<div class="col-sm-6">
						<h4>Thông tin của bạn</h4>
						<div class="space20">&nbsp;</div>

						<div class="form-block">
							<label for="your_last_name">Tên đầy đủ*</label>
							<input type="text" id="your_last_name" name="fullname" value="{{Auth::user()->full_name}}" required>
						</div>

						<div class="form-block">
								<label>Giới tính* </label>
								<input id="gender" type="radio" class="input-radio" name="gender" value="Nam" @if( Auth::user()->gender === 'Nam') checked = ""  @endif style="width: 10%"><span style="margin-right: 10%">Nam</span>
								<input id="gender" type="radio" class="input-radio" name="gender" value="Nữ" @if( Auth::user()->gender === 'Nữ') checked = ""  @endif style="width: 10%"><span>Nữ</span>
						</div>

						<div class="form-block">
							<label for="adress">Địa chỉ*</label>
							<input type="text" id="adress" name="address" value="{{Auth::user()->address}}" required>
						</div>


						<div class="form-block">
							<label for="phone">Điện thoại*</label>
							<input type="text" id="phone" name="phone" value="{{Auth::user()->phone}}" required>
						</div>
						<div class="form-block">
							Nếu muốn đổi mật khẩu vui lòng nhập mật khẩu cũ, sau đó nhập mật khẩu mới và nhập lại một lần nữa, nếu không vui lòng để trống!
						</div>
						<div class="form-block">
							<label for="phone">Mật khẩu cũ*</label>
							<input type="password" id="old_password" name="old_password">
						</div>
						<div class="form-block">
							<label for="phone">Mật khẩu mới*</label>
							<input type="password" id="password" name="password">
						</div>
						<div class="form-block">
							<label for="phone">Nhập lại mật khẩu*</label>
							<input type="password" id="re_password" name="re_password">
						</div>
						<div class="form-block">
							<label for="coin">Số xu tích trữ của bạn: {{Auth::user()->coin_point}} xu</label>
						</div>
						<div class="form-block">
							<button type="submit" class="btn btn-primary">Lưu thông tin</button>
						</div>
					</div>
					<div class="col-sm-3"></div>
				</div>
			</form>
		</div> <!-- #content -->
	</div> <!-- .container -->
@endsection