@extends('template_principal')

@section('conteudo')

 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>Agenda
        <small>Compromissos equipe</small>
      </h1>
    </section>

    <br>

    <!-- Main content -->
    <section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
              <div class="row">
                <div class="col-md-12">
                  @if((old('titulo')) && (count($errors) <= 0))
                     <div class="alert alert-success">
                         <i class="fa fa-check"></i> <b>Evento {{ old('titulo') }}</b> foi cadastrado com sucesso!
                         <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                     </div>
                 @endif
                </div>
              </div>

              @if(isset($deletado))
              <div class="alert alert-success">
                  <i class="fa fa-check"></i> Evento foi excluído com sucesso!
                  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
              </div>
              @endif

              @if(isset($alterado))
              <div class="alert alert-success">
                  <i class="fa fa-check"></i> Evento foi excluído com sucesso!
                  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
              </div>
              @endif

              <div class="box box-warning">
                  <div class="box-header with-border">
                      <div class="box-body">
                        <div class="row">
                          <div class="col-md-12">
                            <div class="row">
                              <button type="button" class="btn btn-info form-control" data-toggle="modal" data-target="#myModal1" id="idModal">Criar evento</button>
                            </div>
                            <div class="row">
                              <div id="calendar"></div>
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

  <div class="modal fade" id="myModal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="myModalLabel"><i class="fa fa-calendar"></i> Cadastro de novo evento</h4>
        </div>
      <form action="/agenda/cadastrar" method="post">
          <input type="hidden" name="_token" value="{{ csrf_token() }}">
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
                  <h1 class="box-title">Evento <small>informações</small></h1>
                      <div class="box-body">
                          <div class="form-group-row">
                            <div class="row">
                              <div class="col-md-3">
                                <label>Data inicio:</label>
                                <input type="text" class="form-control" name="data_inicio"/>
                              </div>
                              <div class="col-md-3">
                                <label>Data fim:</label>
                                <input type="text" class="form-control" name="data_fim"/>
                              </div>
                              <!-- END COL -->
                              <div class="col-md-3">
                                <label>Hora inicio:</label>
                                <select class="form-control" name="hora_inicio">
                                  <option value="null">Selecione</option>
                                  <option value="07:00">07:00</option>
                                  <option value="07:30">07:30</option>
                                  <option value="08:00">08:00</option>
                                  <option value="08:30">08:30</option>
                                  <option value="09:00">09:00</option>
                                  <option value="09:30">09:30</option>
                                  <option value="10:00">10:00</option>
                                  <option value="10:30">10:30</option>
                                  <option value="11:00">11:00</option>
                                  <option value="11:30">11:30</option>
                                  <option value="12:00">12:00</option>
                                  <option value="12:30">12:30</option>
                                  <option value="13:00">13:00</option>
                                  <option value="13:30">13:30</option>
                                  <option value="14:00">14:00</option>
                                  <option value="14:30">14:30</option>
                                  <option value="15:00">15:00</option>
                                  <option value="15:30">15:30</option>
                                  <option value="16:00">16:00</option>
                                  <option value="16:30">16:30</option>
                                  <option value="17:00">17:00</option>
                                  <option value="17:30">17:30</option>
                                  <option value="18:00">18:00</option>
                                  <option value="18:30">18:30</option>
                                  <option value="19:00">19:00</option>
                                  <option value="19:30">19:30</option>
                                  <option value="20:00">20:00</option>
                                  <option value="20:30">20:30</option>
                                  <option value="20:30">21:00</option>
                                  <option value="20:30">21:30</option>
                                  <option value="20:30">22:00</option>
                                  <option value="20:30">22:30</option>
                                </select>
                              </div>
                              <!-- END COL -->
                              <div class="col-md-3">
                                <label>Hora fim:</label>
                                <select class="form-control" name="hora_fim">
                                  <option value="null">Selecione</option>
                                  <option value="07:00">07:00</option>
                                  <option value="07:30">07:30</option>
                                  <option value="08:00">08:00</option>
                                  <option value="08:30">08:30</option>
                                  <option value="09:00">09:00</option>
                                  <option value="09:30">09:30</option>
                                  <option value="10:00">10:00</option>
                                  <option value="10:30">10:30</option>
                                  <option value="11:00">11:00</option>
                                  <option value="11:30">11:30</option>
                                  <option value="12:00">12:00</option>
                                  <option value="12:30">12:30</option>
                                  <option value="13:00">13:00</option>
                                  <option value="13:30">13:30</option>
                                  <option value="14:00">14:00</option>
                                  <option value="14:30">14:30</option>
                                  <option value="15:00">15:00</option>
                                  <option value="15:30">15:30</option>
                                  <option value="16:00">16:00</option>
                                  <option value="16:30">16:30</option>
                                  <option value="17:00">17:00</option>
                                  <option value="17:30">17:30</option>
                                  <option value="18:00">18:00</option>
                                  <option value="18:30">18:30</option>
                                  <option value="19:00">19:00</option>
                                  <option value="19:30">19:30</option>
                                  <option value="20:00">20:00</option>
                                  <option value="20:30">20:30</option>
                                  <option value="20:30">21:00</option>
                                  <option value="20:30">21:30</option>
                                  <option value="20:30">22:00</option>
                                  <option value="20:30">22:30</option>
                                </select>
                              </div>
                              <!-- END COL -->
                            </div>
                            <!-- END ROW -->

                            <br />
                            <div class="row">
                              <div class="col-md-12">
                                <label>Titulo:</label>
                                <input type="text" class="form-control" name="titulo"/>
                              </div>
                              <!-- END COL -->
                            </div>
                            <!-- END ROW -->

                            <br />
                            <div class="row">
                              <div class="col-md-12">
                                <label>Lead:</label>
                                <select class="form-control" name="lead_id">
                                  <option value="null">Selecione</option>
                                  @foreach($leads as $l)
                                    <<option value="{{ $l->lead_id }}">{{ $l->nome_empresa }}</option>
                                  @endforeach
                                </select>
                              </div>
                              <!-- END COL -->
                            </div>
                            <!-- END ROW -->

                            <br />
                            <div class="row">
                              <div class="col-md-12">
                                <label>Descrição:</label>
                                <textarea class="form-control" rows="4" cols="1000" name="descricao"></textarea>
                              </div>
                              <!-- END COL -->
                            </div>
                            <!-- END ROW -->

                            <br />
                            <div class="row">
                              <div class="col-md-12">
                                <label>Tipo (plataforma):</label>
                                  <select class="form-control" name="tipo_plataforma">
                                    <option value="null">Selecione</option>
                                    <option value="Presencial">Presencial</option>
                                    <option value="Telefone">Telefone</option>
                                    <option value="Skype">Skype</option>
                                  </select>
                              </div>
                              <!-- END COL -->
                            </div>
                            <!-- END ROW -->
                          </div>
                          <!-- END FORM GROUP -->
                      </div>
                      <!-- END box body -->
                  </div>
                  <!-- end box-header -->
              </div>
              <!-- end box-warning-->
          </div>
          <!-- end modal body -->
          <div class="modal-footer">
              <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
              <button type="submit" class="btn btn-success">Cadastrar</button>
          </div>
      </form>
      </div>
    </div>
  </div>



