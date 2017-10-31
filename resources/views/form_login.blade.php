<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>| DG5 |</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="{{ asset("/bower_components/adminLTE/bootstrap/css/bootstrap.min.css") }}">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset("/bower_components/adminLTE/dist/css/AdminLTE.min.css") }}">
  <!-- iCheck -->
  <link rel="stylesheet" href="{{ asset("/bower_components/adminLTE/plugins/iCheck/square/blue.css") }}">

</head>
<body class="hold-transition login-page" style="height: 10%; background-color: black;">

<div class="login-box">
  <div class="login-logo">
    <a href="#"><img src="{!! asset('dg5-120.png') !!}" style="width: 150px;"></a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body" style="background-color: black;">
    <!--<p class="login-box-msg"></p>-->

    <form action="/login/entrar" method="post">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
      <div class="form-group has-feedback">
        <input type="email" class="form-control" name="email" placeholder="Email">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" name="senha" placeholder="Senha">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>

      <div class="row">
        <!-- /.col -->
        <div class="col-xs-12">
          <button type="submit" class="btn btn-warning btn-block btn-flat">Entrar</button>
        </div>

          <div class="col-xs-12">
          <br>
           @if(isset($erro))
            <div class="alert alert-danger">
                <div class="text-center"><span class="fa fa-close"></span> EMAIL ou SENHA incorretos!</div>
            </div>
          @endif
        </div>
        <!-- /.col -->
      </div>
      <br>
    </form>
  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->


<div class="push"></div>
<!-- end wraper -->

<footer class="footer">
  <div class="container text-center">
    <hr style="border-color: #f39c12;">
      <small class="text-info" style="font-size: 13px;">
        <b style="color: gray;">
          Copyright &copy; 2017 <a href="#" style="color: gray;">Kendy Hayashi</a>.</strong> All rights
          reserved.
    	</small>
	</div>
</footer>


<!-- jQuery 2.2.3 -->
<script src="{{ asset("/bower_components/adminLTE/plugins/jQuery/jquery-2.2.3.min.js") }}"></script>
<!-- Bootstrap 3.3.6 -->
<script src="{{ asset("/bower_components/adminLTE/bootstrap/js/bootstrap.min.js") }}"></script>
<!-- iCheck -->
<script src="{{ asset("/bower_components/adminLTE/plugins/iCheck/icheck.min.js") }}"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' // optional
    });
  });
</script>
</body>
</html>
