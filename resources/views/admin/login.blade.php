<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>AdminLTE 2 | Log in</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="{{ asset("/admin-lte/bower_components/bootstrap/dist/css/bootstrap.min.css") }}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset("/admin-lte/bower_components/font-awesome/css/font-awesome.min.css") }}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="{{ asset("/admin-lte/bower_components/Ionicons/css/ionicons.min.css") }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset("/admin-lte/dist/css/AdminLTE.min.css") }}">
    <!-- Layui Css -->
    <link rel="stylesheet" href="{{ asset("/layui/css/layui.css") }}">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Google Font -->
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition login-page">
<div class="login-box">
    <div class="login-logo">
        <a href="{{ asset("/admin") }}"><b>Admin</b>LTE</a>
    </div>
    <!-- /.login-logo -->
    <div class="login-box-body">
        <p class="login-box-msg">Sign in to start your session</p>

        <form class="layui-form" action="{{ asset("/admin/dologin") }}" method="post">
            <div class="form-group has-feedback">
                <input type="text" name="username" class="form-control" placeholder="Name" lay-verify="username"
                       autocomplete="off">
                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                <input type="password" name="password" lay-verify="pass" placeholder="Password" autocomplete="off"
                       class="layui-input">
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            </div>
            <div class="row">
                <div class="layui-form-item">
                    <div class="col-xs-7">
                        <input type="checkbox" name="" title="Remember Me" lay-skin="primary" checked>
                    </div>

                    <div class="col-xs-5">
                        <button type="submit" class="btn btn-primary btn-block btn-flat" lay-submit
                                lay-filter="loginForm">
                            Sign In
                        </button>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<!-- jQuery 3 -->
<script src="{{ asset("/admin-lte/bower_components/jquery/dist/jquery.min.js") }}"></script>
<!-- Bootstrap 3.3.7 -->
<script src="{{ asset("/admin-lte/bower_components/bootstrap/dist/js/bootstrap.min.js") }}"></script>
<!-- Layui Js -->
<script src="{{ asset("/layui/layui.js") }}"></script>
<script>
    layui.use('form', function () {
        var form = layui.form;

        /**
         * 监听提交
         */
        form.on('submit(loginForm)', function (data) {
            $.post("{{ asset("/admin/dologin") }}", data.field, function (res) {
                if (res.status == 1) {
                    layer.msg(res.info, {time: 2000});
                    var url = "{{ asset("/admin") }}"; //地址首页
                    setTimeout(window.location.href = url, 2000);
                } else {
                    layer.msg(res.info, {time: 2000});
                }
            }, 'json');

            return false;
        });

        /**
         * 自定义表单验证
         */
        form.verify({
            username: function (value, item) { //value：表单的值、item：表单的DOM对象
                if (value == '') {
                    return '用户名不能空';
                }
                if (!new RegExp("^[a-zA-Z0-9_\u4e00-\u9fa5\\s·]+$").test(value)) {
                    return '用户名不能有特殊字符';
                }
                if (/(^\_)|(\__)|(\_+$)/.test(value)) {
                    return '用户名首尾不能出现下划线\'_\'';
                }
                if (/^\d+\d+\d$/.test(value)) {
                    return '用户名不能全为数字';
                }
            },
            pass: function (value) {
                if (value == '') {
                    return '密码不能空';
                }
                if (!new RegExp("^[\\S]{6,12}$").test(value)) {
                    return '密码必须6到12位，且不能出现空格';
                }
            }
        });

    });
</script>
</body>
</html>