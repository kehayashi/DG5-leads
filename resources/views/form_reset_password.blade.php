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

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body class="hold-transition login-page" style="height: 10%; background-color: black;">
<div class="login-box">
  <div class="login-logo">
    <a href="#"><img src="{!! asset('dg5-120.png') !!}" style="width: 150px;"></a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body" style="background-color: black;">
    <!--<p class="login-box-msg"></p>-->

    <form action="/equipe/reset" method="post">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
      <div class="row">
        <div class="col-xs-12">
          <br>
          @if(isset($erro))
          <div class="alert alert-danger">
              <div class="text-center"><span class="fa fa-close"></span> Dados não conferem!</div>
          </div>
          @endif
        </div>
      </div>
      <div class="row">
        <div class="col-md-12" id="boxReset">
            <button type="button" class="form-control btn btn-warning" onclick="mostraInputs()">Clique aqui para redefinir sua senha</button>
        </div>
      </div>
      <div id="inputs" style="display: none;">
        <div class="row">
          <div class="col-md-12">
            <div class="callout callout-info">
              <h4 class="text-center">Informe o seu email em que recebeu o aviso de cadastro.</h4>
            </div>
          </div>
        </div>
        <div class="form-group has-feedback">
          <input type="email" class="form-control" name="email" placeholder="Email">
          <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
        </div>
        <div class="row">
          <div class="col-md-12">
            <div class="callout callout-info">
              <h4 class="text-center">Informe a senha recebida no seu email.</h4>
            </div>
          </div>
        </div>
        <div class="form-group has-feedback">
          <input type="password" class="form-control" name="senhaAleatoria" placeholder="Senha" onKeyPress="proximoPasso()">
          <span class="glyphicon glyphicon-lock form-control-feedback"></span>
        </div>
        <div class="row">
          <div class="col-md-12" id="ProximoPasso" style="display: none;">
            <button type="button" class="btn btn-primary btn-block btn-flat" onclick="novaSenha()">Próximo passo</button>
          </div>
        </div>
      </div>

      <div id="novaSenha" style="display: none;">
        <div class="row">
          <div class="col-md-12">
            <div class="callout callout-info">
              <h4 class="text-center">Informe a nova senha duas vezes para confirmação.</h4>
            </div>
            <div class="form-group has-feedback">
              <input type="password" class="form-control" id="novaSenha1" name="senha" placeholder="Nova senha">
              <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            </div>
            <div id="teste" class="form-group has-feedback">
              <input type="password" class="form-control" id="novaSenha2" name="novaSenha2" placeholder="Confirmação da nova senha">
              <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          </div>
        </div>
      </div>

      <div class="row">
        <!-- /.col -->
        <div class="col-xs-12" id="submit" style="display: none;">
          <button type="submit" class="btn btn-success btn-block btn-flat"><i class="fa fa-check"></i> Redefinir</button>
        </div>

        <!-- /.col -->
      </div>
      <br>
    </form>
  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

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

<script>
  function mostraInputs(){
    document.getElementById('boxReset').style.display = "none";
    document.getElementById('inputs').style.display = "block";
  }
</script>
<script>
  function proximoPasso(){
    document.getElementById('ProximoPasso').style.display = "block";
  }
</script>
<script>
  function novaSenha(){
    document.getElementById('inputs').style.display = "none";
    document.getElementById('novaSenha').style.display = "block";
  }
</script>
<script>
    $( "#novaSenha2" ).keyup( function() {
      var novaSenha1 = document.getElementById('novaSenha1').value;
      var novaSenha2 = $('#novaSenha2').val();

      if(novaSenha2 == novaSenha1){
        document.getElementById('novaSenha2').style.border = "medium solid green";
        document.getElementById('submit').style.display = "block";
        //$('#teste').parent().addClass("has-success");
      }else{
        document.getElementById('novaSenha2').style.border = "medium solid #dd4b39";
      }

    });
</script>
</body>
</html>
