@extends('master')
@section('title', 'Product Detail')
@section('content')	
	<div class="inner-header">
		<div class="container">
			<div class="pull-left">
				<h6 class="inner-title">Chi tiết sản phẩm : {{$sanpham->name}}</h6>
			</div>
			<div class="pull-right">
				<div class="beta-breadcrumb font-large">
					<a href="{{ route('trang-chu') }}">Trang chủ</a> / <span>Thông tin sản phẩm</span>
				</div>
			</div>
			<div class="clearfix"></div>
		</div>
		<hr>
	</div>

	<div class="container">
		<div id="content">
			<div class="row">
				<div class="col-sm-9">
					<div class="row">
						<div class="col-sm-6">
							<img src="source/image/product/{{$sanpham->image}}" alt="" height="250px">
						</div>
						<div class="col-sm-6">
							<div class="single-item-body">
							<h6>Thông tin sản phẩm :</h6>
							<br>
							
								<p class="single-item-title">Tên sản phẩm : <b><i>{{$sanpham->name}}</i></b></p>
								<br>
								<p class="single-item-price">
									@if($sanpham->promotion_price == 0)
									<span> Giá : <b> {{number_format($sanpham->unit_price)}} </i> VND</span>
									@else
									Giá: <span class="flash-del"> <i>{{number_format($sanpham->unit_price)}}</i> VND</span>
										<span class="flash-sale">{{number_format($sanpham->promotion_price)}} VND</span>
									@endif
								</p>
							</div>

							<div class="clearfix"></div>
							<div class="space20">&nbsp;</div>
							<h6>Đặt hàng:</h6>
							<br>
							<form action="{{ route('them-gio-hang', $sanpham->id) }}" method="post" class="single-item-options">
								<input type="hidden" name="_token" value="{{csrf_token()}}">
								<select class="wc-select" name="qty">
									<option value="1">Số lượng</option>
									<option value="1">1</option>
									<option value="2">2</option>
									<option value="3">3</option>
									<option value="4">4</option>
									<option value="5">5</option>
								</select>
								<button type="submit" class="add-to-cart">
								 	<i class="fa fa-shopping-cart"></i>
								</button>
								<div class="clearfix"></div>
							</form>
						</div>
					</div>
				
					<div class="space40">&nbsp;</div>
					<div class="woocommerce-tabs">
						<ul class="tabs">
							<li><a href="#tab-description"><h4>Mô tả</h4></a></li>
						</ul>

						<div class="panel" id="tab-description">
							<p>{{$sanpham->description}}</p>
						</div>
						<div class="panel" id="tab-reviews">
							<p>No Reviews</p>
						</div>
					</div>
					<div class="space50">&nbsp;</div>
					<div class="beta-products-list">
						<h4>Sản phẩm cùng loại</h4>
						<br>
						<br>

						<div class="row">
						@foreach($sanpham_cungloai as $sp)
							<div class="col-sm-4">
								<div class="single-item">
									@if($sp->promotion_price != 0)
										<div class="ribbon-wrapper"><div class="ribbon sale">Sale</div></div>
									@endif
									<div class="single-item-header">
										<a href="{{route('chi-tiet-san-pham', $sp->id) }}"><img src="source/image/product/{{$sp->image}}" alt="" height="250px"></a>
									</div>
									<div class="single-item-body">
										<h6>{{$sp->name}}</h6>
										<br>
										<p class="single-item-price">
											@if($sp->promotion_price == 0)
												<span>{{number_format($sp->unit_price)}} VND</span>
											@else
												<span class="flash-del">{{number_format($sp->unit_price)}} VND</span>
												<span class="flash-sale">{{number_format($sp->promotion_price)}} VND</span>
											@endif
										</p>
									</div>
									<br>
									<div class="single-item-caption">
										<a class="add-to-cart pull-left" href="{{ route('them-gio-hang', $sp->id) }}"><i class="fa fa-shopping-cart"></i></a>
										<a class="beta-btn primary" href="{{route('chi-tiet-san-pham', $sp->id) }}">Chi tiết <i class="fa fa-chevron-right"></i></a>
										<div class="clearfix"></div>
									</div>
								</div>
								<br>
							</div>
						@endforeach
						</div>
						<div class="row">{{$sanpham_cungloai->links()}}</div>
					</div> <!-- .beta-products-list -->
				</div>
				<div class="col-sm-3 aside">
					<div class="widget">
						<h3 class="widget-title">Best Sellers</h3>
						<div class="widget-body">
							<div class="beta-sales beta-lists">
								<div class="media beta-sales-item">
									<a class="pull-left" href="product.html"><img src="source/assets/dest/images/products/sales/1.png" alt=""></a>
									<div class="media-body">
										Sample Woman Top
										<span class="beta-sales-price">$34.55</span>
									</div>
								</div>
								<div class="media beta-sales-item">
									<a class="pull-left" href="product.html"><img src="source/assets/dest/images/products/sales/2.png" alt=""></a>
									<div class="media-body">
										Sample Woman Top
										<span class="beta-sales-price">$34.55</span>
									</div>
								</div>
								<div class="media beta-sales-item">
									<a class="pull-left" href="product.html"><img src="source/assets/dest/images/products/sales/3.png" alt=""></a>
									<div class="media-body">
										Sample Woman Top
										<span class="beta-sales-price">$34.55</span>
									</div>
								</div>
								<div class="media beta-sales-item">
									<a class="pull-left" href="product.html"><img src="source/assets/dest/images/products/sales/4.png" alt=""></a>
									<div class="media-body">
										Sample Woman Top
										<span class="beta-sales-price">$34.55</span>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="widget">
						<h3 class="widget-title">New Products</h3>
						<div class="widget-body">
							<div class="beta-sales beta-lists">
								<div class="media beta-sales-item">
									<a class="pull-left" href="product.html"><img src="source/assets/dest/images/products/sales/1.png" alt=""></a>
									<div class="media-body">
										Sample Woman Top
										<span class="beta-sales-price">$34.55</span>
									</div>
								</div>
								<div class="media beta-sales-item">
									<a class="pull-left" href="product.html"><img src="source/assets/dest/images/products/sales/2.png" alt=""></a>
									<div class="media-body">
										Sample Woman Top
										<span class="beta-sales-price">$34.55</span>
									</div>
								</div>
								<div class="media beta-sales-item">
									<a class="pull-left" href="product.html"><img src="source/assets/dest/images/products/sales/3.png" alt=""></a>
									<div class="media-body">
										Sample Woman Top
										<span class="beta-sales-price">$34.55</span>
									</div>
								</div>
								<div class="media beta-sales-item">
									<a class="pull-left" href="product.html"><img src="source/assets/dest/images/products/sales/4.png" alt=""></a>
									<div class="media-body">
										Sample Woman Top
										<span class="beta-sales-price">$34.55</span>
									</div>
								</div>
							</div>
						</div>
					</div> <!-- best sellers widget -->
				</div>
			</div>
		</div> <!-- #content -->
	</div> <!-- .container -->
@endsection