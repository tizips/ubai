<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <link rel="icon" type="image/png" href="{{ url('/favicon.ico') }}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

    <title>login - {{ config('site.web_name' , '余白') }}</title>

    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />

    <!--  Social tags      -->
    <meta name="keywords" content="">

    <meta name="description" content="">

    <!-- Bootstrap core CSS     -->
    <link href="https://cdn.css.net/files/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet" />

    <!--  Light Bootstrap Dashboard core CSS    -->
    <link href="{{ asset('/admin/css/light-bootstrap-dashboard.css') }}" rel="stylesheet"/>

    <link rel="stylesheet" href="https://cdn.css.net/libs/jquery.bootstrapvalidator/0.5.3/css/bootstrapValidator.min.css"/>
    <!--  CSS for Demo Purpose, don't include it in your project     -->
{{--    <link href="{{ asset('/admin/css/demo.css') }}" rel="stylesheet" />--}}


    <!--     Fonts and icons     -->
    <link href="https://cdn.css.net/files/fontawesome/4.6.3/css/font-awesome.min.css" rel="stylesheet">
    <link href="https://fonts.css.network/css?family=Roboto:400,700,300" rel="stylesheet" type="text/css">
    {{--<link href="/Static/admin/css/pe-icon-7-stroke.css" rel="stylesheet" />--}}

    <style>
        @font-face {
            font-family: 'iconfont';
            src: url('//at.alicdn.com/t/font_1473690180_9971838.eot'); /* IE9*/
            src: url('//at.alicdn.com/t/font_1473690180_9971838.eot?#iefix') format('embedded-opentype'), /* IE6-IE8 */
            url('//at.alicdn.com/t/font_1473690180_9971838.woff') format('woff'), /* chrome、firefox */
            url('//at.alicdn.com/t/font_1473690180_9971838.ttf') format('truetype'), /* chrome、firefox、opera、Safari, Android, iOS 4.2+*/
            url('//at.alicdn.com/t/font_1473690180_9971838.svg#iconfont') format('svg'); /* iOS 4.1- */
        }
        .iconfont{font-family:"iconfont";
            font-size:16px;font-style:normal;}
    </style>

</head>
<body>

<nav class="navbar navbar-transparent navbar-absolute">
    <div class="container">
        <div class="navbar-header">
            <a class="navbar-brand" href="{{ config('site.web_url') }}">{{ config('site.web_name') }}</a>
        </div>
    </div>
</nav>


<div class="wrapper wrapper-full-page">
    <div class="full-page login-page" data-color="block" data-image="/Static/images/full-screen-image-4.jpg">

        <!--   you can change the color of the filter page using: data-color="blue | azure | green | orange | red | purple" -->
        <div class="content">
            <div class="container">
                <div class="row">
                    <div class="col-md-4 col-sm-6 col-md-offset-4 col-sm-offset-3">
                        <form id="loginForm" action="{{ url('/login') }}" method="post">

                            <!--   if you want to have the card without animation please remove the ".card-hidden" class   -->
                            <div class="card{{-- card-hidden--}}">
                                <div class="header text-center">{{ config('site.web_name' , '余白') }}</div>
                                <div class="content">
                                    <div class="form-group">
                                        <label>邮箱</label>
                                        <input type="text" name="email" placeholder="Email Address ..." class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>密码</label>
                                        <input type="password" name="password" placeholder="Pass Word ..." class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label class="checkbox">
                                            <input type="checkbox" data-toggle="checkbox" name="remember">
                                            记住密码
                                        </label>
                                    </div>
                                </div>
                                <div class="footer text-center">
                                    <button type="submit" class="btn btn-fill btn-warning btn-wd">登陆</button>
                                </div>
                            </div>

                        </form>

                    </div>
                </div>
            </div>
        </div>

        <footer class="footer footer-transparent">
            <div class="container">
                <p class="copyright pull-right">
                    &copy; 2016 <a href="http://www.creative-tim.com" rel="nofollow" target="_blank">Creative Tim</a>, mod by <a href="https://www.inot.vip">tizips</a>
                </p>
            </div>
        </footer>

    </div>

</div>
</body>

<!--   Core JS Files and PerfectScrollbar library inside jquery.ui   -->
<script src="https://cdn.css.net/files/jquery/1.12.4/jquery.min.js" type="text/javascript"></script>
<script src="{{ asset('admin/js/jquery-ui.min.js') }}" type="text/javascript"></script>
<script src="https://cdn.css.net/files/bootstrap/3.3.5/js/bootstrap.min.js" type="text/javascript"></script>


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
<script src="https://cdn.css.net/libs/bootstrap-notify/0.2.0/js/bootstrap-notify.min.js"></script>

