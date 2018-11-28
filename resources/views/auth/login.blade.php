<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <link rel="shortcut icon" href="/static/images/favicon.png">

    <title>登录</title>

    <!--Core CSS -->
    <link href="/static/bs3/css/bootstrap.min.css" rel="stylesheet">
    <link href="/static/css/bootstrap-reset.css" rel="stylesheet">
    <link href="/static/font-awesome/css/font-awesome.css" rel="stylesheet" />

    <!-- Custom styles for this template -->
    <link href="/static/css/style.css" rel="stylesheet">
    <link href="/static/css/style-responsive.css" rel="stylesheet" />
    <style>
        .form-signin .btn-login {
            background:#2A98EF;
        }
        .form-signin h2.form-signin-heading {
            background: #2A98EF;
            font-size:18px;
            font-weight:700;
            border-bottom: 10px solid rgb(92,145,228);
            border-bottom: 0px;
        }
    </style>

</head>

    <body class="login-body">
        <div class="container">
            <form action="/auth/login" method="POST" class="form-signin">
                <h2 class="form-signin-heading"><img src="/static/images/gege_village.png" alt="" width="160px"></h2>
                <div class="login-wrap">
                    <div class="user-login-info">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input name="username" type="text" class="form-control" placeholder="帐号" autofocus>
                        <input name="password" type="password" class="form-control" placeholder="密码">
                        @if (count($errors) > 0)
                        <span class="text-danger">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </span>
                        @endif
                    </div>
                    <label class="checkbox">
                        <input type="checkbox" name="remember">记住登陆状态</input>
                        <span class="pull-right">
                            <a href="getEmail">重置密码</a>
                        </span>
                    </label>
                    <button class="btn btn-lg btn-login btn-block" type="submit">登录</button>
                </div>
            </form>
        </div>

        <!--Core js-->
        <script src="/static/js/jquery.js"></script>
    </body>
</html>
