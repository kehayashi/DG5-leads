@extends('template_principal')

@section('conteudo')

 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>Dashboard
        <small>informações gerais</small>
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-6">
                <div class="box box-warning">
                    <div class="box-header with-border">
                        <h1 class="box-title"><i class="fa fa-info-circle"></i> Vendas <small></small></h1>
                        <div class="box-body">
                          <div class="col-md-12">
                            <div class="container-fluid" style="overflow: scroll; height: 150px;">
                              <div class="table-responsive-fluid">
                                  <table class="table table-striped table-condensed">
                                      <tr style="background-color: #333">
                                          <td style="color: white;">Descricao</td>
                                          <td class="text-center" style="color: white;">Ver</td>
                                      </tr>
                                  </table>
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
                        <h1 class="box-title"><i class="fa fa-info-circle"></i> Oportunidades <small></small></h1>
                        <div class="box-body">
                            <div class="col-md-12">
                                <div class="container-fluid" style="overflow: scroll; height: 150px;">
                                  <table class="table table-striped table-condensed">
                                      <tr style="background-color: #333">
                                          <td style="color: white;">Cliente</td>
                                          <td class="pull-right" style="color: white;">Ver&nbsp &nbsp</td>
                                      </tr>
                                      @if(isset($lead))
                                        @foreach($lead as $l)
                                        <tr>
                                            <td style="font-size: 14px;"> {{ $l->nome_empresa }} </td>
                                            <td class="pull-right"><a href="/lead/info/{{ $l->lead_id }}">
                                                  <i class="fa fa-exclamation-circle btn btn-info" style="font-size: 11px;"></i>
                                            </td>
                                        </tr>
                                        @endforeach
                                     @endif
                                  </table>
                                </div>
                            </div>
                      </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <div class="box box-warning">
                <div class="box-header with-border">
                    <h1 class="box-title"><i class="fa fa-info-circle"></i> Qualificações de reuniões <small></small></h1>
                    <div class="box-body">
                        <div class="col-md-12">
                            <div class="container-fluid" style="overflow: scroll; height: 150px;">
                              <table class="table table-striped table-condensed">
                                  <tr style="background-color: #333">
                                      <td style="color: white;">Descricao</td>
                                      <td class="text-center" style="color: white;">Editar</td>
                                      <td class="text-center" style="color: white;">Excluir</td>
                                  </tr>
                              </table>
                            </div>
                        </div>
                  </div>
                </div>
            </div>
          </div>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <div class="box box-warning">
                    <div class="box-header with-border">
                        <h1 class="box-title"><i class="fa fa-info-circle"></i> Ultimos agendamentos <small></small></h1>
                        <div class="box-body">
                          <div class="col-md-12">
                            <div class="container-fluid" style="overflow: scroll; height: 150px;">
                              <div class="table-responsive-fluid">
                                  <table class="table table-striped table-condensed">
                                      <tr style="background-color: #333">
                                          <td style="color: white;">Descricao</td>
                                          <td class="text-center" style="color: white;">Editar</td>
                                          <td class="text-center" style="color: white;">Excluir</td>
                                      </tr>
                                  </table>
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
                        <h1 class="box-title"><i class="fa fa-info-circle"></i> Feedbacks pendentes <small></small></h1>
                        <div class="box-body">
                            <div class="col-md-12">
                                <div class="container-fluid" style="overflow: scroll; height: 150px;">
                                  <table class="table table-striped table-condensed">
                                      <tr style="background-color: #333">
                                          <td style="color: white;">Descricao</td>
                                          <td class="text-center" style="color: white;">Editar</td>
                                          <td class="text-center" style="color: white;">Excluir</td>
                                      </tr>
                                  </table>
                                </div>
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
