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

<script>
    $('.form_datetimedesde').datetimepicker({
        language:  'es',
        weekStart: 1,
        todayBtn:  1,
		autoclose: 1,
		todayHighlight: 1,
		startView: 2,
		forceParse: 0,
        showMeridian: 1,
        format: 'yyyy/mm/dd hh:mm'
    });
    $('.form_datetimehasta').datetimepicker({
        language:  'es',
        weekStart: 1,
        todayBtn:  1,
		autoclose: 1,
		todayHighlight: 1,
		startView: 2,
		forceParse: 0,
        showMeridian: 1,
        format: 'yyyy/mm/dd hh:mm'
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
        })
    }

    /* initialize the calendar
     -----------------------------------------------------------------*/
    //Date for the calendar events (dummy data)
    var date = new Date()
    var d = date.getDate(),
        m = date.getMonth(),
        y = date.getFullYear()

    var Calendar = FullCalendar.Calendar;

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
        events: [{
                title: 'All Day Event',
                start: new Date(y, m, 1),
                backgroundColor: '#f56954', //red
                borderColor: '#f56954', //red
                allDay: true
            },
            {
                title: 'Long Event',
                start: new Date(y, m, d - 5),
                end: new Date(y, m, d - 2),
                backgroundColor: '#f39c12', //yellow
                borderColor: '#f39c12' //yellow
            },
            {
                title: 'Meeting',
                start: new Date(y, m, d, 10, 30),
                allDay: false,
                backgroundColor: '#0073b7', //Blue
                borderColor: '#0073b7' //Blue
            },
            {
                title: 'Lunch',
                start: new Date(y, m, d, 12, 0),
                end: new Date(y, m, d, 14, 0),
                allDay: false,
                backgroundColor: '#00c0ef', //Info (aqua)
                borderColor: '#00c0ef' //Info (aqua)
            },
            {
                title: 'Birthday Party',
                start: new Date(y, m, d + 1, 19, 0),
                end: new Date(y, m, d + 1, 22, 30),
                allDay: false,
                backgroundColor: '#00a65a', //Success (green)
                borderColor: '#00a65a' //Success (green)
            },
            {
                title: 'PRUEBA',
                start: '2021-07-19 20:00',
                end: '2021-07-19 22:00',
                url: '#',
                backgroundColor: '#3c8dbc', //Primary (light-blue)
                borderColor: '#3c8dbc' //Primary (light-blue)
            }
        ],
        editable: false,
        droppable: false,
        dateClick: function(info) {
            $('#modal-default').modal('show');
        },
        eventClick:  function(event, jsEvent, view) {
            alert(event.title);
            $('#modalBody').html(event.description);
            $('#eventUrl').attr('href',event.url);
            $('#calendarModal').modal();
        }
        
    });

    calendar.render();
    // $('#calendar').fullCalendar()
    calendar.setOption('locale', 'es');
    /* ADDING EVENTS */
    var currColor = '#3c8dbc' //Red by default
    // Color chooser button

});
</script>
