@extends('template_principal')

@section('conteudo')

 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>Produto lead
        <small>Produtos cadastrados</small>
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                @if((old('descricao')) && (count($errors) <= 0))
                <div class="alert alert-success">
                    <i class="fa fa-check"></i>  Produto <b>{{ old('descricao') }}</b> foi cadastrado com sucesso!
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                </div>
                @endif

                @if(isset($deletado))
                <div class="alert alert-success">
                    <i class="fa fa-check"></i> Produto foi excluído com sucesso!
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                </div>
                @endif

                @if(isset($atualizado))
                    <div class="alert alert-success">
                        <i class="fa fa-check"></i> Produto foi atualizada com sucesso!
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    </div>
                @endif

                <div class="box box-warning">
                    <div class="box-header with-border">
                        <h1 class="box-title"><i class="fa fa-circle-o"></i> Produto lead <small>informações</small></h1>
                        <div class="box-body">
                             <form action="/produto_lead/crud" method="post">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <div class="table-responsive-fluid">
                                    <table class="table table-striped table-condensed">
                                        <tr style="background-color: #333">
                                            <td style="color: white;">Descricao</td>
                                            <td class="text-center" style="color: white;">Editar</td>
                                            <td class="text-center" style="color: white;">Excluir</td>
                                        </tr>
                                        @if(isset($produto))
                                            @foreach($produto as $p)
                                        <tr>
                                            <td>{{ $p->descricao }}</td>
                                            <input type="hidden" id="campoDescricao" value="{{ $p->descricao }}">
                                            <td class="text-center">
                                                <a href="#" data-toggle="modal" data-target="#myModal2" id="idModal"><i class="fa fa-pencil" style="color: #708090;" 
                                                onclick="getId( {{ $p->produto_lead_id}} );"></i></a>
                                            </td>
                                            <td class="text-center">
                                                <a href="/produto_lead/crud/delete/{{ $p->produto_lead_id}}"><i class="fa fa-close" style="color: red;"></i></a>
                                            </td>
                                        </tr>
                                            @endforeach 
                                        @endif             
                                    </table>
                                </div>
                                <button type="button" class="btn btn-success pull-right" data-toggle="modal" data-target="#myModal"><i class="fa fa-plus"></i> Novo produto
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
            <h4 class="modal-title" id="myModalLabel"><i class="fa fa-edit"></i> Cadastro produto</h4>
          </div>
          <form action="/produto_lead/cadastrar" method="post">
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

    <!-- Modal -->
    <div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel"><i class="fa fa-refresh"></i> Atualizar Produto</h4>
          </div>
          <form action="/produto_lead/update" method="post">
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
                                    <input type="hidden" id="idProduto" name="produto_lead_id" value="">
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
        var idProduto = id;
        document.getElementById('idProduto').value = idProduto;
      }
  </script>

@stop
