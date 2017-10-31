<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>| DG5 | </title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="{{ asset("/bower_components/adminLTE/bootstrap/css/bootstrap.min.css") }}">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">

  <link rel="stylesheet" href="{{ asset("/bower_components/AdminLTE/plugins/datatables/dataTables.bootstrap.css") }}">

  <link rel="stylesheet" href="{{ asset("/bower_components/AdminLTE/plugins/datatables/jquery.dataTables.css") }}">

  <link rel="stylesheet" href="{{ asset("/bower_components/AdminLTE/plugins/datatables/jquery.dataTables.min.css") }}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset("/bower_components/adminLTE/dist/css/AdminLTE.min.css") }}">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="{{ asset("/bower_components/adminLTE/dist/css/skins/_all-skins.min.css") }}">

  <link rel="stylesheet" href="{{ asset("/bower_components/adminLTE/plugins/morris/morris.css") }}">

  <script src="{{ asset("bower_components/adminLTE/plugins/jQuery/jquery-2.2.3.min.js") }}"></script>

  <script src="{{ asset("bower_components/adminLTE/plugins/input-mask/jquery.inputmask.js") }}"></script>

  <script type="text/javascript" src="//cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>

  <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/bootstrap/3/css/bootstrap.css" />
  <!-- Include Date Range Picker -->
  <script type="text/javascript" src="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.js"></script>

  <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.css" />

  <link rel="stylesheet" type="text/css" href="////cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/locale/pt-br.js" />

  <link rel="stylesheet" href="{{ asset("/bower_components/AdminLTE/plugins/fullcalendar/fullcalendar.min.css") }}">

  <link rel="stylesheet" href="{{ asset("/bower_components/AdminLTE/plugins/fullcalendar/fullcalendar.print.css") }}" media="print">

  <style>
   hr{
      color: #333;
      background-color: #333;
      height: 3px;
    }
  </style>

</head>
<!-- ADD THE CLASS fixed TO GET A FIXED HEADER AND SIDEBAR LAYOUT -->
<!-- the fixed layout is not compatible with sidebar-mini -->
<body class="hold-transition skin-yellow fixed sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="#" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><img src="{!! asset('dg5-120.png') !!}" style="width: 30px;"></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><img src="{!! asset('dg5-120.png') !!}" style="width: 60px;"></span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
             <span class="glyphicon glyphicon-user"></span>
              <span class="hidden-xs">
              @if (Session::has('email'))
                    {{ Session::get('email') }}
              @endif</span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header" style="height: 60px;">
                 <p>
                  <span class="glyphicon glyphicon-user"></span>
                  @if (Session::has('nome'))
                     {{ Session::get('nome') }} {{ Session::get('sobrenome') }}
                  @endif
                </p>
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="container-fluid">
                  <a href="/login/logout" class="btn btn-danger btn-flat" style="width: 100%;">
                  <i class="fa fa-sign-in"></i> Sair</a>
                </div>
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </nav>
  </header>

  <!-- =============================================== -->

  <!-- Left side column. contains the sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <span class="glyphicon glyphicon-user text-center" style="color: white; margin-left: 8px;"></span>
        </div>
        <div class="pull-left info">
          <p>@if (Session::has('nome'))
              {{ Session::get('nome') }}
             @endif
          </p>
        </div>
      </div>
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        <li class="header text-center">MENU DE NAVEGAÇÃO</li>
        <li class="treeview">
          <a href="/dashboard">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
          </a>
        </li>

         <li>
          <a href="/agenda">
            <i class="fa fa-calendar"></i> <span>Agenda</span>
          </a>
        </li>

        <li>
          <a href="/lead">
            <i class="fa fa-plus-square"></i> <span>Cadastro de leads</span>
          </a>
        </li>

        <li>
          <a href="/lead/base">
            <i class="fa fa-database"></i> <span>Base de leads</span>
          </a>
        </li>

        <li>
          <a href="/proposta/lista">
            <i class="fa fa-edit"></i> <span>Propostas</span>
          </a>
        </li>

        <li>
          <a href="/relatorios">
            <i class="fa fa-file-text"></i> <span>Relátorios</span>
          </a>
        </li>
        <li>
          <a href="#"><i class="fa fa-search"></i> <span>Pesquisa de satisfação</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
                <li><a href="/pesquisa/aprovada"><i class="fa fa-search"></i> Proposta aprovada</a></li>
                <li><a href="/pesquisa/reprovada"><i class="fa fa-search"></i> Proposta reprovada</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-gear"></i> <span>Configurações</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="/equipe"><i class="fa fa-user"></i> Equipe</a></li>
            <li>
              <a href="#"><i class="fa fa-unlock-alt"></i> Equipe - permissões
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                  <li><a href="#"><i class="fa fa-user"></i> Pré-vendedor</a></li>
                  <li><a href="#"><i class="fa fa-user"></i> Vendedor
                      <span class="pull-right-container">
                          <i class="fa fa-angle-left pull-right"></i>
                      </span>
                      </a>
                      <ul class="treeview-menu">
                          <li><a href="#"><i class="fa fa-edit"></i> Propostas</a></li>
                          <li><a href="#"><i class="fa fa-database"></i> Base</a></li>
                      </ul>
                  </li>
                  <li><a href="#"><i class="fa fa-user"></i> Diretor</a></li>
              </ul>
            </li>
            <li><a href="/origem"><i class="fa fa-sign-in"></i> Origem</a></li>
            <li><a href="/mercado"><i class="fa fa-shopping-cart"></i> Mercado</a></li>
            <li><a href="/produto_lead"><i class="fa fa-tag"></i> Produto do lead</a></li>
            <li><a href="/peca"><i class="fa fa-tag"></i> Peça/Serviço</a></li>
          </ul>
        </li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- =============================================== -->

  <!-- Content Wrapper. Contains page content -->
      @yield('conteudo')


  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 1.0
    </div>
    <strong>Copyright &copy; 2017 <a href="#">Kendy Hayashi</a>.</strong> All rights
    reserved.
  </footer>

  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->


