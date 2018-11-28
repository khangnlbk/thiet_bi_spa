@extends('backend.layouts.master')
@section('title', 'Bills')
@section('content')
<div class="page-container">
    <div class="main-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-8">
                    <div class="page-header">
                        <h2 class="header-title">{{ __('Bills') }}</h2>
                        <div class="header-sub-title">
                            <nav class="breadcrumb breadcrumb-dash">
                                <a href="backend.home" class="breadcrumb-item"><i class="ti-home p-r-5"></i>{{ __('home') }}</a>
                                <a class="breadcrumb-item" href="{{ route('bills.index') }}">{{ __('Bills') }}</a>
                                <span class="breadcrumb-item active">{{ __('index') }}</span>
                            </nav>
                        </div>
                    </div> 
                </div>
                <div class="col-md-4">
                    <!-- <div class="creat_button text-right button_create">
                        <a href="{{ route('bills.create') }}" class="btn btn-success">{{ __('Creat Bills') }}</a>
                    </div>  -->
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <div class="table-overflow">
                        <table id="dt-opt" class="table table-hover table-xl">
                            <thead>
                                <tr>
                                    <th>{{ __('STT') }}</th>
                                    <th>{{ __('Customer Email') }}</th>
                                    <th>{{ __('Date Order') }}</th>
                                    <th>{{ __('Total') }}</th>
                                    <th>{{ __('Payment') }}</th>
                                    <th>{{ __('Note') }}</th>
                                    <th>{{ __('Status') }}</th>
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
                                @foreach($bill as $value)
                                    <tr>
                                        <td>{{ $stt++ }}</td>
                                        <td>{{ $value->customer->email }}</td>
                                        <td>{{ $value->date_order }}</td>
                                        <td>{{ $value->total }}</td>
                                        <td>{{ $value->payment }}</td>
                                        <td>{!! str_limit($value->note, 50) !!}</td>
                                        <td>
                                        @if( $value->status == 1 )
                                                <i>Accepted</i>
                                            @else
                                            <a href="{{ route('bills.edit', $value->id) }}"
                                                <i>Waiting Accept</i>
                                            @endif
                                            </a></td>
                                        </td>
                                        <td class="font-size-18 text-center">
                                            <a href="{{ route('bills.show', $value->id) }}" class="text-gray m-r-15"><i class="fa fa-file"></i></a>
                                           <!--  <a href="{{ route('bills.edit', $value->id) }}" class="text-gray m-r-15"><i class="ti-pencil"></i></a> -->
                                            <a data-toggle="modal" data-target="#basic-modal" data-url="{{ route('bills.destroy', $value->id) }}" class="text-gray m-r-15"><i class="ti-trash"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>                        
                        </table>
                    </div> 
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
});
</script>
@endsection
