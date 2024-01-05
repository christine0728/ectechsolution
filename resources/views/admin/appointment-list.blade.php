<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
        <title>Appointment
    </title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18/dist/sweetalert2.all.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
    <!-- Font Awesome CSS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/2.4.1/css/buttons.dataTables.min.css">
      <!-- Bootstrap CSS -->

        <!-- Include Bootstrap CSS (you can change the version if needed) -->
        <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">

<!-- Include your custom CSS file (if you have one) -->
      <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
  
      <link rel="preconnect" href="https://fonts.googleapis.com">
      <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
      <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">
      <link href="https://fonts.googleapis.com/css2?family=Material+Icons" rel="stylesheet">
      <link rel="stylesheet" type="text/css" href="{{asset('/css/style.css')}}">
      <style>
      .status-req{
            border-radius: 10px;
            width: 50px;
            padding: 7px;
            }
      
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
</style>

  </head>

  <body>

<div class="wrapper">
@php
    $notificationId = session('notificationId');
@endphp


<div class="body-overlay"></div>

@include('/admin/nav')

        <!-- Page Content  -->
        <div id="content">
 @include('/admin/header')
   
      
      <div class="main-content">
 
     
<div class="page-content page-container" id="page-content">

<div class="row container d-flex justify-content-center">

<div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                      <form action="/admin/filter" method="GET" class="form-inline">
                      <div class="form-group">
                          <label for="start_date">Start Date:</label>
                          <input type="date" name="start_date" id="start_date" class="form-control" value="{{ session('start_date') }}">

                      </div>

                      <div class="form-group">
                          <label for="end_date">End Date:</label>
                          <input type="date" name="end_date" id="end_date" class="form-control" value="{{ session('end_date') }}">
                      </div>
                       &nbsp;
                      <button type="submit" class="btn btn-primary">Apply Filter</button>  &nbsp;
                      <a href="/admin/appointment-list" class="btn btn-secondary">All</a>
                  </form>
                  <h4 class="card-title">Appointment</h4>
                   <p class="card-description">
                   Appointment
                  </p>
                  <form action="/admin/limit-per-day/" method="get" > 
                    @csrf Limit of appointment per day
                    <input type="number" name="limit" id="limit" value="{{ $limit }}" required style="width: 30px;">

                   <button type="submit" class="btn">Save</button>
                  </form>
                  <div class="table-responsive">
              
    <p>Total Income: {{ $totalIncome }}</p>


                  <table class="table" id="table-data">
                    <thead>
                <tr>
                  <th>Name</th>
                  <th>Service</th>
                  <th>Date of Appointment</th>  
                  <th>Status</th>
                  <th>Promo</th>
                  <th>Price</th>
                  <th>Discount</th>
                  <th>Discounted amount</th>
                  <th>Paid</th>
                  <th>Date Created</th>
                  <th style="width: 15%;">Actions</th>

                </tr>
              </thead>
              <tbody>
                 @forelse ($appointments as $appointment)
                 <tr style="{{ $notificationId == $appointment->id ? 'background-color: #fddc5c;' : '' }}">
                  <td>{{ $appointment->user_name }}</td>
                  <td>{{ $appointment->service_name}}</td>
                  <td>{{ \Carbon\Carbon::parse($appointment->date_appointment)->format('F j, Y') }}
</td>
                 
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
                  <td>{{ $appointment->promo_name ?? 'None' }}</td>
                  <td>{{ $appointment->prices}}</td>
                  <td>{{ $appointment->discount ?? 'None'}}%</td>
                  
                  <td>{{ number_format($appointment->discounted_amount, 2, '.', '') }}</td>

                  <td>
                      @if($appointment->paid > 0)
                          Paid
                      @else
                          Not Paid
                      @endif
                  </td>
                 
                  <td>
                  {{ \Carbon\Carbon::parse($appointment->date_created)->format('F j, Y') }}
                  </td>
                  <td> 
                  <div class="btn-group btn-group-xs" role="group">
                  @if($appointment->status !== 'canceled' && (\Carbon\Carbon::parse($appointment->start)->isToday() || \Carbon\Carbon::parse($appointment->start)->isFuture()))
                  <button type="button" class="btn btn-success btn-sm">
                  <a href="#" class="btn-edit" data-toggle="modal" data-id="{{ $appointment->id }}" data-target="#modalEdit">
                          <i class="fa fa-edit" style="color:white"></i>
                      </a>
                          </button>
                  @else
                      <a href="#" disabled>
                          <i class="fa fa-edit" style="color:gray"></i>
                      </a>
                  @endif
                  &nbsp;
                  <button type="button" class="btn btn-primary btn-sm">
    <a href="#" class="btn-edit" data-toggle="modal"  data-id="{{ $appointment->id }}" data-target="#modalDetails">
        <i class="fa fa-eye" style="color:white"></i>
    </a>
