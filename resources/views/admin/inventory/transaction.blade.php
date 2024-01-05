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
    
  </head>
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
                  <h4 class="card-title">Inventory</h4>
                  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalRelatedContent">New Transaction Type</button>    <p class="card-description">
                   Inventory
                  </p>
                  <div class="table-responsive">
                  <table class="table" id="table-data" style="width:100%">
              <thead>
                <tr>
                  <th>Transaction Name</th>
                  <th>Description</th>
                  <th>Details</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                 @forelse ($types as $type)
               <tr>
                  <td>{{  $type->type }}</td>
                  <td>{{  $type->description }}</td>
                  <td> <a href="#" class="btn-edit" data-toggle="modal"  data-id="{{  $type->id }}" data-target="#modalDetails" >More details</a></td>
                  <td> 
                  <button type="button" class="btn btn-success btn-sm" >
                  <a href="#" class="btn-edit" data-toggle="modal"  data-id="{{  $type->id }}" data-target="#modalEdit" >
                    <i style="color:white" class="fa fa-edit"></i>
                </a>
</button>
<button type="button" class="btn btn-danger btn-sm" >
                <a href="#" onclick="confirmDelete('{{ $type->id }}')">
                    <i class="fa fa-trash" style="color: white;"></i>
                </a>
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
<div class="modal fade right" id="modalRelatedContent" tabindex="-1" role="dialog"
  aria-labelledby="myModalLabel" aria-hidden="true" >
  <div class="modal-dialog modal-side modal-bottom-right modal-notify modal-info" role="document">
    <!--Content-->
    <div class="modal-content">
      <!--Header-->
      <div class="modal-header bg-info">
        <h4 style="color:white ;">New Trasaction Type </h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true" class="white-text">&times;</span>
        </button>
      </div>
      <!--Body-->
      <div class="modal-body">
        <div class="row">
          <div style="margin: 20px;">
            <form action="/admin/insert-type" method="post"  > 
                 @csrf
                 <div class="form-group">
            <label class="req-label">Transaction Type</label>
            <input type="hidden" name="item-id" id="item-id" placeholder="" autocomplete="off" value="" class="form-control"><br>
            <input type="text" name="type" id="type" placeholder="Enter Transaction Type" value="{{ old('type') }}" required class="form-control" style="width: 410px;">
            @error('type')
                <div class="text-red-600 text-sm">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label class="req-label">Description</label>
            <input type="text" name="desc" id="desc" placeholder="Enter Description" value="{{ old('desc') }}" class="form-control" style="width: 410px;">
            @error('desc')
                <div class="text-red-600 text-sm">{{ $message }}</div>
            @enderror
        </div>
                <div class="modal-footer d-flex justify-content-end"> 
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <x-primary-button style="background-color: #2C3B41; color: white;" class="btn">
                  {{ __('Save') }}
                </x-primary-button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
    <!--/.Content-->
  </div>
</div>
<!--Modal: modaledit-->
<div class="modal fade right" id="modalEdit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
      aria-hidden="true" data-backdrop="true">
    <div class="modal-dialog modal-side modal-bottom-right modal-notify modal-danger" role="document">
        <!-- Content -->
        <div class="modal-content">
            <!-- Header -->
            <div class="modal-header bg-info">
                <h4 style="color:white" class="heading">Update Transaction Type</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" class="white-text">&times;</span>
                </button>
            </div>
            <!-- Body -->
            <div class="modal-body">
                <div class="row">
                    <div style="margin: 20px; width: 100%;">
                        <form action="/admin/update-type" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="trans-type" class="req-label">Transaction Type</label>
                                <input type="hidden" name="id" id="id" value="">
                                <input type="text" class="form-control" name="trans-type" id="trans-type"
                                    placeholder="Enter Transaction Type" value="{{ old('trans-type') }}" required>
                                @error('trans-type')
                                <div class="text-red-600 text-sm">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="trans-desc" class="req-label">Description</label>
                                <textarea class="form-control desc-text" name="trans-desc" id="trans-desc"
                                    placeholder="Enter Transaction Type">{{ old('trans-desc') }}</textarea>
                                @error('trans-desc')
                                <div class="text-red-600 text-sm">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="modal-footer d-flex justify-content-end">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <x-primary-button style="background-color: #2C3B41; color: white;" class="btn">
                                    {{ __('Update') }}
                                </x-primary-button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<!--Modal: modaledit-->
 <div class="modal fade right" id="modalDetails" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
      aria-hidden="true" data-backdrop="true">
  <div class="modal-dialog modal-side modal-bottom-right modal-notify modal-danger" role="document">
        <!--Content-->
    <div class="modal-content">
          <!--Header-->
            <div class="modal-header">
              <h4 style="color:white" class="heading">Update Transaction Type</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true" class="white-text">&times;</span>
              </button>
            </div>
          <!--Body-->
            <div class="modal-body">
              <div class="row">
                <div style="margin: 20px;">
                  <div class="form-group"> <label class="req-label">Transaction Type</label><h5 id="type-details" name="y"></h5></div> 
                  <div class="form-group">  <label class="req-label">Description</label><h5 id="desc-details" ></h5> </div>
                </div>
              </div>
            </div>
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
          url: '/admin/destroy-type/' + id, 
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

  $(document).on('click', '.btn-edit', function() {
    // Get the data ID attribute from the clicked Edit button
    var id = $(this).data('id');

    // Perform AJAX request to fetch the record data based on the ID
    $.ajax({
    type: 'GET',
     url: '/admin/get-type/' + id, // Replace '/get-record/' with the correct URL from your routes file
    dataType: 'json',
    success: function(response) {
        $('#id').val(response.id);
        $('#trans-type').val(response.type);
        $('#trans-desc').val(response.description);
        $('#type-details').text(response.type);
        $('#desc-details').text(response.description);

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
