<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title> @yield('title') </title>
    <link rel="apple-touch-icon" href="{{ asset('assets/demo-bower/assets/images/logo/apple-touch-icon.html') }}">
    <link rel="shortcut icon" href="{{ asset('assets/demo-bower/assets/images/logo/favicon.png') }}">
    {{ Html::style('assets/bootstrap/dist/css/bootstrap.css') }}
    {{ Html::style('assets/demo-bower/assets/vendor/PACE/themes/blue/pace-theme-minimal.css') }}
    {{ Html::style('assets/perfect-scrollbar/css/perfect-scrollbar.min.css') }}
    @yield('style')
    {{ Html::style('assets/demo-bower/assets/css/font-awesome.min.css') }}
    {{ Html::style('assets/demo-bower/assets/css/themify-icons.css') }}
    {{ Html::style('assets/mdi/css/materialdesignicons.min.css') }}
    {{ Html::style('assets/demo-bower/assets/css/animate.min.css') }}
    {{ Html::style('assets/demo-bower/assets/css/app.css') }}
    {{ Html::style('css/mystyle.css') }}
    <link rel="stylesheet" type="text/css" href="/css/bootstrap-notifications.min.css">
</head>

<body>

    <div class="app header-default side-nav-dark">
        <div class="layout">
                @include('backend.layouts.header')
                @include('backend.layouts.navbar')
                @include('backend.layouts.config')
            @yield('content')
         </div>
    </div>

    {{ Html::script('assets/ckeditor/ckeditor.js') }}
    <script> CKEDITOR.replace('editor1'); </script>
    {{ Html::script('assets/demo-bower/assets/js/vendor.js') }}
    {{ Html::script('assets/demo-bower/assets/js/app.min.js') }}
    {{ Html::script('assets/demo-bower/assets/vendor/chart.js/dist/Chart.min.js') }}
    {{ Html::script('assets/demo-bower/assets/vendor/jquery.sparkline/jquery.sparkline.min.js') }}
    {{ Html::script('assets/demo-bower/assets/js/dashboard/bank.js') }}
    {{ Html::script('assets/remarkable-bootstrap-notify/dist/bootstrap-notify.min.js') }}
    {{ Html::script('assets/pusher-js/dist/web/pusher.min.js') }}
    <script type="text/javascript">
        $(document).ready(function () {
            @if (Session::has('success'))
                $.notify(
                {
                    icon: 'mdi mdi-check-circle-outline',
                    message: '{{ Session('success') }}'
                }, {
                    type: 'success',
                    timer: 1000,
                    placement: {
                        from: 'bottom',
                        align: 'right'
                    }
                });
            @elseif (Session::has('error'))
                $.notify(
                {
                    icon: 'mdi mdi-close-circle-outline',
                    message: '{{ Session('error') }}'
                }, {
                    type: 'danger',
                    timer: 1000,
                    placement: {
                        from: 'bottom',
                        align: 'right'
                    }
                });
            @endif
        });
    </script>
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $(document).ready(function() {
            fetch_noti_count();
            fetch_noti_list();
            function fetch_noti_count() {
                $.ajax({
                    url: "{{ url('manager/notification/fetch_noti_count') }}",
                    method: 'POST',
                    dataType: 'JSON',
                    success: function(data)
                    {
                        // console.log(data);
                        $('#noti-count').html(data);
                    }
                })
            }
            function fetch_noti_list() {
                var i;
                var content = '';
                var html ='';
                $.ajax({
                    url: "{{ url('manager/notification/fetch_noti_list') }}",
                    method: 'POST',
                    dataType: 'JSON',
                    success: function(data)
                    {
                        //0 = from_user_name
                        //1 = type
                        //2 = type_id
                        //3 = diff_time
                        //4 = diff_type
                        //5 = avatar
                        // console.log(data);
                        for (i = 0; i < data.length; i++) {
                            if (data[i][1] == 'replied') {
                                content = ' to a comment you made';
                            } else if (data[i][1] == 'commented') {
                                content = ' on your review';
                            }
                            html =
                                '<li>' +
                                '<ul class="list-media overflow-y-auto relative scrollable">' +
                                '<li class="list-item border bottom">' +
                                '<a href="/manager/vacations/' + data[i][2] + '" class="media-hover p-15">' +
                                '<div class="media-img">' +
                                '<div class="icon-avatar bg-success">' +
                                '<img src="/assets/images/avatars/' + data[i][5] + '">' +
                                '</div>' +
                                '</div>' +
                                '<div class="info">' +
                                '<span class="title">' + data[i][0] + '</span>' +
                                '<span class="sub-title">' + data[i][1] + '</span>' +
                                '</div>' +
                                '</a>' +
                                '</li>' +
                                '</ul>' +
                                '</li>';

                            $('#noti-list').append(html);
                        }
                    }
                })
            }
            $('#top-cart-trigger').click( function(e) {
                console.log('da click');
                e.preventDefault();
                $.ajax({
                    url: "{{ url('manager/notification/read') }}",
                    method: 'POST',
                    dataType: 'JSON',
                    success: function(data)
                    {
                        // $('#noti-count').html("0");
                    }
                })
                $('#noti-count').html("0");
            });
        });
    </script>
    <script type="text/javascript">
       Pusher.logToConsole = true;
        if ( "{{ Auth::check() }}") {
            // Pusher.logToConsole = true;
            var pusher_review_vacation = new Pusher('{{ env('PUSHER_APP_KEY') }}', {
                encrypted: true,
                cluster: '{{ env('PUSHER_APP_CLUSTER') }}',
            });
            var channel = pusher_review_vacation.subscribe('review-vacation');
            channel.bind('App\\Events\\ReviewVacation', function(data) {
                console.log(data['result']);
                if ( "{{ Auth::id() }}" == data['to_admin_id']) {
                    $('#noti-count').html(data['count']);
                }
                // $('#noti-list').append(data['message']);
            });
        }
    </script>
    @yield('script')
</body>
</html>
