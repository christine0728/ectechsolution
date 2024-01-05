<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Appointment</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.css" />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18/dist/sweetalert2.all.min.js"></script>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <!-- Include Toastr CSS file -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

<!-- Include Toastr JavaScript file -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

<style>
 
    .fc-head-container{
        background: #1c1c1c;
        color: gold;
    }
    .fc-left{
        color:white;
    }
    .fc-day-number{
        color: white;
    }
    .navbar-nav .nav-link {
      color: white; /* Set the color to gold */
    }
    body {
	font-family: sans-serif;
}
nav {
	display: flex;
	align-items: center;
	background: #00A9D4;
	height: 60px;
	position: relative;
}
.icon {
  
	cursor: pointer;
	margin-right: 50px;
	line-height: 60px;
}
.icon span {
	background: #f00;
	padding: 3px;
	border-radius: 50%;
	color: #fff;
	vertical-align: top;
	margin-left: -15px;
}
.icon img {
	display: inline-block;
	width: 40px;
	margin-top: 20px;
}
.icon:hover {
	opacity: .7;
}

.logo {
	flex: 1;
	margin-left: 50px;
	color: #eee;
	font-size: 20px;
	font-family: monospace;
}

.notifi-box {
	width: 300px;
	height: 0px;
	opacity: 0;
	position: absolute;
	top: 63px;
	right: 35px;
	transition: 1s opacity, 250ms height;
	box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
}
.notifi-box h2 {
	font-size: 14px;
	padding: 10px;
	border-bottom: 1px solid #eee;
	color: #999;
}
.notifi-box h2 span {
	color: #f00;
}
.notifi-item {
	display: flex;
	border-bottom: 1px solid #eee;
	padding: 15px 5px;
	margin-bottom: 15px;
	cursor: pointer;
}
.notifi-item:hover {
	background-color: #eee;
}
.notifi-item img {
	display: block;
	width: 50px;
	margin-right: 10px;
	border-radius: 50%;
}
.notifi-item .text h4 {
	color: #777;
	font-size: 16px;
	margin-top: 10px;
}
.notifi-item .text p {
	color: #aaa;
	font-size: 12px;
}
    
nav {
	display: flex;
	align-items: center;
	background: #00A9D4;
    justify-content: space-between; 
	height: 60px;
	position: relative;
    padding: 0 20px; /
}
.logo-text {
    margin-left: 10px; /* Adjust the margin as needed */
}
.icon {
	cursor: pointer;
	margin-right: 50px;
	line-height: 60px;
}
.icon span {
	background: #f00;
	padding: 7px;
	border-radius: 50%;
	color: #fff;
	vertical-align: top;
	margin-left: -25px;
}
.icon img {
	display: inline-block;
	width: 40px;
	margin-top: 20px;
}
.icon:hover {
	opacity: .7;
}

.logo {
	flex: 1;
	margin-left: 50px;
	color: #eee;
	font-size: 20px;
	font-family: monospace;
}

.notifi-box {
	width: 300px;
	height: 0px;
	opacity: 0;
	position: absolute;
	top: 63px;
	right: 35px;
  z-index: 100;
  background:white;
	transition: 1s opacity, 250ms height;
	box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
}
.notifi-box h2 {
	font-size: 14px;
	padding: 10px;
	border-bottom: 1px solid #eee;
	color: #999;
}
.notifi-box h2 span {
	color: #f00;
}
.nav-item.active {
    /* Your styling for the active link */
    background-color:  #d4af37;
}

.notifi-item {
	display: flex;
	border-bottom: 1px solid #eee;
	padding: 15px 5px;
	margin-bottom: 15px;
	cursor: pointer;
}
.notifi-item:hover {
	background-color: #eee;
}
.notifi-item img {
	display: block;
	width: 50px;
	margin-right: 10px;
	border-radius: 50%;
}
.notifi-item .text h4 {
	color: #777;
	font-size: 16px;
	margin-top: 10px;
}
.notifi-item .text p {
	color: #aaa;
	font-size: 12px;
}
 </style>
</head>
  <body style="background-color: #1c1c1c;">
  @include('/user/nav')
<br>
  
