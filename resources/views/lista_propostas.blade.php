@extends('template_principal')

@section('conteudo')

 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>Propostas
        <small>Propostas cadastradas</small>
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                @if((old('titulo')) && (count($errors) <= 0))
                <div class="alert alert-success">
                    <i class="fa fa-check"></i>  Proposta <b>{{ old('titulo') }}</b> foi cadastrada com sucesso!
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                </div>
                @endif

                @if(isset($erro))
                <div class="alert alert-danger">
                    <i class="fa fa-check"></i> Proposta não enviada!
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                </div>
                @endif

                @if(isset($enviado))
                    <div class="alert alert-success">
                        <i class="fa fa-check"></i> Email com a proposta enviado com sucesso!
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    </div>
                @endif

                @if(isset($pesquisa_erro))
                    <div class="alert alert-danger">
                        <i class="fa fa-check"></i> Pesquisa não enviada!
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    </div>
                @endif

                @if(isset($pesquisa_enviada))
                    <div class="alert alert-success">
                        <i class="fa fa-check"></i> Email com a pesquisa enviado com sucesso!
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    </div>
                @endif

                <div class="box box-warning">
                    <div class="box-header with-border">
                        <h1 class="box-title"><i class="fa fa-edit"></i> Propostas <small>informações</small></h1>
                        <div class="box-body">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <div class="table-responsive-fluid">
                                    <table class="table table-striped table-condensed">
                                        <tr style="background-color: #333">
                                            <td style="color: white;">Cliente</td>
                                            <td style="color: white;">Título</td>
                                            <td class="text-center" style="color: white;">Data emissão</td>
                                            <td class="text-center" style="color: white;">Situação</td>
                                            <td class="text-center" style="color: white;">Valor aprovado</td>
                                            <td class="text-center" style="color: white;">Valor Total</td>
                                            <td class="text-center" style="color: white;">Download</td>
                                            <td class="text-center" style="color: white;">Enviar por email</td>
                                            <td class="text-center" style="color: white;">Enviar pesquisa</td>
                                        </tr>
                                        @if(isset($proposta))
                                            @foreach($proposta as $p)
                                            <tr>
                                                <td>{{ $p->nome_empresa }}</td>
                                                <input type="hidden" id="campoDescricao" value="{{ $p->titulo }}">
                                                <td>{{ $p->titulo }}</td>
                                                <td class="text-center">{{ date('d/m/Y', strtotime($p->data_emissao)) }}</td>
                                                <td class="text-center">
                                                @if($p->situacao == "Em aberto")
                                                  <i class="btn btn-warning" style="font-size: 12px; width: 150px;">Em aberto</i>
                                                @endif
                                                @if($p->situacao == "Aprovada")
                                                  <i class="btn btn-success" style="font-size: 12px; width: 150px;">Aprovada</i>
                                                @endif
                                                @if($p->situacao == "Aprovada parcialmente")
                                                  <i class="btn btn-info" style="font-size: 12px; width: 150px;">Aprovada parcialmente</i>
                                                @endif
                                                @if($p->situacao == "Reprovada")
                                                  <i class="btn btn-danger" style="font-size: 12px; width: 150px;">Reprovada</i>
                                                @endif
                                                </td>
                                                <td class="text-center">R$ {{ number_format($p->valor_total_aprovado, 2, ',', '.') }}</td>
                                                <td class="text-center">R$ {{ number_format($p->valor_total, 2, ',', '.') }}</td>
                                                <td class="text-center">
                                                    <a href="/proposta/download_pdf/{{ $p->proposta_id }}"><i class="fa fa-download" style="font-size: 18px;"></i></a>
                                                </td>
                                                <td class="text-center">
                                                    @if($p->proposta_enviada == "sim")
                                                    <a href="/proposta/send_email/{{ $p->proposta_id }}"><i class="fa fa-envelope" style="font-size: 17px; color: green;"></i> <i class="fa fa-check" style="font-size: 17px; color: green;"></i></a>
                                                    @endif
                                                    @if($p->proposta_enviada != "sim")
                                                    <a href="/proposta/send_email/{{ $p->proposta_id }}"><i class="fa fa-envelope" style="font-size: 17px; color: grey;"></i> <i class="fa fa-arrow-right" style="font-size: 17px; color: grey;"></i></a>
                                                    @endif
                                                </td>
                                                <td class="text-center">
                                                    @if($p->situacao == "Aprovada")
                                                        @if($p->pesquisa_enviada == "sim")
                                                            <a href="#" data-toggle="modal" data-target="#myModal1" id="idModal"><i class="fa fa-search" style="font-size: 17px; color: green;"></i> <i class="fa fa-check" style="font-size: 17px; color: green;"></i></a>
                                                        @endif
                                                        @if($p->pesquisa_enviada != "sim")
                                                            <a href="#" data-toggle="modal" data-target="#myModal1" id="idModal"><i class="fa fa-search" style="font-size: 17px; color: grey"></i> <i class="fa fa-arrow-right" style="font-size: 17px; color: grey;"></i></a>
                                                        @endif
                                                    @endif
                                                    @if($p->situacao == "Reprovada")
                                                        @if($p->pesquisa_enviada == "sim")
                                                            <a href="#" data-toggle="modal" data-target="#myModal2" id="idModal"><i class="fa fa-search" style="font-size: 17px; color: green;"></i> <i class="fa fa-check" style="font-size: 17px; color: green;"></i></a>
                                                        @endif
                                                        @if($p->pesquisa_enviada != "sim")
                                                            <a href="#" data-toggle="modal" data-target="#myModal2" id="idModal"><i class="fa fa-search" style="font-size: 17px; color: grey"></i> <i class="fa fa-arrow-right" style="font-size: 17px; color: grey;"></i></a>
                                                        @endif
                                                    @endif
                                                </td>
                                            </tr>
                                            @endforeach
                                        @endif
                                    </table>
                                </div>
                              <form action="/proposta" method="get">
                                  <button type="submit" class="btn btn-success pull-right">
                                      <a href="#"></a><i class="fa fa-plus"></i> Nova Proposta
                              </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>

    </section>
  </div>
@stop