<!-- jQuery 2.2.3 -->
<script src="{{ asset("bower_components/adminLTE/plugins/jQuery/jquery-2.2.3.min.js") }}"></script>
<!-- Bootstrap 3.3.6 -->
<script src="{{ asset("bower_components/adminLTE/bootstrap/js/bootstrap.min.js") }}"></script>
<!-- SlimScroll -->
<script src="{{ asset("bower_components/adminLTE/plugins/slimScroll/jquery.slimscroll.min.js") }}"></script>
<!-- FastClick -->
<script src="{{ asset("bower_components/AdminLTE/plugins/datatables/jquery.dataTables.min.js") }}" ></script>

<script src="{{ asset("bower_components/AdminLTE/plugins/datatables/dataTables.bootstrap.min.js") }}" ></script>

<script src="{{ asset("bower_components/AdminLTE/plugins/morris/morris.min.js") }}"></script>

<script src="{{ asset("bower_components/AdminLTE/plugins/flot/jquery.flot.min.js") }}"></script>

<script src="{{ asset("bower_components/AdminLTE/plugins/flot/jquery.flot.resize.min.js") }}"></script>

<script src="{{ asset("bower_components/AdminLTE/plugins/flot/jquery.flot.pie.min.js") }}"></script>

<script src="{{ asset("bower_components/AdminLTE/plugins/flot/jquery.flot.categories.min.js") }}"></script>

<script src="{{ asset("bower_components/adminLTE/plugins/fastclick/fastclick.js" ) }}"></script>

<script src="{{ asset("bower_components/adminLTE/plugins/knob/jquery.knob.js") }}"></script>

<script src="{{ asset("bower_components/adminLTE/plugins/sparkline/jquery.sparkline.min.js") }}"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<!-- AdminLTE App -->
<script src="{{ asset("bower_components/adminLTE/dist/js/app.min.js") }}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ asset("bower_components/adminLTE/dist/js/demo.js") }}"></script>

<script src="{{ asset("bower_components/adminLTE/plugins/sparkline/jquery.sparkline.min.js") }}"></script>

<script src="{{ asset("bower_components/adminLTE/plugins/fullcalendar/fullcalendar.min.js") }}"></script>

<script src="{{ asset("bower_components/adminLTE/plugins/fullcalendar/lang/pt-br.js") }}"></script>


</body>
</html>
