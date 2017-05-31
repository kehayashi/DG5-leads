@extends('template_principal')

@section('conteudo')

 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>Edição de Leads
        <small>editar lead</small>
      </h1>
    </section>



    <form action="/lead/update" method="post">
    <!-- Main content -->
    <section class="content">
    <div class="container-fluid">
        <div class="row">

          @if (count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                  @foreach($errors->all() as $error)
                      <li>{{$error}}</li>
                  @endforeach
                </ul>
            </div>
          @endif

            <div class="col-lg-6">
                <div class="box box-warning">
                    <div class="box-header with-border">
                        <h1 class="box-title"><i class="fa fa-info-circle"></i> Lead <small>detalhes e informações</small></h1>
                        <div class="box-body">
                            <div class="table-responsive-fluid">
                              <table class="table table-striped table-condensed">
                                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                  <input type="hidden" name="lead_id" value="{{ $lead->lead_id }}">
                                  <tr>
                                    <td style="background-color: #333;"><label style="color: white;">Nome da empresa:</label></td>
                                    <td class="text-center" style="background-color: #333;"><input class="form-control" type="text" name="nome_empresa" value="{{ $lead->nome_empresa }}"></td>
                                  </tr>
                                   <tr>
                                    <td><label>CNPJ/CPF:</label></td>
                                    <td class="text-center"><input class="form-control" type="text" name="CNPJ_CPF" value="{{ $lead->CNPJ_CPF }}"></td>
                                  </tr>
                                  <tr>
                                    <td><label>Etapa atual:</label></td>
                                    <td class="text-center"><input class="form-control" type="text" name="etapa_atual" value="{{ $lead->etapa_atual }}" disabled></td>
                                  </tr>
                                  <tr>
                                    <td><label>Vendedor:</label></td>
                                    <td><select class="form-control" name="equipe_id">
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
                                    <td><select class="form-control" name="produto_lead_id">
                                      <option value="null">Selecione produto</option>
                                      @foreach($produto_lead2 as $p)
                                      @if( $p->produto_lead_id == $produto_lead->produto_lead_id){
                                      <option value="{{ $p->produto_lead_id}}" selected>{{ $p->descricao}}</option>
                                      @else
                                      <option value="{{ $p->produto_lead_id}}">{{ $p->descricao}}</option>
                                      @endif
                                      @endforeach
                                      </select>
                                    </td>
                                  </tr>
                                  <tr>
                                    <td><label>Mercado:</label></td>
                                    <td><select class="form-control" name="mercado_id">
                                      <option value="null">Selecione Mercado</option>
                                      @foreach($mercado2 as $m)
                                      @if( $m->mercado_id == $mercado->mercado_id){
                                      <option value="{{ $m->mercado_id }}" selected>{{ $m->descricao}}</option>
                                      @else
                                      <option value="{{ $m->mercado_id }}">{{ $m->descricao}}</option>
                                      @endif
                                      @endforeach
                                      </select>
                                    </td>
                                  </tr>
                                  <tr>
                                    <td><label>Origem:</label></td>
                                    <td><select class="form-control" name="origem_id">
                                      <option value="null">Selecione Origem</option>
                                      @foreach($origem2 as $o)
                                      @if( $o->origem_id == $origem->origem_id){
                                      <option value="{{ $o->origem_id }}" selected>{{ $o->descricao}}</option>
                                      @else
                                      <option value="{{ $o->origem_id }}">{{ $o->descricao}}</option>
                                      @endif
                                      @endforeach
                                      </select>
                                    </td>
                                  </tr>
                                   <tr>
                                    <td><label>Site:</label></td>
                                    <td class="text-center"><input class="form-control" type="text" name="site" value="{{ $lead->site }}"></td>
                                  </tr>
                                  <tr>
                                    <td><label>Rede Social:</label></td>
                                    <td class="text-center">
                                      <select class="form-control" name="rede_social_id">
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
                                    <td class="text-center"><input class="form-control" type="text" name="endereco" value="{{ $lead->rede_social_endereco }}"></td>
                                  </tr>
                                  <tr>
                                    <td><label>Telefone 1:</label></td>
                                    <td class="text-center"><input class="form-control" type="text" name="telefone1_empresa" value="{{ $lead->telefone1_empresa }}"></td>
                                  </tr>
                                  <tr>
                                    <td><label>Telefone 2:</label></td>
                                    <td class="text-center"><input class="form-control" type="text" name="telefone2_empresa" value="{{ $lead->telefone2_empresa }}"></td>
                                  </tr>
                                  <tr>
                                    <td><label>Filtro 1 (necessidade):</label></td>
                                    <td class="text-center">
                                        <select class="form-control" name="filtro1">
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
                                        <option value="Muito quente">Muito quente</option>
                                        @endif
                                      </select>
                                    </td>
                                  </tr>
                                  <tr>
                                    <td><label>Filtro 2 (intenção):</label></td>
                                    <td class="text-center">
                                      <select class="form-control" name="filtro2">
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
                              </table>
                              <hr style="color: #f39c12; background-color: #333;">
                               <b>Observações:</b><br>
                                <input type="text-area" class="form-control" name="observacoes" value="{{ $lead->observacoes }}" style="height: 70px;">
                                <br>
                            </div>
                        </div>  
                    </div>
                </div>
            </div>

            <div class="col-lg-6">
              <div class="row">
                <div class="box box-warning">
                  <div class="box-header with-border">
                      <h1 class="box-title"><i class="fa fa-commenting"></i> Endereço <small>detalhes e informações</small></h1>
                        <div class="box-body">
                            <div div class="form-group-row">
                              <div class="col-lg-6">
                                  <b>Rua:</b><br>
                                  <input type="text" class="form-control" name="rua" value="{{ $lead->rua }}">
                              </div>
                              <div class="col-lg-3">
                                  <b>Logradouro:</b><br>
                                  <input type="text" class="form-control" name="logradouro" value="{{ $lead->logradouro }}">
                              </div>
                               <div class="col-lg-3">
                                  <b>Cep:</b><br>
                                  <input type="text" class="form-control" name="cep" value="{{ $lead->cep }}">
                              </div>
                            </div>
                            <div div class="form-group-row">
                                <div class="col-lg-6">
                                    <b>Complemento:</b><br>
                                    <input type="text" class="form-control" name="complemento" value="{{ $lead->complemento }}">
                                </div>
                                <div class="col-lg-6">
                                    <b>País:</b><br>
                                    <input type="text" class="form-control" name="pais" value="{{ $lead->pais }}">
                                </div>
                            </div>
                            <div div class="form-group-row">
                                <div class="col-lg-6">
                                    <b>Estado:</b><br>
                                    <input type="text" class="form-control" name="estado" value="{{ $lead->estado }}">
                                </div>
                                <div class="col-lg-6">
                                    <b>cidade:</b><br>
                                    <input type="text" class="form-control" name="cidade" value="{{ $lead->cidade }}">
                                </div>
                            </div>
                        </div>
                  </div>  
                </div>
                <div class="box box-warning">
                    <div class="box-header with-border">
                        <h1 class="box-title"><i class="fa fa-commenting"></i> Contato <small>detalhes e informações</small></h1>
                        <div class="box-body">
                               <div class="container-fluid" style="overflow: scroll; height: 536px;">
                                  <div class="col-lg-12">
                                  <br>
                                     <div class="table-responsive-fluid">
                                      @if(isset($contatos))
                                        @foreach($contatos as $c)
                                          <table class="table table-striped table-condensed">
                                            <tr>
                                              <td><label>Nome:</label></td>
                                              <td class="text-center">
                                                <input type="hidden" name="contato_id[]" value="{{ $c->contato_id }}">
                                                <input class="form-control" type="text" name="nome[]" value="{{ $c->nome }}">
                                              </td>
                                            </tr>
                                            <tr>
                                              <td><label>Cargo:</label></td>
                                              <td class="text-center">
                                                <input class="form-control" type="text" name="cargo[]" value="{{ $c->cargo }}">
                                              </td>
                                            </tr>
                                            <tr>
                                              <td><label>Email:</label></td>
                                              <td class="text-center">
                                                <input class="form-control" type="text" name="email[]" value="{{ $c->email }}">
                                              </td>
                                            </tr>
                                            <tr>
                                              <td><label>Telefone 1:</label></td>
                                              <td class="text-center">
                                                <input class="form-control" type="text" name="telefone1[]" value="{{ $c->telefone1 }}">
                                              </td>
                                            </tr>
                                            <tr>
                                              <td><label>Telefone 2:</label></td>
                                              <td class="text-center">
                                                <input class="form-control" type="text" name="telefone2[]" value="{{ $c->telefone2 }}">
                                              </td>
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

                    <button class="btn btn-success pull-right"><i class="fa fa-check"></i> Atualizar lead</button>
                </div>
            </div>
        </div>     
    </div>
    
  </section>

  </form>

  </div>

@stop
