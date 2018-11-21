@extends('master')
@section('title', 'Books')
@section('content')
<div class="inner-header">
		<div class="container">
			<div class="pull-left">
				<h6> ĐẶT HÀNG</h6>
			</div>
			
			<div class="pull-right">
				<div class="beta-breadcrumb">
					<a href="{{ route('trang-chu') }}">Trang chủ</a> / <span>Đặt hàng</span>
				</div>
			</div>
			<div class="clearfix"></div>
		</div>
		<hr>
	</div>
	
	<div class="container">
		<div id="content">
		@if(Session::has('thongbao'))
			<center><h6>{{Session::get('thongbao')}}
				<p>Đặt hàng thành công! Vui lòng chờ trong ít phút,chúng tôi sẽ gọi điện ngay cho bạn xác nhận! vui lòng chú ý điện thoại! 
				<p>Hãy quay về <a href="{{ route('trang-chu') }}" style="color: #ff9933"><b>Trang chủ</b></a> để tiếp tục mua hàng!
				</h6></center>
		@else
			<form action="{{ route('dat-hang') }}" method="post" class="beta-form-checkout">
				<input type="hidden" name="_token" value="{{csrf_token()}}">
					<div class="row">
						<div class="col-sm-6">
							<h4><CENTER>Thông tin khách hàng</CENTER></h4>
							<div class="space20">&nbsp;</div>
							<hr>

							<div class="form-block">
								<label for="name">Họ tên*</label>
								<input type="text" id="full_name" name="full_name" placeholder="Họ tên" value="@if(Auth::check()){{Auth::user()->full_name}}@endif" required>
							</div>
							<div class="form-block">
								<label>Giới tính </label>
								<input id="gender" type="radio" class="input-radio" name="gender" value="nam" @if(Auth::check() && Auth::user()->gender === 'Nam') checked = ""  @endif style="width: 10%"><span style="margin-right: 10%">Nam</span>
								<input id="gender" type="radio" class="input-radio" name="gender" value="nữ" @if(Auth::check() && Auth::user()->gender === 'Nữ') checked = ""  @endif style="width: 10%"><span>Nữ</span>
											
							</div>

							<div class="form-block">
								<label for="email">Email*</label>
								<input type="email" id="email" name="email" required placeholder="Email của bạn" value="@if(Auth::check()){{Auth::user()->email}}@endif">
							</div>

							<div class="form-block">
								<label for="adress">Địa chỉ*</label>
								<input type="text" id="adress" name="address" placeholder="Địa chỉ của bạn" value="@if(Auth::check()){{Auth::user()->address}}@endif" required>
							</div>
							

							<div class="form-block">
								<label for="phone">Điện thoại*</label>
								<input type="text" id="phone" name="phone" value="@if(Auth::check()){{Auth::user()->phone}}@endif" required>
							</div>
							
							<div class="form-block">
								<label for="notes">Ghi chú</label>
								<textarea id="notes" name="note"></textarea>
							</div>
						</div>
						<div class="col-sm-6">
							<div class="your-order">
								<div class="your-order-head"><h5>Đơn hàng của bạn</h5></div>
								<div class="your-order-body" style="padding: 0px 10px">
								@if(Session::has('cart'))
									<div class="your-order-item">
									@foreach($product_cart as $product)
										<div>
										<!--  one item	 -->
											<div class="media">
												<img width="25%" src="source/image/product/{{$product['item']['image']}}" alt="" class="pull-left">
												<div class="media-body">
													<p class="font-large">{{$product['item']['name']}}</p>
													<span class="color-gray your-order-info">Đơn giá:
													@if($product['item']['promotion_price'] != 0)
														{{number_format($product['item']['promotion_price'])}} đồng
													@else
														{{number_format($product['item']['unit_price'])}} đồng 
													@endif
													</span>
													<span class="color-gray your-order-info">Số lượng: {{$product['qty']}} chiếc</span>
												</div>
											</div>
										<!-- end one item -->
										</div>
										<div class="clearfix"></div>
									@endforeach
									</div>
									<!-- @if(Auth::check())
										<br>
										<p style="font-size: 18px">Số xu tích trữ của bạn: <i>{{Auth::user()->coin_point}}</i> xu. Sử dụng xu để được giảm giá hoặc tích trữ cho lần sau. Sử dụng?</p>
										<br>
										<div>
											<input id="use_coin" type="radio" class="input-radio" name="use_coin" value="yes" style="width: 10%"><span style="margin-right: 10%">Có</span>
											<input id="use_coin" type="radio" class="input-radio" name="use_coin" value="no" checked="" style="width: 10%"><span style="margin-right: 10%">Không</span>
										</div>
									@endif -->
									<br>
									<div class="your-order-item">
										<div class="pull-left"><p class="your-order-f18"><b>Tổng tiền:</b></p></div>
										<div class="pull-right"><h5 class="color-black">{{number_format(Session('cart')->totalPrice)}} đồng</h5></div>
										<div class="clearfix"></div>
										@if(Auth::check())
										<div class="pull-left"><p class="your-order-f18"><b>Nếu dùng xu:</b></p></div>
										<div class="pull-right"><h5 class="color-black">- {{number_format(Auth::user()->coin_point*10)}} đồng</h5></div>
										<div class="clearfix"></div>
										<div class="pull-left"><p class="your-order-f18"><b>Còn lại:</b></p></div>
										<div class="pull-right"><h5 class="color-black">{{number_format(Session('cart')->totalPrice - Auth::user()->coin_point*10)}} đồng</h5></div>
										<div class="clearfix"></div>
										@endif
									</div>
								@endif
								</div>
								<div class="your-order-head"><h5>Hình thức thanh toán</h5></div>
								
								<div class="your-order-body">
									<ul class="payment_methods methods">
										<li class="payment_method_bacs">
											<input id="payment_method_bacs" type="radio" class="input-radio" name="payment_method" value="COD" checked="checked" data-order_button_text="">
											<label for="payment_method_bacs">Thanh toán khi nhận hàng </label>
											<div class="payment_box payment_method_bacs" style="display: block;">
												Cửa hàng sẽ gửi hàng đến địa chỉ của bạn, bạn xem hàng rồi thanh toán tiền cho nhân viên giao hàng
											</div>						
										</li>

										<li class="payment_method_cheque">
											<input id="payment_method_cheque" type="radio" class="input-radio" name="payment_method" value="ATM" data-order_button_text="">
											<label for="payment_method_cheque">Chuyển khoản </label>
											<div class="payment_box payment_method_cheque" style="display: none;">
												Chuyển tiền đến tài khoản sau:
												<br>- Số tài khoản: 123 456 789
												<br>- Chủ TK: Nguyễn A
												<br>- Ngân hàng ACB, Chi nhánh TPHCM
											</div>						
										</li>
										
									</ul>
								</div>

								<div class="text-center"><button type="submit" class="beta-btn primary">Đặt hàng <i class="fa fa-chevron-right">
								</i></button></div>
							</div> <!-- .your-order -->
						</div>
					</div>
				</form>
			</div> <!-- #content -->			
		@endif	
	</div> <!-- .container -->
@endsection