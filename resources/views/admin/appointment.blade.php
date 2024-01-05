<!DOCTYPE html>
<html>
<head>
    <title>Schedule</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.css" />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" />
     <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://fonts.googleapis.com/css2?family=Material+Icons"
  rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('/assets/css/style.css') }}">


    <style>

  .navbar{
    color:white;
   background: #e5b80b;
}

.navbar-nav li a {
    color: white;
    position: relative;
    display: block;
    padding: 10px 15px!important;
}

     .req-label{
      font-size: 15px;
     }

        .column2 {
            float: left;
            width: 20%;
        }

        /* Clear floats after the columns */
        .row:after {
            content: "";
            display: table;
            clear: both;
        }

        /* Style for dates with events */
        .fc-event-date {
            background-color: #e74a3b; /* You can adjust the background color */
            color: white; /* Text color for dates with events */
        }
              .legend {
            margin-top: 20px;
        }

        .legend h3 {
            margin-bottom: 10px;
        }

        .legend-item {
            display: flex;
            align-items: center;
            margin-bottom: 5px;
        }

        .legend-icon {
            width: 20px;
            height: 20px;
            margin-right: 10px;
        }

        .legend-icon.your-schedule {
            background-color: #e74e3a; /* Your Schedule Color */
        }

        .legend-icon.pdrrmo-schedule {
            background-color: #3e85ad; /* PDRRMO Schedule Color */
        }

        .legend-text {
            font-size: 16px;
        }
        #calendar{
          margin-left: 50px;
          width: 50%;
        }
    </style>
</head>
<body>
<div class="wrapper">
    @include('/admin/nav')
    <div class="content">
@include('/admin/header')
    <div class="cont">

                    <div class="column1">
                      <center> <div id='calendar'></div></center>
                       
                    </div>
         
 
     
    </div>
    </div>
