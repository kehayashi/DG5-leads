@extends('template_principal')

@section('conteudo')

 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>Proposta
        <small>Cadastro proposta</small>
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

             @if((old('nome_empresa')) && (count($errors) <= 0))
                <div class="alert alert-success">
                    <i class="fa fa-check"></i> <b>Lead da empresa {{ old('nome_empresa') }}</b> foi cadastrado com sucesso!
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                </div>
            @endif
          <form action="/proposta/cadastrar" method="post">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="box box-warning">
                <div class="box-header with-border">
                    <h1 class="box-title"><i class="fa fa-building-o"></i> Dados da proposta</h1>
                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                        </button>
                    </div>
                    <div class="box-body">
                        <div class="form-group-row">
                            <div class="col-lg-4">
                                <b>Lead:</b><br>
                                <select class="form-control" id="lead" name="lead_id">

                                </select>
                            </div>
                            <div class="col-lg-4">
                                <b>Emissao:</b><br>
                                <input type="text" class="form-control" name="data_emissao" value="">
                            </div>
                             <div class="col-lg-4">
                                <b>Validade (dias):</b><br>
                                <input type="number" class="form-control" name="validade" value="">
                            </div>
                        </div>
                        <div class="form-group-row">
                            <div class="col-lg-8">
                                <b>Titulo:</b><br>
                                <input type="text" class="form-control" name="titulo" value="">
                            </div>
                            <div class="col-lg-4">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-lg-12">
                                <b>Introdução:</b><br>
                                <input type="text-area" class="form-control" name="introducao" style="height: 100px;" value="">
                                <br>
                                <hr style="color: #f39c12; background-color: #f39c12;">
                            </div>
                        </div>
                        <div class="form-group-row">
                            <div class="col-lg-8">
                                <b>Item:</b><br>
                                <input type="text" class="form-control" name="item[]" value="">
                            </div>
                            <div class="col-lg-4">
                            </div>
                        </div>
                        <div class="form-group-row">
                            <div class="col-lg-6">
                                <b>Tipo:</b><br>
                                <div class="input-group">
                                  <select class="form-control" name="produto_lead_id[]" id="produto_lead_id">
                                    </select>
                                    <span class="input-group-addon" id="basic-addon2" style="background-color: #5cb85c; border-radius: 2px;"><a href="#" data-toggle="modal" data-target="#myModal1" id="idModal"><i class="fa fa-plus" style="color: white;"></i></a></span>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <b>Peça:</b><br>
                                <div class="input-group">
                                  <select class="form-control" name="peca_id[]" id="peca_id">
                                    </select>
                                    <span class="input-group-addon" id="basic-addon2" style="background-color: #5cb85c; border-radius: 2px;"><a href="#" data-toggle="modal" data-target="#myModal2" id="idModal"><i class="fa fa-plus" style="color: white;"></i></a></span>
                                </div>
                            </div>
                             <div class="col-lg-12">
                                <b>Descrição:</b><br>
                                <input type="text-area" class="form-control" id="descricao" name="descricao[]" style="height: 100px;">
                                <br>
                            </div>
                            <div class="form-group-row">
                                <div class="col-lg-3">
                                    <b>Valor:</b>
                                    <input type="text" class="form-control" id="valor" name="valor[]" value="">
                                </div>

                                 <div class="col-lg-3">
                                    <b>Situação do item:</b><br>
                                    <select class="form-control" name="situacao_item[]">
                                        <option value="null">Selecione situação</option>
                                        <option value="Em aberto">Em aberto</option>
                                        <option value="Aprovado">Aprovado</option>
                                        <option value="Reprovado">Reprovado</option>
                                    </select>
                                </div>
                                <div class="col-lg-3">
                                    <b>Prazo (dias):</b><br>
                                    <input type="number" class="form-control" id="teste" name="prazo[]" value="">
                                </div>
                            </div>
                            <div id="inputs_adicionais" style="border: none">
                        </div>
                    </div>
                </div>
                <div class="col-lg-12">
                    <br>
                    <hr style="color: #f39c12; background-color: #f39c12;">
                </div>
                <button type="button" class="btn btn-primary pull-right" name="add" value="Adicionar contato"><i class="fa fa-plus"></i> Item<br></button>
            </div>
          </div>
            <br>
            <div class="box box-warning">
                <div class="box-header with-border">
                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                        </button>
                    </div>
                    <div class="box-body">
                        <div class="form-group">
                            <div class="col-lg-12">
                                <b>Observações:</b><br>
                                <input type="text-area" class="form-control" name="observacoes" style="height: 100px;">
                                <br>
                            </div>
                        </div>
                        <div class="form-group-row">
                            <div class="col-lg-4">
                                <b>Situação da proposta:</b><br>
                                <select class="form-control" id="situacao" onchange="justifica()" name="situacao">
                                    <option value="null">Selecione situação</option>
                                    <option value="Em aberto">Em aberto</option>
                                    <option value="Aprovada">Aprovada</option>
                                    <option value="Aprovada parcialmente">Parcialmente aprovada</option>
                                    <option value="Reprovada">Reprovada</option>
                                </select>
                            </div>
                            <div class="col-lg-4">
                                <b>Contato:</b><br>
                                <select class="form-control" id="contatos" name="contato_id">
                                </select>
                            </div>
                             <div class="col-lg-4">
                                <b>Equipe:</b><br>
                                <select class="form-control" name="equipe_id">
                                    <option value="null">Selecione equipe</option>
                                    @foreach($equipe as $e)
                                    <option value="{{ $e->equipe_id }}">{{ $e->nome }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group-row">
                            <div class="col-lg-4">
                                <div id="motivo" style="display: none;">
                                    <b>Motivo:</b><br>
                                    <select class="form-control" id="select" name="motivo_id">
                                        <option value="0">Selecione motivo</option>
                                        @foreach($motivo as $m)
                                        <option value="{{ $m->motivo_id }}">{{ $m->descricao }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <button class="btn btn-success pull-right"><i class="fa fa-check"></i> Cadastrar</button>
        </form>
    </section>
  </div>
</div>

 <div class="modal fade" id="myModal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel"><i class="fa fa-edit"></i> Cadastro produto</h4>
          </div>
        <form action="/produto_lead/cadastrar/formProposta" method="post">
            <div class="modal-body">
            @if (count($errors) > 0)
               <div class="alert alert-danger">
                    <ul>
                    @foreach($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                    </ul>
                </div>
            @endif
            <div class="box box-warning">
                <div class="box-header with-border">
                    <h1 class="box-title">Produto <small>informações</small></h1>
                        <div class="box-body">
                            <div class="form-group-row">
                                <div class="col-lg-12">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <b>Descricao:</b><br>
                                    <input type="text" class="form-control" name="descricao">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-success">Cadastrar</button>
            </div>
        </form>
        </div>
      </div>
    </div>

     <div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel"><i class="fa fa-edit"></i> Cadastro peça</h4>
          </div>
          <form action="/peca/cadastrar/formProposta" method="post">
            <div class="modal-body">
            @if (count($errors) > 0)
               <div class="alert alert-danger">
                    <ul>
                    @foreach($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                    </ul>
                </div>
            @endif
            <div class="box box-warning">
                <div class="box-header with-border">
                    <h1 class="box-title">Peça <small>informações</small></h1>
                        <div class="box-body">
                            <div class="form-group-row">
                                <div class="col-lg-12">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <b>Descricao:</b><br>
                                    <input type="text" class="form-control" id="descricao" name="descricao">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-success">Cadastrar</button>
            </div>
          </form>
        </div>
      </div>
    </div>

    <script type="text/javascript">
    function justifica() {
        var situacao = document.getElementById('situacao').value;
        if(situacao == "Reprovada")
            document.getElementById('motivo').style.display = 'block';
        else
            document.getElementById('motivo').style.display = 'none';
    }
    </script>

    <script type="text/javascript">
        function campoTelefone(o,f){
            v_obj=o
            v_fun=f
            setTimeout("execmascara()",1)
        }
        function execmascara(){
            v_obj.value=v_fun(v_obj.value)
        }
        function numero(v){
            v=v.replace(/\D/g,"");             //Remove tudo o que não é dígito
            v=v.replace(/^(\d{2})(\d)/g,"($1) $2"); //Coloca parênteses em volta dos 3 primeiros dígitos
            //v=v.replace(/(\d)(\d{2})$/,"$1.$2");    //Coloca hífen entre o quarto e o quinto dígitos
            return v;
        }
    </script>

    <script type="text/javascript">
    $(document).ready(function(){
        var input = '<div class="form-group-row">' +
                                '<div class="col-lg-12">' +
                                    '<br>' +
                                    '<hr style="color: #f39c12; background-color: #f39c12;">' +
                                '</div>' +
                            '</div>' +
                        '<div class="form-group-row">' +
                            '<div class="col-lg-10">' +
                                '<b>Item:</b><br>' +
                                '<input type="text" class="form-control" name="item[]">'+
                            '</div>' +
                            '<div class="col-lg-2">' +
                                '<br>' +
                            '</div>' +
                        '</div>' +
                        '<div class="form-group-row">' +
                            '<div class="col-lg-6">' +
                                '<b>Tipo:</b><br>' +
                                '<div class="input-group">' +
                                  '<select class="form-control" name="produto_lead_id[]">' +
                                    '<option value="null">Selecione produto</option>' +
                                    '@foreach($produto_lead as $p)' +
                                    '<option value="{{ $p->produto_lead_id}}">{{ $p->descricao}}</option>' +
                                    '@endforeach' +
                                    '</select>' +
                                    '<span class="input-group-addon" id="basic-addon2" style="background-color: #5cb85c; border-radius: 2px;"><a href="#" data-toggle="modal" data-target="#myModal1" id="idModal"><i class="fa fa-plus" style="color: white;"></i></a></span>' +
                                '</div>' +
                            '</div>' +
                            '<div class="col-lg-6">' +
                                '<b>Peça:</b><br>' +
                                '<div class="input-group">' +
                                  '<select class="form-control" name="peca_id[]">' +
                                    '<option value="null">Selecione Peça</option>' +
                                    '@foreach($peca as $pe)'+
                                    '<option value="{{ $pe->peca_id }}">{{ $pe->descricao}}</option>' +
                                    '@endforeach' +
                                    '</select>' +
                                    '<span class="input-group-addon" id="basic-addon2" style="background-color: #5cb85c; border-radius: 2px;"><a href="#" data-toggle="modal" data-target="#myModal2" id="idModal"><i class="fa fa-plus" style="color: white;"></i></a></span>' +
                                '</div>' +
                            '</div>' +
                             '<div class="col-lg-12">' +
                                '<b>Descrição:</b><br>' +
                                '<input type="text-area" class="form-control" name="descricao[]" style="height: 100px;" value="">' +
                                '<br>' +
                            '</div>' +
                            '<div class="form-group-row">' +
                                '<div class="col-lg-3">' +
                                    '<b>Valor:</b>' +
                                   '<input type="text" class="form-control" name="valor[]" value="">' +
                                '</div>' +
                                 '<div class="col-lg-3">' +
                                    '<b>Situação do item:</b><br>' +
                                    '<select class="form-control" name="situacao_item[]">' +
                                        '<option value="null">Selecione situação</option>' +
                                        '<option value="Em aberto">Em aberto</option>' +
                                        '<option value="Aprovado">Aprovado</option>' +
                                        '<option value="Reprovado">Reprovado</option>' +
                                    '</select>' +
                                '</div>' +
                                '<div class="col-lg-3">' +
                                    '<b>Prazo (dias):</b><br>' +
                                    '<input type="number" class="form-control" id="teste" name="prazo[]" value="">' +
                                '</div>' +
                            '</div>';
        $("button[name='add']").click(function( e ){
            $('#inputs_adicionais').append( input );
        });

        $('#inputs_adicionais').delegate('a','click',function( e ){
            e.preventDefault();
            $(this).parent('.remove').remove();
        });

    });
    </script>

    <script type="text/javascript">
        $('input[name="data_emissao"]').daterangepicker({
            locale: {
              format: 'YYYY/MM/DD'
            },
            singleDatePicker: true,
            showDropdowns: true,
            format: 'YYYY/MM/DD'
            });
    </script>

    <script type="text/javascript">
        $(document).ready(function(){
          $.ajax({
              url: "/lead/lista",
              type: "GET",
              dataType: "json"
          }).done(function(resposta) {
                $("#contatos").empty();
                $("#contatos").append(new Option("Selecione contatos", "null"));
                $("#lead").append(new Option("Selecione lead", "null"));
                console.log(resposta);
                for(x=0; x<resposta.length; x++){
                    $("#lead").append(new Option(resposta[x].nome_empresa, resposta[x].lead_id));
                }
                $("#lead").on("change", function(){
                    $("#contatos").empty();
                    $("#contatos").append(new Option("Selecione contato", "null"));
                     $.getJSON("/lead/listaContatos", {lead_id:$("#lead option:selected").val()}, function(contatos){
                        for(x=0; x<contatos.length; x++){
                            console.log(resposta);
                            $("#contatos").append(new Option(contatos[x].nome, contatos[x].contato_id));
                        }
                    })
                })
          }).fail(function(jqXHR, textStatus ) {
              console.log("Request failed: " + textStatus);

          }).always(function() {

          });
        })
      </script>

      <script type="text/javascript">
          $(document).ready(function(){
            $.ajax({
                url: "/produto_lead/lista",
                type: "GET",
                dataType: "json"
            }).done(function(produtos) {
                  $("#produto_lead_id").empty();
                  $("#produto_lead_id").append(new Option("Selecione produto", "null"));
                  $("#peca_id").append(new Option("Selecione peça", "null"));
                  console.log(produtos);

                  for(x=0; x<produtos.length; x++){
                      $("#produto_lead_id").append(new Option(produtos[x].descricao, produtos[x].produto_lead_id));
                  }
                  //end for
                  $("#produto_lead_id").on("change", function(){
                      $("#peca_id").empty();
                      $("#peca_id").append(new Option("Selecione peça", "null"));
                      $.getJSON("/peca/lista", {produto_lead_id:$("#produto_lead_id option:selected").val()}, function(pecas){
                          for(i=0; i<pecas.length; i++){
                              //console.log(pecas);
                              $("#peca_id").append(new Option(pecas[i].nome, pecas[i].peca_id));
                          }
                          //end for

                          //end getJSON lista peca_id
                          $("#peca_id").on("change", function(event){
                             $.getJSON("/peca/getPecaAjax", {peca_id:$("#peca_id option:selected").val()}, function(result){
                                 document.getElementById('descricao').value = result.descricao;
                                 document.getElementById('valor').value = result.valor;
                             })
                             event.stopImmediatePropagation()
                          })
                      })
                      //end get JSON
                  });
                  //end produto_lead_id

            }).fail(function(jqXHR, textStatus ) {
                console.log("Request failed: " + textStatus);

            }).always(function() {

            });
          })
        </script>

@stop
