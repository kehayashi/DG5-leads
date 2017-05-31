@extends('template_principal')

@section('conteudo')

 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>Peça/Serviços
        <small>Peças/serviços cadastradas</small>
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                @if((old('descricao')) && (count($errors) <= 0))
                <div class="alert alert-success">
                    <i class="fa fa-check"></i>  Peça <b>{{ old('descricao') }}</b> foi cadastrada com sucesso!
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                </div>
                @endif

                @if(isset($deletado))
                <div class="alert alert-success">
                    <i class="fa fa-check"></i> Peça foi excluída com sucesso!
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                </div>
                @endif

                @if(isset($atualizado))
                    <div class="alert alert-success">
                        <i class="fa fa-check"></i> Peça foi atualizada com sucesso!
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    </div>
                @endif

                <div class="box box-warning">
                    <div class="box-header with-border">
                        <h1 class="box-title"><i class="fa fa-info-circle"></i> Peças/serviços <small>informações</small></h1>
                        <div class="box-body">
                             <form action="/peca/crud" method="post">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <div class="table-responsive-fluid">
                                    <table class="table table-striped table-condensed">
                                        <tr style="background-color: #333">
                                            <td style="color: white;">Nome</td>
                                            <td style="color: white;">Descricao</td>
                                            <td style="color: white;">Preço</td>
                                            <td class="text-center" style="color: white;">Editar</td>
                                            <td class="text-center" style="color: white;">Excluir</td>
                                        </tr>
                                        @if(isset($peca))
                                            @foreach($peca as $p)
                                        <tr>
                                            <td>{{ $p->nome}}</td>
                                            <td>{{ $p->descricao }}</td>
                                            <td>{{ $p->valor }}</td>
                                            <input type="hidden" id="campoDescricao" value="{{ $p->descricao }}">
                                            <td class="text-center">
                                                <a href="#" data-toggle="modal" data-target="#myModal2" id="idModal"><i class="fa fa-pencil" style="color: #708090;"
                                                onclick="getId( {{ $p->peca_id}} );"></i></a>
                                            </td>
                                            <td class="text-center">
                                                <a href="/peca/crud/delete/{{ $p->peca_id}}"><i class="fa fa-close" style="color: red;"></i></a>
                                            </td>
                                        </tr>
                                            @endforeach
                                        @endif
                                    </table>
                                </div>
                                <button type="button" class="btn btn-success pull-right" data-toggle="modal" data-target="#myModal"><i class="fa fa-plus"></i> Nova Peça
                                </button>
                             </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel"><i class="fa fa-edit"></i> Cadastro peça</h4>
          </div>
          <form action="/peca/cadastrar" method="post">
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
                        <h1 class="box-title">Peça <small>informações</small></h1>
                        <div class="box-body">
                            <div class="row">
                                <div class="form-group-row">
                                    <div class="col-lg-12">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <b>Categoria:</b><br>
                                        <select class="form-control" name="produto_lead_id">
                                        @foreach($produto_lead as $prod)
                                            <option value="{{ $prod->produto_lead_id }}">{{ $prod->descricao }}</option>
                                        @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group-row">
                                    <div class="col-lg-12">
                                        <b>Nome:</b><br>
                                        <input type="text" class="form-control" name="nome">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group-row">
                                    <div class="col-lg-12">
                                        <b>Descricao:</b><br>
                                        <input type="text" class="form-control" name="descricao">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group-row">
                                    <div class="col-lg-12">
                                        <b>Valor:</b><br>
                                          <input type="text" class="form-control" name="valor" maxlength="14" value="" onkeyup = "campoValor(this, preco)">
                                    </div>
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

    <!-- Modal -->
    <div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel"><i class="fa fa-refresh"></i> Atualizar peça</h4>
          </div>
          <form action="/peca/update" method="post">
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
                        <h1 class="box-title">Peça <small>informações</small></h1>
                        <div class="box-body">
                            <div class="form-group-row">
                                <div class="col-lg-12">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <input type="hidden" id="idPeca" name="peca_id" value="">
                                    <b>Nova descricao:</b><br>
                                    <input type="text" class="form-control" id="teste" name="descricao" value="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-success">Atualizar</button>
            </div>
        </form>
        </div>
      </div>
    </div>

    </section>
  </div>

  <script type="text/javascript">
      function getId(id){
        var idPeca = id;
        document.getElementById('idPeca').value = idPeca;
      }
  </script>

  <script type="text/javascript">
      function campoValor(o,f){
          v_obj=o
          v_fun=f
          setTimeout("execmascara()",1)
      }
      function execmascara(){
          v_obj.value=v_fun(v_obj.value)
      }
      function preco(v){
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

@stop