<div class="modal fade" id="calendarModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
  <form action="#" method="post" id="form_alterar">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h4>
          <i class="fa fa-calendar"></i>
          <span class="modal-title" id="title"></span>
        </h4>
      </div>
        <div class="modal-body" id="modalBody">
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
                <h1 class="box-title">Evento <small>informações</small></h1>
                    <div class="box-body">
                        <div class="form-group-row">
                          <div class="row">
                            <div class="col-md-3">
                              <label>Data inicio:</label>
                              <input type="text" class="form-control" name="data_inicio2" id="data_inicio2"/>
                            </div>
                            <div class="col-md-3">
                              <label>Data fim:</label>
                              <input type="text" class="form-control" name="data_fim2" id="data_fim2" />
                            </div>
                            <!-- END COL -->
                            <div class="col-md-3">
                              <label>Hora inicio:</label>
                              <select class="form-control" name="hora_inicio2" id="hora_inicio2">
                                <option value="null">Selecione</option>
                                <option value="07:00">07:00</option>
                                <option value="07:30">07:30</option>
                                <option value="08:00">08:00</option>
                                <option value="08:30">08:30</option>
                                <option value="09:00">09:00</option>
                                <option value="09:30">09:30</option>
                                <option value="10:00">10:00</option>
                                <option value="10:30">10:30</option>
                                <option value="11:00">11:00</option>
                                <option value="11:30">11:30</option>
                                <option value="12:00">12:00</option>
                                <option value="12:30">12:30</option>
                                <option value="13:00">13:00</option>
                                <option value="13:30">13:30</option>
                                <option value="14:00">14:00</option>
                                <option value="14:30">14:30</option>
                                <option value="15:00">15:00</option>
                                <option value="15:30">15:30</option>
                                <option value="16:00">16:00</option>
                                <option value="16:30">16:30</option>
                                <option value="17:00">17:00</option>
                                <option value="17:30">17:30</option>
                                <option value="18:00">18:00</option>
                                <option value="18:30">18:30</option>
                                <option value="19:00">19:00</option>
                                <option value="19:30">19:30</option>
                                <option value="20:00">20:00</option>
                                <option value="20:30">20:30</option>
                                <option value="20:30">21:00</option>
                                <option value="20:30">21:30</option>
                                <option value="20:30">22:00</option>
                                <option value="20:30">22:30</option>
                              </select>
                            </div>
                            <!-- END COL -->
                            <div class="col-md-3">
                              <label>Hora fim:</label>
                              <select class="form-control" name="hora_fim2" id="hora_fim2">
                                <option value="null">Selecione</option>
                                <option value="07:00">07:00</option>
                                <option value="07:30">07:30</option>
                                <option value="08:00">08:00</option>
                                <option value="08:30">08:30</option>
                                <option value="09:00">09:00</option>
                                <option value="09:30">09:30</option>
                                <option value="10:00">10:00</option>
                                <option value="10:30">10:30</option>
                                <option value="11:00">11:00</option>
                                <option value="11:30">11:30</option>
                                <option value="12:00">12:00</option>
                                <option value="12:30">12:30</option>
                                <option value="13:00">13:00</option>
                                <option value="13:30">13:30</option>
                                <option value="14:00">14:00</option>
                                <option value="14:30">14:30</option>
                                <option value="15:00">15:00</option>
                                <option value="15:30">15:30</option>
                                <option value="16:00">16:00</option>
                                <option value="16:30">16:30</option>
                                <option value="17:00">17:00</option>
                                <option value="17:30">17:30</option>
                                <option value="18:00">18:00</option>
                                <option value="18:30">18:30</option>
                                <option value="19:00">19:00</option>
                                <option value="19:30">19:30</option>
                                <option value="20:00">20:00</option>
                                <option value="20:30">20:30</option>
                                <option value="20:30">21:00</option>
                                <option value="20:30">21:30</option>
                                <option value="20:30">22:00</option>
                                <option value="20:30">22:30</option>
                              </select>
                            </div>
                            <!-- END COL -->
                          </div>
                          <!-- END ROW -->

                          <br/>
                          <div class="row">
                            <div class="col-md-12">
                              <label>Titulo:</label>
                              <input type="text" class="form-control" name="titulo2" id="titulo2"/>
                            </div>
                            <!-- END COL -->
                          </div>
                          <!-- END ROW -->

                          <br />
                          <div class="row">
                            <div class="col-md-12">
                              <label>Lead:</label>
                              <select class="form-control" name="lead_id2" id="lead_id2">
                                <option value="null">Selecione</option>
                                @foreach($leads as $l)
                                  <<option value="{{ $l->lead_id }}">{{ $l->nome_empresa }}</option>
                                @endforeach
                              </select>
                            </div>
                            <!-- END COL -->
                          </div>
                          <!-- END ROW -->

                          <br/>
                          <div class="row">
                            <div class="col-md-12">
                              <label>Descrição:</label>
                              <textarea class="form-control" rows="4" cols="1000" name="descricao2" id="descricao2"></textarea>
                            </div>
                            <!-- END COL -->
                          </div>
                          <!-- END ROW -->

                          <br/>
                          <div class="row">
                            <div class="col-md-12">
                              <label>Tipo (plataforma):</label>
                                <select class="form-control" name="tipo_plataforma2" id="tipo_plataforma2">
                                  <option value="null">Selecione</option>
                                  <option value="Presencial">Presencial</option>
                                  <option value="Telefone">Telefone</option>
                                  <option value="Skype">Skype</option>
                                </select>
                            </div>
                            <!-- END COL -->
                          </div>
                          <!-- END ROW -->
                        </div>
                        <!-- END FORM GROUP -->
                    </div>
                    <!-- END box body -->
                </div>
                <!-- end box-header -->
            </div>
            <!-- end box-warning-->
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-info" data-dismiss="modal">Cancelar</button>
            <a href="#" id="excluir"><button type="button" class="btn btn-danger">Excluir</button></a>
            <button type="submit" class="btn btn-success">Atualizar</button>
        </div>
    </div>
  </form>
  </div>
