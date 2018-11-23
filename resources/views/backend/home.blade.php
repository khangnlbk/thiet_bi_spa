@extends('backend.layouts.master')
@section('title', 'Home')
@section('content')

<!-- <div class="page-container">
	<div class="main-content">
		<div bgcolor="red"></div>
	    <div class="container-fluid">
	        <div class="row">
	            <div class="col-md-8">
	                <div class="card">
	                    <div class="card-header">
	                        <h4 class="card-title">Account</h4>
	                        <div class="card-toolbar">
	                            <ul>
	                                <li>
	                                    <a class="text-gray" href="javascript:void(0)">
	                                        <i class="mdi mdi-dots-vertical font-size-20"></i>
	                                    </a>
	                                </li>
	                            </ul>
	                        </div>
	                    </div>
	                    <div class="card-body">
	                        <div class="row">
	                            <div class="col-md-8">
	                                <ul class="list-inline">
	                                    <li class="m-r-20">
	                                        <a href="#" class="text-semibold text-gray">Today</a>
	                                    </li>
	                                    <li class="m-r-20">
	                                        <a href="#" class="text-semibold text-gray">7 days</a>
	                                    </li>
	                                    <li class="m-r-20">
	                                        <a href="#" class="text-semibold text-gray">14 days</a>
	                                    </li>
	                                    <li class="m-r-20">
	                                        <a href="#" class="text-semibold text-gray active">1 Month</a>
	                                    </li>
	                                </ul>
	                                <div class="m-t-20">
	                                    <canvas id="account-chart" class="chart" style="height: 320px"></canvas>
	                                </div>
	                            </div>
	                            <div class="col-md-4">
	                                <div class="card m-t-10">
	                                    <div class="card-body p-15">
	                                        <div class="media">
	                                            <div class="align-self-center">
	                                                <i class="ti-wallet font-size-40 icon-gradient-success text-success"></i>
	                                            </div>
	                                            <div class="m-l-20">
	                                                <p class="m-b-0">Income</p>
	                                                <h2 class="font-weight-light m-b-0">$53,495</h2>
	                                            </div>
	                                        </div>
	                                    </div>
	                                </div>
	                                <div class="card">
	                                    <div class="card-body p-15">
	                                        <div class="media">
	                                            <div class="align-self-center">
	                                                <i class="ti-receipt font-size-40 icon-gradient-info text-info"></i>
	                                            </div>
	                                            <div class="m-l-20">
	                                                <p class="m-b-0">Tax</p>
	                                                <h2 class="font-weight-light m-b-0">$2,738</h2>
	                                            </div>
	                                        </div>
	                                    </div>
	                                </div>
	                                <div class="card">
	                                    <div class="card-body p-15">
	                                        <div class="media">
	                                            <div class="align-self-center">
	                                                <i class="ti-bar-chart font-size-40 icon-gradient-primary text-primary"></i>
	                                            </div>
	                                            <div class="m-l-20">
	                                                <p class="m-b-0">Growth</p>
	                                                <h2 class="font-weight-light m-b-0 text-success">
	                                                    <span>18%</span>
	                                                    <i class="ti-arrow-up font-size-14"></i>
	                                                </h2>
	                                            </div>
	                                        </div>
	                                    </div>
	                                </div>
	                            </div>
	                        </div>
	                    </div>
	                </div>
	            </div>
	            <div class="col-md-4">
	                <div class="card">
	                    <div class="card-header">
	                        <h4 class="card-title">Account Summary</h4>
	                        <div class="card-toolbar">
	                            <ul>
	                                <li>
	                                    <a class="text-gray" href="javascript:void(0)">
	                                        <i class="mdi mdi-dots-vertical font-size-20"></i>
	                                    </a>
	                                </li>
	                            </ul>
	                        </div>
	                    </div>
	                    <div class="border bottom">
	                        <div class="card-body p-v-15">
	                            <div class="row align-items-center">
	                                <div class="col-sm">
	                                    <p class="m-b-0">Balance</p>
	                                    <h2 class="font-weight-light m-b-0 font-size-28">$63,495</h2>
	                                </div>
	                                <div class="col-sm">
	                                    <div class="text-right m-t-20">
	                                        <button class="btn btn-info m-b-0 m-r-5">
	                                            <i class="mdi mdi-credit-card-plus font-size-16 m-r-5"></i>
	                                            <span>Deposit</span>
	                                        </button>
	                                    </div>
	                                </div>
	                            </div>
	                        </div>
	                    </div>
	                    <div class="card-body">
	                        <ul class="list-unstyled p-h-10">
	                            <li class="m-b-20">
	                                <h5>Statement</h5>
	                            </li>
	                            <li class="p-b-10 m-b-10 border bottom">
	                                <span class="text-semibold text-dark font-size-15">Income</span>
	                                <span class="float-right">$53,495</span>
	                            </li>
	                            <li class="p-b-10 m-b-10">
	                                <span class="text-semibold text-dark font-size-15">Transfered</span>
	                                <span class="float-right">$1,889</span>
	                            </li>
	                        </ul>
	                        <ul class="list-unstyled p-h-10 m-t-35">
	                            <li class="m-b-20">
	                                <h5>Account Details</h5>
	                            </li>
	                            <li class="p-b-10 m-b-10 border bottom">
	                                <span class="text-semibold text-dark font-size-15">Ref. Number</span>
	                                <span class="float-right">P0W15323</span>
	                            </li>
	                            <li class="p-b-10 m-b-10">
	                                <span class="text-semibold text-dark font-size-15">Status</span>
	                                <span class="float-right text-semibold text-success">Actived</span>
	                            </li>
	                        </ul>
	                    </div>
	                </div>
	            </div>
	        </div>
	        <div class="row">
	            <div class="col-md-7">
	                <div class="card">
	                    <div class="card-header">
	                        <h4 class="card-title">Credit Card</h4>
	                        <div class="card-toolbar">
	                            <ul>
	                                <li>
	                                    <a class="text-gray" href="javascript:void(0)">
	                                        <i class="mdi mdi-dots-vertical font-size-20"></i>
	                                    </a>
	                                </li>
	                            </ul>
	                        </div>
	                    </div>
	                    <div class="card-body">
	                        <div class="row">
	                            <div class="col-md-7">
	                                <div class="card widget-credit-card border-radius-8 bg-gradient-info">
	                                    <div class="card-body">
	                                        <div class="m-b-40">
	                                            <h3 class="font-weight-light d-inline-block">John Doe</h3>
	                                            <div class="float-right">
	                                                <img src="assets/images/others/visa-white.png" alt="">
	                                            </div>    
	                                        </div>
	                                        <div class="m-b-20">
	                                            <span class="text-semibold">Valid</span>
	                                            <span class="m-l-5">8 / 23</span>
	                                        </div>
	                                        <h3 class="font-weight-light">
	                                            <span class="m-r-5">5224</span>
	                                            <span class="m-r-5">7576</span>
	                                            <span class="m-r-5">2197</span>
	                                            <span class="m-r-5">3458</span>
	                                        </h3>
	                                        <span class="font-weight-light">203</span>
	                                    </div>
	                                </div>
	                            </div>
	                            <div class="col-md-5">
	                                <div class="row m-b-15 m-t-25">
	                                    <div class="col-sm-7">
	                                        <span class="text-semibold font-size-15 text-dark">Name on Card</span>
	                                    </div>
	                                    <div class="col-sm-5 text-right">
	                                        <span>John Doe</span>
	                                    </div>
	                                </div>
	                                <div class="row m-b-15">
	                                    <div class="col-sm-7">
	                                        <span class="text-semibold font-size-15 text-dark">Credit Avaiable</span>
	                                    </div>
	                                    <div class="col-sm-5 text-right">
	                                        <span>$8,422</span>
	                                    </div>
	                                </div>
	                                <div class="row m-b-15">
	                                    <div class="col-sm-7">
	                                        <span class="text-semibold font-size-15 text-dark">Outstanding</span>
	                                    </div>
	                                    <div class="col-sm-5 text-right">
	                                        <span>$3,654</span>
	                                    </div>
	                                </div>
	                                <div class="row m-b-15">
	                                    <div class="col-sm-7">
	                                        <span class="text-semibold font-size-15 text-dark">Balanced</span>
	                                    </div>
	                                    <div class="col-sm-5 text-right">
	                                        <span>$769</span>
	                                    </div>
	                                </div>
	                                <div class="row m-b-35">
	                                    <div class="col-sm-7">
	                                        <span class="text-semibold font-size-15 text-dark">Due Date</span>
	                                    </div>
	                                    <div class="col-sm-5 text-right">
	                                        <span>20/5/2018</span>
	                                    </div>
	                                </div>
	                                <div class="text-right">
	                                    <button class="btn btn-default m-r-0">
	                                        Make Payment
	                                    </button>
	                                </div>
	                            </div>
	                        </div>
	                    </div>
	                </div>
	            </div>
	            <div class="col-md-5">
	                <div class="card">
	                    <div class="card-header">
	                        <h4 class="card-title">Recent Activities</h4>
	                        <div class="card-toolbar">
	                            <ul>
	                                <li>
	                                    <a class="text-gray" href="javascript:void(0)">
	                                        <i class="mdi mdi-dots-vertical font-size-20"></i>
	                                    </a>
	                                </li>
	                            </ul>
	                        </div>
	                    </div>
	                    <table class="table table-xl">
	                        <tbody>
	                            <tr>
	                                <td class="text-center">
	                                    <span>May</span>
	                                    <h4>21</h4>
	                                </td>
	                                <td>
	                                    <h5 class="m-b-0">Online Payment</h5>
	                                    <span class="font-size-13">Payment Received</span>
	                                </td>
	                                <td class="text-right">
	                                    <h5 class="m-b-0 text-success">+ 220.40</h5>
	                                    <span class="font-size-13">USD</span>
	                                </td>
	                            </tr>
	                            <tr>
	                                <td class="text-center">
	                                    <span>May</span>
	                                    <h4>20</h4>
	                                </td>
	                                <td>
	                                    <h5 class="m-b-0">PayPal USA LLC</h5>
	                                    <span class="font-size-13">Payment Received</span>
	                                </td>
	                                <td class="text-right">
	                                    <h5 class="m-b-0 text-success">+ 1788.20</h5>
	                                    <span class="font-size-13">USD</span>
	                                </td>
	                            </tr>
	                            <tr>
	                                <td class="text-center">
	                                    <span>May</span>
	                                    <h4>16</h4>
	                                </td>
	                                <td>
	                                    <h5 class="m-b-0">Bank of America</h5>
	                                    <span class="font-size-13">Withdraw</span>
	                                </td>
	                                <td class="text-right">
	                                    <h5 class="m-b-0">- 332.80</h5>
	                                    <span class="font-size-13">USD</span>
	                                </td>
	                            </tr>
	                        </tbody>
	                    </table>
	                </div>
	            </div>
	        </div>
	        <div class="row">
	            <div class="col-md-4">
	                <div class="card">
	                    <div class="card-header">
	                        <h4 class="card-title">Holdings</h4>
	                        <div class="card-toolbar">
	                            <ul>
	                                <li>
	                                    <a class="text-gray" href="javascript:void(0)">
	                                        <i class="mdi mdi-dots-vertical font-size-20"></i>
	                                    </a>
	                                </li>
	                            </ul>
	                        </div>
	                    </div>
	                    <div class="tab-info center-tabs">
	                        <ul class="nav nav-tabs" role="tablist">
	                            <li class="nav-item">
	                                <a href="#card-tab-1" class="nav-link active show" role="tab" data-toggle="tab">Microsoft</a>
	                            </li>
	                            <li class="nav-item">
	                                <a href="#card-tab-2" class="nav-link" role="tab" data-toggle="tab">Starbuck</a>
	                            </li>
	                            <li class="nav-item">
	                                <a href="#card-tab-3" class="nav-link" role="tab" data-toggle="tab">Apple Inc.</a>
	                            </li>
	                        </ul>
	                        <div class="tab-content">
	                            <div class="card-body">
	                                <div class="text-center m-t-20">
	                                    <h3 class="font-weight-light">Microsoft</h3>
	                                    <h4>
	                                        <span class="m-r-10">$23,495</span>
	                                        <span class="text-success font-size-14">
	                                            <i class="ti-arrow-up font-size-12"></i>
	                                            18%
	                                        </span>
	                                    </h4>
	                                </div>
	                            </div>
	                            <div class="m-t-20">
	                                <canvas id="holdings-chart" class="chart" style="height:180px"></canvas>
	                            </div>
	                        </div>
	                    </div>
	                </div>
	            </div>
	            <div class="col-md-4">
	                <div class="card">
	                    <div class="card-header">
	                        <h4 class="card-title">Money Analytic</h4>
	                        <div class="card-toolbar">
	                            <ul>
	                                <li>
	                                    <a class="text-gray" href="javascript:void(0)">
	                                        <i class="mdi mdi-dots-vertical font-size-20"></i>
	                                    </a>
	                                </li>
	                            </ul>
	                        </div>
	                    </div>    
	                    <div class="card-body">
	                        <div class="m-b-30">
	                            <canvas id="money-chart" class="chart" style="height:195px"></canvas>
	                        </div>
	                        <div class="row">
	                            <div class="col-sm-10 offset-sm-1">
	                                <div class="m-b-20">
	                                    <span class="status success"></span>
	                                    <span class="m-b-10 font-size-16 m-l-5">Transfers</span>
	                                    <div class="float-right">
	                                        <b class="text-dark">$7,623 </b>
	                                    </div>
	                                </div>
	                            </div>
	                        </div>
	                        <div class="row">
	                            <div class="col-sm-10 offset-sm-1">
	                                <div class="m-b-20">
	                                    <span class="status primary"></span>
	                                    <span class="m-b-10 font-size-16 m-l-5">Bills</span>
	                                    <div class="float-right">
	                                        <b class=" text-dark">$16,871</b>
	                                    </div>
	                                </div>
	                            </div>
	                        </div>
	                        <div class="row">
	                            <div class="col-sm-10 offset-sm-1">
	                                <div class="m-b-20">
	                                    <span class="status info"></span>
	                                    <span class="m-b-10 font-size-16 m-l-5">Withdraw</span>
	                                    <div class="float-right">
	                                        <b class=" text-dark">$2,138</b>
	                                    </div>
	                                </div>
	                            </div>
	                        </div>
	                    </div>
	                </div>
	            </div>
	            <div class="col-md-4">
	                <div class="card">
	                    <div class="card-header">
	                        <h4 class="card-title">Notifications</h4>
	                        <div class="card-toolbar">
	                            <ul>
	                                <li>
	                                    <a class="text-gray" href="javascript:void(0)">
	                                        <i class="mdi mdi-dots-vertical font-size-20"></i>
	                                    </a>
	                                </li>
	                            </ul>
	                        </div>
	                    </div>
	                    <ul class="list-media">
	                        <li class="list-item border bottom">
	                            <a href="javascript:void(0);" class="media-hover p-20">
	                                <div class="media-img">
	                                    <img src="assets/images/avatars/thumb-1.jpg" alt="">
	                                </div>
	                                <div class="info">
	                                    <span class="title">Marshall Nichols</span>
	                                    <span class="sub-title">has replied your mails.</span>
	                                    <span class="float-item font-size-11 p-t-5">8 min ago</span>
	                                </div>
	                            </a>
	                        </li>
	                        <li class="list-item border bottom">
	                            <a href="javascript:void(0);" class="media-hover p-20">
	                                <div class="media-img">
	                                    <img src="assets/images/avatars/thumb-2.jpg" alt="">
	                                </div>
	                                <div class="info">
	                                    <span class="title">Susie Willis</span>
	                                    <span class="sub-title">commented on your post's</span>
	                                    <span class="float-item font-size-11 p-t-5">12 min ago</span>
	                                </div>
	                            </a>
	                        </li>
	                        <li class="list-item border bottom">
	                            <a href="javascript:void(0);" class="media-hover p-20">
	                                <div class="media-img">
	                                    <div class="icon-avatar bg-gradient-info">
	                                        <i class="ti-settings"></i>
	                                    </div>
	                                </div>
	                                <div class="info">
	                                    <span class="title">System Notifications</span>
	                                    <span class="sub-title">Your account updated</span>
	                                    <span class="float-item font-size-11 p-t-5">2 days ago</span>
	                                </div>
	                            </a>
	                        </li>
	                        <li class="list-item border bottom">
	                            <a href="javascript:void(0);" class="media-hover p-20">
	                                <div class="media-img">
	                                    <div class="icon-avatar bg-gradient-success">
	                                        <i class="mdi mdi-file-outline"></i>
	                                    </div>
	                                </div>
	                                <div class="info">
	                                    <span class="title">New Attachment</span>
	                                    <span class="sub-title">3 files has updated</span>
	                                    <span class="float-item font-size-11 p-t-5">5 days ago</span>
	                                </div>
	                            </a>
	                        </li>
	                        <li class="list-item border bottom">
	                            <a href="javascript:void(0);" class="media-hover p-20">
	                                <div class="media-img">
	                                    <div class="icon-avatar bg-warning">
	                                        <span>FW</span>
	                                    </div>
	                                </div>
	                                <div class="info">
	                                    <span class="title">Franklin Weaver</span>
	                                    <span class="sub-title">has sent you a message.</span>
	                                    <span class="float-item font-size-11 p-t-5">10 days ago</span>
	                                </div>
	                            </a>
	                        </li>
	                    </ul>    
	                </div>
	            </div>
	        </div>
	    </div>
	</div>
</div>
 -->
@endsection
