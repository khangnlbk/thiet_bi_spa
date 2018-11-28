@extends('master')
@section('title', 'Product Types')
@section('content')
<div class="inner-header">
<hr>
		<div class="container">
			<div class="pull-left">
				<h5>Loại sản phẩm: {{$loai_sanpham->name}}</h5>
			</div>
			<div class="pull-right">
				<div class="beta-breadcrumb font-large">
					<a href="{{ route('trang-chu') }}">Trang chủ</a> / <span>{{$loai_sanpham->parent_type}}</span>/<span>{{$loai_sanpham->category}}</span>/<span>{{$loai_sanpham->name}}</span>
				</div>
			</div>
			<div class="clearfix"></div>
		</div>
		<hr>
	</div>
	<div class="container">
		<div id="content" class="space-top-none">
			<div class="main-content">
				<div class="space20">&nbsp;</div>
				<div class="row">
					<div class="col-sm-3">
						<ul class="vertical-menu">
							<a class="active"><center>Danh sách loại sản phẩm </center></a>
							@foreach($loai_sp as $loai)
							@if($loai_sanpham->id == $loai->id)
								<a href="{{ route('loai-san-pham', $loai->id) }} "><center><b style="color: green">{{$loai->name}}</b></center></a>
							@else
								<a href="{{ route('loai-san-pham', $loai->id) }}"><center><b>{{$loai->name}}</b></center></a>
							@endif
						@endforeach
						</ul>
					</div>
					<div class="col-sm-9">
						<div class="beta-products-list">
							<h5><center>Danh sách các sản phẩm trong loại <i>{{$loai_sanpham->name}}</i></center></h5>
							<p class="pull-left"><center><i>Tìm thấy {{count($sp_theoloai)}} sản phẩm</i></center></p>
							<hr>
							<div class="beta-products-details">
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
										<br>
									</div>
								</div>
							@endforeach
							</div>
							<div class="row">{{$sp_theoloai->fragment('pag1')->render()}}</div>
						</div> <!-- .beta-products-list -->
						<hr>
						<div class="space50">&nbsp;</div>

						<div class="beta-products-list">
							<h5><center>Sản phẩm khác</center></h5>
							<p class="pull-left"><center><i>Tìm thấy {{$sp_khac->total()}} sản phẩm</i></center></p>
							<hr>
							<div class="beta-products-details">
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
										<br>
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