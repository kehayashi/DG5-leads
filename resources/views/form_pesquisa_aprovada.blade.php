@extends('template_principal')

@section('conteudo')

<style type="text/css">
    .estrelas1 input[type=radio] {
      display: none;
    }
    .estrelas1 label i.fa:before {
      content:'\f005';
      color: #FC0;
    }
    .estrelas1 input[type=radio]:checked ~ label i.fa:before {
      color: #CCC;
    }
</style>
<style type="text/css">
    .estrelas2 input[type=radio] {
      display: none;
    }
    .estrelas2 label i.fa:before {
      content:'\f005';
      color: #FC0;
    }
    .estrelas2 input[type=radio]:checked ~ label i.fa:before {
      color: #CCC;
    }
</style>
<style type="text/css">
    .estrelas3 input[type=radio] {
      display: none;
    }
    .estrelas3 label i.fa:before {
      content:'\f005';
      color: #FC0;
    }
    .estrelas3 input[type=radio]:checked ~ label i.fa:before {
      color: #CCC;
    }
</style>
<style type="text/css">
    .estrelas4 input[type=radio] {
      display: none;
    }
    .estrelas4 label i.fa:before {
      content:'\f005';
      color: #FC0;
    }
    .estrelas4 input[type=radio]:checked ~ label i.fa:before {
      color: #CCC;
    }
</style>
<style type="text/css">
    .estrelas5 input[type=radio] {
      display: none;
    }
    .estrelas5 label i.fa:before {
      content:'\f005';
      color: #FC0;
    }
    .estrelas5 input[type=radio]:checked ~ label i.fa:before {
      color: #CCC;
    }
</style>
<style type="text/css">
    .estrelas6 input[type=radio] {
      display: none;
    }
    .estrelas6 label i.fa:before {
      content:'\f005';
      color: #FC0;
    }
    .estrelas6 input[type=radio]:checked ~ label i.fa:before {
      color: #CCC;
    }
</style>
<style type="text/css">
    .estrelas6 input[type=radio] {
      display: none;
    }
    .estrelas6 label i.fa:before {
      content:'\f005';
      color: #FC0;
    }
    .estrelas6 input[type=radio]:checked ~ label i.fa:before {
      color: #CCC;
    }
</style>
<style type="text/css">
    .estrelas7 input[type=radio] {
      display: none;
    }
    .estrelas7 label i.fa:before {
      content:'\f005';
      color: #FC0;
    }
    .estrelas7 input[type=radio]:checked ~ label i.fa:before {
      color: #CCC;
    }
</style>
<style type="text/css">
    .estrelas8 input[type=radio] {
      display: none;
    }
    .estrelas8 label i.fa:before {
      content:'\f005';
      color: #FC0;
    }
    .estrelas8 input[type=radio]:checked ~ label i.fa:before {
      color: #CCC;
    }
</style>
<style type="text/css">
    .estrelas9 input[type=radio] {
      display: none;
    }
    .estrelas9 label i.fa:before {
      content:'\f005';
      color: #FC0;
    }
    .estrelas9 input[type=radio]:checked ~ label i.fa:before {
      color: #CCC;
    }
</style>
<style type="text/css">
    .estrelas10 input[type=radio] {
      display: none;
    }
    .estrelas10 label i.fa:before {
      content:'\f005';
      color: #FC0;
    }
    .estrelas10 input[type=radio]:checked ~ label i.fa:before {
      color: #CCC;
    }
</style>
<style type="text/css">
    .estrelas11 input[type=radio] {
      display: none;
    }
    .estrelas11 label i.fa:before {
      content:'\f005';
      color: #FC0;
    }
    .estrelas11 input[type=radio]:checked ~ label i.fa:before {
      color: #CCC;
    }
</style>
<style type="text/css">
    .estrelas12 input[type=radio] {
      display: none;
    }
    .estrelas12 label i.fa:before {
      content:'\f005';
      color: #FC0;
    }
    .estrelas12 input[type=radio]:checked ~ label i.fa:before {
      color: #CCC;
    }
