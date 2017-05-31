@extends('template_principal')

@section('conteudo')

 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>Equipe
        <small>Atualizar equipe</small>
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
                    <h1 class="box-title"><i class="fa fa-refresh"></i> Atualize <small>informações</small>
                    </h1>
                    <div class="box-body">
                         <form action="/equipe/atualiza" method="post">
                         <div class="form-group-row">
                               <div class="col-lg-6">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <input type="hidden" name="equipe_id" value="{{ $e->equipe_id}}">
                                    <b>Nome:</b><br>
                                    <input type="text" class="form-control" name="nome" value="{{ $e->nome}}">
                                    <b>Email:</b><br>
                                    <input type="email" class="form-control" name="email" value="{{ $e->email}}">
                                </div>
                                <div class="col-lg-6">
                                    <b>Sobrenome:</b><br>
                                    <input type="text" class="form-control" name="sobrenome" value="{{ $e->sobrenome }}">
                                    <b>Telefone:</b><br>
                                    <input type="text" class="form-control" name="telefone" maxlength="14" onkeyup = "campoTelefone(this, numero)" value="{{ $e->telefone }}">
                                </div>
                            </div>
                            <div class="form-group-row">
                                <div class="col-lg-3">
                                    <b>Meta:</b><br>
                                    <input type="text" class="form-control" name="meta" value="{{ $e->meta }}">
                                </div>
                                <div class="col-lg-3">
                                    <b>Cargo:</b><br>
                                     <select class="form-control" name="cargo">
                                    <option value="null">Selecione</option>
                                    @if($e->cargo == "pre-vendedor")
                                        <option value="pre-vendedor" selected>Pré-vendedor</option>
                                    @else
                                        <option value="pre-vendedor">Pré-vendedor</option>
                                    @endif
                                    @if($e->cargo == "vendedor")
                                        <option value="vendedor" selected>Vendedor</option>
                                    @else
                                        <option value="vendedor">vendedor</option>
                                    @endif
                                    @if($e->cargo == "pre-vendedor/vendedor")
                                        <option value="pre-vendedor/vendedor" selected>Pré-vendedor/vendedor</option>
                                    @else
                                        <option value="pre-vendedor/vendedor">Pré-vendedor/vendedor</option>
                                    @endif
                                     @if($e->cargo == "diretor")
                                        <option value="diretor" selected>Diretor</option>
                                    @else
                                        <option value="diretor">Diretor</option>
                                    @endif
                                </select>
                                </div>
                                <div class="form-group">
                            </div>
                                <div class="col-lg-6">
                                <b>Prazo:</b>
                                    <input type="text" class="form-control" name="daterange" value="">
                                    <br>
                                    <!--<b>Senha:</b>
                                    <input type="password" class="form-control" name="senha" value="{{ $e->senha }}">--><br>
                                    <button type="submit" class="btn btn-success pull-right">
                                        <i class="fa fa-check"></i> Atualizar
                                    </button>
                                </div>
                            </div>
                         </form>
                        </div>
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
