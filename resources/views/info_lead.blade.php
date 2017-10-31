@extends('template_principal')

@section('conteudo')

 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>Base de Leads
        <small>leads cadastrados</small>
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">
    <div class="container-fluid">

    @if(isset($atualizado))
        <div class="alert alert-success">
          <i class="fa fa-check"></i> Lead foi atualizado com sucesso!
          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        </div>
    @endif
        <div class="row">
            <div class="col-lg-6">
                <div class="box box-warning">
                    <div class="box-header with-border">
                        <h1 class="box-title"><i class="fa fa-info-circle"></i> Lead <small>detalhes e informações</small></h1>
                        <div class="box-body">
                            <div class="table-responsive-fluid">
                              <table class="table table-striped table-condensed">
                                <tr>
                                  <td style="background-color: #333;"><label style="color: white;">Nome da empresa:</label></td>
                                  <td class="text-center" style="background-color: #333;"><label style="color: white;">{{ $lead->nome_empresa }}</label></td>
                                </tr>
                                 <tr>
                                  <td><label>CNPJ/CPF:</label></td>
                                  <td class="text-center">{{ $lead->CNPJ_CPF }}</td>
                                </tr>
                                <tr>
                                  <td><label>Etapa atual:</label></td>
                                  <td class="text-center">{{ $lead->etapa_atual }}</td>
                                </tr>
                                <tr>
                                    <td><label>Vendedor:</label></td>
                                    <td><select class="form-control" name="equipe_id" disabled>
                                      <option value="null">Selecione vendedor</option>
                                      @foreach($equipe2 as $e)
                                      @if( $e->equipe_id == $equipe->equipe_id){
                                      <option value="{{ $e->equipe_id }}" selected>{{ $e->nome }}</option>
                                      @else
                                      <option value="{{ $e->equipe_id }}">{{ $e->nome }}</option>
                                      @endif
                                      @endforeach
                                      </select>
                                    </td>
                                  </tr>
                                <tr>
                                  <td><label>Produto lead:</label></td>
                                  <td class="text-center">{{ $produto_lead->descricao }}</td>
                                </tr>
                                <tr>
                                  <td><label>Mercado:</label></td>
                                  <td class="text-center">{{ $mercado->descricao }}</td>
                                </tr>
                                <tr>
                                  <td><label>Origem:</label></td>
                                  <td class="text-center">{{ $origem->descricao }}</td>
                                </tr>
                                <tr>
                                  <td><label>Site:</label></td>
                                  <td class="text-center">{{ $lead->site }}</td>
                                </tr>
                                <tr>
                                  <td><label>Rede social:</label></td>
                                  <td><select class="form-control" name="rede_social_id" disabled>
                                      <option value="null">Selecione rede social</option>
                                      @foreach($rede_social as $r)
                                      @if( $lead->rede_social_id == $r->rede_social_id){
                                      <option value="{{ $r->rede_social_id }}" selected>{{ $r->descricao }}</option>
                                      @else
                                      <option value="{{ $r->rede_social_id }}">{{ $r->descricao }}</option>
                                      @endif
                                      @endforeach
                                  </select>
                                  </td>
                                </tr>
                                <tr>
                                  <td><label>Endereço:</label></td>
                                  <td class="text-center">{{ $lead->rede_social_endereco }}</td>
                                </tr>
                                <tr>
                                  <td><label>Telefone 1:</label></td>
                                  <td class="text-center">{{ $lead->telefone1_empresa }}</td>
                                </tr>
                                <tr>
                                  <td><label>Telefone 2:</label></td>
                                  <td class="text-center">{{ $lead->telefone2_empresa }}</td>
                                </tr>
                                <tr>
                                  <td><label>Filtro 1 (necessidade):</label></td>
                                  <td class="text-center">
                                      <select class="form-control" name="filtro1" disabled>
                                      <option value="null">Selecione</option>
                                      @if( $lead->filtro1 == "Frio")
                                      <option value="Frio" selected>Frio</option>
                                      @else
                                      <option value="Frio">Frio</option>
                                      @endif
                                      @if( $lead->filtro1 == "Quente")
                                      <option value="Quente" selected>Quente</option>
                                      @else
                                      <option value="Quente">Quente</option>
                                      @endif
                                      @if( $lead->filtro1 == "Muito quente")
                                      <option value="Muito quente" selected="">Muito quente</option>
                                      @else
                                      <option value="Muito quente">Mutio quente</option>
                                      @endif
                                    </select>
                                  </td>
                                </tr>
                                <tr>
                                  <td><label>Filtro 2 (intenção):</label></td>
                                  <td class="text-center">
                                    <select class="form-control" name="filtro2" disabled>
                                      <option value="null">Selecione</option>
                                      @if( $lead->filtro2 == "Frio")
                                      <option value="Frio" selected>Frio</option>
                                      @else
                                      <option value="Frio">Frio</option>
                                      @endif
                                      @if( $lead->filtro2 == "Quente")
                                      <option value="Quente" selected>Quente</option>
                                      @else
                                      <option value="Quente">Quente</option>
                                      @endif
                                      @if( $lead->filtro2 == "Muito quente")
                                      <option value="Muito quente" selected="">Muito quente</option>
                                      @else
                                      <option value="Muito quente">Muito quente</option>
                                      @endif
                                    </select>
                                  </td>
                                </tr>
                                <tr>
                                  <td><label>Classificacao da reunião:</label></td>
                                  <td class="text-center">
                                    <select class="form-control" name="classificacao_reuniao" disabled>
                                      <option value="null">Selecione</option>
                                      @if( $lead->classificacao_reuniao == "N/A")
                                      <option value="N/A" selected>N/A</option>
                                      @else
                                      <option value="N/A">N/A</option>
                                      @endif
                                      @if( $lead->classificacao_reuniao == "Frio")
                                      <option value="Frio" selected>Frio</option>
                                      @else
                                      <option value="Frio">Frio</option>
                                      @endif
                                      @if( $lead->classificacao_reuniao == "Quente")
                                      <option value="Quente" selected>Quente</option>
                                      @else
                                      <option value="Quente">Quente</option>
                                      @endif
                                      @if( $lead->classificacao_reuniao == "Muito quente")
                                      <option value="Muito quente" selected="">Muito quente</option>
                                      @else
                                      <option value="Muito quente">Muito quente</option>
                                      @endif
                                    </select>
                                  </td>
                                </tr>
                              </table>
                              <hr style="color: #f39c12; background-color: #f39c12;">
                              <h1 class="box-title"><i class="fa fa-commenting"></i> Contato</h1>
                               <div class="container-fluid" style="overflow: scroll; height: 150px;">
                                  <div class="col-lg-12">
                                  <br>
                                    <div class="table-responsive-fluid">
                                      @if(isset($contatos))
                                        @foreach($contatos as $c)
                                          <table class="table table-striped table-condensed">
                                            <tr>
                                              <td><label>Nome:</label></td>
                                              <td class="text-center">{{ $c->nome }}</td>
                                            </tr>
                                            <tr>
                                              <td><label>Cargo:</label></td>
                                              <td class="text-center">{{ $c->cargo }}</td>
                                            </tr>
                                            <tr>
                                              <td><label>Email:</label></td>
                                              <td class="text-center">{{ $c->email }}</td>
                                            </tr>
                                            <tr>
                                              <td><label>Telefone 1:</label></td>
                                              <td class="text-center">{{ $c->telefone1 }}</td>
                                            </tr>
                                            <tr>
                                              <td><label>Telefone 2:</label></td>
                                              <td class="text-center">{{ $c->telefone2 }}</td>
                                            </tr>
                                          </table>
                                          <hr style="color: #f39c12; background-color: #333;">
                                         @endforeach
                                        @endif
                                      </div>
                                  </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="box box-warning">
                    <div class="box-header with-border">
                        <h1 class="box-title"><i class="fa fa-commenting"></i> Timeline</h1>
                        <label class="pull-right">Última atualização: {{ date('d/m/Y H:i:s', strtotime($lead->data_ultima_atualizacao)) }}</label>
                        <div class="box-body">
                          <form action="/lead/timeline/{{ $lead->lead_id }}">
                            <input type="hidden" name="lead_id" value="{{ $lead->lead_id }}">
                            <input  class="form-control" type="textarea" name="comentario" style="height: 60px;"><br>
                            <button class="btn btn-success pull-right"><i class="fa fa-commenting"></i> Comentar</button>
                            <br><br><hr style="color: #f39c12; background-color: #f39c12;">
                          </form>
                            <div class="container-fluid" style="overflow: scroll; height: 635px;">
                            @if(isset($timeline))
                              @foreach($timeline as $t)
                                <div class="row">
                                  <div class="col-md-4">
                                    <label style="font-size: 12px;"><i class="fa fa-user"></i> {{ strtoupper($t->nome) }} {{ strtoupper($t->sobrenome) }} <br> </label>
                                    <font style="font-size: 12px;">{{ date('d/m/Y H:i:s', strtotime($t->data)) }}</font>
                                  </div>
                                  <div class="col-md-8">
                                   {{ $t->comentario }}
                                  </div>
                                </div>
                                <hr style="color: #D3D3D3; background-color: #D3D3D3;">
                                @endforeach
                            @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
         <a href="/lead/update/{{ $lead->lead_id }}" class="btn btn-info"><i class="fa fa-pencil"></i> Editar</a>
        <button class="btn btn-danger pull-right" data-toggle="modal" data-target="#myModal"><i class="fa fa-close"></i> Excluir lead</button>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel"><i class="fa fa-edit"></i> Excluir lead?</h4>
          </div>
          <form action="/lead/delete/{{ $lead->lead_id }}" method="get">
            <div class="modal-body">
                <div class="box box-warning">
                    <div class="box-header with-border">
                        <h1 class="box-title">Tem certeza que deseja excluir?</h1>
                        <div class="box-body">
                            <div class="form-group-row">
                                <div class="col-lg-12">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Voltar</button>
                <button type="submit" class="btn btn-success">Sim, desejo excluir!</button>
            </div>
         </form>
        </div>
      </div>
    </div>

    </section>

  </div>

@stop
