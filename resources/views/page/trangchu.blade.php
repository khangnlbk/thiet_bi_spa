@extends('master')
@section('content')
<div class="fullwidthbanner-container">
	<div class="fullwidthbanner">
		<div class="bannercontainer" >
			<div class="banner" >
				<ul>
				@foreach($slide as $sl)
					<!-- THE FIRST SLIDE -->
					<li data-transition="boxfade" data-slotamount="20" class="active-revslide" style="width: 100%; height: 100%; overflow: hidden; z-index: 18; visibility: hidden; opacity: 0;">
					<div class="slotholder" style="width:100%;height:100%;" data-duration="undefined" data-zoomstart="undefined" data-zoomend="undefined" data-rotationstart="undefined" data-rotationend="undefined" data-ease="undefined" data-bgpositionend="undefined" data-bgposition="undefined" data-kenburns="undefined" data-easeme="undefined" data-bgfit="undefined" data-bgfitend="undefined" data-owidth="undefined" data-oheight="undefined">
						<div class="tp-bgimg defaultimg" data-lazyload="undefined" data-bgfit="cover" data-bgposition="center center" data-bgrepeat="no-repeat" data-lazydone="undefined" src="source/image/slide/{{$sl->image}}" data-src="source/image/slide/{{$sl->image}}" style="background-color: rgba(0, 0, 0, 0); background-repeat: no-repeat; background-image: url('source/image/slide/{{$sl->image}}'); background-size: cover; background-position: center center; width: 100%; height: 100%; opacity: 1; visibility: inherit;">
						</div>
					</div>
					</li>
				@endforeach
				</ul>
			</div>
		</div>
		<div class="tp-bannertimer"></div>
	</div>
</div>


<div class="container">
	<div id="content" class="space-top-none">
		<div class="main-content">
			<div class="row">
				<div class="col-sm-10">
					<hr>
					<div class="beta-products-list">
						<h5><center><b><color="red">SẢN PHẨM MỚI</b></center></h5>
						<br>
						<center><p><i> Chúng tôi luôn cung cấp những sản phẩm mới nhất trên thị trường hiện nay với giá thành tốt nhất đến cho khách hàng.</i></p></center>
						<hr>
						<div class="beta-products-details">
							<p class="pull-left"><H7><b>Chúng tôi đang có {{$new_product->total()}} sản phẩm mới</b></H7></p>
							<div class="clearfix"></div>
						</div>
						<br>
						<div class="row">
							@foreach($new_product as $new)
								<div class="col-sm-4">
									<div class="single-item">
										@if($new->promotion_price != 0)
											<div class="ribbon-wrapper"><div class="ribbon new">New</div></div>
										@endif
										<div class="single-item-header">
											<a href="{{route('chi-tiet-san-pham', $new->id) }}"><img src="source/image/product/{{$new->image}}" alt="" height="250px"></a>
										</div>
										<div class="single-item-body">
											<h6>{{$new->name}}</h6>
											<br>
											<p class="single-item-price">
											@if($new->promotion_price == 0)
												<span>{{number_format($new->unit_price)}} VND</span>
											@else
												<span class="flash-del">{{number_format($new->unit_price)}} VND</span>
												<span class="flash-sale">{{number_format($new->promotion_price)}} VND</span>
											@endif
											</p>
										</div>
										<br>
										<div class="single-item-caption">
											<a class="add-to-cart pull-left" href="{{ route('them-gio-hang', $new->id) }}"><i class="fa fa-shopping-cart"></i></a>
											<a class="beta-btn primary" href="{{route('chi-tiet-san-pham', $new->id) }}">Chi tiết <i class="fa fa-chevron-right"></i></a>
											<div class="clearfix"></div>
										</div>
									</div>
									<br>
									<br>
								</div>
							@endforeach
						</div>
					</div>
				</div>
				<div class="col-sm-2 aside">
					<div class="widget">
					<br>
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
						<br><br>
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
									<a class="pull-left" href="product.html"><img src="source/assets/dest/images/products/sales/3.png" alt=""></a>
									<div class="media-body">
										Sample Woman Top
										<span class="beta-sales-price">$34.55</span>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>		
</div>		
<div class="container">
	<div id="content" class="space-top-none">
		<div class="main-content">
			<div class="row">
				<div class="col-sm-10">
					<hr>
					<div class="beta-products-list">
						<h5><center><b>SẢN PHẨM KHUYẾN MÃI</b></center></h5>
						<br>
						<center><p><i> Chúng tôi mang đến cho khách hàng những sản phẩm với mức gía cạnh tranh và tất nhiên là luôn có những chương trình khuyến mãi hấp dẫn.</i></p></center>
						<hr>
						<div class="beta-products-details">
							<p class="pull-left"><b>Chúng tôi đang có {{$sale_product->total()}} sản phẩm khuyến mãi</b></p>
							<div class="clearfix"></div>
						</div>
						<div class="row">
							@foreach($sale_product as $sale)
								<div class="col-sm-4">
									<div class="single-item">
										<div class="ribbon-wrapper"><div class="ribbon sale">Sale</div></div>
										<div class="single-item-header">
											<a href="{{route('chi-tiet-san-pham', $sale->id) }}"><img src="source/image/product/{{$sale->image}}" alt="" height="250px"></a>
										</div>
										<div class="single-item-body">
											<h6>{{$sale->name}}</h6>
											<br>
											<p class="single-item-price">
												<span class="flash-del">{{$sale->unit_price}} VND</span>
												<span class="flash-sale">{{$sale->promotion_price}} VND</span>
											</p>
										</div>
										<br>
										<div class="single-item-caption">
											<a class="add-to-cart pull-left" href="{{ route('them-gio-hang', $sale->id) }}"><i class="fa fa-shopping-cart"></i></a>
											<a class="beta-btn primary" href="{{route('chi-tiet-san-pham', $sale->id) }}">Chi tiết <i class="fa fa-chevron-right"></i></a>
											<div class="clearfix"></div>
										</div>
									</div>
									<br><br>
								</div>
							@endforeach
						</div>
					</div>
				</div>
				<br>
				<div class="col-sm-2 aside">
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
					<div class="widget">
						<br>
						<br>
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
									<a class="pull-left" href="product.html"><img src="source/assets/dest/images/products/sales/3.png" alt=""></a>
									<div class="media-body">
										Sample Woman Top
										<span class="beta-sales-price">$34.55</span>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div> <!-- best sellers widget -->
	</div>
</div> <!-- end section with sidebar and main content -->
@endsection