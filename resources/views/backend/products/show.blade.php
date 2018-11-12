@extends('backend.layouts.master')
@section('title', 'Edit a user')
@section('content')

<div class="page-container">
    <div class="main-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header">
                        <h2 class="header-title">{{ __('product') }}</h2>
                        <div class="header-sub-title">
                            <nav class="breadcrumb breadcrumb-dash">
                                <a href="#" class="breadcrumb-item"><i class="ti-home p-r-5"></i>{{ __('home') }}</a>
                                <a class="breadcrumb-item" href="{{ route('product.index') }}">{{ __('product') }}</a>
                                <span class="breadcrumb-item active">{{ __('show') }}</span>
                            </nav>
                        </div>
                    </div> 
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <div class="row m-v-30">
                        <div class="col-sm-3">
                            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                                @foreach ($product->images as $image)
                                <ol class="carousel-indicators">
                                    <li data-target="#carouselExampleIndicators" data-slide-to="0" id="carousel"></li>
                                </ol>
                                <div class="carousel-inner">
                                    <div class="carousel-item" id="carousel-1">
                                        <img class="d-block w-100" src="{{ asset(config('app.link_product') . $image->name) }}" alt="First slide">
                                    </div>
                                </div>
                                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                                    <span class="mdi mdi-chevron-left font-size-35" aria-hidden="true"></span>
                                </a>
                                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                                    <span class="mdi mdi-chevron-right font-size-35" aria-hidden="true"></span>
                                </a>
                                @endforeach
                            </div>
                        </div>
                        <div class="col-sm-4 text-center text-sm-left">
                            <h2 class="m-b-5">{{ $product->name }}</h2>
                            <div class="form-group">
                                {{ Form::label(__('price :'), null, ['class' => 'control-label']) }}
                                <span>{{ $product->price }}</span>
                            </div>
                            <div class="form-group">
                                {{ Form::label(__('describe :'), null, ['class' => 'control-label']) }}
                                <span>{{ $product->describe }}</span>
                            </div>
                        </div>
                        <div class="col">
                            <p class="text-dark font-size-13"><b>Follow Me On:</b></p>
                            <ul class="list-inline">
                                <li class="m-r-15">
                                    <a class="text-gray" href="#">
                                        <i class="mdi mdi-instagram font-size-25"></i>
                                    </a>
                                </li>
                                <li class="m-r-15">
                                    <a class="text-gray" href="#">
                                        <i class="mdi mdi-facebook font-size-25"></i>
                                    </a>
                                </li>
                                <li class="m-r-15">
                                    <a class="text-gray" href="#">
                                        <i class="mdi mdi-twitter font-size-25"></i>
                                    </a>
                                </li>
                                <li class="m-r-15">
                                    <a class="text-gray" href="#">
                                        <i class="mdi mdi-dribbble font-size-25"></i>
                                    </a>
                                </li>
                            </ul>
                            <div class="row">
                                <div class="col-lg-9">
                                    <p class="m-t-30 lh-2-2">Climb leg rub face on everything give attitude nap all day for under the bed. Chase mice attack feet but rub face on everything hopped up on goofballs.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
{{ Html::script('assets/demo-bower/assets/vendor/datatables/media/js/jquery.dataTables.js') }}
{{ Html::script('assets/demo-bower/assets/vendor/datatables/media/js/dataTables.bootstrap4.min.js') }}
{{ Html::script('assets/demo-bower/assets/js/tables/data-table.js') }}
<script>
    $(function() {
        console.log('abc');
    $('#carousel').addClass('active');
    $('#carousel-1').addClass('active');
    });
</script>
@endsection