<!-- Sweet Alert 2 plugin -->
{{--<script src="/Static/admin/js/sweetalert2.js"></script>--}}

<!-- Vector Map plugin -->
{{--<script src="/Static/admin/js/jquery-jvectormap.js"></script>--}}

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

<script type="text/javascript" src="https://cdn.css.net/libs/jquery.bootstrapvalidator/0.5.3/js/bootstrapValidator.min.js"></script>
<!-- Light Bootstrap Dashboard DEMO methods, don't include it in your project! -->
{{--<script src="/Static/admin/js/demo.js"></script>--}}

{{--<script type="text/javascript">--}}
    {{--$().ready(function(){--}}
        {{--lbd.checkFullPageBackgroundImage();--}}
        {{--setTimeout(function(){--}}
            {{--// after 1000 ms we add the class animated to the login/register card--}}
            {{--$('.card').removeClass('card-hidden');--}}
        {{--}, 700);--}}
        {{--@if(is_string($errors))--}}
            {{--$.notify({--}}
            {{--icon: 'pe-7s-bell',--}}
            {{--message: "{{ $errors }}"--}}
        {{--},{--}}
            {{--type: 'danger',--}}
            {{--timer: 500--}}
        {{--});--}}
        {{--@endif--}}
        {{--$('#loginForm').bootstrapValidator({--}}
            {{--fields: {--}}
                {{--name: {--}}
                    {{--validators: {--}}
                        {{--notEmpty: {--}}
                            {{--message: '用户名不能为空'--}}
                        {{--},--}}
                        {{--stringLength: {--}}
                            {{--min: 4,--}}
                            {{--max: 16,--}}
                            {{--message: '用户名长度必须在 4 - 16 之间'--}}
                        {{--}--}}
                    {{--}--}}
                {{--},--}}
                {{--password: {--}}
                    {{--validators: {--}}
                        {{--notEmpty: {--}}
                            {{--message: '密码不能为空'--}}
                        {{--}--}}
                    {{--}--}}
                {{--}--}}
            {{--}--}}
        {{--});--}}
    {{--});--}}
{{--</script>--}}

{{--<script>--}}
    {{--$("#loginForm").submit(function(ev){ev.preventDefault();});--}}
    {{--$("button[type=button]").click(function () {--}}
        {{--var bootstrapValidator = $("#loginForm").data('bootstrapValidator');--}}
        {{--bootstrapValidator.validate();--}}
        {{--if(!bootstrapValidator.isValid()){--}}
            {{--return;--}}
        {{--}--}}
        {{--$.ajax({--}}
            {{--type: "POST",--}}
            {{--url: '/checkLogin',--}}
            {{--data: {--}}
                {{--name: $("input[name=name]").val(),--}}
                {{--password: $("input[name=password]").val(),--}}
                {{--_token: "{{ csrf_token() }}"--}}
            {{--},--}}
            {{--success: function (data) {--}}
                {{--if (data['status'] == 0) {--}}
                    {{--$.notify({--}}
                        {{--icon: 'pe-7s-bell',--}}
                        {{--message: data['msg']--}}
                    {{--},{--}}
                        {{--type: 'danger',--}}
                        {{--timer: 500--}}
                    {{--});--}}
                {{--}else if (data['status'] === 1) {--}}
                    {{--$.notify({--}}
                        {{--icon: 'pe-7s-check',--}}
                        {{--message: data['msg']--}}
                    {{--},{--}}
                        {{--type: 'success',--}}
                        {{--timer: 500--}}
                    {{--});--}}
                    {{--setTimeout("window.location.href = '/admin/system'", 500);                   ;--}}
                {{--}else {--}}
                    {{--$.notify({--}}
                        {{--icon: 'pe-7s-bell',--}}
                        {{--message: "服务器错误 ，请稍后再试 ！"--}}
                    {{--},{--}}
                        {{--type: 'danger',--}}
                        {{--timer: 500--}}
                    {{--});--}}
                {{--}--}}
            {{--},--}}
            {{--error: function () {--}}
                {{--$.notify({--}}
                    {{--icon: 'pe-7s-bell',--}}
                    {{--message: "服务器错误 ，请稍后再试 ！"--}}
                {{--},{--}}
                    {{--type: 'danger',--}}
                    {{--timer: 500--}}
                {{--});--}}
            {{--}--}}
        {{--})--}}
    {{--})--}}
{{--</script>--}}

</html>