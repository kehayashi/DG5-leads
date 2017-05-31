@extends('template_principal')

@section('conteudo')


 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>Propostas
        <small>Propostas cadastrados</small>
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-6">
            <div class="box box-warning">
                <div class="box-header with-border">
                    <h1 class="box-title"><i class="fa fa-edit"></i> Percentual de propostas aprovadas <small>informações</small></h1>
                    <div class="box-body">
                        <div class="col-md-12">
                            <div id="bar-chart" style="height: 293px; padding: 0px; position: relative; font-size: 17px; font-weight: bold;">
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
         <div class="col-lg-6">
             <div class="box box-warning">
                 <div class="box-header with-border">
                     <h1 class="box-title"><i class="fa fa-edit"></i> Percentual de propostas reprovadas <small>informações</small></h1>
                     <div class="box-body">
                         <div class="col-md-12">
                             <div class="box-header with-border">
                                 <div class="box-body">
                                     <div class="col-md-12">
                                         <div class="box-body chart-responsive">
                                             <div class="chart" id="sales-chart" style="height: 232px; position: relative;">
                                             </div>
                                             <input type="hidden" id="aprovadas" value="{{ $aprovadas }}"/>
                                             <input type="hidden" id="reprovadas" value="{{ $reprovadas }}"/>
                                         </div>
                                     </div>
                                </div>
                              </div>
                           </div>
                       </div>
                    </div>
                </div>
           </div>
     </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="box box-warning">
                    <div class="box-header with-border">
                        <h1 class="box-title"><i class="fa fa-users"></i> Propostas enviadas<small> informações</small></h1>
                        <div class="box-body">
                          <div class="row">
                            <div class="col-sm-12">
                              <table id="example2" class="table table-striped table-condensed table-hover dataTable" role="grid" aria-describedby="example2_info">
                                <thead>
                                  <tr role="row" style="color: white; background-color: #333;">
                                    <th class="sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Rendering engine: activate to sort column descending" aria-sort="ascending">Cliente
                                    </th>
                                    <th class="sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Rendering engine: activate to sort column descending" aria-sort="ascending">Título
                                    </th>
                                    <th class="sorting_asc text-center" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Data de emissão
                                    </th>
                                    <th class="sorting_asc text-center" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">Situação
                                    </th>
                                    <th class="sorting_asc text-center" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">Valor aprovado
                                    </th>
                                    <th class="sorting_asc text-center" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">Valor total
                                    </th>
                                    <th class="sorting_asc text-center" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">Download
                                    </th>
                                    <th class="sorting_asc text-center" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">Ver
                                    </th>
                                  </tr>
                                </thead>
                                <tbody>
                                  @foreach($propostas as $p)
                                    <tr role="row" class="odd">
                                      <td class="sorting_1">{{ $p->nome_empresa }}
                                      </td>
                                      <td class="sorting_1">{{ $p->titulo }}
                                      </td>
                                      <td class="text-center">{{ date('d/m/Y', strtotime($p->data_emissao)) }}
                                      </td>
                                      <td class="sorting_1 text-center">
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
                                      <td class="sorting_1 text-center">R$ {{ $p->valor_total_aprovado }}</td>
                                      <td class="sorting_1 text-center">R$ {{ $p->valor_total }}</td>
                                      <td class="text-center">
                                          <a href="/proposta/download_pdf/{{ $p->proposta_id }}"><i class="fa fa-download" style="font-size: 18px;"></i></a>
                                      </td>
                                      <td class="text-center">
                                        <a href="/proposta/stream_pdf/{{ $p->proposta_id }}" target="_blank">
                                          <i class="fa fa-eye" style="font-size: 19px;">
                                          </i>
                                        </a>
                                      </td>
                                    </tr>
                                  @endforeach
                                </tbody>
                              </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="box box-warning">
         <div class="box-header with-border">
             <h1 class="box-title"><i class="fa fa-info-circle"></i> Sugestões <small>opinião dos clientes </small></h1>
             <div class="box-body">
               <br>
                 <div class="container-fluid" style="overflow: scroll; height: 200px;">
                     @if(isset($comentarios))
                         @foreach($comentarios as $c)
                         <div class="row">
                           <div class="col-md-3">
                             <font style="font-size: 12px;"><b>{{ date('d/m/Y', strtotime($c->data)) }}</b></font>
                           </div>
                           <div class="col-md-9">
                           {{ $c->comentarios_sugestoes }}
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
    </section>
  </div>

  <script>
  $(function () {
        $('#example2').DataTable({
          "paging": true,
          "lengthChange": false,
          "searching": true,
          "ordering": true,
          "info": true,
          "autoWidth": false,
          "language": {
		    	    "sEmptyTable": "Nenhum registro encontrado",
		    	    "sInfo": "Mostrando de _START_ até _END_ de _TOTAL_ registros",
		    	    "sInfoEmpty": "Mostrando 0 até 0 de 0 registros",
		    	    "sInfoFiltered": "(Filtrados de _MAX_ registros)",
		    	    "sInfoPostFix": "",
		    	    "sInfoThousands": ".",
		    	    "sLengthMenu": "_MENU_ resultados por página",
		    	    "sLoadingRecords": "Carregando...",
		    	    "sProcessing": "Processando...",
		    	    "sZeroRecords": "Nenhum registro encontrado",
		    	    "sSearch": "Pesquisar",
		    	    "oPaginate": {
		    	        "sNext": "Próximo",
		    	        "sPrevious": "Anterior",
		    	        "sFirst": "Primeiro",
		    	        "sLast": "Último"
		    	    },
		    	    "oAria": {
		    	        "sSortAscending": ": Ordenar colunas de forma ascendente",
		    	        "sSortDescending": ": Ordenar colunas de forma descendente"
		    	    }
		    	}
        });
  });
</script>

<script>
$(document).ready(function() {

    var aprovadas = document.getElementById('aprovadas').value;
    var reprovadas = document.getElementById('reprovadas').value;

  $(function () {
    var bar_data = {
      data: [["Aprovadas (" + aprovadas + "%)", aprovadas],
       ["Reprovadas (" + reprovadas + "%)", reprovadas]],
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

  $(function () {
    //DONUT CHART
    var donut = new Morris.Donut({
      element: 'sales-chart',
      resize: true,
      colors: ["#FF7256", "#2F4F4F", "#A52A2A", "#6A5ACD", "#2E8B57", "#9932CC"],
      data: [
        {label: "Atendimento (%)", value: 10},
        {label: "Prazo de entrega (%)", value: 20},
        {label: "Valores (%)", value: 20},
        {label: "Custo x Benefício (%)", value: 40},
        {label: "Serviços ofertados (%)", value: 50},
        {label: "Condição pagamento (%)", value: 60}
      ],
      hideHover: 'auto'
    });

  });
});
</script>



@stop
