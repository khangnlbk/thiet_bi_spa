<div id="header">
	<div class="header-top">
		<div class="container">
			<div class="pull-left auto-width-left">
				<ul class="top-menu menu-beta l-inline">
					<li><a href="{{ route('lien-he') }}"><i class="fa fa-home"></i> 43C, 405/80, Bắc Cầu, Ngọc Thụy, Long Biên, Hà Nội</a></li>
					<li><a href="{{ route('lien-he') }}"><i class="fa fa-phone"></i> 0965 818 552</a></li>
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
				<a href="{{ route('trang-chu') }}" id="logo"><img src="source/assets/dest/images/logo-cake.png" width="200px" alt=""></a>
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
					<li><a href="{{route('loai-san-pham', '1') }}">Sản phẩm</a>
						<ul class="sub-menu">
							@foreach($loai_sp as $loai_sp)
								<li><a href="{{route('loai-san-pham', $loai_sp->id) }}">{{$loai_sp->name}}</a></li>
							@endforeach

						</ul>
					</li>
					<li><a href="{{ route('gioi-thieu') }}">Giới thiệu</a></li>
					<li><a href="{{ route('lien-he') }}">Liên hệ</a></li>
				</ul>
				<div class="clearfix"></div>
			</nav>
		</div> <!-- .container -->
	</div> <!-- .header-bottom -->
</div> <!-- #header -->