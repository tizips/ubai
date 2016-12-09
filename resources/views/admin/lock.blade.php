<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <link rel="icon" type="image/png" href="/favicon.ico">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

    <title>{{ $title }} - 余白</title>

    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />

    <!--  Social tags      -->
    <meta name="keywords" content="">

    <meta name="description" content="">

    <!-- Bootstrap core CSS     -->
    <link href="/Static/admin/css/bootstrap.min.css" rel="stylesheet" />

    <!--  Light Bootstrap Dashboard core CSS    -->
    <link href="/Static/admin/css/light-bootstrap-dashboard.css" rel="stylesheet"/>

    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="/Static/admin/css/demo.css" rel="stylesheet" />


    <!--     Fonts and icons     -->
    <link href="https://cdn.css.net/files/fontawesome/4.6.3/css/font-awesome.min.css" rel="stylesheet">
    <link href="https://fonts.css.network/css?family=Roboto:400,700,300" rel="stylesheet" type="text/css">
    <link href="/Static/admin/css/pe-icon-7-stroke.css" rel="stylesheet" />
</head>
<body>


<nav class="navbar navbar-transparent navbar-absolute">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-example-2">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="http://www.inot.vip">inot.Vip</a>
        </div>
        <div class="collapse navbar-collapse">

            <ul class="nav navbar-nav navbar-right">

            </ul>
        </div>
    </div>
</nav>

<div class="wrapper wrapper-full-page">

    <div class="full-page lock-page" data-color="bolck" data-image="/Static/admin/images/full-screen-image-4.jpg">

        <!--   you can change the color of the filter page using: data-color="blue | azure | green | orange | red | purple" -->
        <div class="content">
            <form>
                <div class="user-profile">
                    <div class="author">
                        <img class="avatar" src="/Static/admin/images/default-avatar.png" alt="...">
                    </div>
                    <h4>tizips</h4>
                    <div class="form-group">
                        <input type="password" placeholder="Pass Word ..." class="form-control">
                    </div>
                    <button type="button" class="btn btn-neutral btn-round btn-fil btn-wd">解锁</button>
                </div>
            </form>
        </div>

        <footer class="footer footer-transparent">
            <div class="container">
                <p class="copyright pull-right">
                    &copy; 2016 <a href="http://www.creative-tim.com">Creative Tim</a>, mod by <a href="http://inot.vip">tizips</a>
                </p>
            </div>
        </footer>
    </div>

</div>
</body>

<!--   Core JS Files and PerfectScrollbar library inside jquery.ui   -->
<script src="/Static/admin/js/jquery.min.js" type="text/javascript"></script>
<script src="/Static/admin/js/jquery-ui.min.js" type="text/javascript"></script>
<script src="/Static/admin/js/bootstrap.min.js" type="text/javascript"></script>


<!--  Forms Validations Plugin -->
{{--<script src="/Static/admin/js/jquery.validate.min.js"></script>--}}

<!--  Plugin for Date Time Picker and Full Calendar Plugin-->
<script src="/Static/admin/js/moment.min.js"></script>

<!--  Date Time Picker Plugin is included in this js file -->
{{--<script src="/Static/admin/js/bootstrap-datetimepicker.js"></script>--}}

<!--  Select Picker Plugin -->
{{--<script src="/Static/admin/js/bootstrap-selectpicker.js"></script>--}}

<!--  Checkbox, Radio, Switch and Tags Input Plugins -->
<script src="/Static/admin/js/bootstrap-checkbox-radio-switch-tags.js"></script>

<!--  Charts Plugin -->
{{--<script src="/Static/admin/js/chartist.min.js"></script>--}}

<!--  Notifications Plugin    -->
<script src="/Static/admin/js/bootstrap-notify.js"></script>

<!-- Sweet Alert 2 plugin -->
{{--<script src="/Static/admin/js/sweetalert2.js"></script>--}}

<!-- Vector Map plugin -->
<script src="/Static/admin/js/jquery-jvectormap.js"></script>

<!--  Google Maps Plugin    -->
{{--<script src="https://maps.googleapis.com/maps/api/js"></script>--}}

<!-- Wizard Plugin    -->
{{--<script src="/Static/admin/js/jquery.bootstrap.wizard.min.js"></script>--}}

<!--  Datatable Plugin    -->
{{--<script src="/Static/admin/js/bootstrap-table.js"></script>--}}

<!--  Full Calendar Plugin    -->
{{--<script src="/Static/admin/js/fullcalendar.min.js"></script>--}}

<!-- Light Bootstrap Dashboard Core javascript and methods -->
<script src="/Static/admin/js/light-bootstrap-dashboard.js"></script>

<!--   Sharrre Library    -->
<script src="/Static/admin/js/jquery.sharrre.js"></script>

<!-- Light Bootstrap Dashboard DEMO methods, don't include it in your project! -->
<script src="/Static/admin/js/demo.js"></script>

<script type="text/javascript">
    $(document).ready(function(){
        lbd.checkFullPageBackgroundImage();
        @if(is_string($errors))
            $.notify({
                icon: 'pe-7s-bell',
                message: "{{ $errors }}"
            },{
                type: 'danger',
                timer: 500
            });
        @endif
    });
</script>
<script>
    $("button[type=button]").click(function () {
        $.ajax({
            url: "/toLock",
            type: 'POST',
            data: {
                password : $("input[type=password]").val(),
                _token: "{{ csrf_token() }}",
            },
            success: function (data) {
                if (data['status'] == 0) {
                    $.notify({
                        icon: 'pe-7s-bell',
                        message: data['msg']
                    },{
                        type: 'danger',
                        timer: 500
                    });
                }else if (data['status'] === 1) {
                    $.notify({
                        icon: 'pe-7s-check',
                        message: data['msg']
                    },{
                        type: 'success',
                        timer: 500
                    });
                    setTimeout("window.location.href = '/admin/system'", 500);                   ;
                }else if (data['status'] === 2){
                    window.location.href = '/login';
                }else {
                    $.notify({
                        icon: 'pe-7s-bell',
                        message: "服务器错误 ，请稍后再试 ！"
                    },{
                        type: 'danger',
                        timer: 500
                    });
                }
            },
            error: function () {
                $.notify({
                    icon: 'pe-7s-bell',
                    message: "服务器错误 ，请稍后再试 ！"
                },{
                    type: 'danger',
                    timer: 500
                });
            }
        })
    });
</script>
</html>