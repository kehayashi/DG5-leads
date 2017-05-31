@extends('template_principal')

@section('conteudo')

 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>Origem
        <small>Cadastro equipe</small>
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-0">
            </div>
            <div class="col-lg-12">
            @if (count($errors) > 0)
               <div class="alert alert-danger">
                    <ul>
                    @foreach($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                    </ul>
                </div>
            @endif
            <div class="box box-warning">
                <div class="box-header with-border">
                    <h1 class="box-title"><i class="fa fa-edit"></i> Cadastre <small>informações</small></h1>
                    <div class="box-body">
                        <form action="/equipe/cadastrar" method="post">
                        <div class="form-group-row">
                               <div class="col-lg-6">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <b>Nome:</b><br>
                                    <input type="text" class="form-control" name="nome">
                                    <b>Email:</b><br>
                                    <input type="email" class="form-control" name="email">
                                </div>
                                <div class="col-lg-6">
                                    <b>Sobrenome:</b><br>
                                    <input type="text" class="form-control" name="sobrenome">
                                    <b>Telefone:</b><br>
                                    <input type="text" class="form-control" name="telefone" maxlength="14" onkeyup = "campoTelefone(this, numero)">
                                </div>
                            </div>
                            <div class="form-group-row">
                                <div class="col-lg-3">
                                    <b>Meta:</b><br>
                                    <input type="text" class="form-control" name="meta" maxlength="14" value="" onkeyup = "campoMeta(this, valor)">
                                </div>
                                <div class="col-lg-3">
                                    <b>Cargo:</b><br>
                                     <select class="form-control" name="cargo">
                                        <option value="null">Selecione</option>
                                        <option value="pre-vendedor">Pré-vendedor</option>
                                        <option value="vendedor">Vendedor</option>
                                        <option value="pre-vendedor/vendedor">Pré-vendedor/Vendedor</option>
                                        <option value="diretor">Diretor</option>
                                    </select>
                                </div>
                                <div class="form-group">
                            </div>
                                <!--<div class="col-lg-3">
                                    <b>Senha:</b>
                                    <input type="password" class="form-control" name="senha"><br>
                                </div>-->
                                <div class="col-lg-6">
                                    <b>Prazo:</b>
                                    <input type="text" class="form-control" name="daterange" value="">
                                    <br>
                                    <button type="submit" class="btn btn-success pull-right">
                                        <i class="fa fa-check"></i> Cadastrar
                                    </button>
                                 </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-0">
            </div>
        </div>
    </div>
    </section>
  </div>

  <script type="text/javascript">
        function campoMeta(o,f){
            v_obj=o
            v_fun=f
            setTimeout("execmascara()",1)
        }
        function execmascara(){
            v_obj.value=v_fun(v_obj.value)
        }
        function valor(v){
            v=v.replace(/\D/g,"");             //Remove tudo o que não é dígito
            //v=v.replace(/^(\d{2})(\d)/g,"($1) $2"); //Coloca parênteses em volta dos 3 primeiros dígitos
            //v=v.replace(/(\d)(\d{2})$/,"$1.$2");    //Coloca hífen entre o quarto e o quinto dígitos
            v=v.replace(/\D/g,"") // permite digitar apenas numero
            v=v.replace(/(\d{1})(\d{15})$/,"$1.$2") // coloca ponto antes dos ultimos digitos
            v=v.replace(/(\d{1})(\d{11})$/,"$1.$2") // coloca ponto antes dos ultimos 13 digitos
            v=v.replace(/(\d{1})(\d{8})$/,"$1.$2") // coloca ponto antes dos ultimos 10 digitos
            v=v.replace(/(\d{1})(\d{5})$/,"$1.$2") // coloca ponto antes dos ultimos 7 digitos
            v=v.replace(/(\d{1})(\d{1,2})$/,"$1,$2") // coloca virgula antes dos ultimos 4 digitos
            return v;
        }
    </script>

  <script type="text/javascript">
        function campoTelefone(o,f){
            v_obj=o
            v_fun=f
            setTimeout("execmascara()",1)
        }
        function execmascara(){
            v_obj.value=v_fun(v_obj.value)
        }
        function numero(v){
            v=v.replace(/\D/g,"");             //Remove tudo o que não é dígito
            v=v.replace(/^(\d{2})(\d)/g,"($1) $2"); //Coloca parênteses em volta dos 3 primeiros dígitos
            //v=v.replace(/(\d)(\d{2})$/,"$1.$2");    //Coloca hífen entre o quarto e o quinto dígitos
            return v;
        }
    </script>

    <script type="text/javascript">
        var data = new Date();
        data.setDate(data.getDate());
        var data2 = new Date(data);
        data2.setDate(data2.getDate() + parseInt(30));
        $('input[name="daterange"]').daterangepicker({
            locale: {
              format: 'YYYY/MM/DD'
            },
            startDate: data,
            endDate: data2,
        },
        function(start, end, label) {
            //alert("Prazo para cumprir a meta: " + start.format('DD/MM/YYYY') + ' até ' + end.format('DD/MM/YYYY'));
        });
    </script>

@stop