<div class="row">
                    <div class="column1">
                        <br>
              <center><div class="legend" style="color:white"> 
              Red: Your appointment <br>
              Blue: Other users appoinement
            
            </div></center>

                    <center> <div id='calendar' style="width: 50%;"></div></center>
                       
                    </div>
                    <div class="column2"></div>
                    
                </div>
            
</center>
@include('user/footer')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
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
                events: SITEURL + "/user/fullcalender",
                displayEventTime: false,
                eventRender: function (event, element, view) {
                    if (event.allDay === 'true') {
                        event.allDay = true;
                    } else {
                        event.allDay = false;
                    }
                    var currentUserId = {{ $currentUserId }};
                    var eventsData = @json($events);
                    console.log(eventsData);

                    for (var i = 0; i < eventsData.length; i++) {
    if (eventsData[i].id === event.id) {
        var userName = eventsData[i].user_name; // Replace 'user_name' with the actual field in your event data
            var title =  eventsData[i].service_name;
            var combinedTitle =  title;

            element.find('.fc-title').html(combinedTitle);
        if (eventsData[i].userid === currentUserId) {
            element.css('background', 'linear-gradient(to bottom, #e74a3b, #c0392b)');
            element.css('border-color', '#c0392b');
            element.css('color', 'white');
            element.css('box-shadow', '0 2px 4px rgba(231, 76, 60, 0.2)');
            element.css('height','14px');
        } else {
            element.css('background', 'linear-gradient(to bottom, #3498db, #2980b9)');
            element.css('border-color', '#2980b9');
            element.css('color', 'white');
            element.css('box-shadow', '0 2px 4px rgba(52, 152, 219, 0.2)');
            element.css('height','14px');
        }
        break;
    }
}

                },
                selectable: true,
                selectHelper: true,
                select: function (start, end, allDay) {
                    selectedStartDate = start;
                    selectedEndDate = end;
                    $('#eventModal').modal('show');
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
                                    url: SITEURL + '/user/fullcalenderAjax',
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
                        url: SITEURL + '/user/details/' + eventId,
                        type: 'GET',
                        success: function (response) {
                            $('#deleteEvent').data('eventId', response.event.id);
                            $('#eventId').val(response.event.id);
                            $('#event-title').val(response.event.title);
                            $('#event-Description').val(response.event.description);
                            $('#event-Start').val(response.event.start_time);
                            $('#event-End').val(response.event.end_time);
                            $('#viewDuration').text(response.event.duration);
                            $('#viewService').text(response.event.service_name);
                            console.log(response.event.service);
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
                        url: SITEURL + '/user/fullcalenderAjax',
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

                var service = $('#serviceid').val();
                var promo = $('#promoid').val();
                var description = $('#eventDescription').val();
                var type = $('#event_type').val();
                var timeStart = $('#eventStart').val();
                var timeEnd = $('#eventEnd').val();
                var location = $('#location').val();
                var involved = $('#involved').val();
                if ( selectedStartDate && selectedEndDate) {
                    var start = selectedStartDate.format("YYYY-MM-DD");
                    var end = selectedEndDate.format("YYYY-MM-DD");

                    $.ajax({
                        url: SITEURL + "/user/fullcalenderAjax",
                        data: {
                            service: service,
                            promo: promo,
                            start: start,
                            involved: involved,
                            description: description,
                            timeStart: timeStart,
                            timeEnd: timeEnd,
                            location: location,
                            end: end,
                            type: 'add'
                        },
                        type: "GET",
                        success: function (data) {
                            if (data.error) {
                              // Display an error message
                                displayErrorMessage("EVENT CANNOT BE MADE. " + data.error);
                                
                            } else if (data.limit) {
                                    displaylimitMessage(`EVENT CANNOT BE MADE. ${data.limit}`);
                                }else {
                        // 1000 milliseconds (1 second) delay
        
                                // Display a success message
                                displaySuccessMessage("Event Created Successfully");}
                                setTimeout(function () {
            window.location.href = '/user/appointment';
        }, 3000); // 3000 milliseconds (3 seconds) delay
    
                        var calendar = $('#calendar').fullCalendar('getCalendar');
                        calendar.fullCalendar('refetchEvents');

                        // Render the new event
                        var newEvent = {
                            title: title,
                            start: start,
                            description: description,
                            involved: involved,
                            timeStart: timeStart,
                            timeEnd: timeEnd,
                            location: location,
                            end: end,
                            allDay: allDay
                        };
                        calendar.fullCalendar('renderEvent', newEvent, true);
                        calendar.fullCalendar('unselect');

                        // Reload the entire pagelocation.reload();
                        location.reload();
                                                
                        }
                    });
                    $('#eventTitle').val('');
                    $('#eventDescription').val('');
                    $('#eventModal').modal('hide');
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


       
              function displaySuccessMessage(message) {
    // Customize this function based on your UI library
    toastr.success("Appointment Successfully Created. " ,'Wait until admin responsed to your appointment');
}

function displaylimitMessage(message) {
    // Display error message using Toastr (or replace with your preferred library)
    toastr.error(message, '', {
        allowHtml: true
    });
}
function displayErrorMessage(message) {
    // Display error message using SweetAlert (or replace with your preferred library)
    toastr.error('Appointment Unavailable. Scheduling appointments for past dates is not allowed.', '', {
        allowHtml: true
    });
    
}
        });
        
    </script>
    <script></script>
</main>

<div class="modal fade" id="updateModal" tabindex="-1" role="dialog" aria-labelledby="eventModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header" style="background:#1f1f1e;; color:white">
                <h5 class="modal-title" id="updateLabel">Update Appointment</h5>
                <h5 class="modal-title" id="viewLabel"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true" class="white-text">&times;</span>
        </button>  </div>
            <div class="modal-body">
          
                <center> <h5 id="municipality-name"></h5> </center><br>
                <form id="eventForm" method="post" action="/user/update-event">
                    @csrf
       
                    <span> Service:</span>
                        <span class="modal-title" id="viewService"></span> <br>
                       
                        <span>  Service Duration:</span>
                        <span class="modal-title" id="viewDuration"></span> 
                    <input type="hidden" name="eventId" id="eventId">
                    <div class="form-group">
                        <label for="eventDescription">Start Time:</label>
                        <input type="time" class="form-control" id="event-Start" name="event-Start" required>
                    </div>
                    <div class="form-group">
                        <label for="eventDescription">Send Notes:</label>
                        <textarea class="form-control" id="event-Description" name="event-Description" required></textarea>
                    </div>
  
              
            </div>
            <div class="modal-footer d-flex justify-content-end">
           
                <button type="submit" class="btn " style="background:#1f1f1e; color:white" id="updateEvent">Update</button>
                <!-- <button type="button" class="btn btn-primary" id="deleteEvent">Canceled</button> -->
            </div>
            </form>
        </div>
    </div>
</div>

</body>
</html>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js"></script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script> -->
   
  <script type="text/javascript">
  $(document).ready(function () {
            $('#sidebarCollapse').on('click', function () {
                $('#sidebar').toggleClass('active');
        $('#content').toggleClass('active');
            });
      
       $('.more-button,.body-overlay').on('click', function () {
                $('#sidebar,.body-overlay').toggleClass('show-nav');
            });
      
        }); 
</script>
<!-- Hidden Modal for Event Input -->
<div class="modal fade" id="eventModal" tabindex="-1" role="dialog" aria-labelledby="eventModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
        <div class="modal-header" style="background:#1f1f1e;; color:white">
                <h5 class="modal-title" id="eventModalLabel">Appointment</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="eventForm">
                    <div class="form-group" style="width: 100%">
                    <label class="req-label">Select a Service:</label>
                    <select id="serviceid" name="serviceid" class="form-control">
                    <option value="" selected disabled>Select a Service</option>
                    
                    <?php foreach ($services as $service): ?>
                        <option value="<?= $service['id'] ?>"><?= $service['name'] ?></option>
                    <?php endforeach; ?>
                     </select>
                    @error('service')
                    <div class="text-red-600 text-sm">{{ $message }}</div><br>
                    @enderror
                </div>
                <div class="form-group" style="width: 100%">
                    <label class="req-label">Select a Promo:</label>
                    <select id="promoid" name="promoid" class="form-control">
                    <option value="" selected disabled>Select a Promo</option>
                    
                    <?php foreach ($promos as $promo): ?>
                        <option value="<?= $promo['id'] ?>"><?=$promo['title'] ?></option>
                    <?php endforeach; ?>
                     </select>
                    @error('service')
                    <div class="text-red-600 text-sm">{{ $message }}</div><br>
                    @enderror
                </div>
                    <div class="form-group">
                        <label for="eventStart">Start Time:</label>
                        <input type="time" class="form-control" id="eventStart" name="eventStart" required>
                    </div>
                    <div class="form-group">
                        <label for="eventDescription">Leave a note:</label>
                        <textarea class="form-control" id="eventDescription" name="eventDescription" required></textarea>
                    </div>

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn" style="background:#1f1f1e; color:white" id="saveEvent">Save</button>
            </div>
           
        </div>
    </div>
</div>
<script src="{{ asset('sweetalert/sweetalert.min.js') }}"></script>
@if(session('success'))
<script>
    Swal.fire({
        icon: 'success',
        title: 'Success!',
        text: '{{ session('success') }}'
    });
</script>
@endif
@if(session('error'))
<script>
    Swal.fire({
        icon: 'success',
        title: 'Success!',
        text: '{{ session('error') }}'
    });
</script>
@endif


<script>var app = angular.module('demoApp', ['ngAnimate']);
app.controller('demoController', function($scope){
	var opendd;
	var storedNewNotifications;
	var storedReadNotifications;
	var storedawaitingNotifications;
	var init = function(){
		storedNewNotifications = JSON.parse(localStorage.getItem('newNotifications'));
		storedReadNotifications = JSON.parse(localStorage.getItem('readNotifications'));
		storedawaitingNotifications = JSON.parse(localStorage.getItem('awaitingNotifications'));
		if(storedNewNotifications == null){
			$scope.newNotifications = [
				{
					user: pollingData.users[1],
					action: pollingData.actions[0],
					target: pollingData.actionTargets[2],
					timestamp: new Date()
				}
			];
		}
		else{
			$scope.newNotifications = storedNewNotifications;
		}
		if(storedReadNotifications == null){
			$scope.readNotifications = [
				{
					user: pollingData.users[2],
					action: pollingData.actions[1],
					target: pollingData.actionTargets[0],
					timestamp: new Date()
				}
			];
		}
		else{
			$scope.readNotifications = storedReadNotifications;
		}
		if(storedawaitingNotifications == null)
			$scope.awaitingNotifications = 1;
		else{
			$scope.awaitingNotifications = storedawaitingNotifications;
			if($scope.awaitingNotifications == 0)
				angular.element('#notifications-count').hide();
		}
		$scope.showNotifications = function($event){
			var targetdd = angular.element($event.target).closest('.dropdown-container').find('.dropdown-menu');
			opendd = targetdd;
		    if(targetdd.hasClass('fadeInDown')){
		    	hidedd(targetdd);
		    }
		    else{
		    	targetdd.css('display', 'block').removeClass('fadeOutUp').addClass('fadeInDown')
		    									.on('animationend webkitAnimationEnd oanimationend MSAnimationEnd', function(){
	  												angular.element(this).show();
	  											});
          targetdd.find('.dropdown-body')[0].scrollTop = 0;
		    	$scope.awaitingNotifications = 0;
		      	angular.element('#notifications-count').removeClass('fadeIn').addClass('fadeOut');
		    }
		};
		$scope.hideInfo = function(){
			angular.element('#demoInfo').addClass('zoomOut')
										.on('animationend webkitAnimationEnd oanimationend MSAnimationEnd', function(){
											angular.element(this).hide();
											angular.element('.instruction').addClass('zoomIn').show();
										});
		}
		//show notifications count if new notifications are received
		setInterval(function(){
			if($scope.awaitingNotifications > 0 && opendd == null && (angular.element('#notifications-count').css('opacity') == '0' || angular.element('#notifications-count').is(':hidden')))
    			angular.element('#notifications-count').removeClass('fadeOut').addClass('fadeIn').show();
		}, 400);
		dummyPolling();
	}

	//Hide dropdown function
	var hidedd = function(targetdd){
		targetdd.removeClass('fadeInDown').addClass('fadeOutUp')
										  .on('animationend webkitAnimationEnd oanimationend MSAnimationEnd', function(){
  												angular.element(this).hide();
  											});
    	opendd = null;
    	$scope.awaitingNotifications = 0;
    	angular.forEach($scope.newNotifications, function(notification){
    		$scope.readNotifications.push(notification);
    	});
    	$scope.newNotifications = [];
    	localStorage.setItem('readNotifications', JSON.stringify($scope.readNotifications));
    	localStorage.setItem('newNotifications', JSON.stringify($scope.newNotifications));
		localStorage.setItem('awaitingNotifications', JSON.stringify($scope.awaitingNotifications));
    	if($scope.awaitingNotifications > 0)
    		angular.element('#notifications-count').removeClass('fadeOut').addClass('fadeIn');
	}

	//New notification is created by selecting random user, action and targets from this object
	var pollingData = {
	    users : [
		    {
		        name: "Fauzan Khan",
		        imageUrl: "https://media.licdn.com/mpr/mpr/shrinknp_400_400/AAEAAQAAAAAAAANfAAAAJDE1MzNiYjM1LWVjYzUtNDcwZi1hMmExLTQ5ZDVjYzViMDkzYQ.jpg"
		    },
		    {
		        name: "Keanu Reeves",
		        imageUrl: "http://www.latimes.com/includes/projects/hollywood/portraits/keanu_reeves.jpg"
		    },
		    {
		        name: "Natalie Portman",
		        imageUrl: "https://imagemoved.files.wordpress.com/2011/07/no-strings-attached-natalie-portman-19128381-850-1280.jpg"
		    }
	    ],
	    actions: ["upvoted", "promoted", "shared"],
  	    actionTargets: ["your answer", "your post", "your question"]
	};

	//generates a random number between 0 and 2 to select random polling data
	var getRandomNumber = function(){
	    return Math.floor(Math.random() * 3);
	};

	//creates and returns a new notification
	var getNewNotification = function(){
		var userIndex = getRandomNumber();
		var actionIndex = getRandomNumber();
		var actionTargetIndex = getRandomNumber();
		var newNotification = {
			user: pollingData.users[userIndex],
			action: pollingData.actions[actionIndex],
			target: pollingData.actionTargets[actionTargetIndex],
			timestamp: new Date()
		}
		return newNotification;
	};

	//This function calls itslef after random interval
	var dummyPolling = function(){
		var randomInterval = 2*Math.round(Math.random() * (3000 - 500)) + 1000;
		setTimeout(function() {
			$scope.$apply(function(){
				$scope.newNotifications.push(getNewNotification());
				$scope.awaitingNotifications++;
				localStorage.setItem('newNotifications', JSON.stringify($scope.newNotifications));
				localStorage.setItem('awaitingNotifications', JSON.stringify($scope.awaitingNotifications));
			});
			console.log("dummy poll called after "+randomInterval+"ms");
            dummyPolling();  
    	}, randomInterval);
	}

	window.onclick = function(event){
		var clickedElement = angular.element(event.target);
		var clickedDdTrigger = clickedElement.closest('.dd-trigger').length;
		var clickedDdContainer = clickedElement.closest('.dropdown-menu').length;
		if(opendd != null && clickedDdTrigger == 0 && clickedDdContainer == 0){
			hidedd(opendd);
		}
	}
  
  window.onbeforeunload = function(e) {
	  if(opendd != null){
      console.log('closingdd');
      hidedd(opendd); 
    }
	};

	init();
})


var box  = document.getElementById('box');
var down = false;


function toggleNotifi(){
	if (down) {
		box.style.height  = '0px';
		box.style.opacity = 0;
		down = false;
	}else {
		box.style.height  = '510px';
		box.style.opacity = 1;
		down = true;
	}
}
</script>

<script>var box  = document.getElementById('box');
var down = false;


function toggleNotifi(){
	if (down) {
		box.style.height  = '0px';
		box.style.opacity = 0;
		down = false;
	}else {
		box.style.height  = '510px';
		box.style.opacity = 1;
		down = true;
	}
}</script>

@if (session('error'))
    <script>
        alert("not inserting");
    </script>
@endif
