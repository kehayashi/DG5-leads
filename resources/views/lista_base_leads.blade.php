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
        <div class="row">
            <div class="col-lg-12">
                <div class="box box-warning">
                    <div class="box-header with-border">
                        <h1 class="box-title"><i class="fa fa-info-circle"></i> Leads <small>informações</small></h1>
                        <div class="box-body">
                            <div class="table-responsive-fluid">
                                <table class="table table-striped table-condensed">
                                    <tr style="color: white; background-color: #333;">
                                      <th style="color: white;">Entrada</th>
                                      <th style="color: white;">Filtro 1 (necessidade)</th>
                                      <th style="color: white;">Filtro 2 (intenção)</th>
                                      <th style="color: white;">Resultados</th>
                                      <th style="color: white;">Agendamentos</th>
                                      <th style="color: white;">Proposta</th>
                                      <th style="color: white;">Pesquisa</th>
                                    </tr>
                                    <tr>
                                     <td>
                                          <table class="table table-striped table-condensed">
                                              @if(isset($lead))
                                                @foreach($lead as $l)
                                                <tr>
                                                    <td style="font-size: 14px;"> {{ $l->nome_empresa }} </td>
                                                    <td class="pull-right"><a href="/lead/info/{{ $l->lead_id }}"><i class="fa fa-exclamation-circle btn btn-info" style="font-size: 13px;"></i></a></td>
                                                </tr>
                                                @endforeach
                                              @endif
                                          </table>
                                      </td>
                                      <td>
                                          <table class="table table-striped table-condensed">
                                              @if(isset($leadFiltro1))
                                                @foreach($leadFiltro1 as $l2)
                                                <tr>
                                                    <td style="font-size: 14px;"> {{ $l2->nome_empresa }} </td>
                                                    <td class="pull-right"><a href="/lead/info/{{ $l2->lead_id }}">
                                                    @if($l2->filtro1 != "Frio")
                                                      <i class="fa fa-thumbs-o-up btn btn-success" style="font-size: 13px;"></i>
                                                    @endif
                                                    @if($l2->filtro1 == "Frio")
                                                      <i class="fa fa-thumbs-o-down btn btn-danger" style="font-size: 13px;"></i>
                                                    @endif
                                                    </a></td>
                                                </tr>
                                                @endforeach
                                              @endif
                                          </table>
                                      </td>
                                      <td>
                                          <table class="table table-striped table-condensed">
                                              @if(isset($leadFiltro2))
                                                @foreach($leadFiltro2 as $l3)
                                                <tr>
                                                    <td style="font-size: 14px;"> {{ $l3->nome_empresa }} </td>
                                                    <td class="pull-right"><a href="/lead/info/{{ $l3->lead_id }}">
                                                    @if($l3->filtro2 != "Frio")
                                                      <i class="fa fa-thumbs-o-up btn btn-success" style="font-size: 13px;"></i>
                                                    @endif
                                                    @if($l3->filtro2 == "Frio")
                                                      <i class="fa fa-thumbs-o-down btn btn-danger" style="font-size: 13px;"></i>
                                                    @endif
                                                    </a></td>
                                                </tr>
                                                @endforeach
                                              @endif
                                          </table>
                                      </td>
                                      <td>
                                          <table class="table table-striped table-condensed">
                                              @if(isset($leadFiltro3))
                                                @foreach($leadFiltro3 as $l4)
                                                <tr>
                                                    <td style="font-size: 14px;"> {{ $l4->nome_empresa }} </td>
                                                    <td class="pull-right"><a href="/lead/info/{{ $l4->lead_id }}"><i class="fa fa-thumbs-o-up btn btn-success" style="font-size: 13px;"></i></a></td>
                                                </tr>
                                                @endforeach
                                              @endif
                                          </table>
                                      </td>
                                      <td>
                                          <table class="table table-striped table-condensed">

                                          </table>
                                      </td>
                                      <td>
                                          <table class="table table-striped table-condensed">
                                            @if(isset($leadProposta))
                                              @foreach($leadProposta as $lp)
                                              <tr>
                                                  <td style="font-size: 14px;"> {{ $lp->nome_empresa }} </td>
                                                  <td class="pull-right"><a href="/lead/info/{{ $lp->lead_id }}"><i class="fa fa-exclamation-circle btn btn-info" style="font-size: 13px;"></i></a></td>
                                              </tr>
                                              @endforeach
                                            @endif
                                          </table>
                                      </td>
                                      <td>
                                          <table class="table table-striped table-condensed">
                                            @if(isset($leadPesquisa))
                                              @foreach($leadPesquisa as $lpq)
                                              <tr>
                                                  <td style="font-size: 14px;"> {{ $lpq->nome_empresa }} </td>
                                                  <td class="pull-right"><a href="/lead/info/{{ $lpq->lead_id }}"><i class="fa fa-exclamation-circle btn btn-info" style="font-size: 13px;"></i></a></td>
                                              </tr>
                                              @endforeach
                                            @endif
                                          </table>
                                      </td>
                                    </tr>
                                </table>
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
