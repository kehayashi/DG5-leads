@extends('template_principal')

@section('conteudo')

 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>Pesquisa
        <small>Informações da pesquisa</small>
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

            @if(isset($cadastrado))
            <div class="alert alert-success">
              <i class="fa fa-check"></i> Pesquisa cadastrada com sucesso!
              <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            </div>
            @endif
          <form action="/pesquisa/reprovada/cadastrar" method="post">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="box box-warning">
                <div class="box-header with-border">
                    <h1 class="box-title"><i class="fa fa-building-o"></i> Perguntas da pesquisa de proposta reprovada</h1>
                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                        </button>
                    </div>
                    <div class="box-body">
                      <div class="table-responsive-fluid">
                          <table class="table table-striped table-condensed">
                              <tr style="background-color: #333">
                                  <td class="pull-left" style="color: white;">Pergunta</td>
                                  <td class="text-center" style="color: white;">Motivo</td>
                              </tr>
                              <tr style="height: 45px;">
                                  <td><label>1 - Motivo pelo qual escolheu trabalhar com a DG5?</label></td>
                                  <td class="text-center">
                                      <select class="form-control" name="motivo">
                                        <option value="null">Selecione motivo</option>
                                        @foreach($motivo as $m)
                                        <option value="{{ $m->motivo_id }}">{{ $m->descricao }}</option>
                                        @endforeach
                                      </select>
                                  </td>
                              </tr>
                        </table>
                        <label>Comentários/sugetões</label>
                        <input type="text-area" class="form-control" name="comentarios_sugestoes" style="height: 100px;"/>
                    </div>
                </div>
            </div>
          </div>
        <button class="btn btn-success pull-right"><i class="fa fa-check"></i> Concluir Pesquisa</button>
        </form>
    </section>
  </div>
</div>

@stop
