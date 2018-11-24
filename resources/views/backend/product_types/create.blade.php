@extends('backend.layouts.master')
@section('title', 'Product Type')
@section('style')
{!! Html::style('assets/demo-bower/assets/vendor/selectize/dist/css/selectize.default.css') !!} 
{!! Html::style('assets/demo-bower/assets/vendor/summernote/dist/summernote-bs4.css') !!} 
@endsection
@section('content')
<div class="page-container"
    <div class="main-content">
        <div class="container-fluid">
            <div class="container">
                <div class="well well bs-component">
                    <div class="page-header">
                        <div class="panel-heading">
                        <h2 class="header-title">{{ __('product type') }}</h2>
                        <div class="header-sub-title">
                            <nav class="breadcrumb breadcrumb-dash">
                                <a href="backend.home" class="breadcrumb-item"><i class="ti-home p-r-5"></i>{{ __('home') }}</a>
                                <a class="breadcrumb-item" href="{{ route('product_types.index') }}">{{ __('product type') }}</a>
                                <span class="breadcrumb-item active">{{ __('create') }}</span>
                            </nav>
                        </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header border bottom">
                            <h4 class="card-title">{{ __('create_product type') }}</h4>
                        </div>
                        <div class="card-body">
                            {!! Form::open(['url' => route('product_types.store'),'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
                                 <div class="row m-t-30">
                                    <div class="col-md-2"></div>
                                    <div class="col-md-8">
                                        <div class="p-h-10">
                                            <div class="form-group">
                                                {{ Form::label(__('Parent Type'), null, ['class' => 'col-lg-2 control-label']) }}
                                                {{ Form::select('parent_type', ['Gia đình'=>'Gia đình', 'Thiết bị Gym'=>'Thiết bị Gym'], null, ['class' => 'form-control']) }}
                                                @if ($errors->has('parent_type'))
                                                <div class="alert alert-danger">
                                                    <ul>
                                                        @foreach ($errors->get('parent_type') as $parent_type)
                                                        <li>{{ $parent_type }}</li>
                                                        @endforeach
                                                    </ul>
                                                </div>
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
                                                {{ Form::label(__('Category'), null, ['class' => 'col-lg-2 control-label']) }}
                                                {{ Form::select('category', ['Loai1'=>'Loai1', 'Loai2'=>'Loai2', 'Loai3'=>'Loai3', 'Loai4'=>'Loai4', 'Gym1'=>'Gym1', 'Gym2'=>'Gym2','Gym3'=>'Gym3', 'Gym4'=>'Gym4'], null, ['class' => 'form-control']) }}
                                                @if ($errors->has('category'))
                                                <div class="alert alert-danger">
                                                    <ul>
                                                        @foreach ($errors->get('category') as $category)
                                                        <li>{{ $category }}</li>
                                                        @endforeach
                                                    </ul>
                                                </div>
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
                                                {{ Form::label(__('name'), null, ['class' => 'control-label']) }}
                                                {{ Form::text('name', null, ['class' => 'form-control']) }}
                                                @if ($errors->has('name'))
                                                <div class="alert alert-danger">
                                                    <ul>
                                                        @foreach ($errors->get('name') as $name)
                                                        <li>{{ $name }}</li>
                                                        @endforeach
                                                    </ul>
                                                </div>
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
                                                {{ Form::label(__('image'), null, ['class' => 'control-label']) }}
                                                <div class="input-group">
                                                    {{ Form::text('image', null, ['class' => 'form-control']) }}
                                                    <div class="input-group-append">
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
                                    </div>
                                    <div class="col-md-2"></div>  
                                </div>
                               
                                <div class="row m-t-30">
                                    <div class="col-md-2"></div>
                                    <div class="col-md-8">
                                        <div class="p-h-10">
                                            <div class="form-group">
                                                {{ Form::label(__('description'), null, ['class' => 'control-label']) }}
                                                {{ Form::textarea('description', null, ['class' => 'form-control']) }}
                                                @if ($errors->has('description'))
                                                <div class="alert alert-danger">
                                                    <ul>
                                                        @foreach ($errors->get('description') as $description)
                                                        <li>{{ $description }}</li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-2"></div>  
                                </div>
                                <!-- <div class="row m-t-30">
                                    <div class="col-md-2"></div>
                                    <div class="col-md-8">
                                        <div class="p-h-10">
                                            <div class="form-group">
                                                {{ Form::label(__('image'), null, ['class' => 'control-label']) }}
                                                <div class="input-group control-group increment" >
                                                    <input type="file" name="image[]" class="form-control">
                                                    <div class="input-group-btn"> 
                                                        <button class="btn btn-success img-button" type="button"><i class="glyphicon glyphicon-plus"></i>Add</button>
                                                    </div>
                                                </div>
                                                <div class="clone hide">
                                                    <div class="control-group input-group" style="margin-top:10px">
                                                        <input type="file" name="image[]" class="form-control">
                                                        <div class="input-group-btn"> 
                                                            <button class="btn btn-danger" type="button"><i class="glyphicon glyphicon-remove"></i> Remove</button>
                                                        </div>
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
                                    </div>
                                    <div class="col-md-2"></div>  
                                </div> -->
                                <div class="text-center">
                                    {{ Form::reset(__('Reset'), ['class' => 'btn btn-default']) }}
                                    {{ Form::submit(__('Add'), ['class' => 'btn btn-success']) }}
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
<script type="text/javascript">
    $(document).ready(function() {
        $(".img-button").click(function(){ 
            var html = $(".clone").html();
            $(".increment").after(html);
        });
        $("body").on("click",".btn-danger",function(){ 
            $(this).parents(".control-group").remove();
        });
    });
</script>
@endsection
