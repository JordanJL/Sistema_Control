<footer class="main-footer">

</footer>
<!-- jQuery -->
<script src="../public/js/jquery-3.1.1.min.js"></script> -->
<script src="../public/js/jquery.min.js"></script>
<!--<script src="../plugins/jquery/jquery.min.js"></script>-->
<!-- Bootstrap 3.3.5 -->
<script src="../public/js/bootstrap.min.js"></script>
<!-- AdminLTE App -->
<script src="../public/js/app.min.js"></script>
<!-- AdminLTE App -->
<script src="../plugins/dist/js/adminlte.min.js"></script>
<!-- fullCalendar 2.2.5 -->
<script src="../plugins/moment/moment.min.js"></script>
<script src="../plugins/fullcalendar/main.js"></script>
<!-- Page specific script -->
<!-- date-range-picker -->
<script src="../plugins/datetime/bootstrap-datetimepicker.js"></script>
<script type="text/javascript" src="../plugins/datetime/bootstrap-datetimepicker.es.js" charset="UTF-8"></script>
<!-- jQuery UI -->
<script src="../plugins/jquery-ui/jquery-ui.min.js"></script>
<style>
td {
    border: 1px solid white;
    border-color: #1b12120f;
}
</style>

<script>
$('.form_datetimedesde').datetimepicker({
    language: 'es',
    weekStart: 1,
    todayBtn: 1,
    autoclose: 1,
    todayHighlight: 1,
    startView: 2,
    forceParse: 0,
    showMeridian: 1,
    format: 'yyyy/mm/dd hh:ii',
    startDate: '-1d'
});
$('.form_datetimehasta').datetimepicker({
    language: 'es',
    weekStart: 1,
    todayBtn: 1,
    autoclose: 1,
    todayHighlight: 1,
    startView: 2,
    forceParse: 0,
    showMeridian: 1,
    format: 'yyyy/mm/dd hh:ii',
    startDate: '-1d'
});
</script>

<script>
$(function() {

    /* initialize the external events
     -----------------------------------------------------------------*/
    function ini_events(ele) {
        
        ele.each(function() {

            // create an Event Object (https://fullcalendar.io/docs/event-object)
            // it doesn't need to have a start or end
            var eventObject = {
                title: $.trim($(this).text()) // use the element's text as the event title
            }

            // store the Event Object in the DOM element so we can get to it later
            $(this).data('eventObject', eventObject)

            // make the event draggable using jQuery UI
            /*$(this).draggable({
                zIndex: 1070,
                revert: true, // will cause the event to go back to its
                revertDuration: 0 //  original position after the drag
            })*/

        })
    }

    ini_events($('#external-events div.external-event'))

    /* initialize the calendar
     -----------------------------------------------------------------*/
    //Date for the calendar events (dummy data)
    var date = new Date();
    var d = date.getDate(),
        m = date.getMonth(),
        y = date.getFullYear();

    var Calendar = FullCalendar.Calendar;
    var Draggable = FullCalendar.Draggable;

    var containerEl = document.getElementById('external-events');
    var checkbox = document.getElementById('drop-remove');
    var calendarEl = document.getElementById('calendar');

    // initialize the external events
    // -----------------------------------------------------------------


    var calendar = new Calendar(calendarEl, {
        headerToolbar: {
            left: 'prev,next today',
            center: 'title',
            right: 'dayGridMonth,timeGridWeek,timeGridDay'
        },
        themeSystem: 'bootstrap',
        //Random default events
        events: [
            <?php
            require_once "../modelos/AgendarCita.php";
            cargarAgenda(); 
            function cargarAgenda() { 
                $agendarCita = new AgendarCita();
                $idusuario = $_SESSION["idusuario"];
                $rspta = $agendarCita -> mostrar($idusuario);
                $data = Array();
                while ($reg = $rspta -> fetch_object()) {
                    $linea = "{".
                    "id:'".$reg->id."',".
                    "title: '".$reg->descripcion."',".
                    "start: '".$reg->fechadesde."',".
                    "end: '".$reg->fechahasta."',".
                    "backgroundColor: '#".$reg->Color."',".
                    "borderColor: '#".$reg->Color."',".
                    "},";
                   echo $linea;
                }
            }
            ?>
        ],
        editable: true,
        eventClick: function(info) {
            traerDetalle(info.event.id);
        }
    });

    
    calendar.setOption('locale', 'es');
    calendar.render();
    // $('#calendar').fullCalendar()
    
    /* ADDING EVENTS */
    var currColor = '#61c396' //Red by default
    // Color chooser button
    $('#color-chooser > li > a').click(function(e) {
        e.preventDefault()
        // Save color
        currColor = $(this).css('color')
        // Add color effect to button
        $('#add-new-event').css({
            'background-color': currColor,
            'border-color': currColor
        })
    })
    $('#add-new-event').click(function(e) {
        e.preventDefault()
        // Get value and make sure it is not null
        var val = $('#new-event').val()
        if (val.length == 0) {
            return
        }

        // Create events
        var event = $('<div />')
        event.css({
            'background-color': currColor,
            'border-color': currColor,
            'color': '#fff'
        }).addClass('external-event')
        event.text(val)
        $('#external-events').prepend(event)

        // Add draggable funtionality
        ini_events(event)

        // Remove event from text input
        $('#new-event').val('')
    })
})

function traerDetalle(id){
    $.ajax({
      type: 'POST',
      url: '../ajax/agendarcita.php',
      data: { 
        key: 'VerDetalle',
        id: id
      }
      
    }).done(function( datos ) {
        var mydata = JSON.parse(datos);
        document.getElementById("Modaldescripcion").value = mydata.descripcion;
        document.getElementById("Modalfechahasta").value = mydata.fechahasta;
        document.getElementById("Modalfechadesde").value = mydata.fechadesde;
        document.getElementById("ModalAsistente").value = mydata.Asistente;  
        document.getElementById("ModalHoras").value = mydata.Horas;
        document.getElementById("CitaID").value = mydata.id;
        $('#modal-verdetalle').modal('show');
    }).fail(function (jqXHR, textStatus, errorThrow){
      alert("Error al ingresar");
    }); 

    
  }


</script>