</button>
&nbsp;
<button type="button" class="btn btn-danger btn-sm">
                            <a onclick="paidAppointment('{{ $appointment->id }}')">
                            <i style="color: white; font-size: 12px; padding:3px;" class="fas fa-dollar-sign"></i>

                            </a>
                        </button>
                          </div>
                    </td>
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
          
            
       @include('/footer')
          
          </div>
          
        

        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

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
</body>
</html>

<!-- Modal: modalDetails -->
<div class="modal fade right" id="modalDetails" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="true">
  <div class="modal-dialog modal-side modal-bottom-right modal-notify modal-danger" role="document">
    <!-- Content -->
    <div class="modal-content">
      <!-- Header -->
      <div class="modal-header"  style="background: #e5b80b;">
        <h4 style="color: white">Update Item</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true" class="white-text">&times;</span>
        </button>
      </div>

      <!-- Body -->
      <div class="modal-body">
        <form action="/admin/update-appointment" method="post" enctype="multipart/form-data">
          @csrf
          <div class="form-group">
            <label class="req-label">Name: </label>
            <span id="user_name"></span>
          </div>
          <div class="form-group">
            <label class="req-label">Service: </label>
            <h id="service"></span>
          </div>
          <div class="form-group">
            <label class="req-label">Price: </label>
            <span id="price"></span>
          </div>
          <div class="form-group">
            <label class="req-label">Description:</label>
            <span id="comment"></span>
          </div>
      </div>

      <!-- Modal Footer -->
      <div class="modal-footer d-flex justify-content-end">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
      </form>
    </div>
  </div>
</div>

<!-- Modal: modalEdit -->
<div class="modal fade right" id="modalEdit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="true">
  <div class="modal-dialog modal-side modal-bottom-right modal-notify modal-danger" role="document">
    <!-- Content -->
    <div class="modal-content">
      <!-- Header -->
      <div class="modal-header " style="background: #e5b80b;">
        <h4 style="color:white">Update </h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true" class="white-text">&times;</span>
        </button>
      </div>

      <!-- Body -->
      <div class="modal-body">
        <form action="/admin/update-appointment" method="post" enctype="multipart/form-data" onsubmit="return validateForm()">
          @csrf
          <input type="hidden" class="form-control" id="userId" name="userId" required>
          <input type="hidden" name="id-appoint" id="id-appoint" value="">
          <label>Appointment date: </label> <span id="date-appoint"></span> <span id="time-appoint"></span>
          <div style="margin-bottom: 20px;">
            <label for="status">Appointment Status:</label>
            <select id="status" name="status" class="form-control" required>
            <option selected disabled>Select...</option>
            <option value="declined">Declined</option>
            <option value="accepted">Accepted</option>
            </select>

          </div>
          <div style="margin-bottom: 20px;">
            <label for="comment">Leave a comment here:</label>
            <textarea id="comment" name="comment" class="form-control" placeholder="Leave a comment here..."></textarea>
          </div>
      </div>

      <!-- Modal Footer -->
      <div class="modal-footer d-flex justify-content-end">
      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <x-primary-button id="updateRecord" style="background: #e5b80b; color: white;" class="btn">
          {{ __('Update Item') }}
        </x-primary-button>
         </div>
      </form>
    </div>
  </div>
</div>


  @if(session('message'))
<script>
    Swal.fire({
        icon: 'success',
        title: 'Successfuly inserted!',
        text: '{{ session('success') }}'
    });
