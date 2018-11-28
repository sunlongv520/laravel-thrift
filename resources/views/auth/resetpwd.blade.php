<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <link rel="shortcut icon" href="/static/images/favicon.png">

    <title>重置</title>

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

<div class="row">
    <div class="col-sm-12">
        <section class="panel">
            {!! Form::open([
                'url'       => '/auth/postEmail',
                'method'    => 'post',
                'class'     => 'form-validation',
            ]) !!}
            <header class="panel-heading">
             重置密码
                <span class="tools pull-right">
                 </span>
            </header>
            <div class="panel-body minimal form-horizontal">
                <div class="row">
                    <div class="form-group">
                        <label class="control-label col-md-2">邮箱</label>
                        <div class="col-md-6">
                            <input class="form-control" type="email" name="email" value="{{ old('email') }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-2"></div>
                        <div class="col-md-4"><button type="submit" class="btn btn-success" id="send_reset">发送密码重置链接</button></div>
                    </div>
                </div>
            </div>
            </form>
        </section>
    </div>
</div>

<script src="/static/js/jquery.js"></script>
<script>
    $("#send_reset").click(function(){
        alert("邮件已发送");
    })
</script>

