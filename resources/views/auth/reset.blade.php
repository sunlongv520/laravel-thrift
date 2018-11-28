<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <link rel="shortcut icon" href="/static/images/favicon.png">

    <title>重置密码</title>

    <!--Core CSS -->
    <link href="/static/bs3/css/bootstrap.min.css" rel="stylesheet">
    <link href="/static/css/bootstrap-reset.css" rel="stylesheet">
    <link href="/static/font-awesome/css/font-awesome.css" rel="stylesheet" />
</head>
    <body class="login-body">
        <div class="container">
            <form method="POST" action="/auth/postReset">
                {!! csrf_field() !!}
                <input  type="hidden" name="token" value="{{ $token }}">

                <div>
                    Email：<input class="form-control" type="email" name="email" value="{{ old('email') }}">
                </div>

                <div>
                    新密码：<input class="form-control" type="password" name="password">
                </div>

                <div>
                    确认密码：<input class="form-control" type="password" name="password_confirmation">
                </div>

                <div>
                    <button type="submit" class="btn btn-warning">
                        重置密码
                    </button>
                </div>
            </form>
        </div>
    </body>
</html>



