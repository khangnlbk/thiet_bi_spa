<!doctype html>
<html lang="en">
<head>
	<title>@yield('title')</title>
	<link rel="apple-touch-icon" href="{{ asset('assets/demo-bower/assets/images/logo/apple-touch-icon.html') }}">
    <link rel="shortcut icon" href="{{ asset('assets/demo-bower/assets/images/logo/test.png') }}">
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<base href="{{asset('')}}">
	<link href='http://fonts.googleapis.com/css?family=Dosis:300,400' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="http://netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css">
	<link rel="stylesheet" href="source/assets/dest/css/font-awesome.min.css">
	<link rel="stylesheet" href="source/assets/dest/vendors/colorbox/example3/colorbox.css">
	<link rel="stylesheet" href="source/assets/dest/rs-plugin/css/settings.css">
	<link rel="stylesheet" href="source/assets/dest/rs-plugin/css/responsive.css">
	<link rel="stylesheet" title="style" href="source/assets/dest/css/style.css">
	<link rel="stylesheet" href="source/assets/dest/css/animate.css">
	<link rel="stylesheet" title="style" href="source/assets/dest/css/huong-style.css">
</head>
<body>

	@include('header')
	<div class="rev-slider">
		@yield('content')
	</div>
	@include('footer')
	</div>
	<div class="copyright">
		<div class="container">
			<p class="pull-left">Chính sách bảo mật. (&copy;) 2018</p>
			<p class="pull-right pay-options">
				<a href="https://sohapay.vn/info/vi/help/huong-dan-thanh-toan/107-the-mastercard.html"><img src="source/image/master.jpg" alt="" /></a>
				<a href="https://whypay.vn/tin-tuc/huong-dan-thanh-toan-online-bang-the-VISA-MASTER.html"><img src="source/image/visa.jpg" alt="" /></a>
				<a href="https://www.payvnn.com/huong-dan-thanh-toan-truc-tuyen-voi-the-visa-va-paypal/"><img src="source/image/paypal.jpg" alt="" /></a>
			</p>
			<div class="clearfix"></div>
		</div>
	</div>


	
	<script src="source/assets/dest/js/jquery.js"></script>
	<script src="source/assets/dest/vendors/jqueryui/jquery-ui-1.10.4.custom.min.js"></script>
	<script src="http://netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
	<script src="source/assets/dest/vendors/bxslider/jquery.bxslider.min.js"></script>
	<script src="source/assets/dest/vendors/colorbox/jquery.colorbox-min.js"></script>
	<script src="source/assets/dest/vendors/animo/Animo.js"></script>
	<script src="source/assets/dest/vendors/dug/dug.js"></script>
	<script src="source/assets/dest/js/scripts.min.js"></script>
	<script src="source/assets/dest/rs-plugin/js/jquery.themepunch.tools.min.js"></script>
	<script src="source/assets/dest/rs-plugin/js/jquery.themepunch.revolution.min.js"></script>
	<script src="source/assets/dest/js/waypoints.min.js"></script>
	<script src="source/assets/dest/js/wow.min.js"></script>
	
	<script src="source/assets/dest/js/custom2.js"></script>
	<script>
	$(document).ready(function($) {    
		$(window).scroll(function(){
			if($(this).scrollTop()>150){
			$(".header-bottom").addClass('fixNav')
			}else{
				$(".header-bottom").removeClass('fixNav')
			}}
		)
	})
	</script>
	

	<a href="https:m.me/195514954657519" target="_blank" style="position: fixed;right:10px;bottom: 10px;z-index: 9999;"><svg width="60px" height="60px" viewBox="0 0 60 60"><svg x="0" y="0" width="60" height="60"><defs><linearGradient x1="50%" y1="100%" x2="50%" y2="0.000340050378%" id="linearGradient-1"><stop stop-color="#0068FF" offset="4.5%"></stop><stop stop-color="#00C6FF" offset="95.5%"></stop></linearGradient></defs><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><g><g><circle fill="#FFFFFF" cx="30" cy="30" r="30"></circle><g transform="translate(10.000000, 11.000000)"><path d="M0,18.7150914 C0,24.5969773 2.44929143,29.6044708 6.95652174,33.0434783 L6.95652174,40 L14.2544529,36.6459314 C16.0763359,37.1551856 18,37.4301829 20,37.4301829 C31.043257,37.4301829 40,29.0529515 40,18.7150914 C40,8.37723141 31.043257,0 20,0 C8.956743,0 0,8.37723141 0,18.7150914 Z" fill="url(#linearGradient-1)"></path><polygon fill="#FFFFFF" points="16.9378907 19.359375 7 25 17.8976562 13.140625 23.0570312 18.640625 33 13 22.1023437 24.859375"></polygon></g></g></g></g></svg></svg></a>

</body>
</html>
