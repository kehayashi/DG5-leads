@extends('template_principal')

@section('conteudo')

 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>Equipe
        <small>Membros equipe</small>
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                @if((old('nome')) && (count($errors) <= 0))
                <div class="alert alert-success">
                    <i class="fa fa-check"></i> <b>{{ old('nome') }}</b> foi cadastrado com sucesso!
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                </div>
                @endif

                @if(isset($deletado))
                <div class="alert alert-success">
                    <i class="fa fa-check"></i> Membro da equipe foi excluído com sucesso!
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                </div>
                @endif

                @if(isset($atualizado))
                    <div class="alert alert-success">
                        <i class="fa fa-check"></i> Membro da equipe foi atualizado com sucesso!
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    </div>
                @endif

                <div class="box box-warning">
                    <div class="box-header with-border">
                        <h1 class="box-title"><i class="fa fa-users"></i> Membros <small>da equipe</small></h1>
                        <div class="box-body">
                             <form action="/equipe/crud" method="post">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <div class="table-responsive-fluid">
                                    <table class="table table-striped table-condensed">
                                        <tr style="background-color: #333">
                                            <td style="color: white;">Nome</td>
                                            <td style="color: white;">Cargo</td>
                                            <td style="color: white;">Telefone</td>
                                            <td class="text-center" style="color: white;">Editar</td>
                                            <td class="text-center" style="color: white;">Excluir</td>
                                        </tr>
                                        @if(isset($equipe))
                                            @foreach($equipe as $e)
                                        <tr>
                                            <td>{{ $e->nome }}</td>
                                            <td>{{ $e->cargo}}</td>
                                            <td>{{ $e->telefone}}</td>
                                            <td class="text-center">
                                                <a href="/equipe/crud/update/{{ $e->equipe_id}}"><i class="fa fa-pencil" style="color: #708090;"></i></a>
                                            </td>
                                            <td class="text-center">
                                                <a href="/equipe/crud/delete/{{ $e->equipe_id}}"><i class="fa fa-close" style="color: red;"></i></a>
                                            </td>
                                        </tr>
                                            @endforeach 
                                        @endif             
                                    </table>
                                </div>
                                <button type="submit" class="btn btn-success pull-right">
                                    <a href="#"></a><i class="fa fa-plus"></i> Novo pré-vendedor
                                </button>
                             </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </section>
  </div>
@stop
