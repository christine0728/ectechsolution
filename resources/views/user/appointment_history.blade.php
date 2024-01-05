<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Appointment History</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
       
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.1/css/all.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat&display=swap">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <style>
      .appointm {
        color: #fddc5c
      }
      .status-req{
            border-radius: 10px;
            width: 50px;
            padding: 7px;
            }
      .appoint{
                    display: inline-block;
                    outline: 0;
                    border: none;
                    cursor: pointer;
                    font-weight: 600;
                    border-radius: 4px;
                    font-size: 13px;
                    height: 30px;
                    background-color: black;
                    color: white;
                    padding: 0 10px;}

                    .appoint:hover {
                        background-color: white;
                    }
                
.container .card {
  position: relative;
  max-width : 300px;
  height : 215px;  
  background-color : #fff;
  margin : 30px 10px;
  padding : 20px 15px;
  
  display : flex;
  flex-direction : column;
  box-shadow : 0 5px 20px rgba(0,0,0,0.5);
  transition : 0.3s ease-in-out;
  border-radius : 15px;
}
.container .card:hover {
  height : 320px;    
}
.nav-item.active {
    /* Your styling for the active link */
    background-color:  #d4af37;
}


.container .card .image {
  position : relative;
  width : 260px;
  height : 260px;
  
  top : -10%;
  left: 8px;
 
  z-index : 1;
}
.appoint{
  color: #BFA100;    
}
.container .card .image img {
  max-width : 100%;
  border-radius : 15px;
}

.container .card .content {
  position : relative;
  top : -140px;
  padding : 10px 15px;
  color : #111;
  text-align : center;
  
  visibility : hidden;
  opacity : 0;
  transition : 0.3s ease-in-out;
    
}

.navbar-nav .nav-link {
      color: white; /* Set the color to gold */
    }
.container .card:hover .content {
   margin-top : 30px;
   visibility : visible;
   opacity : 1;
   transition-delay: 0.2s;
  
}
body {
    background-image: url('/assets/img/background.jpg');
    background-repeat: no-repeat;
    background-size: cover; /* Adjust this to your needs */
}
table{
  width:100%;
  color: white;
  border-collapse: collapse;
    margin: 30px 0;
    font-size: 0.9em;
    font-family: sans-serif;
    min-width: 400px;
    box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
}
tbody, td, tfoot, th, thead, tr {
  padding:10px;
  border: white;
  border: 2px solid #333;
}
.text-blk {
  padding-top: 0px;
  padding-right: 0px;
  padding-bottom: 0px;
  padding-left: 0px;
  line-height: 20px;
  color: white;
  font-size: 14px;
  margin-top: 0px;
  margin-right: 0px;
  margin-bottom: 40px;
  margin-left: 0px;
}

.responsive-container-block {
  min-height: 75px;
  height: fit-content;
  width: 100%;
  padding-top: 10px;
  padding-right: 10px;
  padding-bottom: 10px;
  padding-left: 10px;
  display: flex;
  flex-wrap: wrap;
  margin-top: 0px;
  margin-right: auto;
  margin-bottom: 0px;
  margin-left: auto;
  justify-content: flex-start;
}

.responsive-container-block.bigContainer {
  background-image: initial;
  background-position-x: initial;
  background-position-y: initial;
  background-size: initial;
  background-repeat-x: initial;
  background-repeat-y: initial;
  background-attachment: initial;
  background-origin: initial;
  background-clip: initial;
  background-color: rgb(51, 51, 51);
  padding-top: 10px;
  padding-right: 20px;
  padding-bottom: 10px;
  padding-left: 20px;
  margin: 0 0 0 0;
}

.responsive-container-block.Container {
  max-width: 1320px;
  align-items: center;
  justify-content: center;
  margin-top: 80px;
  margin-right: auto;
  margin-bottom: 80px;
  margin-left: auto;
  padding-top: 10px;
  padding-right: 0px;
  padding-bottom: 10px;
  padding-left: 0px;
}

.responsive-container-block.leftSide {
  width: auto;
  align-items: flex-start;
  padding-top: 10px;
  padding-right: 0px;
  padding-bottom: 10px;
  padding-left: 0px;
  flex-direction: column;
  position: static;
  margin-top: 0px;
  margin-right: auto;
  margin-bottom: 0px;
  margin-left: auto;
  max-width: 300px;
}