</div>
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script> -->
    <script>
        $(document).ready(function () {

            var SITEURL = "{{ url('/') }}";
            var selectedStartDate, selectedEndDate;

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
  
            var calendar = $('#calendar').fullCalendar({
                editable: true,
                events: SITEURL + "/admin/fullclender",
                displayEventTime: true,
                eventRender: function (event, element, view) {
             var appointmentDate = moment(event.appointment_datetime).format('YYYY-MM-DD');

        // You can customize how the event is displayed, e.g., by adding a title or other properties
        element.find('.fc-title').html(event.title); // Set event title

        // Check if the appointment date matches today's date
        var today = moment().format('YYYY-MM-DD');
        if (appointmentDate === today) {
            element.css('background-color', 'red'); // Change background color for today's appointments
        } 
                },
                selectable: true,
                selectHelper: true,
                select: function (start, end, allDay) {
                    selectedStartDate = start;
                    selectedEndDate = end;
                    $('#exampleModal').modal('show');
                },
                 eventDrop: function (event, delta) {
                    var start = event.start.format("Y-MM-DD");
                    var end = event.end.format("Y-MM-DD");
                    var currentUserId = {{ $currentUserId }};
                    var eventsData = @json($events);

                    for (var i = 0; i < eventsData.length; i++) {
                        if (eventsData[i].id === event.id) {
                            if (eventsData[i].userid === currentUserId) {
                                $.ajax({
                                    url: SITEURL + '/pdrrmo/fullcalenderAjax',
                                    data: {
                                        title: event.title,
                                        start: start,
                                        end: end,
                                        id: event.id,
                                        type: 'update'
                                    },
                                    type: "get",
                                    success: function (response) {
                                        displayMessage("Event Updated Successfully");
                                    }
                                });
                            } else {
                                displayMessage("You are not authorized to update this event.");
                                location.reload();
                                return;
                            }
                            break;
                        }
                    }
                },
                eventClick: function (event) {
                    var eventId = event.id;
                    $.ajax({
                        url: SITEURL + '/pdrrmo/details/' + eventId,
                        type: 'GET',
                        success: function (response) {
                            $('#deleteEvent').data('eventId', response.event.id);
                            $('#eventId').val(response.event.id);
                            $('#userId').val(response.event.userId);
                            
                            $('#event-title').val(response.event.title);
                            $('#event-Description').val(response.event.description);
                            $('#involveds').val(response.event.involved);
                            $('#event-Start').val(response.event.start_time);
                            $('#event-End').val(response.event.end_time);
                            $('#locations').val(response.event.location);
                            $('#municipality-name').text(response.event.municipality_name);

                            if (response.currentUserId === response.event.userid) {
                                $('#updateEvent').show();
                                $('#cancelButton').show();
                                $('#deleteEvent').show();
                                $('#updateLabel').show();
                                $('#viewLabel').hide();
                            } else {
                                $('#updateEvent').hide();
                                $('#cancelButton').hide();
                                $('#updateLabel').hide();
                                $('#viewLabel').show();
                                $('#deleteEvent').hide();
                            }

                            $('#updateModal').modal('show');
                        }
                    });
                }
            });

            $('#deleteEvent').on('click', function () {
                var eventId = $(this).data('eventId');
                var deleteMsg = confirm("Do you really want to delete?");
                if (deleteMsg) {
                    $.ajax({
                        type: "get",
                        url: SITEURL + '/pdrrmo/fullcalenderAjax',
                        data: {
                            id: eventId,
                            type: 'delete'
                        },
                        success: function (response) {
                            var calendar = $('#calendar').fullCalendar('getCalendar');
                            calendar.fullCalendar('removeEvents', event.id);
                            calendar.fullCalendar('refetchEvents');
                            $('#updateModal').modal('hide');
                            displayMessage("Event Deleted Successfully");
                        }
                    });
                }
            });

            $('#saveEvent').on('click', function () {
                var service = $('#service').val();
                var description = $('#description').val();
                var user = $('#user').val();
                var timeStart = $('#start-time').val();
                var date = $('#appointment-date').val();
               
                if (title && selectedStartDate && selectedEndDate) {
                    var start = selectedStartDate.format("YYYY-MM-DD");
        

                    $.ajax({
                        url: SITEURL + "/admin/fullcalenderAjax",
                        data: {
                            service: service,
                            user: user,
                            description: description,
                            timeStart: timeStart,
                            start: start,
                            type: 'add'
                        },
                        type: "GET",
                        success: function (data) {
                            displayMessage("Event Created Successfully");
                            var calendar = $('#calendar').fullCalendar('getCalendar');
                            calendar.fullCalendar('refetchEvents');
                            calendar.fullCalendar('renderEvent', {
                                title: title,
                                start: start,
                                description: description,
                                involved: involved,
                                timeStart: timeStart,
                                timeEnd: timeEnd,
                                location: location,
                                end: end,
                                allDay: allDay
                            }, true);

                            calendar.fullCalendar('unselect');
                        }
                    });
                    $('#eventTitle').val('');
                    $('#eventDescription').val('');
                    $('#exampleModal').modal('hide');
                }
            });
              $('#eventSearch').on('input', function () {
                var searchQuery = $(this).val().trim();

                if (searchQuery === '') {
                  calendar.fullCalendar('refetchEvents');
                } else {
                  calendar.fullCalendar('removeEvents', function (event) {
                    return event.title.toLowerCase().indexOf(searchQuery.toLowerCase()) === -1;
                  });
                }
              });


            function displayMessage(message) {
                toastr.success(message, 'Event');
            }
        });
    </script>

</body>
</html>




<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">New message</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
         <form id="eventForm">
                        <div class="form-group">
                            <label for="eventTitle">Service:</label>
                            <select class="form-control"  id="service" name="service"> 
                             <?php foreach ($services as $service): ?>
                                  <option value="<?= $service['id'] ?>"><?= $service['name'] ?></option>
                              <?php endforeach; ?>
                            </select>
                        </div>
                          <div class="form-group">
                            <label for="eventTitle">Client:</label>
                              <select class="form-control"  id="user" name="user"> 
                             <?php foreach ($users as $user): ?>
                                  <option value="<?= $user['id'] ?>"><?= $user['name'] ?></option>
                              <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="eventDescription">Schedule Description:</label>
                            <textarea class="form-control" id="description" name="description" required></textarea>
                        </div>
                          <div class="form-group">
                            <label for="eventTitle">Appointment Date:</label>
                           <input type="date" class="form-control" id="appointment-date" name="appointment-date" required>
                        </div>
                          <div class="form-group">
                            <label for="eventDescription">Start Time:</label>
                           <input type="time" class="form-control" id="start-time" name="start-time" required>
                        </div>
                        <div class="modal-footer d-flex justify-content-end">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary" id="saveEvent">Save</button>
                        </div>
                    </form>
      </div>
    
    </div>
  </div>
