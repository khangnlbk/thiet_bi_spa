@extends('master')
@section('content')
<div class="inner-header">
<hr>
		<div class="container">
			<div class="pull-left">
				<h6 class="inner-title">Sản phẩm: {{$loai_sanpham->name}}</h6>
			</div>
			<div class="pull-right">
				<div class="beta-breadcrumb font-large">
					<a href="{{ route('trang-chu') }}">Trang chủ</a> / <span>{{$loai_sanpham->name}}</span>
				</div>
			</div>
			<div class="clearfix"></div>
		</div>
		<hr>
	</div>
	<div class="container">
		<div id="content" class="space-top-none">
			<div class="main-content">
				<div class="space60">&nbsp;</div>
				<div class="row">
					<div class="col-sm-3">
						<ul class="aside-menu">
						@foreach($loai_sp as $loai)
							@if($loai_sanpham->id == $loai->id)
								<li><a href="{{ route('loai-san-pham', $loai->id) }} "><b style="color: #ff9933;">{{$loai->name}}</b></a><li>
							@else
								<li><a href="{{ route('loai-san-pham', $loai->id) }}">{{$loai->name}}</a><li>	
							@endif
						@endforeach
						</ul>
					</div>
					<div class="col-sm-9">
						<div class="beta-products-list">
							<h4>Danh sách sản phẩm</h4>
							<hr>
							<div class="beta-products-details">
								<p class="pull-left">Tìm thấy {{count($sp_theoloai)}} sản phẩm</p>
								<div class="clearfix"></div>
							</div>

							<div class="row">
							@foreach($sp_theoloai as $sp)
								<div class="col-sm-4">
									<div class="single-item">
										@if($sp->promotion_price != 0)
											<div class="ribbon-wrapper"><div class="ribbon sale">Sale</div></div>
										@endif
										<div class="single-item-header">
											<a href="{{route('chi-tiet-san-pham', $sp->id) }}"><img src="source/image/product/{{$sp->image}}" alt="" height="250px"></a>
										</div>
										<div class="single-item-body">
											<p class="single-item-title">{{$sp->name}}</p>
											<p class="single-item-price">
												@if($sp->promotion_price == 0)
													<span>{{number_format($sp->unit_price)}}đ</span>
												@else
													<span class="flash-del">{{number_format($sp->unit_price)}}đ</span>
													<span class="flash-sale">{{number_format($sp->promotion_price)}}đ</span>
												@endif
											</p>
										</div>
										<div class="single-item-caption">
											<a class="add-to-cart pull-left" href="{{ route('them-gio-hang', $sp->id) }}"><i class="fa fa-shopping-cart"></i></a>
											<a class="beta-btn primary" href="{{route('chi-tiet-san-pham', $sp->id) }}">Chi tiết<i class="fa fa-chevron-right"></i></a>
											<div class="clearfix"></div>
										</div>
									</div>
								</div>
							@endforeach
							</div>
						</div> <!-- .beta-products-list -->
						<hr>
						<div class="space50">&nbsp;</div>

						<div class="beta-products-list">
							<h4>Sản phẩm khác</h4>
							<hr>
							<div class="beta-products-details">
								<p class="pull-left">Tìm thấy {{$sp_khac->total()}} sản phẩm</p>
								<div class="clearfix"></div>
							</div>
							<div class="row">
								@foreach($sp_khac as $sp)
								<div class="col-sm-4">
									<div class="single-item">
										@if($sp->promotion_price != 0)
											<div class="ribbon-wrapper"><div class="ribbon sale">Sale</div></div>
										@endif
										<div class="single-item-header">
											<a href="{{route('chi-tiet-san-pham', $sp->id) }}"><img src="source/image/product/{{$sp->image}}" alt="" height="250px"></a>
										</div>
										<div class="single-item-body">
											<p class="single-item-title">{{$sp->name}}</p>
											<p class="single-item-price">
												@if($sp->promotion_price == 0)
													<span>{{number_format($sp->unit_price)}}đ</span>
												@else
													<span class="flash-del">{{number_format($sp->unit_price)}}đ</span>
													<span class="flash-sale">{{number_format($sp->promotion_price)}}đ</span>
												@endif
											</p>
										</div>
										<div class="single-item-caption">
											<a class="add-to-cart pull-left" href="{{ route('them-gio-hang', $sp->id) }}"><i class="fa fa-shopping-cart"></i></a>
											<a class="beta-btn primary" href="{{ route('chi-tiet-san-pham', $sp->id) }}">Chi tiết<i class="fa fa-chevron-right"></i></a>
											<div class="clearfix"></div>
										</div>
									</div>
								</div>
								@endforeach
							</div>
							<div class="row">{{$sp_khac->links()}}</div>
							<div class="space40">&nbsp;</div>
							
						</div> <!-- .beta-products-list -->
					</div>
				</div> <!-- end section with sidebar and main content -->


			</div> <!-- .main-content -->
		</div> <!-- #content -->
	</div> <!-- .container -->
@endsection