.text-blk.heading {
  font-size: 40px;
  line-height: 64px;
  font-weight: 900;
  color: #00B2EB;
  margin-top: 0px;
  margin-right: 0px;
  margin-bottom: 40px;
  margin-left: 0px;
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

.text-blk.btn {
  color: rgb(0, 178, 235);
  background-image: initial;
  background-position-x: initial;
  background-position-y: initial;
  background-size: initial;
  background-repeat-x: initial;
  background-repeat-y: initial;
  background-attachment: initial;
  background-origin: initial;
  background-clip: initial;
  background-color: rgb(255, 255, 255);
  box-shadow: rgba(160, 121, 0, 0.2) 0px 12px 35px;
  border-top-left-radius: 100px;
  border-top-right-radius: 100px;
  border-bottom-right-radius: 100px;
  border-bottom-left-radius: 100px;
  padding-top: 20px;
  padding-right: 50px;
  padding-bottom: 20px;
  padding-left: 50px;
  cursor: pointer;
}

.responsive-container-block.rightSide {
  width: 675px;
  position: relative;
  padding-top: 0px;
  padding-right: 0px;
  padding-bottom: 0px;
  padding-left: 0px;
  display: flex;
  height: 700px;
  min-height: auto;
}

.number1img {
  margin-top: 39%;
  margin-right: 80%;
  margin-bottom: 29%;
  margin-left: 0px;
  height: 32%;
  width: 20%;
  position: absolute;
}

.number2img {
  margin-top: 19%;
  margin-right: 42%;
  margin-bottom: 42%;
  margin-left: 23%;
  width: 35%;
  height: 39%;
  position: absolute;
}

.number3img {
  width: 13%;
  height: 21%;
  position: absolute;
  margin-top: 62%;
  margin-right: 64%;
  margin-bottom: 30%;
  margin-left: 23%;
}

.number4vid {
  width: 34%;
  height: 33%;
  position: absolute;
  margin-top: 62%;
  margin-right: 27%;
  margin-bottom: 0px;
  margin-left: 39%;
}

.number5img {
  position: absolute;
  width: 13%;
  height: 21%;
  margin-top: 38%;
  margin-right: 27%;
  margin-bottom: 41%;
  margin-left: 60%;
}

.number6img {
  position: absolute;
  margin-top: 0px;
  margin-right: 3%;
  margin-bottom: 67%;
  margin-left: 62%;
  width: 35%;
  height: 33%;
}

.number7img {
  position: absolute;
  width: 25%;
  margin-top: 40%;
  margin-right: 0px;
  margin-bottom: 18%;
  margin-left: 75%;
  height: 42%;
}

.text-blk.subHeading {
  font-size: 14px;
  line-height: 25px;
}

@media (max-width: 1024px) {
  .responsive-container-block.Container {
    flex-direction: column-reverse;
  }

  .text-blk.heading {
    text-align: center;
    max-width: 370px;
  }

  .text-blk.subHeading {
    text-align: center;
  }

  .responsive-container-block.leftSide {
    align-items: center;
    max-width: 480px;
  }

  .responsive-container-block.rightSide {
    margin-top: 0px;
    margin-right: auto;
    margin-bottom: 100px;
    margin-left: auto;
  }

  .responsive-container-block.rightSide {
    margin: 0 auto 70px auto;
  }
}

@media (max-width: 768px) {
  .responsive-container-block.rightSide {
    width: 450px;
    height: 450px;
  }

  .responsive-container-block.leftSide {
    max-width: 450px;
  }
}

@media (max-width: 500px) {
  .number1img {
    display: none;
  }

  .number2img {
    display: none;
  }

  .number3img {
    display: none;
  }

  .number5img {
    display: none;
  }

  .number6img {
    display: none;
  }

  .number7img {
    display: none;
  }

  .responsive-container-block.rightSide {
    width: 100%;
    height: 250px;
    margin-top: 0px;
    margin-right: 0px;
    margin-bottom: 100px;
    margin-left: 0px;
  }

  .number4vid {
    position: static;
    margin-top: 0px;
    margin-right: auto;
    margin-bottom: 0px;
    margin-left: auto;
    width: 100%;
    height: 100%;
  }

  .text-blk.heading {
    font-size: 25px;
    line-height: 40px;
    max-width: 370px;
    width: auto;
    background: #BFA100;
  }

  .text-blk.subHeading {
    font-size: 14px;
    line-height: 25px;
  }

  .responsive-container-block.leftSide {
    width: 100%;
  }
}
</style>
  </head>
  <body  style="background-color: #1c1c1c;"  >
@include('/user/nav')
@php
    $notificationId = session('notificationId');
@endphp

<center>
            <div style="width: 80%;">
              <div class="card">
                <div class="card-body">
                  
                   <p class="card-description" style="font-weight: bold;">
                   Appointment
                  </p>
                  <div class="table-responsive" >
                  <table class="table" id="table-data">
                    <thead>
                <tr >
                  <th>Name</th>
                  <th>Service</th>
                  <th>Price</th>
                  <th>Date of Appointment</th>  
                  <th>Start Time</th>  
                  <th>Status</th>
                  <th>Admin respond</th>
                  <th>Action</th>
                  <th>Date Created</th>
                
                </tr>
              </thead>
              <tbody>
                 @forelse ($appointments as $appointment)
                 <tr style="{{ $notificationId == $appointment->id ? 'background-color: #fddc5c; color:black' : '' }}">
                
                  <td>{{ $appointment->user_name }}</td>
                  <td>{{ $appointment->service_name}}</td>
                  <td>{{ $appointment->prices}}</td>
                  <td>{{ $appointment->date_appointment}}</td>
                  <td>{{ $appointment->start_time}}</td>
                  <td>   <span class="status-req" style=" background-color:
                          <?php if ($appointment->status === 'pending'): ?>
                              #ffdd76;
                          <?php elseif ($appointment->status === 'accepted'): ?>
                              #219b54;
                          <?php elseif ($appointment->status === 'declined'): ?>
                              #e4423c;
                          <?php elseif ($appointment->status === 'canceled'): ?>
                              #e4423c;
                          <?php endif; ?> "> {{ $appointment->status }} 
                      </span>
                    
                  </td>
                  <td>{{ $appointment->comment ?? 'None' }}</td>
                  <td> 
                  <button type="button" class="btn btn-primary btn-sm">
                    <a href="#" class="btn-edit" data-toggle="modal"  data-id="{{ $appointment->id }}" data-target="#modalDetails">
                        <i class="fa fa-eye"style="color: white; font-size: 12px;" ></i>
                    </a>
                </button>
                        <button type="button" class="btn btn-danger btn-sm">
                            <a onclick="cancelAppointment('{{ $appointment->id }}')">
                              <i style="color: white; font-size: 12px; padding:3px;" class="fas fa-times"></i>
                            </a>
                        </button>
                </td>
                <td>{{ date('F d, Y g:ia', strtotime($appointment->created_at)) }}</td>
        
                </tr>
                @empty
                <tr>
                  <td >No requests found.</td>
                  <td >No requests found.</td>
                  <td >No requests found.</td>
                  <td >No requests found.</td>
                  <td >No requests found.</td>   
                  <td >No requests found.</td>   
                  <td >No requests found.</td>
                  <td >No requests found.</td>
                  <td >No requests found.</td>
                </tr>
                @endforelse
              </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
            
            </div>
            </div>
            

</center>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br>
@include('user/footer')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18/dist/sweetalert2.all.min.js"></script>
<script>
  $(document).on('click', '.btn-edit', function() {
    // Get the data ID attribute from the clicked Edit button
    var id = $(this).data('id');

    // Perform AJAX request to fetch the record data based on the ID
    $.ajax({
    type: 'GET',
    url: '/user/get-appointment/' + id, // Replace '/get-record/' with the correct URL from your routes file
    dataType: 'json',
    success: function(response) {
      var startDate = new Date(response.start);

// Format the date to "Month day, Year"
var formattedDate = startDate.toLocaleDateString('en-US', { month: 'long', day: 'numeric', year: 'numeric' });
var militaryTime = response.start_time;

// Split the time into hours and minutes
var [hours, minutes] = militaryTime.split(':');

// Convert hours to 12-hour format
var period = hours >= 12 ? 'PM' : 'AM';
hours = hours % 12 || 12; // Adjust 0 to 12 for 12-hour format

// Create the formatted time string
var formattedTime = hours + ':' + minutes + ' ' + period;

// Set the formatted time to the element with id 'time-appoint'
$('#time-appoint').text(formattedTime);
        $('#id-appoint').val(response.eventid);
        $('#price').text(response.price);
        $('#date-appoint').text(formattedDate);
        $('#duration').text(response.duration);
        $('#desc').text(response.description);
        $('#service').text(response.service_name);
        $('#userId').val(response.userid);
        $('#user_name').text(response.user_name);
        var commentText = response.comment;

        if (commentText === null) {
            commentText = "None";
        }

        // Set the text of the element with id "comment" to commentText
        $('#comment').text(commentText);
       

    },
  error: function(xhr, status, error) {
        // Check if the response status code is 404 (Not Found)
        if (xhr.status === 404) {
            // Show SweetAlert error message with the error response from the server
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: 'dd'
            });
        } else {
            // Show a generic error message for other types of errors
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: 'An error occurred while fetching the record.'
            });
        }}
});
  });


  $(document).on('click', '.btn-cancel', function() {
    // Get the data ID attribute from the clicked Edit button
    var id = $(this).data('id');
    // Perform AJAX request to fetch the record data based on the ID
    $.ajax({
    type: 'GET',
    url: '/user/cancel-appointment/' + id, // Replace '/get-record/' with the correct URL from your routes file
    dataType: 'json',
    success: function(response) {
        //Update the modal fields with the fetched data
       
        $('#service-name').text(response.name);
        $('#service-desc').text(response.description);
        $('#service-duration').text(response.duration);
        $('#service-price').text(response.price);

    },
  error: function(xhr, status, error) {
        // Check if the response status code is 404 (Not Found)
        if (xhr.status === 404) {
            // Show SweetAlert error message with the error response from the server
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: 's',
            });
        } else {
            // Show a generic error message for other types of errors
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: 'An error occurred while fetching the record.'
            });
        }}
});
  });

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

