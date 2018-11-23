@extends('backend.layouts.master')
@section('title', 'Product')
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
                                <a href="{{ route('products.index') }}" class="breadcrumb-item"><i class="ti-home p-r-5"></i>{{ __('home') }}</a>
                                <a class="breadcrumb-item" href="{{ route('products.index') }}">{{ __('product') }}</a>
                                <span class="breadcrumb-item active">{{ __('edit') }}</span>
                            </nav>
                        </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header border bottom">
                            <h4 class="card-title">{{ __('edit_product') }}</h4>
                        </div>
                        <div class="card-body">
                            {!! Form::model($product, ['route' => ['products.update', $product->id]]) !!}
                                {{ method_field('PUT') }}
                                <div class="row m-t-30">
                                    <div class="col-md-2"></div>
                                    <div class="col-md-4">
                                        <div class="p-h-10">
                                            <div class="form-group">
                                                {{ Form::label(__('name'), null, ['class' => 'control-label']) }}
                                                {{ Form::text('name', null, ['class' => 'form-control', 'value' => $product->name]) }}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="p-h-10">
                                            <div class="form-group">
                                                {{ Form::label(__('image'), null, ['class' => 'control-label']) }}
                                                {{ Form::text('image', null, ['class' => 'form-control', 'value' => $product->image]) }}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-2"></div>
                                </div>

                                <div class="row m-t-30">
                                    <div class="col-md-2"></div>
                                    <div class="col-md-4">
                                        <div class="p-h-10">
                                            <div class="form-group">
                                                {{ Form::label(__('id_type'), null, ['class' => 'control-label']) }}
                                                {{ Form::text('id_type', null, ['class' => 'form-control', 'value' => $product->id_type]) }}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <br>
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="table-overflow">
                                                    <table id="dt-opt" class="table table-hover table-xl">
                                                        <thead>
                                                            <tr>
                                                                <th>{{ __('ID Type') }}</th>
                                                                <th>{{ __('Name') }}</th>
                                                            </tr>
                                                        </thead>
                                                        @if ($errors->has('name'))
                                                        <div class="alert alert-danger">
                                                            <ul>
                                                                @foreach ($errors->get('name') as $name)
                                                                <li>{{ $name }}</li>
                                                                @endforeach
                                                            </ul>
                                                        </div>
                                                        @endif
                                                        <tbody> 
                                                            @foreach($product_type as $value)
                                                                <tr>
                                                                    <td>{{ $value->id }}</td>
                                                                    <td>{{ $value->name }}</td>
                                                                </tr>
                                                            @endforeach
                                                        </tbody>                        
                                                    </table>
                                                </div> 
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
                                                {{ Form::label(__('unit_price'), null, ['class' => 'control-label']) }}
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">{{ __('VND') }}</span>
                                                    </div>
                                                    {{ Form::text('unit_price', null, ['class' => 'form-control', 'value' => $product->unit_price]) }}
                                                    <div class="input-group-append">
                                                        <span class="input-group-text">{{ __('00') }}</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                {{ Form::label(__('promotion_price'), null, ['class' => 'control-label']) }}
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">{{ __('VND') }}</span>
                                                    </div>
                                                    {{ Form::text('promotion_price', null, ['class' => 'form-control', 'value' => $product->promotion_price]) }}
                                                    <div class="input-group-append">
                                                        <span class="input-group-text">{{ __('00') }}</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-2"></div>  
                                </div> 
                                <div class="row m-t-30">
                                    <div class="col-md-2"></div>
                                    <div class="col-md-4">
                                        <div class="p-h-10">
                                            <div class="form-group">
                                            {{ Form::label(__('New'), null, ['class' => 'col-lg-3 control-label']) }}
                                            {{ Form::select('new', ['0' => __('Không phải sản phẩm mới'), '1' => __('Sản phẩm mới')], null, ['class' => 'form-control']) }}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="p-h-10">
                                            <div class="form-group">
                                                {{ Form::label(__('unit'), null, ['class' => 'control-label']) }}
                                                {{ Form::text('unit', null, ['class' => 'form-control', 'value' => $product->unit]) }}
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
                                                {{ Form::textarea('description', $product->description, ['class' => 'form-control']) }}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-2"></div>  
                                </div>
                                
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
