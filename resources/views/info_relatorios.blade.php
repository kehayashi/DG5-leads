@extends('template_principal')

@section('conteudo')

 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>Relatórios
        <small>Tipos de relatórios</small>
      </h1>
    </section>

    <section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="box box-warning">
                    <div class="box-header with-border">
                        <h1 class="box-title"><i class="fa fa-edit"></i> Relatórios <small>informações</small></h1>
                        <div class="box-body">
                              <input type="hidden" name="_token" value="{{ csrf_token() }}">
                              <br>
                              <div class="row">
                                <div class="col-lg-4 col-xs-6">
                                  <!-- small box -->
                                  <div class="small-box bg-aqua">
                                      <div class="inner">
                                        <h3 style="font-size: 18px;">Leads</h3>
                                        <p>cadastrados <font style="font-size: 25px;"><b>{{ $nleads }}</b></font></p>
                                      </div>
                                      <div class="icon" style="font-size: 70px;">
                                        <i class="fa fa-info-circle" ></i>
                                      </div>
                                      <a href="/relatorios/leads" class="small-box-footer">Mais informações <i class="fa fa-arrow-circle-right"></i></a>
                                  </div>
                                </div>
                                <!-- ./col -->
                                <div class="col-lg-4 col-xs-6">
                                  <!-- small box -->
                                  <div class="small-box bg-yellow">
                                    <div class="inner">
                                      <h3 style="font-size: 18px;">Reuniões</h3>
                                      <p>agendadas  <font style="font-size: 25px;"><b>0</b></font></p></p>
                                    </div>
                                    <div class="icon" style="font-size: 70px;">
                                      <i class="fa fa-calendar" ></i>
                                    </div>
                                    <a href="#" class="small-box-footer">Mais informações <i class="fa fa-arrow-circle-right"></i></a>
                                  </div>
                                </div>
                                <!-- ./col -->
                                <div class="col-lg-4 col-xs-6">
                                  <!-- small box -->
                                  <div class="small-box bg-blue">
                                    <div class="inner">
                                      <h3 style="font-size: 18px;">Propostas</h3>
                                      <p>enviadas <font style="font-size: 25px;"><b>{{ $npropostas }}</b></font></p></p>
                                    </div>
                                    <div class="icon" style="font-size: 70px;">
                                      <i class="fa fa-check-circle" ></i>
                                    </div>
                                    <a href="/relatorios/propostas" class="small-box-footer">Mais informações <i class="fa fa-arrow-circle-right"></i></a>
                                  </div>
                                </div>
                              </div>
                              <br><br>

                              <div class="row">
                                <div class="col-lg-4 col-xs-3">
                                  <!-- small box -->
                                  <div class="small-box bg-red">
                                      <div class="inner">
                                        <h3 style="font-size: 18px;">Faturamento</h3>
                                        <p>valores <font style="font-size: 25px;"><b>0</b></font></p></p>
                                      </div>
                                      <div class="icon" style="font-size: 70px;">
                                        <i class="fa fa-money" ></i>
                                      </div>
                                      <a href="#" class="small-box-footer">Mais informações <i class="fa fa-arrow-circle-right"></i></a>
                                  </div>
                                </div>
                                <!-- ./col -->
                                <div class="col-lg-4 col-xs-6">
                                  <!-- small box -->
                                  <div class="small-box bg-purple">
                                    <div class="inner">
                                      <h3 style="font-size: 18px;">Vendas</h3>
                                      <p>por equipe  <font style="font-size: 25px;"><b>0</b></font></p></p>
                                    </div>
                                    <div class="icon" style="font-size: 70px;">
                                      <i class="fa fa-usd"></i>
                                    </div>
                                    <a href="#" class="small-box-footer">Mais informações <i class="fa fa-arrow-circle-right"></i></a>
                                  </div>
                                </div>
                                <!-- ./col -->
                                <div class="col-lg-4 col-xs-6">
                                  <!-- small box -->
                                  <div class="small-box bg-green">
                                    <div class="inner">
                                      <h3 style="font-size: 18px;">Pesquisa</h3>
                                      <p>Satisfação geral  <font style="font-size: 25px;">{{ number_format($mediageral,2,",",".") }}%</font></p></p>
                                    </div>
                                    <div class="icon" style="font-size: 70px;">
                                      <i class="fa fa-star-half-full" ></i>
                                    </div>
                                    <a href="/relatorios/pesquisas" class="small-box-footer">Mais informações <i class="fa fa-arrow-circle-right"></i></a>
                                  </div>
                                </div>
                              </div>
                                <!-- ./col -->
                          </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </section>
@stop
