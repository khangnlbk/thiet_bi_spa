<div id="header">
	<div class="header-top">
		<div class="container">
			<div class="pull-left auto-width-left">
				<ul class="top-menu menu-beta l-inline">
					<li><a href="{{ route('lien-he') }}"><i class="fa fa-home"></i> Phòng 1609, chung cư Rainbow Linh Đàm -Hoàng Mai -Hà Nội</a></li>
					<li><a href="{{ route('lien-he') }}"><i class="fa fa-phone"></i> 090 600 6069</a></li>
				</ul>
			</div>
			<div class="pull-right auto-width-right">
				<ul class="top-details menu-beta l-inline">
					@if(Auth::check())
						@if(Auth::user()->role == 1)
						<li><a href="{{ route('chinh-sua') }}"><i class="fa fa-user"></i>Xin chào Admin</a></li>
						<li><a href="{{ route('backend.home') }}"><i class="fa fa-user"></i>Đến trang Admin</a></li>
						<li><a href="{{ route('dang-xuat') }}">Đăng xuất</a></li>
						@else

						<li><a href="{{ route('chinh-sua') }}"><i class="fa fa-user"></i>Xin chào bạn {{Auth::user()->full_name}}</a></li>
						<li><a href="{{ route('dang-xuat') }}">Đăng xuất</a></li>
						@endif
					@else
					<li><a href="{{ route('dang-ky') }}">Đăng kí</a></li>
					<li><a href="{{ route('dang-nhap') }}">Đăng nhập</a></li>
					@endif
				</ul>
			</div>
			<div class="clearfix"></div>
		</div> <!-- .container -->
	</div> <!-- .header-top -->
	<div class="header-body">
		<div class="container beta-relative">
			<div class="pull-left">
				<a href="{{ route('trang-chu') }}" id="logo"><img src="source/assets/dest/images/logo1.png" width="80px" alt=""></a>
			</div>
			<div class="pull-left">
				<a href="{{ route('trang-chu') }}"><h5> &nbsp&nbsp Havan Group</h5></a>
				<p style="color: green">&nbsp&nbsp&nbspTập đoàn hàng đầu Việt Nam cung cấp giải pháp toàn diện ngành FITNESS</p>
			</div>
			<div class="pull-right beta-components space-left ov">
				<div class="space10">&nbsp;</div>
				<div class="beta-comp">
					<form role="search" method="get" id="searchform" action="{{ route('tim-kiem') }}">
				        <input type="text" value="" name="key" id="s" placeholder="Nhập từ khóa..." />
				        <button class="fa fa-search" type="submit" id="searchsubmit"></button>
					</form>
				</div>

				<div class="beta-comp">
					<div class="cart">
						<div class="beta-select"><i class="fa fa-shopping-cart"></i> Giỏ hàng (@if(Session::has('cart')){{Session('cart')->totalQty}}@else Trống @endif) <i class="fa fa-chevron-down"></i></div>
						<div class="beta-dropdown cart-body">
						@if(Session::has('cart'))
						@foreach($product_cart as $product)
							<div class="cart-item">
								<a class="cart-item-delete" href="{{ route('xoa-gio-hang', $product['item']['id']) }}"><i class="fa fa-times"></i></a>
								<div class="media">
									<a class="pull-left" href="#"><img src="source/image/product/{{$product['item']['image']}}" alt=""></a>
									<div class="media-body">
										<span class="cart-item-title">{{$product['item']['name']}}</span>
										<span class="cart-item-amount">{{$product['qty']}}*<span>
									@if($product['item']['promotion_price'] != 0)
										{{number_format($product['item']['promotion_price'])}} đồng
									@else
										{{number_format($product['item']['unit_price'])}} đồng 
									@endif</span></span>
									</div>
								</div>
							</div>
						@endforeach					
							<div class="cart-caption">
								<div class="cart-total text-right">Tổng tiền: <span class="cart-total-value">{{number_format(Session('cart')->totalPrice)}} đồng</span></div>
								<div class="clearfix"></div>

								<div class="center">
									<div class="space10">&nbsp;</div>
									<a href="{{ route('dat-hang') }}" class="beta-btn primary text-center">Đặt hàng <i class="fa fa-chevron-right"></i></a>
								</div>
							</div>
						@endif	
						</div>
					</div> <!-- .cart -->
				</div>
			</div>
			<div class="clearfix"></div>
		</div> <!-- .container -->
	</div> <!-- .header-body -->
	<div class="header-bottom" style="background-color: #5fbf00;">
		<div class="container">
			<a class="visible-xs beta-menu-toggle pull-right"<span class='beta-menu-toggle-text'>Search</span> <i class="fa fa-bars"></i></a>
			<div class="visible-xs clearfix"></div>
			<nav class="main-menu">
				<ul class="l-inline ov">
					<li><a href="{{route('trang-chu') }}">Trang chủ</a></li>
					<li><a>Thiết bị gia đình</a>
						<ul class="sub-menu">
							<li><a>Xe đạp gia đình</a>
								<ul class="sub-menu">
									@foreach($loai_sp as $value)
										@if($value->category == "Xe đạp gia đình")
										<li><a href="{{route('loai-san-pham', $value->id) }}">{{$value->name}}</a></li>
										@endif
									@endforeach
								</ul>
							</li>
							<li><a>Máy chạy bộ gia đình</a>
								<ul class="sub-menu">
									@foreach($loai_sp as $value)
										@if($value->category == "Máy chạy bộ gia đình")
										<li><a href="{{route('loai-san-pham', $value->id) }}">{{$value->name}}</a></li>
										@endif
									@endforeach
								</ul>
							</li>
							<li><a>Dàn tập tạ đa năng</a>
								<ul class="sub-menu">
									@foreach($loai_sp as $value)
										@if($value->category == "Dàn tập tạ đa năng")
										<li><a href="{{route('loai-san-pham', $value->id) }}">{{$value->name}}</a></li>
										@endif
									@endforeach
								</ul>
							</li>
							<li><a>Máy rung Massage</a>
								<ul class="sub-menu">
									@foreach($loai_sp as $value)
										@if($value->category == "Máy rung Massage")
										<li><a href="{{route('loai-san-pham', $value->id) }}">{{$value->name}}</a></li>
										@endif
									@endforeach
								</ul>
							</li>
						</ul>
					</li>
					<li><a>Thiết bị phòng tập</a>
						<ul class="sub-menu">
							<li><a>Máy chạy phòng tập</a>
								<ul class="sub-menu">
									@foreach($loai_sp as $value)
										@if($value->category == "Máy chạy phòng tập")
										<li><a href="{{route('loai-san-pham', $value->id) }}">{{$value->name}}</a></li>
										@endif
									@endforeach
								</ul>
							</li>
							<li><a>Xe đạp phòng tập</a>
								<ul class="sub-menu">
									@foreach($loai_sp as $value)
										@if($value->category == "Xe đạp phòng tập")
										<li><a href="{{route('loai-san-pham', $value->id) }}">{{$value->name}}</a></li>
										@endif
									@endforeach
								</ul>
							</li>
							<li><a>Máy tập toàn thân</a>
								<ul class="sub-menu">
									@foreach($loai_sp as $value)
										@if($value->category == "Máy tập toàn thân")
										<li><a href="{{route('loai-san-pham', $value->id) }}">{{$value->name}}</a></li>
										@endif
									@endforeach
								</ul>
							</li>
							<li><a>Máy cơ</a>
								<ul class="sub-menu">
									@foreach($loai_sp as $value)
										@if($value->category == "Máy cơ")
										<li><a href="{{route('loai-san-pham', $value->id) }}">{{$value->name}}</a></li>
										@endif
									@endforeach
								</ul>
							</li>
							<li><a>Ghế tập</a>
								<ul class="sub-menu">
									@foreach($loai_sp as $value)
										@if($value->category == "Ghế tập")
										<li><a href="{{route('loai-san-pham', $value->id) }}">{{$value->name}}</a></li>
										@endif
									@endforeach
								</ul>
							</li>
							<li><a>Phần tạ</a>
								<ul class="sub-menu">
									@foreach($loai_sp as $value)
										@if($value->category == "Phần tạ")
										<li><a href="{{route('loai-san-pham', $value->id) }}">{{$value->name}}</a></li>
										@endif
									@endforeach
								</ul>
							</li>
							<li><a>Thanh đòn</a>
								<ul class="sub-menu">
									@foreach($loai_sp as $value)
										@if($value->category == "Thanh đòn")
										<li><a href="{{route('loai-san-pham', $value->id) }}">{{$value->name}}</a></li>
										@endif
									@endforeach
								</ul>
							</li>
							<li><a>Phụ kiện</a>
								<ul class="sub-menu">
									@foreach($loai_sp as $value)
										@if($value->category == "Phụ kiện")
										<li><a href="{{route('loai-san-pham', $value->id) }}">{{$value->name}}</a></li>
										@endif
									@endforeach
								</ul>
							</li>

						</ul>
					</li>
					<li><a href="{{ route('gioi-thieu') }}">Giới thiệu</a></li>
					<li><a href="{{ route('lien-he') }}">Liên hệ&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</a></li>
					<li>
						<a>Tổng số lượt truy cập:</a>
					</li>
				</ul>

				<div class="clearfix"></div>
			</nav>
		</div> <!-- .container -->
	</div> <!-- .header-bottom -->
</div> <!-- #header -->