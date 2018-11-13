@extends('master')
@section('content')
<div class="container">
	<div id="content" class="space-top-none">
		<div class="main-content">
			<div class="space60">&nbsp;</div>
			<div class="row">
				<div class="col-sm-12">
					<div class="beta-products-list">
						<h4>Kết quả tìm kiếm</h4>
						<hr>
						<div class="beta-products-details">
							<p class="pull-left">Tìm thấy {{$product->total()}} sản phẩm</p>
							<div class="clearfix"></div>
						</div>

						<div class="row">
						@foreach($product as $new)
							<div class="col-sm-3">
								<div class="single-item">
									@if($new->promotion_price != 0)
										<div class="ribbon-wrapper"><div class="ribbon sale">Sale</div></div>
									@endif
									<div class="single-item-header">
										<a href="{{route('chi-tiet-san-pham', $new->id) }}"><img src="source/image/product/{{$new->image}}" alt="" height="250px"></a>
									</div>
									<div class="single-item-body">
										<p class="single-item-title">{{$new->name}}</p>
										<p class="single-item-price">
										@if($new->promotion_price == 0)
											<span>{{number_format($new->unit_price)}}đ</span>
										@else
											<span class="flash-del">{{number_format($new->unit_price)}}đ</span>
											<span class="flash-sale">{{number_format($new->promotion_price)}}đ</span>
										@endif
										</p>
									</div>
									<div class="single-item-caption">
										<a class="add-to-cart pull-left" href="{{ route('them-gio-hang', $new->id) }}"><i class="fa fa-shopping-cart"></i></a>
										<a class="beta-btn primary" href="{{route('chi-tiet-san-pham', $new->id) }}">Chi tiết <i class="fa fa-chevron-right"></i></a>
										<div class="clearfix"></div>
									</div>
								</div>
							</div>
						@endforeach
						</div>
						<div class="row">{{$product->links()}}</div>
					</div> <!-- .beta-products-list -->
				</div>
			</div> <!-- end section with sidebar and main content -->


		</div> <!-- .main-content -->
	</div> <!-- #content -->
@endsection