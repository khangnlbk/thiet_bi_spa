@extends('backend.layouts.master')
@section('title', 'Product Type Information')
@section('content')

<div class="page-container">
    <div class="main-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header">
                        <h2 class="header-title">{{ __('product type') }}</h2>
                        <div class="header-sub-title">
                            <nav class="breadcrumb breadcrumb-dash">
                                <a href="#" class="breadcrumb-item"><i class="ti-home p-r-5"></i>{{ __('home') }}</a>
                                <a class="breadcrumb-item" href="{{ route('product_types.index') }}">{{ __('product type') }}</a>
                                <span class="breadcrumb-item active">{{ __('show') }}</span>
                            </nav>
                        </div>
                    </div> 
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <div class="row m-v-30">
                        <div class="col-sm-5">
                            <div class="single-item-header">
                                <a><img src="{{ asset('source/image/product/' . $product_type->image) }}" alt="" height="300px"></a>
                            </div>
                        </div>
                        <div class="col-sm-7 text-center text-sm-left">
                            <br>
                            <h2 class="m-b-5">Name: {{ $product_type->name }}</h2>
                            <br>

                            <div class="form-group">
                                {{ Form::label(__('description :'), null, ['class' => 'control-label']) }}
                                <span>{{ $product_type->description }}</span>
                            </div>
                            <div class="col-lg-10 col-lg-offset-2">
                                <a href="{{ route('backend.home') }}" class="btn btn-default">{{ __('Back') }}</a>
                                <a href="{{ route('product_types.edit', $product_type->id) }}" class="btn btn-success">{{ __('Edit') }}</a>
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
