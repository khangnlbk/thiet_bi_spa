@extends('backend.layouts.master')
@section('title', 'Bills')
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
                        <h2 class="header-title">{{ __('Bills') }}</h2>
                        <div class="header-sub-title">
                            <nav class="breadcrumb breadcrumb-dash">
                                <a href="{{ route('bills.index') }}" class="breadcrumb-item"><i class="ti-home p-r-5"></i>{{ __('home') }}</a>
                                <a class="breadcrumb-item" href="{{ route('products.index') }}">{{ __('Bills') }}</a>
                                <span class="breadcrumb-item active">{{ __('edit') }}</span>
                            </nav>
                        </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header border bottom">
                            <h4 class="card-title">{{ __('Edit Status') }}</h4>
                        </div>
                        <div class="card-body">
                            {!! Form::model($bill, ['route' => ['bills.update', $bill->id]]) !!}
                                {{ method_field('PUT') }}
                                
                                <div class="row m-t-30">
                                    <div class="col-md-2"></div>
                                    <div class="col-md-8">
                                        <div class="p-h-10">
                                            <div class="form-group">
                                                {{ Form::label(__('Status'), null, ['class' => 'col-lg-2 control-label']) }}
                                                <div class="col-lg-12">
                                                    {{ Form::select('status', ['0' => __('Watting Accept'), '1' => __('Accepted')], null, ['class' => 'form-control']) }}  
                                                </div>
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
