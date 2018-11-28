@extends('backend.layouts.master')
@section('title', 'Product Types')
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
                                <a href="backend.home" class="breadcrumb-item"><i class="ti-home p-r-5"></i>{{ __('home') }}</a>
                                <a class="breadcrumb-item" href="{{ route('products.index') }}">{{ __('product') }}</a>
                                <span class="breadcrumb-item active">{{ __('create') }}</span>
                            </nav>
                        </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header border bottom">
                            <h4 class="card-title">{{ __('create_product') }}</h4>
                        </div>
                        <div class="card-body">
                            {!! Form::open(['url' => route('products.store'),'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
                                <div class="row m-t-30">
                                    <div class="col-md-2"></div>
                                    <div class="col-md-4">
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
                                    <div class="col-md-4">
                                        <div class="p-h-10">
                                            <div class="form-group">
                                                {{ Form::label(__('image'), null, ['class' => 'control-label']) }}
                                                <div class="input-group">
                                                    {{ Form::file('image', null, ['class' => 'form-control']) }}
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
                                    <div class="col-md-3">
                                        <div class="p-h-10">
                                            <div class="form-group">
                                                {{ Form::label(__('id_type'), null, ['class' => 'control-label']) }}
                                                <div class="input-group">
                                                    {{ Form::text('id_type', null, ['class' => 'form-control']) }}
                                                    <div class="input-group-append">
                                                    </div>
                                                </div>
                                                @if ($errors->has('id_type'))
                                                <div class="alert alert-danger">
                                                    <ul>
                                                        @foreach ($errors->get('id_type') as $id_type)
                                                        <li>{{ $id_type }}</li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                                @endif
                                            </div>

                                        </div>
                                    </div>
                                    <div class="col-md-5">
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
                                                                    <td>{{ $value->parent_type }}&nbsp/&nbsp{{ $value->category }}&nbsp/&nbsp{{ $value->name }}</td>
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
                                    <div class="col-md-4">
                                        <div class="p-h-10">
                                            <div class="form-group">
                                                {{ Form::label(__('unit_price'), null, ['class' => 'control-label']) }}
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">{{ __('VND') }}</span>
                                                    </div>
                                                    {{ Form::text('unit_price', null, ['class' => 'form-control']) }}
                                                    <div class="input-group-append">
                                                    </div>
                                                </div>
                                                @if ($errors->has('unit_price'))
                                                <div class="alert alert-danger">
                                                    <ul>
                                                        @foreach ($errors->get('unit_price') as $unit_price)
                                                        <li>{{ $unit_price }}</li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="p-h-10">
                                            <div class="form-group">
                                                {{ Form::label(__('promotion_price'), null, ['class' => 'control-label']) }}
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">{{ __('VND') }}</span>
                                                    </div>
                                                    {{ Form::text('promotion_price', null, ['class' => 'form-control']) }}
                                                    <div class="input-group-append">
                                                    </div>
                                                </div>
                                                @if ($errors->has('promotion_price'))
                                                    <div class="alert alert-danger">
                                                        <ul>
                                                            @foreach ($errors->get('promotion_price') as $promotion_price)
                                                            <li>{{ $promotion_price }}</li>
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
                                    <div class="col-md-4">
                                        <div class="p-h-10">
                                            <div class="form-group">
                                                {{ Form::label(__('New'), null, ['class' => 'col-lg-3 control-label']) }}
                                                {{ Form::select('new', ['0' => __('Không phải sản phẩm mới'), '1' => __('Sản phẩm mới')], null, ['class' => 'form-control']) }}  
                                                @if ($errors->has('new'))
                                                <div class="alert alert-danger">
                                                    <ul>
                                                        @foreach ($errors->get('new') as $new)
                                                        <li>{{ $new }}</li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="p-h-10">
                                            <div class="form-group">
                                                {{ Form::label(__('unit'), null, ['class' => 'control-label']) }}
                                                {{ Form::text('unit', null, ['class' => 'form-control']) }}
                                                @if ($errors->has('unit'))
                                                <div class="alert alert-danger">
                                                    <ul>
                                                        @foreach ($errors->get('unit') as $unit)
                                                        <li>{{ $unit }}</li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-2"></div>

                                    <!-- test upload -->
                                   <!--  <div class="col-md-2"></div>    
                                    <div class="col-md-4">
                                            <form action="{{ url('file') }}" enctype="multipart/form-data" method="POST">
                                            {{ csrf_field() }}
                                            <input type="file" name="filesTest" required="true">
                                            <br/>
                                            <input type="submit" value="upload">
                                        </form>
                                    </div> -->

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
