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
    background-color: #e5b80b;
}

.navbar-nav li a {
    color: white;
    position: relative;
    display: block;
    padding: 10px 15px!important;
}
</style>

  <body>

<div class="wrapper">


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
                  <h4 class="card-title">Promo</h4>
                  <button type="button" class="btn" data-toggle="modal" data-target="#modalAdd" style="background: #e5b80b;">New Promo</button>

     
                  <p class="card-description">
                    List of Promo
                  </p>
                  <div class="table-responsive">
                    <table class="table">
                    <thead>
                <tr>
                  <th>Promo Name</th>
                  <th>Description</th>
                  <th>End date</th>
                  <th style="width: 20%">Actions</th>
                </tr>
              </thead>
              <tbody>
                 @forelse ($promos as $promo)
                <tr>
                  <td>{{  $promo->title }}</td>
                  <td>{{ $promo->description}}</td>
                  <td>{{ \Carbon\Carbon::parse($promo->end_date)->format('F j, Y') }}</td>
            
                  <td> 
                  <button type="button" class="btn btn-success btn-sm" >
                      <a href="#" class="btn-edit" data-toggle="modal"  data-id="{{ $promo->id }}" data-target="#modalEdit" ><i style="color:white;" class="fa fa-edit"></i></a>
</button>
                      <button type="button" class="btn btn-danger btn-sm" >
                      
                      <a href="#" onclick="confirmDelete('{{$promo->id }}')"><i style="color:white;" class="fas fa-trash-alt"></i></a>
                      </button>
                    </td>
                </tr>
                @empty
                <tr>
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
<!--Modal: modalRelatedContent-->
<div class="modal fade right" id="modalRelatedContent" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="true">
    <div class="modal-dialog modal-side modal-bottom-right modal-notify modal-danger" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info text-white" style="background: #e5b80b;">
                <h4 class="modal-title">New Supplier</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-12" style="margin: 20px;">
                        <form action="/admin/insert-supplier" method="post">
                            @csrf
                            <div class="form-group">
                                <label class="req-label">Supplier Name</label>
                                <input type="hidden" name="supplier-id" id="supplier-id" value="">
                                <input type="text" name="supplier-name" id="supplier-name" placeholder="Enter supplier name" autocomplete="off" value="" class="form-control">
                                @error('supplier-name')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="req-label">Supplier Contact</label>
                                <textarea id="contact" name="contact" placeholder="Enter supplier contact" autocomplete="off" value="" class="form-control"></textarea>
                                @error('contact')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="req-label">Supplier Address</label>
                                <input type="text" name="address" id="address" placeholder="Enter supplier address" autocomplete="off" value="" class="form-control">
                                @error('address')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="modal-footer d-flex justify-content-end">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <x-primary-button style="background-color: #2C3B41; color: white;">
                                    {{ __('Save') }}
                                </x-primary-button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



<div class="modal fade right" id="modalAdd" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="true">
    <div class="modal-dialog modal-side modal-bottom-right modal-notify modal-danger" role="document">
        <div class="modal-content">
            <div class="modal-header text-white" style="background: #e5b80b;">
                <h4 class="modal-title">New Promo</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form action="/admin/insert-promo" method="post">
                @csrf
                <div class="modal-body">
                <div class="form-group">
                                <label class="req-label">Promo Name</label>
                                <input type="hidden" name="supplier-id" id="supplier-id" value="">
                                <input type="text" name="promo-name" id="promo-name" placeholder="Enter Promo name" autocomplete="off" value="" class="form-control" required>
                                @error('supplier-name')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="req-label">Promo Description</label>
                                <textarea id="description" name="description" placeholder="Enter Description" autocomplete="off" value="" class="form-control" required></textarea>
                                @error('contact')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="req-label">End Date</label>
                                <input type="date" id="end-date" name="end-date" placeholder="Choose date" autocomplete="off" value="" class="form-control" required>
                                @error('contact')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="req-label">Discount Percentage</label>
                                <input type="number" name="discount" id="discount" placeholder="Enter discount Percentage" autocomplete="off" value="" class="form-control" required>
                                @error('address')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                </div>
                <div class="modal-footer d-flex justify-content-end">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn" style="background: #e5b80b;">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>


<div class="modal fade right" id="modalEdit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="true">
    <div class="modal-dialog modal-side modal-bottom-right modal-notify modal-danger" role="document">
        <div class="modal-content">
            <div class="modal-header text-white" style="background: #e5b80b;">
                <h4 class="modal-title">Update Promo</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form action="/admin/update-promo" method="post">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="supplierName" class="req-label">Promo</label>
                        <input type="hidden" name="promoId" id="promoId" value="">
                        <input type="text" class="form-control" id="promoName" name="promoName" placeholder="Enter " value="" required>
                        @error('supplier-name')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="supplierContact" class="req-label">Description</label>
                        <textarea class="form-control" id="promodesc" name="promodesc" placeholder="Enter description"></textarea required>
                        @error('contact')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="supplierAddress" class="req-label">End Date</label>
                        <input type="date" class="form-control" id="enddate" name="enddate" placeholder="Enter date" value="" required>
                        @error('address')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="supplierAddress" class="req-label">Discount</label>
                        <input type="text" class="form-control" id="discountpromo" name="discountpromo" placeholder="Enter supplier address" value="" required>
                        @error('address')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="modal-footer d-flex justify-content-end">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn" style="background: #e5b80b;">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>

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
          url: '/admin/destroy-promo/' + id, 
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
              'You cannot delete the supplier. It was already in use.',
              'error'
            );
          }
        });
      }
    });
  }



  // JavaScript function to handle form submission


  $(document).on('click', '.btn-edit', function() {
    // Get the data ID attribute from the clicked Edit button
    var id = $(this).data('id');

    // Perform AJAX request to fetch the record data based on the ID
    $.ajax({
    type: 'GET',
     url: '/admin/get-promo/' + id, // Replace '/get-record/' with the correct URL from your routes file
    dataType: 'json',
    success: function(response) {
        //Update the modal fields with the fetched data
        $('#promoId').val(response.id);
        $('#promoName').val(response.title);
        $('#promodesc').val(response.description);
        $('#enddate').val(response.end_date);
        $('#discountpromo').val(response.discount_percentage);
      
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