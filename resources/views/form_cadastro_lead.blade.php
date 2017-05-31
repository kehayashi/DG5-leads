@extends('template_principal')

@section('conteudo')

 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>Lead
        <small>Cadastro Lead</small>
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

             @if((old('nome_empresa')) && (count($errors) <= 0))
                <div class="alert alert-success">
                    <i class="fa fa-check"></i> <b>Lead da empresa {{ old('nome_empresa') }}</b> foi cadastrado com sucesso!
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                </div>
            @endif
            <form action="/lead/cadastrar">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="box box-warning">
                <div class="box-header with-border">
                    <h1 class="box-title"><i class="fa fa-building-o"></i> Dados da empresa</h1>
                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                        </button>
                    </div>
                    <div class="box-body">
                        <div class="form-group-row">
                            <div class="col-lg-6">
                                <b>Nome da empresa/Razão social:</b><br>
                                <input type="text" class="form-control" name="nome_empresa">
                            </div>
                            <div class="col-lg-6">
                                <b>CNPJ/CPF:</b><br>
                                <input type="text" class="form-control" name="CNPJ_CPF" onkeyup="somenteNumeros(this, numeros)">
                            </div>
                        </div>
                        <div div class="form-group-row">
                            <div class="col-lg-3">
                                <b>Telefone 1:</b><br>
                                 <input type="text" class="form-control" name="telefone1_empresa" maxlength="14" onkeyup = "campoTelefone(this, numero)">
                            </div>
                            <div class="col-lg-3">
                                <b>Telefone 2:</b><br>
                                <input type="text" class="form-control" name="telefone2_empresa" maxlength="14" onkeyup = "campoTelefone(this, numero)">
                            </div>
                        </div>
                        <div class="form-group-row">
                            <div class="col-lg-6">
                                <b>Site:</b><br>
                                <input type="text" class="form-control" name="site">
                            </div>
                        </div>
                         <div class="form-group-row">
                            <div class="col-lg-6">
                                <b>Rede social:</b><br>
                                <div class="input-group">
                                  <select class="form-control" name="rede_social_id">
                                    <option value="null">Selecione Rede Social</option>
                                    @foreach($rede_social as $r)
                                    <option value="{{ $r->rede_social_id }}">{{ $r->descricao}}</option>
                                    @endforeach
                                    </select>
                                    <span class="input-group-addon" id="basic-addon2" style="background-color: #5cb85c; border-radius: 2px;"><a href="#" data-toggle="modal" data-target="#myModal4" id="idModal"><i class="fa fa-plus" style="color: white;"></i></a></span>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <b>Endereço:</b><br>
                                <input type="text" class="form-control" name="rede_social_endereco">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-lg-3">
                                <b>Origem:</b><br>
                                <div class="input-group">
                                  <select class="form-control" name="origem_id">
                                    <option value="null">Selecione origem</option>
                                    @foreach($origem as $o)
                                    <option value="{{ $o->origem_id}}">{{ $o->descricao}}</option>
                                    @endforeach
                                    </select>
                                  <span class="input-group-addon" id="basic-addon2" style="background-color: #5cb85c; border-radius: 2px;"><a href="#" data-toggle="modal" data-target="#myModal" id="idModal"><i class="fa fa-plus" style="color: white;"></i></a></span>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <b>Mercado:</b><br>
                                <div class="input-group">
                                  <select class="form-control" name="mercado_id">
                                    <option value="null">Selecione mercado</option>
                                    @foreach($mercado as $m)
                                    <option value="{{ $m->mercado_id}}">{{ $m->descricao}}</option>
                                    @endforeach
                                    </select>
                                    <span class="input-group-addon" id="basic-addon2" style="background-color: #5cb85c; border-radius: 2px;"><a href="#" data-toggle="modal" data-target="#myModal2" id="idModal"><i class="fa fa-plus" style="color: white;"></i></a></span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group-row">
                            <div class="col-lg-3">
                                <b>Produto lead:</b><br>
                                <div class="input-group">
                                  <select class="form-control" name="produto_lead_id">
                                    <option value="null">Selecione produto</option>
                                    @foreach($produto as $p)
                                    <option value="{{ $p->produto_lead_id}}">{{ $p->descricao}}</option>
                                    @endforeach
                                    </select>
                                  <span class="input-group-addon" id="basic-addon2" style="background-color: #5cb85c; border-radius: 2px;"><a href="#" data-toggle="modal" data-target="#myModal3" id="idModal"><i class="fa fa-plus" style="color: white;"></i></a></span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group-row">
                            <div class="col-lg-3">
                                <b>Vendedor:</b><br>
                                <select class="form-control" name="equipe_id">
                                    <option value="null">Selecione vendedor</option>
                                     @foreach($equipe as $e)
                                    <option value="{{ $e->equipe_id}}">{{ $e->nome}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="box-body" style="display: none;"></div>
            </div>

            <div class="box box-warning">
                <div class="box-header with-border">
                    <h1 class="box-title"><i class="fa fa-user"></i> Contatos</h1>
                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                        </button>
                    </div>
                    <div class="box-body">
                        <div class="form-group-row">
                            <div class="col-lg-12">
                                <b>Nome:</b><br>
                                <input type="text" class="form-control" name="nome_contato[]">
                            </div>
                        </div>
                        <div class="form-group-row">
                            <div class="col-lg-3">
                                <b>Telefone 1:</b><br>
                                <input type="text" class="form-control" name="telefone1_contato[]" maxlength="14" onkeyup = "campoTelefone(this, numero)">
                            </div>
                            <div class="col-lg-3">
                                <b>Telefone 2:</b><br>
                                <input type="text" class="form-control" name="telefone2_contato[]" maxlength="14" onkeyup = "campoTelefone(this, numero)">
                            </div>
                            <div class="col-lg-3">
                                <b>Cargo:</b><br>
                                <input type="text" class="form-control" name="cargo_contato[]">
                            </div>
                            <div class="col-lg-3">
                                <b>Email:</b><br>
                                <input type="text" class="form-control" name="email_contato[]">
                            </div>
                        </div>
                        <div id="inputs_adicionais" style="border: none">
                        </div>
                        <div class="col-lg-12"><br>
                            <button type="button" class="btn btn-primary pull-right" name="add" value="Adicionar contato"><i class="fa fa-plus"></i> Adicionar contato<br>

                        </div>
                    </div>
                </div>
                <div class="box-body" style="display: none;"></div>
            </div>


            <div class="box box-warning">
                <div class="box-header with-border">
                    <h1 class="box-title"><i class="fa fa-map-marker"></i> Endereço</h1>
                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                        </button>
                    </div>
                    <div class="box-body">
                        <div class="form-group-row">
                            <div class="col-lg-12">
                                <b>Rua:</b><br>
                                <input type="text" class="form-control" name="rua">
                            </div>
                        </div>
                        <div div class="form-group-row">
                            <div class="col-lg-6">
                                <b>Logradouro:</b><br>
                                <input type="text" class="form-control" name="logradouro">
                            </div>
                            <div class="col-lg-6">
                                <b>Complemento:</b><br>
                                <input type="text" class="form-control" name="complemento">
                            </div>
                        </div>
                        <div div class="form-group-row">
                            <div class="col-lg-3">
                                <b>País:</b><br>
                                <input type="text" class="form-control" name="pais">
                            </div>
                            <div class="col-lg-3">
                                <b>Estado:</b><br>
                                <input type="text" class="form-control" name="estado">
                            </div>
                            <div class="col-lg-3">
                                <b>Cidade:</b><br>
                                <input type="text" class="form-control" name="cidade">
                            </div>
                            <div class="col-lg-3">
                                <b>CEP:</b><br>
                                <input type="text" class="form-control" name="cep">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="box-body" style="display: none;"></div>
            </div>
            <div class="box box-warning">
                <div class="box-header with-border">
                    <h1 class="box-title"><i class="fa fa-comments-o"></i>  Observações</h1>
                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                        </button>
                    </div>
                    <div class="box-body">
                        <div class="form-group-row">
                            <div class="col-lg-12">
                                <b>Observações:</b><br>
                                <input type="text-area" class="form-control" name="observacoes" style="height: 100px;">
                                <br>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
                 <div class="box-body" style="display: none;"></div>
            </div>
             <button type="submit" class="btn btn-success pull-right"><i class="fa fa-check"> Cadastrar</i></button>
            <div class="col-lg-0">
            </div>
        </div>
    </div>
    </form>
    </section>
  </div>
    </div>

    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel"><i class="fa fa-edit"></i> Cadastro origem</h4>
          </div>
          <form action="/origem/cadastrar/form_lead" method="post">
            <div class="modal-body">
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
                        <h1 class="box-title">Origem <small>informações</small></h1>
                        <div class="box-body">
                            <div class="form-group-row">
                                <div class="col-lg-12">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <b>Descricao:</b><br>
                                    <input type="text" class="form-control" name="descricao">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-success">Cadastrar</button>
            </div>
        </form>
        </div>
      </div>
    </div>

    <div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel"><i class="fa fa-edit"></i> Cadastro mercado</h4>
          </div>
          <form action="/mercado/cadastrar/form_lead" method="post">
            <div class="modal-body">
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
                        <h1 class="box-title">Mercado <small>informações</small></h1>
                        <div class="box-body">
                            <div class="form-group-row">
                                <div class="col-lg-12">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <b>Descricao:</b><br>
                                    <input type="text" class="form-control" name="descricao">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-success">Cadastrar</button>
            </div>
        </form>
        </div>
      </div>
    </div>

    <div class="modal fade" id="myModal3" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel"><i class="fa fa-edit"></i> Cadastro produto</h4>
          </div>
        <form action="/produto_lead/cadastrar/form_lead" method="post">
            <div class="modal-body">
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
                    <h1 class="box-title">Produto <small>informações</small></h1>
                        <div class="box-body">
                            <div class="form-group-row">
                                <div class="col-lg-12">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <b>Descricao:</b><br>
                                    <input type="text" class="form-control" name="descricao">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-success">Cadastrar</button>
            </div>
        </form>
        </div>
      </div>
    </div>

    <div class="modal fade" id="myModal4" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel"><i class="fa fa-edit"></i> Cadastro rede social</h4>
          </div>
        <form action="/rede_social/cadastrar/form_lead" method="post">
            <div class="modal-body">
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
                    <h1 class="box-title">Rede social <small>informações</small></h1>
                        <div class="box-body">
                            <div class="form-group-row">
                                <div class="col-lg-12">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <b>Descricao:</b><br>
                                    <input type="text" class="form-control" name="descricao">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-success">Cadastrar</button>
            </div>
        </form>
        </div>
      </div>
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
        function somenteNumeros(o,f){
            v_obj=o
            v_fun=f
            setTimeout("execmascara()",1)
        }
        function execmascara(){
            v_obj.value=v_fun(v_obj.value)
        }
        function numeros(n){
            n = n.replace(/\D/g,"");             //Remove tudo o que não é dígito
            //n = n.replace(/^(\d{2})(\d)/g,"($1) $2"); //Coloca parênteses em volta dos 3 primeiros dígitos
            //v=v.replace(/(\d)(\d{2})$/,"$1.$2");    //Coloca hífen entre o quarto e o quinto dígitos
            return n;
        }
    </script>

    <script type="text/javascript">
    $(document).ready(function(){
        var input =
        '<div class="remove">' +
            '<div class="form-group-row remove">' +
                    '<div class="col-lg-12">' +
                        '<hr>' +
                        '<b>Nome:</b><br>' +
                        '<input type="text" class="form-control" name="nome_contato[]">' +
                    '</div>' +
            '</div>' +
            '<div class="form-group-row remove">' +
                    '<div class="col-lg-3">' +
                        '<b>Telefone 1:</b><br>' +
                        '<input type="text" class="form-control" name="telefone1_contato[]" maxlength="14" onkeyup = "campoTelefone(this, numero)">' +
                    '</div>' +
                    '<div class="col-lg-3">' +
                        '<b>Telefone 2:</b><br>' +
                        '<input type="text" class="form-control" name="telefone2_contato[]" maxlength="14" onkeyup = "campoTelefone(this, numero)">' +
                    '</div>' +
                    '<div class="col-lg-3">' +
                        '<b>Cargo:</b><br>' +
                        '<input type="text" class="form-control" name="cargo_contato[]">' +
                    '</div>' +
                    '<div class="col-lg-3">' +
                        '<b>Email:</b><br>' +
                        '<input type="text" class="form-control" name="email_contato[]">' +
                    '</div>' +
            '</div>' +
            '<a href="#" class="btn btn-danger remove" style="margin-left: 15px; margin-top: 10px;"><i class="fa fa-remove"></i> Remover contato</a>' +
        '</div>';
    $("button[name='add']").click(function( e ){
        $('#inputs_adicionais').append( input );
    });

    $('#inputs_adicionais').delegate('a','click',function( e ){
        e.preventDefault();
        $(this).parent('.remove').remove();
    });

});
</script>

@stop