</div>

<script src="{{ asset("bower_components/adminLTE/plugins/fullcalendar/gcal.js") }}"></script>

  <script type="text/javascript">
      $('input[name="data_inicio"]').daterangepicker({
          locale: {
            format: 'YYYY/MM/DD'
          },
          singleDatePicker: true,
          showDropdowns: true,
          format: 'YYYY/MM/DD'
      });
  </script>

  <script type="text/javascript">
      $('input[name="data_fim"]').daterangepicker({
          locale: {
            format: 'YYYY/MM/DD'
          },
          singleDatePicker: true,
          showDropdowns: true,
          format: 'YYYY/MM/DD'
      });
  </script>

  <script type="text/javascript">
      $('input[name="data_inicio2"]').daterangepicker({
          locale: {
            format: 'YYYY/MM/DD'
          },
          singleDatePicker: true,
          showDropdowns: true,
          format: 'YYYY/MM/DD'
      });
  </script>

  <script type="text/javascript">
      $('input[name="data_fim2"]').daterangepicker({
          locale: {
            format: 'YYYY/MM/DD'
          },
          singleDatePicker: true,
          showDropdowns: true,
          format: 'YYYY/MM/DD'
      });
  </script>

  <script>
  $(function () {

    /* initialize the external events
     -----------------------------------------------------------------*/
    function ini_events(ele) {
      ele.each(function () {

        // create an Event Object (http://arshaw.com/fullcalendar/docs/event_data/Event_Object/)
        // it doesn't need to have a start or end
        var eventObject = {
          title: $.trim($(this).text()) // use the element's text as the event title
        };

        // store the Event Object in the DOM element so we can get to it later
        $(this).data('eventObject', eventObject);

        // make the event draggable using jQuery UI
        $(this).draggable({
          zIndex: 1070,
          revert: true, // will cause the event to go back to its
          revertDuration: 0  //  original position after the drag
        });

      });
    }

    ini_events($('#external-events div.external-event'));

    /* initialize the calendar
     -----------------------------------------------------------------*/
    //Date for the calendar events (dummy data)
    var date = new Date();
    var d = date.getDate(),
        m = date.getMonth(),
        y = date.getFullYear();
    $('#calendar').fullCalendar({
      googleCalendarApiKey: 'AIzaSyDBQRJZbdWX9py5xVgzCzKaEW12CjSFxuU',

      monthNames: ['Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho', 'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro'],
              monthNamesShort: ['Jan', 'Fev', 'Mar', 'Abr', 'Mai', 'Jun', 'Jul', 'Ago', 'Set', 'Out', 'Nov', 'Dez'],
              dayNames: ['Domingo', 'Segunda', 'Terça', 'Quarta', 'Quinta', 'Sexta', 'Sabado'],
              dayNamesShort: ['Dom', 'Seg', 'Ter', 'Qua', 'Qui', 'Sex', 'Sab'],

      header: {
        left: 'prev,next today',
        center: 'title',
        right: 'month,agendaWeek,agendaDay'
      },
      buttonText: {
        today: 'Hoje',
        month: 'mês',
        week: 'semana',
        day: 'dia'
      },
      //Random default events

      events: '/agenda/lista', function(event, jsEvent, view){
      },

      eventRender: function(event, element) {
        var moment1 = moment(event.start).format('HH:mm');
        var moment2 = moment(event.end).format('HH:mm');
        $(element).tooltip({
          title: 'Título: ' + event.title + ', Descrição: ' + event.description + ', Horario: ' + moment1 +
          ', Plataforma: ' + event.type
        });
      },

      eventClick: function(event, jsEvent, view) {
        var  moment1 = moment(event.start).format('HH:mm');
        var  moment2 = moment(event.start).format('YYYY-MM-DD');
        var  moment3 = moment(event.end).format('HH:mm');
        var  moment4 = moment(event.end).format('YYYY-MM-DD');

           $('#title').html(event.title);
           $('#data_inicio2').val(moment2);
           $('#data_fim2').val(moment4);
           $('#hora_inicio2').val(moment1);
           $('#hora_fim2').val(moment3);
           $('#titulo2').val(event.title);
           $('#lead_id2').val(event.lead_id);
           $('#descricao2').val(event.description);
           $('#tipo_plataforma2').val(event.type);
           $('#excluir').attr("href", "/agenda/excluir/"+event.id);
           $('#form_alterar').attr("action", "/agenda/alterar/"+event.id);
           $('#calendarModal').modal('show');

       },

      editable: false,
      droppable: false, // this allows things to be dropped onto the calendar !!!
      drop: function (date, allDay) { // this function is called when something is dropped

        // retrieve the dropped element's stored Event Object
        var originalEventObject = $(this).data('eventObject');

        // we need to copy it, so that multiple events don't have a reference to the same object
        var copiedEventObject = $.extend({}, originalEventObject);

        // assign it the date that was reported
        copiedEventObject.start = date;
        copiedEventObject.allDay = allDay;
        copiedEventObject.backgroundColor = $(this).css("background-color");
        copiedEventObject.borderColor = $(this).css("border-color");

        // render the event on the calendar
        // the last `true` argument determines if the event "sticks" (http://arshaw.com/fullcalendar/docs/event_rendering/renderEvent/)
        $('#calendar').fullCalendar('renderEvent', copiedEventObject, true);

        // is the "remove after drop" checkbox checked?
        if ($('#drop-remove').is(':checked')) {
          // if so, remove the element from the "Draggable Events" list
          $(this).remove();
        }

      }
    });

    /* ADDING EVENTS */
    var currColor = "#3c8dbc"; //Red by default
    //Color chooser button
    var colorChooser = $("#color-chooser-btn");
    $("#color-chooser > li > a").click(function (e) {
      e.preventDefault();
      //Save color
      currColor = $(this).css("color");
      //Add color effect to button
      $('#add-new-event').css({"background-color": currColor, "border-color": currColor});
    });
    $("#add-new-event").click(function (e) {
      e.preventDefault();
      //Get value and make sure it is not null
      var val = $("#new-event").val();
      if (val.length == 0) {
        return;
      }

      //Create events
      var event = $("<div />");
      event.css({"background-color": currColor, "border-color": currColor, "color": "#fff"}).addClass("external-event");
      event.html(val);
      $('#external-events').prepend(event);

      //Add draggable funtionality
      ini_events(event);

      //Remove event from text input
      $("#new-event").val("");
    });
  });
</script>

@stop
