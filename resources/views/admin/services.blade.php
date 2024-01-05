

<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
        <title>cms dashboard
    </title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18/dist/sweetalert2.all.min.js"></script>

    <!-- Font Awesome CSS -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18/dist/sweetalert2.all.min.js"></script>

    <!-- Font Awesome CSS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">


        <!-- Include Bootstrap CSS (you can change the version if needed) -->
        <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">

<!-- Include your custom CSS file (if you have one) -->
  
    <!-- SLIDER REVOLUTION 4.x CSS SETTINGS -->
      <!-- Font Awesome CSS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

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
    .description-cell {
        max-height: 40px; /* Adjust this value to control the maximum height */
        overflow: hidden;
        text-overflow: ellipsis;
        white-space: nowrap;
    }
 
</style>
  </head>

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
                  <h4 class="card-title">Service</h4>
                  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalAdd">New service</button>

     
                  <p class="card-description">
                    List of memo
                  </p>
                  <div class="table-responsive">

                  <table class="table" style="background:white">
                                        <thead class="table-dark">
                                            <tr class="">
                                            <th>Name</th>
                                            <th >Description</th>
                                            <th>Price</th>
                                            <th>Duration</th>
                                            <th>Image</th>
                                            <th>Action</th>
                                        </tr></thead>
                                        <tbody>
                                            <tr>
                                           @forelse ($services as $service)
                                                  <tr>
                                                      <td>{{$service->name}}</td>
                                                      <td class="description-cell">{{$service->description}}</td>
                                                      <td>{{$service->price}}</td>
                                                      <td>{{$service->duration}}</td>
                                                      <td>
                                                            @if($service->image)
                                                              <a href="" target="_blank"><img src="{{ asset('uploads/inventory/' . $service->image) }}" width="50px" height="50px"></a>
                                                            @else
                                                                <img src="{{ asset('uploads/inventory/default.png') }}" width="40px" height="40px">
                                                            @endif
                                                        </td>
                                                      <td> 
                                                      <a href="#" class="btn-edit" data-toggle="modal"  data-id="{{ $service->id }}" data-target="#modalEdit" ><i style="color:green;" class="fa fa-edit"></i></a>
                   
                                                      <a href="#" onclick="confirmDelete('{{ $service->id }}')"><i style="color:RED;" class="fas fa-trash-alt"></i></a>
                                                    
                                                    </td>
                                                  </tr>
                                              @empty
                                                  <tr>
                                                      <td>No requests found.</td>
                                                      <td>No requests found.</td>
                                                      <td>No requests found.</td>
                                                      <td>No requests found.</td>
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
          
         
     

  @include('/admin/footer')
</div>

     <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
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
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

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
          url: '/admin/destroy-service/' + id, 
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
              'You cannot delete the service.',
              error
            );
          }
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
     url: '/admin/get-service/' + id, // Replace '/get-record/' with the correct URL from your routes file
    dataType: 'json',
    success: function(response) {
        //Update the modal fields with the fetched data
        $('#serviceId').val(response.id);
        $('#serviceName').val(response.name);
        $('#priceservice').val(response.price);
        $('#descservice').val(response.description);
        $('#durationservice').val(response.duration);
       
    },
  error: function(xhr, status, error) {
        // Check if the response status code is 404 (Not Found)
        if (xhr.status === 404) {
            // Show SweetAlert error message with the error response from the server
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: 'error'
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


<div class="modal fade right" id="modalAdd" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="true">
    <div class="modal-dialog modal-side modal-bottom-right modal-notify modal-danger" role="document">
        <div class="modal-content">
            <div class="modal-header bg-success text-white">
                <h4 class="modal-title">New Service</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="card-content" style="padding-top: 20px; padding-right: 10px; padding-bottom: 20px; padding-left: 10px;">

            <form method="post" action="/admin/save-services"  enctype="multipart/form-data">
                                     @csrf
                                <div class="card-content">
                                   <div class="mb-3">
                                        <label for="exampleFormControlInput1" class="form-label">Service</label>
                                        <input type="text" class="form-control" name="name" id="name" placeholder="Enter the Service Name">
                                            @error('name')
                                              <div class="text-red-600 text-sm">{{ $message }}</div>
                                              @enderror
                                      </div>
                                      <div class="mb-3">
                                        <label for="exampleFormControlTextarea1" class="form-label">Description</label>
                                        <textarea class="form-control" id="desc" name="desc" rows="3"  placeholder="Enter Description"></textarea>
                                           @error('desc')
                                              <div class="text-red-600 text-sm">{{ $message }}</div>
                                              @enderror
                                      </div>
                                      <div class="mb-3">
                                       <label for="exampleFormControlInput1" class="form-label">Price</label>
                                        <input type="text" class="form-control" name="price" id="price" placeholder="Enter the Price">
                                        @error('price')
                                              <div class="text-red-600 text-sm">{{ $message }}</div>
                                              @enderror
                                      </div>
                                      <div class="form-group">
                                          <label for="">Upload Image</label>
                                          <input type="file" name="image" id="image" class="form-control">
                                          @error('image')
                                          <div class="text-red-600 text-sm">{{ $message }}</div>
                                          @enderror
                                      </div>
                                      <div class="mb-3">
                                         <label for="exampleFormControlInput1" class="form-label">Duration</label>
                                        <input type="text" class="form-control" name="duration" id="duration" placeholder="Enter the Duration">
                                        @error('duration')
                                              <div class="text-red-600 text-sm">{{ $message }}</div>
                                              @enderror
                                        </div> <p></p>
                                      
                                        </div>
                                 
                                        <div class="modal-footer d-flex justify-content-end">

                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
            </div>
        </div>
    </div>
</div>



<div class="modal fade right" id="modalEdit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="true">
    <div class="modal-dialog modal-side modal-bottom-right modal-notify modal-danger" role="document">
        <div class="modal-content">
            <div class="modal-header bg-danger text-white">
                <h4 class="modal-title">Update Service</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form action="/admin/update-service" method="post">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="supplierName" class="req-label">Service Name</label>
                        <input type="hidden" name="serviceId" id="serviceId" value="">
                        <input type="text" class="form-control" id="serviceName" name="serviceName" placeholder="Enter Service" value="">
                        @error('serviceName')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="supplierContact" class="req-label">Description</label>
                        <textarea class="form-control" id="descservice" name="descservice" placeholder="Enter description"></textarea>
                        @error('descservice')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="supplierAddress" class="req-label">Price</label>
                        <input type="text" class="form-control" id="priceservice" name="priceservice" placeholder="Enter price" value="">
                        @error('priceservice')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="durationservice" class="req-label">Duration</label>
                        <input type="text" class="form-control" id="durationservice" name="durationservice" placeholder="Enter duration" value="">
                        @error('duration')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="modal-footer d-flex justify-content-end">

                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>

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