<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

<div class="modal fade right" id="modalEdit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="true">
    <div class="modal-dialog modal-side modal-bottom-right modal-notify modal-danger" role="document">
        <div class="modal-content  bg-dark">
      <div class="modal-header bg-warning text-white">

                <h4 class="modal-title" id="service-name"></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
                <div class="modal-body">
               <center> <h5 id="service-price" style="color:white"></h5></center>
               <center> <h7 id="service-duration" style="color:white"></h7> </center><br>
                <h7 id="service-desc" style="color:white"></h7>
                    </div>
          
                </div>
               
        </div>
    </div>
</div>
<script>

  
  $(document).ready(function() {
    $('.view-read-link').on('click', function() {
        var memoId = $(this).data('id'); // Get the memo->id from the data-id attribute
        $('#readModal').find('.modal-body').text('Memo ID: ' + memoId); // Set the value in the modal
    });
});

function cancelAppointment(id) {
  console.log(id);
// Show SweetAlert confirmation
Swal.fire({
  title: 'Are you sure?',
  text: "You won't be able to revert this!",
  icon: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#d33',
  cancelButtonColor: '#3085d6',
  confirmButtonText: 'Yes, cancel it!'
}).then((result) => {

  if (result.isConfirmed) {

    $.ajax({
      type: 'POST',
       url: '/user/cancel-appointment/' + id, 
      data: {
        _token: '{{ csrf_token() }}',
      
      },
      success: function (response) {
        // Display success message
        Swal.fire(
          'Canceled!',
          'The Appoinment has been canceled.',
          'success'
        ).then(function () {
          // Reload the page after deletion
          location.reload();
        });
      },
      error: function (error) {
        // Display error message
        Swal.fire(
          'Error!',
          'An error occurred while deleting the request.',
          'error'
        );
      }
    });
  }
});
}