</style>
<style type="text/css">
    .estrelas13 input[type=radio] {
      display: none;
    }
    .estrelas13 label i.fa:before {
      content:'\f005';
      color: #FC0;
    }
    .estrelas13 input[type=radio]:checked ~ label i.fa:before {
      color: #CCC;
    }
</style>

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
          <form action="/pesquisa/cadastrar" method="post">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="box box-warning">
                <div class="box-header with-border">
                    <h1 class="box-title"><i class="fa fa-building-o"></i> Perguntas da pesquisa de proposta aprovada</h1>
                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                        </button>
                    </div>
                    <div class="box-body">
                      <div class="table-responsive-fluid">
                          <table class="table table-striped table-condensed">
                              <tr style="background-color: #333">
                                  <td class="pull-left" style="color: white;">Pergunta</td>
                                  <td class="text-center" style="color: white;">Avaliação (opcional)</td>
                              </tr>
                              <tr style="height: 45px;">
                                  <td><label>1 - Cortesia, agilidade e eficiência do atentimento às solicitações feitas presencialmente, por email ou telefone são satisfatórias? </label></td>
                                  <td class="text-center">
                                  <div class="estrelas1" style="font-size: 20px;">
                            		  <input type="radio" id="star1-empty" name="pergunta1" value="0" checked/>
                            		  <label for="star1-1"><i class="fa"></i></label>
                            		  <input type="radio" id="star1-1" name="pergunta1" value="1"/>
                            		  <label for="star1-2"><i class="fa"></i></label>
                            		  <input type="radio" id="star1-2" name="pergunta1" value="2"/>
                            		  <label for="star1-3"><i class="fa"></i></label>
                            		  <input type="radio" id="star1-3" name="pergunta1" value="3"/>
                            		  <label for="star1-4"><i class="fa"></i></label>
                            		  <input type="radio" id="star1-4" name="pergunta1" value="4"/>
                            		  <label for="star1-5"><i class="fa"></i></label>
                            		  <input type="radio" id="star1-5" name="pergunta1" value="5"/>
                            		</div>
                                  </td>
                              </tr>
                              <tr style="height: 45px;">
                                  <td><label>2 - Os canais de atendimento e comunicação da empresa atingiram as suas expectativas na área?</label></td>
                                  <td class="text-center">
                                    <div class="estrelas2" style="font-size: 20px;">
                            		  <input type="radio" id="star2-empty" name="pergunta2" value="0" checked/>
                            		  <label for="star2-1"><i class="fa"></i></label>
                            		  <input type="radio" id="star2-1" name="pergunta2" value="1"/>
                            		  <label for="star2-2"><i class="fa"></i></label>
                            		  <input type="radio" id="star2-2" name="pergunta2" value="2"/>
                            		  <label for="star2-3"><i class="fa"></i></label>
                            		  <input type="radio" id="star2-3" name="pergunta2" value="3"/>
                            		  <label for="star2-4"><i class="fa"></i></label>
                            		  <input type="radio" id="star2-4" name="pergunta2" value="4"/>
                            		  <label for="star2-5"><i class="fa"></i></label>
                            		  <input type="radio" id="star2-5" name="pergunta2" value="5"/>
                            		</div>
                                  </td>
                              </tr>
                              <tr style="height: 45px;">
                                  <td><label>3 - Os profissionais da empresa demostraram conhecimento e experiência na área?</label></td>
                                  <td class="text-center">
                                    <div class="estrelas3" style="font-size: 20px;">
                                     <input type="radio" id="star3-empty" name="pergunta3" value="0" checked/>
                                     <label for="star3-1"><i class="fa"></i></label>
                                     <input type="radio" id="star3-1" name="pergunta3" value="1"/>
                                     <label for="star3-2"><i class="fa"></i></label>
                                     <input type="radio" id="star3-2" name="pergunta3" value="2"/>
                                     <label for="star3-3"><i class="fa"></i></label>
                                     <input type="radio" id="star3-3" name="pergunta3" value="3"/>
                                     <label for="star3-4"><i class="fa"></i></label>
                                     <input type="radio" id="star3-4" name="pergunta3" value="4"/>
                                     <label for="star3-5"><i class="fa"></i></label>
                                     <input type="radio" id="star3-5" name="pergunta3" value="5"/>
                                   </div>
                                  </td>
                              </tr>
                              <tr style="height: 45px;">
                                  <td><label>4 - Os profissionais da empresa buscam prever possíveis problemas e antecipar-se a eles para minimizar riscos?</label></td>
                                  <td class="text-center">
                                    <div class="estrelas4" style="font-size: 20px;">
                                     <input type="radio" id="star4-empty" name="pergunta4" value="0" checked/>
                                     <label for="star4-1"><i class="fa"></i></label>
                                     <input type="radio" id="star4-1" name="pergunta4" value="1"/>
                                     <label for="star4-2"><i class="fa"></i></label>
                                     <input type="radio" id="star4-2" name="pergunta4" value="2"/>
                                     <label for="star4-3"><i class="fa"></i></label>
                                     <input type="radio" id="star4-3" name="pergunta4" value="3"/>
                                     <label for="star4-4"><i class="fa"></i></label>
                                     <input type="radio" id="star4-4" name="pergunta4" value="4"/>
                                     <label for="star4-5"><i class="fa"></i></label>
                                     <input type="radio" id="star4-5" name="pergunta4" value="5"/>
                                   </div>
                                  </td>
                              </tr>
                              <tr style="height: 45px;">
                                  <td><label>5 - A DG5 busca identificar novas necessidades da empresa cliente durante o processo de atendimento?</label></td>
                                  <td class="text-center">
                                    <div class="estrelas5" style="font-size: 20px;">
                                     <input type="radio" id="star5-empty" name="pergunta5" value="0" checked/>
                                     <label for="star5-1"><i class="fa"></i></label>
                                     <input type="radio" id="star5-1" name="pergunta5" value="1"/>
                                     <label for="star5-2"><i class="fa"></i></label>
                                     <input type="radio" id="star5-2" name="pergunta5" value="2"/>
                                     <label for="star5-3"><i class="fa"></i></label>
                                     <input type="radio" id="star5-3" name="pergunta5" value="3"/>
                                     <label for="star5-4"><i class="fa"></i></label>
                                     <input type="radio" id="star5-4" name="pergunta5" value="4"/>
                                     <label for="star5-5"><i class="fa"></i></label>
                                     <input type="radio" id="star5-5" name="pergunta5" value="5"/>
                                   </div>
                                  </td>
                              </tr>
                              <tr style="height: 45px;">
                                  <td><label>6 - O benefício oferecido pela empresa está compatível os praticados no mercado?</label></td>
                                  <td class="text-center">
                                    <div class="estrelas6" style="font-size: 20px;">
                                     <input type="radio" id="star6-empty" name="pergunta6" value="0" checked/>
                                     <label for="star6-1"><i class="fa"></i></label>
                                     <input type="radio" id="star6-1" name="pergunta6" value="1"/>
                                     <label for="star6-2"><i class="fa"></i></label>
                                     <input type="radio" id="star6-2" name="pergunta6" value="2"/>
                                     <label for="star6-3"><i class="fa"></i></label>
                                     <input type="radio" id="star6-3" name="pergunta6" value="3"/>
                                     <label for="star6-4"><i class="fa"></i></label>
                                     <input type="radio" id="star6-4" name="pergunta6" value="4"/>
                                     <label for="star6-5"><i class="fa"></i></label>
                                     <input type="radio" id="star6-5" name="pergunta6" value="5"/>
                                   </div>
                                  </td>
                              </tr>
                              <tr style="height: 45px;">
                                  <td><label>7 - A metodologia aplicada no desenvolvimento da demanda foi a mais adequada?</label></td>
                                  <td class="text-center">
                                    <div class="estrelas7" style="font-size: 20px;">
                                     <input type="radio" id="star7-empty" name="pergunta7" value="0" checked/>
                                     <label for="star7-1"><i class="fa"></i></label>
                                     <input type="radio" id="star7-1" name="pergunta7" value="1"/>
                                     <label for="star7-2"><i class="fa"></i></label>
                                     <input type="radio" id="star7-2" name="pergunta7" value="2"/>
                                     <label for="star7-3"><i class="fa"></i></label>
                                     <input type="radio" id="star7-3" name="pergunta7" value="3"/>
                                     <label for="star7-4"><i class="fa"></i></label>
                                     <input type="radio" id="star7-4" name="pergunta7" value="4"/>
                                     <label for="star7-5"><i class="fa"></i></label>
                                     <input type="radio" id="star7-5" name="pergunta7" value="5"/>
                                   </div>
                                  </td>
                              </tr>
                              <tr style="height: 45px;">
                                  <td><label>8 - As sugestões e propostas realizadas pela empresa estavam de acordo com as necessidades e objetivos da minha empresa?</label></td>
                                  <td class="text-center">
                                    <div class="estrelas8" style="font-size: 20px;">
                                     <input type="radio" id="star8-empty" name="pergunta8" value="0" checked/>
                                     <label for="star8-1"><i class="fa"></i></label>
                                     <input type="radio" id="star8-1" name="pergunta8" value="1"/>
                                     <label for="star8-2"><i class="fa"></i></label>
                                     <input type="radio" id="star8-2" name="pergunta8" value="2"/>
                                     <label for="star8-3"><i class="fa"></i></label>
                                     <input type="radio" id="star8-3" name="pergunta8" value="3"/>
                                     <label for="star8-4"><i class="fa"></i></label>
                                     <input type="radio" id="star8-4" name="pergunta8" value="4"/>
                                     <label for="star8-5"><i class="fa"></i></label>
                                     <input type="radio" id="star8-5" name="pergunta8" value="5"/>
                                   </div>
                                  </td>
                              </tr>
                              <tr style="height: 45px;">
                                  <td><label>9 - Os serviços realizados pela DG5 deram resultados positivos para minha empresa (visibilidade, faturamento, posicionamento)?</label></td>
                                  <td class="text-center">
                                    <div class="estrelas9" style="font-size: 20px;">
                                     <input type="radio" id="star9-empty" name="pergunta9" value="0" checked/>
                                     <label for="star9-1"><i class="fa"></i></label>
                                     <input type="radio" id="star9-1" name="pergunta9" value="1"/>
                                     <label for="star9-2"><i class="fa"></i></label>
                                     <input type="radio" id="star9-2" name="pergunta9" value="2"/>
                                     <label for="star9-3"><i class="fa"></i></label>
                                     <input type="radio" id="star9-3" name="pergunta9" value="3"/>
                                     <label for="star9-4"><i class="fa"></i></label>
                                     <input type="radio" id="star9-4" name="pergunta9" value="4"/>
                                     <label for="star9-5"><i class="fa"></i></label>
                                     <input type="radio" id="star9-5" name="pergunta9" value="5"/>
                                   </div>
                                  </td>
                              </tr>
                              <tr style="height: 45px;">
                                  <td><label>10 - A DG5 sanou as necessidades esperadas da minha empresa?</label></td>
                                  <td class="text-center">
                                    <div class="estrelas10" style="font-size: 20px;">
                                     <input type="radio" id="star10-empty" name="pergunta10" value="0" checked/>
                                     <label for="star10-1"><i class="fa"></i></label>
                                     <input type="radio" id="star10-1" name="pergunta10" value="1"/>
                                     <label for="star10-2"><i class="fa"></i></label>
                                     <input type="radio" id="star10-2" name="pergunta10" value="2"/>
                                     <label for="star10-3"><i class="fa"></i></label>
                                     <input type="radio" id="star10-3" name="pergunta10" value="3"/>
                                     <label for="star10-4"><i class="fa"></i></label>
                                     <input type="radio" id="star10-4" name="pergunta10" value="4"/>
                                     <label for="star10-5"><i class="fa"></i></label>
                                     <input type="radio" id="star10-5" name="pergunta10" value="5"/>
                                   </div>
                                  </td>
                              </tr>
                              <tr style="height: 45px;">
                                  <td><label>11 - Faria outros serviços e indicaria para outras empresas?</label></td>
                                  <td class="text-center">
                                    <div class="estrelas11" style="font-size: 20px;">
                                     <input type="radio" id="star11-empty" name="pergunta11" value="0" checked/>
                                     <label for="star11-1"><i class="fa"></i></label>
                                     <input type="radio" id="star11-1" name="pergunta11" value="1"/>
                                     <label for="star11-2"><i class="fa"></i></label>
                                     <input type="radio" id="star11-2" name="pergunta11" value="2"/>
                                     <label for="star11-3"><i class="fa"></i></label>
                                     <input type="radio" id="star11-3" name="pergunta11" value="3"/>
                                     <label for="star11-4"><i class="fa"></i></label>
                                     <input type="radio" id="star11-4" name="pergunta11" value="4"/>
                                     <label for="star11-5"><i class="fa"></i></label>
                                     <input type="radio" id="star11-5" name="pergunta11" value="5"/>
                                   </div>
                                  </td>
                              </tr>
                              <tr style="height: 45px;">
                                  <td><label>12 - Estou satisfeito com a qualidade dos trabalhos realizados para minha empresa?</label></td>
                                  <td class="text-center">
                                    <div class="estrelas12" style="font-size: 20px;">
                                     <input type="radio" id="star12-empty" name="pergunta12" value="0" checked/>
                                     <label for="star12-1"><i class="fa"></i></label>
                                     <input type="radio" id="star12-1" name="pergunta12" value="1"/>
                                     <label for="star12-2"><i class="fa"></i></label>
                                     <input type="radio" id="star12-2" name="pergunta12" value="2"/>
                                     <label for="star12-3"><i class="fa"></i></label>
                                     <input type="radio" id="star12-3" name="pergunta12" value="3"/>
                                     <label for="star12-4"><i class="fa"></i></label>
                                     <input type="radio" id="star12-4" name="pergunta12" value="4"/>
                                     <label for="star12-5"><i class="fa"></i></label>
                                     <input type="radio" id="star12-5" name="pergunta12" value="5"/>
                                   </div>
                                  </td>
                              </tr>
                              <tr style="height: 45px;">
                                  <td><label>13 - Satisfação geral com a DG5</label></td>
                                  <td class="text-center">
                                    <div class="estrelas13" style="font-size: 20px;">
                                     <input type="radio" id="star13-empty" name="pergunta13" value="0" checked/>
                                     <label for="star13-1"><i class="fa"></i></label>
                                     <input type="radio" id="star13-1" name="pergunta13" value="1"/>
                                     <label for="star13-2"><i class="fa"></i></label>
                                     <input type="radio" id="star13-2" name="pergunta13" value="2"/>
                                     <label for="star13-3"><i class="fa"></i></label>
                                     <input type="radio" id="star13-3" name="pergunta13" value="3"/>
                                     <label for="star13-4"><i class="fa"></i></label>
                                     <input type="radio" id="star13-4" name="pergunta13" value="4"/>
                                     <label for="star13-5"><i class="fa"></i></label>
                                     <input type="radio" id="star13-5" name="pergunta13" value="5"/>
                                   </div>
                                  </td>
                              </tr>
                              <tr style="height: 45px;">
                                  <td><label>14 - Motivo pelo qual escolheu trabalhar com a DG5?</label></td>
                                  <td class="text-center">
                                      <select class="form-control" name="pergunta14">
                                        <option value="null">Selecione motivo</option>
                                        @foreach($motivo as $m)
                                        <option value="{{ $m->motivo_id }}">{{ $m->descricao }}</option>
                                        @endforeach
                                      </select>
                                  </td>
                              </tr>
                        </table>
                        <br/>
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
