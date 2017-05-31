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
    <!-- Main content -->
    <section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
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
          <h4 class="modal-title" id="myModalLabel"><i class="fa fa-edit"></i> Cadastro de novo evento</h4>
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
                            <div class="row">
                              <div class="col-md-12">
                                <label>Titulo:</label>
                                <input type="text" class="form-control" name="titulo"/>
                              </div>
                              <!-- END COL -->
                            </div>
                            <!-- END ROW -->
                            <div class="row">
                              <div class="col-md-12">
                                <label>Descrição:</label>
                                <textarea class="form-control" rows="4" cols="1000" name="descricao"></textarea>
                              </div>
                              <!-- END COL -->
                            </div>
                            <!-- END ROW -->

                            <div class="row">
                              <div class="col-md-12">
                                <label>Cor do evento:</label>
                              </div>
                            </div>
                            <!-- END ROW -->

                            <div class="row">
                              <div class="col-md-2">
                                <div class="input-group">
                                  <span class="input-group-addon">
                                    <input type="radio" name="checkcor" value="1">
                                  </span>
                                  <input type="text" class="form-control input-sm" name="cor1" style="background-color: #f56954; color: #f56954;" value="#f56954">
                                </div>
                              </div>
                              <div class="col-md-2">
                                <div class="input-group">
                                  <span class="input-group-addon">
                                    <input type="radio" name="checkcor" value="2">
                                  </span>
                                  <input type="text" class="form-control input-sm" name="cor2" style="background-color: #f39c12; color: #f39c12" value="#f39c12">
                                </div>
                              </div>
                              <div class="col-md-2">
                                <div class="input-group">
                                  <span class="input-group-addon">
                                    <input type="radio" name="checkcor" value="3">
                                  </span>
                                  <input type="text" class="form-control input-sm" name="cor3" style="background-color: #0073b7; color: #0073b7" value="#0073b7">
                                </div>
                              </div>
                              <div class="col-md-2">
                                <div class="input-group">
                                  <span class="input-group-addon">
                                    <input type="radio" name="checkcor" value="4">
                                  </span>
                                  <input type="text" class="form-control input-sm" name="cor4" style="background-color: #00c0ef; color: #00c0ef" value="#0073b7">
                                </div>
                              </div>
                              <div class="col-md-2">
                                <div class="input-group">
                                  <span class="input-group-addon">
                                    <input type="radio" name="checkcor" value="5">
                                  </span>
                                  <input type="text" class="form-control input-sm" name="cor5" style="background-color: #00a65a; color:#00a65a" value="#00a65a">
                                </div>
                              </div>
                              <div class="col-md-2">
                                <div class="input-group">
                                  <span class="input-group-addon">
                                    <input type="radio" name="checkcor" value="6">
                                  </span>
                                  <input type="text" class="form-control input-sm" name="cor6" style="background-color: #8B658B; color:#8B658B;" value="#8B658B">
                                </div>
                              </div>
                              <!-- END COL -->
                            </div>
                          </div>
                          <!-- END FORM GROUP -->
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
      header: {
        left: 'prev,next today',
        center: 'title',
        right: 'month,agendaWeek,agendaDay'
      },
      buttonText: {
        today: 'today',
        month: 'month',
        week: 'week',
        day: 'day'
      },
      //Random default events
      events: [
        {
          title: 'All Day Event',
          start: new Date(y, m, 1),
          backgroundColor: "#f56954", //red
          borderColor: "#f56954" //red
        },
        {
          title: 'Long Event',
          start: new Date(y, m, d - 5),
          end: new Date(y, m, d - 2),
          backgroundColor: "#f39c12", //yellow
          borderColor: "#f39c12" //yellow
        },
        {
          title: 'Meeting',
          start: new Date(y, m, d, 10, 30),
          allDay: false,
          backgroundColor: "#0073b7", //Blue
          borderColor: "#0073b7" //Blue
        },
        {
          title: 'Lunch',
          start: new Date(y, m, d, 12, 0),
          end: new Date(y, m, d, 14, 0),
          allDay: false,
          backgroundColor: "#00c0ef", //Info (aqua)
          borderColor: "#00c0ef" //Info (aqua)
        },
        {
          title: 'Birthday Party',
          start: new Date(y, m, d + 1, 19, 0),
          end: new Date(y, m, d + 1, 22, 30),
          allDay: false,
          backgroundColor: "#00a65a", //Success (green)
          borderColor: "#00a65a" //Success (green)
        },
        {
          title: 'Click for Google',
          start: new Date(y, m, 28),
          end: new Date(y, m, 29),
          url: 'http://google.com/',
          backgroundColor: "#3c8dbc", //Primary (light-blue)
          borderColor: "#3c8dbc" //Primary (light-blue)
        }
      ],
      editable: true,
      droppable: true, // this allows things to be dropped onto the calendar !!!
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
