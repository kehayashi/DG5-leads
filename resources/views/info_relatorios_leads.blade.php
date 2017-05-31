@extends('template_principal')

@section('conteudo')


 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>Leads
        <small>Leads cadastrados</small>
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="box box-warning">
                    <div class="box-header with-border">
                        <h1 class="box-title"><i class="fa fa-users"></i> Leads <small> informações</small></h1>
                        <div class="box-body">
                          <div class="row">
                            <div class="col-sm-12">
                              <table id="example2" class="table table-striped table-condensed table-hover dataTable" role="grid" aria-describedby="example2_info">
                                <thead>
                                  <tr role="row" style="color: white; background-color: #333;">
                                    <th class="sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Rendering engine: activate to sort column descending" aria-sort="ascending">Nome da empresa
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Data de entrada
                                    </th>
                                    <th class="sorting text-center" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">Ver
                                    </th>
                                  </tr>
                                </thead>
                                <tbody>
                                  @foreach($lead as $l)
                                    <tr role="row" class="odd">
                                      <td class="sorting_1">{{ $l->nome_empresa }}</td>
                                      <td>{{ date('d/m/Y', strtotime($l->data_entrada)) }}</td>
                                      <td class="text-center">
                                        <a href="/lead/info/{{ $l->lead_id }}">
                                          <i class="fa fa-exclamation-circle btn btn-info" style="font-size: 13px;">
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
@stop
