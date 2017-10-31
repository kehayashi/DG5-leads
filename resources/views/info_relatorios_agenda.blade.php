@extends('template_principal')

@section('conteudo')


 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>Relatório
        <small>Informações</small>
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="box box-warning">
                    <div class="box-header with-border">
                        <h1 class="box-title"><i class="fa fa-calendar"></i> informações <small></small></h1>
                        <div class="box-body">

                          <div class="col-md-3">
                            <br>
                            <br>
                            <div class="info-box">
                              <span class="info-box-icon bg-purple"><i class="fa fa-calendar"></i></span>
                              <div class="info-box-content">
                                <span class="info-box-text">Reuniões</span>
                                <span class="info-box-number">100</span>
                              </div>
                              <!-- /.info-box-content -->
                            </div>
                            <!-- /.info-box -->
                          </div>

                          <div class="col-md-1 text-center">
                            <div class="row">
                              <br><br><br>
                            </div>
                            <div class="row">
                              <i class="fa fa-close" style="font-size: 37px;"></i>
                            </div>
                          </div>

                          <div class="col-md-3">
                            <br><br>
                              <div class="info-box">
                                <span class="info-box-icon bg-green"><i class="fa fa-check-circle"></i></span>
                                <div class="info-box-content">
                                  <span class="info-box-text">Propostas</span>
                                  <span class="info-box-number">100</span>
                                </div>
                                <!-- /.info-box-content -->
                              </div>
                              <!-- /.info-box -->
                          </div>

                          <div class="col-md-1">
                            <div class="row">
                              <br>
                              <br>
                              <br>
                            </div>
                            <span class="logo-lg"><img src="{!! asset('igual.png') !!}" style="width: 45px;"></span>
                          </div>
                          <div class="col-md-4">
                            <div class="box box-primary box-solid">
                              <div class="box-header with-border text-center">
                                <h3 class="box-title">Resultado</h3>
                              </div>
                              <!-- /.box-header -->
                              <div class="box-body">
                                <h1 class="text-center">40% <i class="fa fa-thumbs-o-up"></i></h1>
                                <p>
                                  Percentual de propostas aprovadas em releção ao número de reuniões
                                </p>
                              </div>
                              <!-- /.box-body -->
                            </div>
                          </div>
                      </div>
                </div>
            </div>
        </div>
    </section>
  </div>

@stop