</script>

<!-- Modal: modalDetails -->
<div class="modal fade right" id="modalDetails" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="true">
  <div class="modal-dialog modal-side modal-bottom-right modal-notify modal-danger" role="document">
    <!-- Content -->
    <div class="modal-content">
      <!-- Header -->
      <div class="modal-header" style="background: gold; color:white">
        <h4>Details</h4>
      
      </div>

      <!-- Body -->
      <div class="modal-body">
        <form action="/admin/update-appointment" method="post" enctype="multipart/form-data">
          @csrf
         
          <div class="form-group">
            <label class="req-label" style="font-weight: bold;">Service: </label>
            <h id="service"></span>
          </div> <br>
          <div class="form-group">
            <label class="req-label" style="font-weight: bold;">Price: </label>
            <span id="price"></span>
          </div> <br>
          <div class="form-group">
            <label class="req-label" style="font-weight: bold;" >Duration: </label>
            <span id="duration"></span>
          </div><br>
          <div class="form-group">
            <label class="req-label" style="font-weight: bold;" >Description: </label>
            <span id="desc"></span>
          </div>
        
       
      </div>

      <!-- Modal Footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
      </form>
    </div>
  </div>
</div>


<script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    
    <!-- Include DataTables library -->
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    
    <!-- Include DataTables Buttons library -->
    <script src="https://cdn.datatables.net/buttons/2.4.1/js/dataTables.buttons.min.js"></script>
    
    <!-- Include JSZip library -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
    <!-- Font Awesome CSS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/2.4.1/css/buttons.dataTables.min.css">
      <!-- Bootstrap CSS -->

        <
    <!-- Include PDFMake libraries -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    
    <!-- Include Buttons HTML5 library -->
    <script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.html5.min.js"></script>
    
    <!-- Include Buttons Print library -->
    <script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.print.min.js"></script>
  
  <script>
    $(document).ready(function() {
    $('#table-data').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    } );
} );
  </script>