@extends('template_principal')

@section('conteudo')

 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>Pesquisa
        <small>pesquisas cadastradas</small>
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="box box-warning">
                    <div class="box-header with-border">
                        <h1 class="box-title"><i class="fa fa-info-circle"></i> Categorias <small>gráfico de percentual das categorias avaliadas</small></h1>
                        <div class="box-body">
                          <br>
                          <div class="row">
                              <div class="col-md-12">
                                <div id="bar-chart" style="height: 170px; padding: 0px; position: relative; font-size: 17px; font-weight: bold;">
                                  <canvas class="flot-base" width="788" height="300" style="direction: ltr; position: absolute; left: 0px; top: 0px; width: 788px; height: 300px;">
                                  </canvas>
                                  <canvas class="flot-overlay" width="788" height="300" style="direction: ltr; position: absolute; left: 0px; top: 0px; width: 788px; height: 300px; font-size: 18px;">
                                  </canvas>
                                </div>
                              </div>
                          </div>
                      </div>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <div class="row">
          <div class="col-md-4">
            <div class="box box-warning">
                <div class="box-header with-border">
                    <h1 class="box-title"><i class="fa fa-info-circle"></i> Motivos <small>gráfico da escolha pela DG5 </small></h1>
                    <div class="box-body">
                      <div class="box-body chart-responsive">
                          <div class="chart" id="sales-chart" style="height: 300px; position: relative;">
                          </div>
                      </div>
                   </div>
                 </div>
            </div>
          </div>
          <div class="col-md-8">
            <div class="box box-warning">
                <div class="box-header with-border">
                    <h1 class="box-title"><i class="fa fa-info-circle"></i> Sugestões <small>opinião dos clientes </small></h1>
                    <div class="box-body">
                      <br>
                        <div class="container-fluid" style="overflow: scroll; height: 300px;">
                          @if(isset($pesquisas))
                            @foreach($pesquisas as $p)
                            <div class="row">
                              <div class="col-md-3">
                                <font style="font-size: 12px;"><b>{{ date('d/m/Y', strtotime($p->data)) }} </b></font>
                              </div>
                              <div class="col-md-9">
                               {{ $p->comentarios_sugestoes }}
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
        </div>
        <input type="hidden" id="mediaAtendimento" name="mediaAtendimento" value="{{ $mediaAtendimento }}"/>
        <input type="hidden" id="mediaProfissionais" name="mediaProfissionais" value="{{ $mediaProfissionais }}"/>
        <input type="hidden" id="mediaServicos" name="mediaServicos" value="{{ $mediaServicos }}"/>
        <input type="hidden" id="mediaMetodologia" name="mediaMetodologia" value="{{ $mediaMetodologia}}"/>
        <input type="hidden" id="mediaResultados" name="mediaResultados" value="{{ $mediaResultados }}"/>
        <input type="hidden" id="mediaSatisfacao" name="mediaSatisfacao" value="{{ $mediaSatisfacao }}"/>

        <input type="hidden" id="avgP14_1" name="avgP14_1" value="{{ $avgP14_1 }}" />
        <input type="hidden" id="avgP14_2" name="avgP14_2" value="{{ $avgP14_2 }}" />
        <input type="hidden" id="avgP14_3" name="avgP14_3" value="{{ $avgP14_3 }}" />
        <input type="hidden" id="avgP14_4" name="avgP14_4" value="{{ $avgP14_4 }}" />
        <input type="hidden" id="avgP14_5" name="avgP14_5" value="{{ $avgP14_5 }}" />
        <input type="hidden" id="avgP14_6" name="avgP14_6" value="{{ $avgP14_6 }}" />

     </div>
   </section>
  </div>

<script>
$(document).ready(function() {

var mediaAtendimento = document.getElementById('mediaAtendimento').value;
var mediaProfissionais = document.getElementById('mediaProfissionais').value;
var mediaServicos = document.getElementById('mediaServicos').value;
var mediaMetodologia = document.getElementById('mediaMetodologia').value;
var mediaResultados = document.getElementById('mediaResultados').value;
var mediaSatisfacao = document.getElementById('mediaSatisfacao').value;

function arred(d,casas) {
   var aux = Math.pow(10,casas)
   return Math.floor(d * aux)/aux
}

mediaAtendimento = arred(mediaAtendimento, 1);
mediaProfissionais= arred(mediaProfissionais, 1);
mediaServicos = arred(mediaServicos, 1);
mediaMetodologia = arred(mediaMetodologia, 1);
mediaResultados = arred(mediaResultados, 1);
mediaSatisfacao = arred(mediaSatisfacao, 1);

  $(function () {

    var bar_data = {
      data: [["Atendimento (" + mediaAtendimento + "%) ", mediaAtendimento],
       ["Profissionais (" + mediaProfissionais + "%) ", mediaProfissionais],
       ["Serviços (" + mediaServicos + "%) ", mediaServicos],
       ["Metodologia (" + mediaMetodologia + "%) ", mediaMetodologia],
       ["Resultados (" + mediaResultados + "%) ", mediaResultados],
       ["Satisfação (" + mediaSatisfacao + "%) ", mediaSatisfacao]],
      color: "#f39c12"
    };
    $.plot("#bar-chart", [bar_data], {
      grid: {
        borderWidth: 3,
        borderColor: "#f3f3f3",
        tickColor: "#f3f3f3"
      },
      series: {
        bars: {
          show: true,
          barWidth: 0.5,
          align: "center"
        }
      },
      xaxis: {
        mode: "categories",
        tickLength: 3
      }
    });
  });
});
</script>
<script>
$(document).ready(function() {

  var avgP14_1 = document.getElementById('avgP14_1').value;
  var avgP14_2 = document.getElementById('avgP14_2').value;
  var avgP14_3 = document.getElementById('avgP14_3').value;
  var avgP14_4 = document.getElementById('avgP14_4').value;
  var avgP14_5 = document.getElementById('avgP14_5').value;
  var avgP14_6 = document.getElementById('avgP14_6').value;

  function arred(d,casas) {
     var aux = Math.pow(10,casas)
     return Math.floor(d * aux)/aux
  }

  avgP14_1 = arred(avgP14_1, 1);
  avgP14_2 = arred(avgP14_2, 1);
  avgP14_3 = arred(avgP14_3, 1);
  avgP14_4 = arred(avgP14_4, 1);
  avgP14_5 = arred(avgP14_5, 1);
  avgP14_6 = arred(avgP14_6, 1);

  $(function () {

    //DONUT CHART
    var donut = new Morris.Donut({
      element: 'sales-chart',
      resize: true,
      colors: ["#FF7256", "#2F4F4F", "#A52A2A", "#6A5ACD", "#2E8B57", "#9932CC"],
      data: [
        {label: "Atendimento (%)", value: avgP14_1},
        {label: "Prazo de entrega (%)", value: avgP14_2},
        {label: "Valores (%)", value: avgP14_3},
        {label: "Custo x Benefício (%)", value: avgP14_4},
        {label: "Serviços ofertados (%)", value: avgP14_5},
        {label: "Condição pagamento (%)", value: avgP14_6}
      ],
      hideHover: 'auto'
    });

  });
});
</script>
@stop
