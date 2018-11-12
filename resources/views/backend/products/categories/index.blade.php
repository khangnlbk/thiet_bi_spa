@extends('backend.layouts.master')
@section('title', 'Product')
@section('style')
{!! Html::style('assets/demo-bower/assets/vendor/datatables/media/css/dataTables.bootstrap4.min.css') !!} 
@endsection
@section('content')
<div class="page-container">
    <div class="main-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-8">
                    <div class="page-header">
                        <h2 class="header-title">{{ __('product') }}</h2>
                        <div class="header-sub-title">
                            <nav class="breadcrumb breadcrumb-dash">
                                <a href="#" class="breadcrumb-item"><i class="ti-home p-r-5"></i>{{ __('home') }}</a>
                                <a class="breadcrumb-item" href="{{ route('product.index') }}">{{ __('product') }}</a>
                                <span class="breadcrumb-item active">{{ __('category') }}</span>
                            </nav>
                        </div>
                    </div> 
                </div>
                <div class="col-md-4">
                    <div class="creat_button text-right button_create">
                        <a href="#" data-toggle="modal" data-target="#modal-category" class="btn btn-success">{{ __('button_category') }}</a>
                    </div> 
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <div class="table-overflow">
                        <table id="dt-opt" class="table table-hover table-xl">
                            <thead>
                                <tr>
                                    <th>{{ __('STT') }}</th>
                                    <th>{{ __('category') }}</th>
                                    <th></th>
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
                                @php
                                    $stt = 1;
                                @endphp
                                @foreach($categories as $value)
                                    <tr>
                                        <td>{{ $stt++ }}</td>
                                        <td>{{ $value->name }}</td>
                                        <td class="font-size-18 text-center">
                                            <a data-toggle="modal" data-target="#modal-update" data-url="{{ route('category.update', $value->id) }}" data-value="{{ $value }}" class="text-gray m-r-15"><i class="ti-pencil"></i></a>
                                            <a data-toggle="modal" data-target="#basic-modal" data-url="{{ route('category.destroy', $value->id) }}" class="text-gray m-r-15"><i class="ti-trash"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>                        
                        </table>
                    </div> 
                </div>       
            </div>  
        </div>
        <div class="modal fade" id="modal-category">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-body">
                        <div>
                            <h4 class="d-flex align-items-center h-100">{{ __('add_category') }}</h4>
                        </div>
                    </div>
                    {!! Form::open(['method' => 'POST', 'url' => asset('manager/category')]) !!}
                        <div class="form-group"> 
                            <div class="col-12">
                                <div class="row">
                                    {{ Form::label(__('name'), null, ['class' => 'col-lg-2 control-label']) }}
                                    <div class="col-lg-10">
                                    {{ Form::text('name', null, ['class' => 'form-control', 'required' => 'required']) }}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer no-border">
                            <div>
                                {{ Form::button(__('cancel'), ['class' =>'btn btn-default', 'data-dismiss' => 'modal']) }}
                                {{ Form::submit(__('create'), ['class' =>'btn btn-success']) }}
                            </div>
                        </div> 
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
        <div class="modal fade" id="basic-modal">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-body">
                        <div>
                            <h4 class="d-flex align-items-center h-100 head">{{ __('delete_confirm') }}</h4>
                        </div>
                        <div class="container text-center">
                            <div class="text-center font-size-70">
                                <i class="mdi mdi-checkbox-marked-circle-outline icon-gradient-success"></i>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer no-border">
                        <div class="modal_button">
                            <div class="row"> 
                                {{ Form::button(__('cancel'), ['class' =>'btn btn-default', 'data-dismiss' => 'modal']) }}
                                {!! Form::open(['id' => 'del-form', 'method' => 'delete']) !!}
                                    {{ Form::submit(__('delete'), ['class' =>'btn btn-danger']) }}
                                {!! Form::close() !!}
                            </div>
                        </div> 
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="modal-update">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-body">
                        <div>
                            <h4 class="d-flex align-items-center h-100">{{ __('edit_category') }}</h4>
                        </div>
                    </div>
                    {!! Form::open(['method' => 'POST', 'id' => 'update-form']) !!}
                        {{ method_field('PUT') }}
                        <div class="form-group"> 
                            <div class="col-12">
                                <div class="row">
                                    {{ Form::label(__('name'), null, ['class' => 'col-lg-2 control-label']) }}
                                    <div class="col-lg-10">
                                    {{ Form::text('name', null, ['id' => 'category', 'class' => 'form-control', 'required' => 'required']) }}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer no-border">
                            <div>
                                {{ Form::button(__('cancel'), ['class' =>'btn btn-default', 'data-dismiss' => 'modal']) }}
                                {{ Form::submit(__('update'), ['class' =>'btn btn-success']) }}
                            </div>
                        </div> 
                    {!! Form::close() !!}
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
<script type="text/javascript">
$(function() {
    $('#basic-modal').on('show.bs.modal', function(e) {
        var url = $(e.relatedTarget).data('url');
        $('#del-form').attr('action', url);
    });
    $('#modal-update').on('show.bs.modal', function(e) {
        var url = $(e.relatedTarget).data('url');
        var value = $(e.relatedTarget).data('value');
        $('#category').attr('value', value.name);
        $('#update-form').attr('action', url);
    });
});
</script>
@endsection