</script>
@endif
    <script>
   function confirmDelete(id) {
    // Show SweetAlert confirmation
    Swal.fire({
      title: 'Are you sure?',
      text: "You won't be able to revert this!",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#d33',
      cancelButtonColor: '#3085d6',
      confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
      // If the user confirms the deletion
      if (result.isConfirmed) {
        // Perform the AJAX request to delete the request
        $.ajax({
          type: 'POST',
          url: '/admin/destroy-item/' + id, 
          data: {
            _token: '{{ csrf_token() }}',
            _method: 'DELETE'
          },
          success: function (response) {
            // Display success message
            Swal.fire(
              'Deleted!',
              'The request has been deleted.',
              'success'
            ).then(function () {
              // Reload the page after deletion
              location.reload();
            });
          },
          error: function (error) {
            // Display error message
             console.log(error);
            Swal.fire(
              'Error!',
              'An error occurred while deleting the item.',
              'error'
            );
          }
        });
      }
    });
  }
  // JavaScript function to handle form submission
  function updateRecord(id) {
    // Get the form data
    var formData = {
      field1: $('#incidenttype').val(),
      field2: $('#loca').val(),
      field3: $('severity-label').val(),
      field4: $('desc').val(),
      field5: $('resource').val(),
      _token: $('input[name="_token"]').val()
    };

    // Perform AJAX request to update the record
    $.ajax({
      type: 'POST',
      
      data: formData,
      dataType: 'json',
      success: function(response) {
        // Show SweetAlert success message
        Swal.fire({
          icon: 'success',
          title: 'Success',
          text: 'Record updated successfully!'
        }).then(function() {
          // Reload the page to update the view with the new data
          location.reload();
        });
      },
      error: function(error) {
        // Show SweetAlert error message
        Swal.fire({
          icon: 'error',
          title: 'Error',
          text: 'An error occurred while updating the record.'
        });
      }
    });
  }

  $(document).on('click', '.btn-edit', function() {
    // Get the data ID attribute from the clicked Edit button
    var id = $(this).data('id');

    // Perform AJAX request to fetch the record data based on the ID
    $.ajax({
    type: 'GET',
    url: '/admin/get-appointment/' + id, // Replace '/get-record/' with the correct URL from your routes file
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
     ;
        
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

  $(document).on('click', '.btn-paid', function() {
    // Get the data ID attribute from the clicked Edit button
    var id = $(this).data('id');

    // Perform AJAX request to fetch the record data based on the ID
    $.ajax({
    type: 'GET',
    url: '/admin/get-paid/' + id, // Replace '/get-record/' with the correct URL from your routes file
    dataType: 'json',
    success: function(response) {
 

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
</script>
    @if(session('success'))
      <script>

          Swal.fire({
              icon: 'success',
              title: 'Success!',
              text: '{{ session('success') }}'
          });
      </script>
      @endif

      <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    
    <!-- Include DataTables library -->
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    
    <!-- Include DataTables Buttons library -->
    <script src="https://cdn.datatables.net/buttons/2.4.1/js/dataTables.buttons.min.js"></script>
    
    <!-- Include JSZip library -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
    
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

    
function paidAppointment(id) {
  console.log(id);
// Show SweetAlert confirmation
Swal.fire({
  title: 'Mark Paid',
      text: "You won't be able to revert this!",
      icon: 'success',
      showCancelButton: true,
      confirmButtonColor: '#d33',
      cancelButtonColor: '#3085d6',
      confirmButtonText: 'Yes, mark paid!'
}).then((result) => {

  if (result.isConfirmed) {

    $.ajax({
      type: 'POST',
       url: '/user/paid-appointment/' + id, 
      data: {
        _token: '{{ csrf_token() }}',
      
      },
      success: function (response) {
        // Display success message
        Swal.fire(
          'Paid!',
          'The Appoinment has been paid.',
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
<script>
    function validateForm() {
        // Get the value of the 'status' select element
        var statusValue = document.getElementById('status').value;

        // Check if the 'status' value is empty or still the default "Select..." option
        if (statusValue === '' || statusValue === 'Select...') {
            // Display an alert or perform any other action to notify the user
            alert('Please select a valid status.');
            
            // Return false to prevent the form from being submitted
            return false;
        }

        // If the 'status' value is not empty or the default, allow the form submission
        return true;
    }
</script>

<script>
    function validateForm() {
        // Get the value of the 'status' select element
        var statusValue = document.getElementById('status').value;

        // Check if the 'status' value is empty or still the default "Select..." option
        if (statusValue === '' || statusValue === 'Select...') {
            // Display an alert to notify the user
            alert('Please select a valid status.');
            
            // Return false to prevent the form from being submitted
            return false;
        }

        // If the 'status' value is not empty or the default, allow the form submission
        return true;
    }
</script>
