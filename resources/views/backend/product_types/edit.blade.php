@extends('backend.layouts.master')
@section('title', 'Edit Product Type')
@section('style')
{!! Html::style('assets/demo-bower/assets/vendor/selectize/dist/css/selectize.default.css') !!} 
{!! Html::style('assets/demo-bower/assets/vendor/summernote/dist/summernote-bs4.css') !!} 
@endsection
@section('content')
<div class="page-container">
    <div class="main-content">
        <div class="container-fluid">
            <div class="container">
                <div class="well well bs-component">
                    <div class="page-header">
                        <div class="panel-heading">
                        <h2 class="header-title">{{ __('product') }}</h2>
                        <div class="header-sub-title">
                            <nav class="breadcrumb breadcrumb-dash">
                                <a href="{{ route('product_types.index') }}" class="breadcrumb-item"><i class="ti-home p-r-5"></i>{{ __('home') }}</a>
                                <a class="breadcrumb-item" href="{{ route('product_types.index') }}">{{ __('product type') }}</a>
                                <span class="breadcrumb-item active">{{ __('edit') }}</span>
                            </nav>
                        </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header border bottom">
                            <h4 class="card-title">{{ __('Edit product type') }}</h4>
                        </div>
                        <div class="card-body">
                            {!! Form::model($product_type, ['route' => ['product_types.update', $product_type->id]]) !!}
                                {{ method_field('PUT') }}
                                <div class="row m-t-30">
                                    <div class="col-md-2"></div>
                                    <div class="col-md-8">
                                        <div class="p-h-10">
                                            <div class="form-group">
                                                {{ Form::label(__('name'), null, ['class' => 'control-label']) }}
                                                {{ Form::text('name', null, ['class' => 'form-control', 'value' => $product_type->name]) }}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-2"></div>
                                </div>
                                

                                <div class="row m-t-30">
                                    <div class="col-md-2"></div>
                                    <div class="col-md-8">
                                        <div class="p-h-10">
                                            <div class="form-group">
                                                {{ Form::label(__('category'), null, ['class' => 'col-lg-2 control-label']) }}
                                                @if($product_type->parent_type == "Thiết bị gia đình")
                                                {{ Form::select('category', ['Xe đạp gia đình'=>'Xe đạp gia đình', 'Máy chạy bộ gia đình'=>'Máy chạy bộ gia đình', 'Dàn tập tạ đa năng'=>'Dàn tập tạ đa năng', 'Máy rung Massage'=>'Máy rung Massage'], null, ['class' => 'form-control']) }}
                                                @else
                                                {{ Form::select('Category', ['Máy chạy phòng tập'=>'Máy chạy phòng tập', 'Xe đạp phòng tập'=>'Xe đạp phòng tập', 'Máy tập toàn thân'=>'Máy tập toàn thân', 'Máy cơ'=>'Máy cơ', 'Ghế tập'=>'Ghế tập', 'Phần tạ'=>'Phần tạ', 'Thanh đòn'=>'Thanh đòn', 'Phụ kiện'=>'Phụ kiện'], null, ['class' => 'form-control']) }}
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-2"></div>
                                </div>
                                <div class="row m-t-30">
                                    <div class="col-md-2"></div>
                                    <div class="col-md-8">
                                        <div class="p-h-10">
                                            <div class="form-group">
                                                {{ Form::label(__('description'), null, ['class' => 'control-label']) }}
                                                {{ Form::textarea('description', $product_type->description, ['class' => 'form-control']) }}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-2"></div>  
                                </div>
                               <!--  <div class="row m-t-30">
                                    <div class="col-md-2"></div>
                                    <div class="col-md-8">
                                        <div class="p-h-10">
                                            <div class="form-group">
                                        <div class="upload-btn-wrapper">
                                            {{ Form::file('image') }} 
                                            {{ Form::button(__('change_image'), ['class' => 'btn-upload']) }}
                                        </div>
                                    </div>
                                    @if ($errors->has('image'))
                                        <div class="alert alert-danger">
                                            <ul>
                                                @foreach ($errors->get('image') as $image)
                                                    <li>{{ $image }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif
                                        </div>
                                    </div>
                                    <div class="col-md-2"></div>  
                                </div> -->
                                
                                <div class="text-center">
                                    {{ Form::reset(__('Reset'), ['class' => 'btn btn-default']) }}
                                    {{ Form::submit(__('edit'), ['class' => 'btn btn-success']) }}
                                </div>
                            {!! Form::close() !!}
                        </div>
                    </div> 
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
{{ Html::script('assets/demo-bower/assets/vendor/moment/min/moment.min.js') }}
{{ Html::script('assets/demo-bower/assets/vendor/selectize/dist/js/standalone/selectize.min.js') }}
{{ Html::script('assets/demo-bower/assets/vendor/summernote/dist/summernote-bs4.min.js') }}
{{ Html::script('assets/demo-bower/assets/js/forms/form-elements.js') }}
@endsection