</div>

<!-- Hidden Modal for Event Input -->
<div class="modal fade" id="eventModal" tabindex="-1" role="dialog" aria-labelledby="eventModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #2C3B41; color: white;">
                <h5 class="modal-title" id="eventModalLabel">Add Event</h5>
            </div>
                <div class="modal-body" style="margin-left: 60px;width: 100%">
                    <form id="eventForm">
                        <div class="form-group">
                            <label for="eventTitle">Event Title:</label>
                            <input type="text" class="form-control" id="eventTitle" name="eventTitle" required>
                        </div>
                     <!--  -->
             
                        <div class="form-group">
                            <label for="eventDescription">Event Description:</label>
                            <textarea class="form-control" id="eventDescription" name="eventDescription" required></textarea>
                        </div>
                          <div class="form-group">
                            <label for="eventDescription">Start Time:</label>
                           <input type="time" class="form-control" id="eventStart" name="eventStart" required>
                        </div>
                          <div class="form-group">
                            <label for="eventDescription">End Time:</label>
                           <input type="time" class="form-control" id="eventEnd" name="eventEnd" required>
                        </div>
                          <div class="form-group">
                            <label for="eventDescription">Venue:</label>
                           <input type="type" class="form-control" id="location" name="location" required>
                        </div>
                    </form>
                </div>
                <div class="modal-footer d-flex justify-content-end">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-primary" id="saveEvent">Save</button>
                </div>
        </div>
    </div>
</div>

<div class="modal fade" id="updateModal" tabindex="-1" role="dialog" aria-labelledby="eventModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="updateLabel">Update Event</h5><br>
                <h5 class="modal-title" id="viewLabel">Schedule</h5> <br>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <center> <h5 id="municipality-name"></h5> </center><br>
                <form id="eventForm" method="post" action="/pdrrmo/update-event">
                      @csrf
                    <div class="form-group">
                        <label for="eventTitle">Event Title:</label>
                    
                         <input type="hidden" class="form-control" id="eventId" name="eventId" required>
                        <input type="text" class="form-control" id="event-title" name="event-title" required>
                    </div>
                    <div class="form-group">
                        <label for="eventDescription">Event Description:</label>
                        <textarea class="form-control" id="event-Description" name="event-Description" required></textarea>
                    </div>
                      <div class="form-group">
                        <label for="eventDescription">Start Time:</label>
                       <input type="time" class="form-control" id="event-Start" name="event-Start" required>
                    </div>
                      <div class="form-group">
                        <label for="eventDescription">End Time:</label>
                       <input type="time" class="form-control" id="event-End" name="event-End" required>
                    </div>
                      <div class="form-group">
                        <label for="eventDescription">Venue:</label>
                       <input type="type" class="form-control" id="locations" name="locations" required>
                    </div>
                    <button type="button" class="btn btn-secondary" id="cancelButton" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary" id="updateEvent">Update</button>
                     <button type="button" class="btn btn-primary" id="deleteEvent">Delete</button>
                </form>      
            </div>
        </div>
    </div>
</div>

@if(session('success'))
<script>
    Swal.fire({
        icon: 'success',
        title: 'Success!',
        text: '{{ session('success') }}'
    });
</script>
@endif

<script>
    // Function to update the date and time
    function updateDateTime() {
        var currentDate = new Date();
        var dateString = currentDate.toDateString();
        var timeString = currentDate.toLocaleTimeString();

        var dateTimeContainer = document.getElementById('date-time-container');
        dateTimeContainer.innerHTML = '<p>Date: ' + dateString + '</p><p>Time: ' + timeString + '</p>';
    }

    // Update the date and time initially
    updateDateTime();

    // Update the date and time every second (1000 milliseconds)
    setInterval(updateDateTime, 1000);
</script>