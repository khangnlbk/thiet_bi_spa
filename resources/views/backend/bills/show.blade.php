@extends('backend.layouts.master')
@section('title', 'Bill Detail')
@section('content')

<div class="page-container">
    <div class="main-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header">
                        <h2 class="header-title">{{ __('Bill Detail') }}</h2>
                        <div class="header-sub-title">
                            <nav class="breadcrumb breadcrumb-dash">
                                <a href="backend.home" class="breadcrumb-item"><i class="ti-home p-r-5"></i>{{ __('home') }}</a>
                                <a class="breadcrumb-item" href="{{ route('bills.index') }}">{{ __('Bill Detail') }}</a>
                                <span class="breadcrumb-item active">{{ __('show') }}</span>
                            </nav>
                        </div>
                    </div> 
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <div class="row m-v-30">
                        
                        <div class="col-sm-12 text-center text-sm-left">
                            <br>
                            <h3 class="m-b-9">ID Bill: {{ $bill->id }}  -  Date order: {{ $bill->date_order }}</h3>
                            <br>
                            <div class="form-group">
                                {{ Form::label(__('ID Customer :'), null, ['class' => 'control-label']) }}
                                <span>{{ $bill->customer->id }}</span>
                            </div>
                            <div class="form-group">
                                {{ Form::label(__('Email Customer :'), null, ['class' => 'control-label']) }}
                                <span>{{ $bill->customer->email }}</span>
                            </div>

                            <div class="form-group">
                                {{ Form::label(__(' Customer Name :'), null, ['class' => 'control-label']) }}
                                <span>{{ $bill->customer->full_name }}</span>
                            </div>

                            <div class="form-group">
                                {{ Form::label(__(' Customer Phone Number :'), null, ['class' => 'control-label']) }}
                                <span>{{ $bill->customer->phone_number }}</span>
                            </div>
                            <div class="form-group">
                                {{ Form::label(__(' Customer Address :'), null, ['class' => 'control-label']) }}
                                <span>{{ $bill->customer->address }}</span>
                            </div>

                            <div class="form-group">
                                {{ Form::label(__('Product :'), null, ['class' => 'control-label']) }}
                                <br>
                                @foreach($bill->bill_detail as $value)
                                    <h5><span>* 
                                    Product name : {{ $value->product->name }} || 
                                    Product Type : {{ $value->product->product_type->name }} ||
                                    Unit : {{ $value->quantity }} ||
                                    Price : {{ $value->product->promotion_price }} 

                                </span> 
                                    <br></h5>
                                @endforeach
                            </div>
                            <div class="form-group">
                                {{ Form::label(__('Total :'), null, ['class' => 'control-label']) }}
                                <span>{{ $bill->total }}</span>
                            </div>

                            <div class="form-group">
                                {{ Form::label(__(' Payment :'), null, ['class' => 'control-label']) }}
                                <span>{{ $bill->payment }}</span>
                            </div>

                            <div class="form-group">
                                {{ Form::label(__(' Note :'), null, ['class' => 'control-label']) }}
                                <span>{{ $bill->note }}</span>
                            </div>

                            <div class="form-group">
                                {{ Form::label(__(' Status :'), null, ['class' => 'control-label']) }}
                                @if ($bill->status == 1) 
                                    <a href="{{ route('bills.edit', $bill->id) }}"><i>Accepted</i></a>
                                @else
                                    <a href="{{ route('bills.edit', $bill->id) }}"><i>Watting Accept</i></a>
                                @endif

                            </div>

                            <div class="col-lg-10 col-lg-offset-2">
                                <a href="{{ route('bills.index') }}" class="btn btn-default">{{ __('Back') }}</a>
                                <!-- <a href="{{ route('bills.edit', $bill->id) }}" class="btn btn-success">{{ __('Edit') }}</a> -->
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
