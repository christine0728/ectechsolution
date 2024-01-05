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
                  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalRelatedContent" style="background-color: #3074ff">New Item</button> <p></p>
                   <p class="card-description">
                   Inventory
                  </p>
                  <div class="table-responsive">
                    <table class="table">
                    <thead>
                <tr>
                  <th>Item Name</th>
                  <th>Current Quantity</th>
                  <th>location</th>
                  <th>Category</th>
                  <th>Image</th>
                  <th>Current quantity updated</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody>
                 @forelse ($inventory as $inventories)
                <tr>
                  <td>{{ $inventories->name }}</td>
                  <td>{{ $inventories->current_quantity}}</td>
                  <td>{{ $inventories->location}}</td>
                 
                  <td>{{ $inventories->category_name}}</td>
                  <td>
                      @if($inventories->image)
                         <a href="{{ route('download-pic', ['filename' => $inventories->image]) }}" target="_blank"><img src="{{ asset('uploads/inventory/' . $inventories->image) }}" width="50px" height="50px"></a>
                      @else
                          <img src="{{ asset('uploads/inventory/default.png') }}" width="40px" height="40px">
                      @endif
                  </td>
                  <td>{{ $inventories->item_updated}}</td>
          <!--         <td>
                      <a href="#" class="btn-edit" data-toggle="modal" data-id="{{ $inventories->id }}" data-target="#modalEdit" >More details</a>
                  </td> -->
                  <td> 
                  <button type="button" class="btn btn-primary btn-sm" >
                      <a href="#" class="btn-edit" data-toggle="modal"  data-id="{{ $inventories->id }}" data-target="#modalAdd" ><i style="color: white;" class="fas fa-plus"></i>
</a>
                      </button>
                  <button type="button" class="btn btn-success btn-sm" >
                      <a href="#" class="btn-edit" data-toggle="modal"  data-id="{{ $inventories->id }}" data-target="#modalEdit" ><i class="fa fa-edit" style="color:white"></i></a>
</button>
<button type="button" class="btn btn-danger btn-sm" >
                      <a href="#" onclick="confirmDelete('{{ $inventories->id }}')"><i style="color:white;" class="fas fa-trash-alt"></i></a>
                      </button>
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

<!-- Button to Trigger the Modal -->
<!-- Modal: modalRelatedContent -->
<div class="modal fade" id="modalRelatedContent" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-right modal-dialog-bottom modal-dialog-notify modal-dialog-info" role="document">
    <!-- Content -->
    <div class="modal-content">
      <!-- Header -->
      <div class="modal-header bg-info text-white">
        <h4 class="modal-title">New Item</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <!-- Body -->
      <div class="modal-body">
        <div class="row">
        <form action="/admin/insert-item" method="post" enctype="multipart/form-data" class="container-fluid">
    @csrf
    <div class="form-group">
        <label class="req-label">Item Name</label>
        <input type="text" name="item-name" class="form-control" placeholder="Enter Item Name" autocomplete="off" value="{{ old('item-name') }}">
        @error('item-name')
        <div class="text-red-600 text-sm">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-group">
        <label class="req-label">Item Description</label>
        <textarea name="item_desc" class="form-control" id="item-desc" placeholder="Enter Item Description" autocomplete="off">{{ old('item_desc') }}</textarea>
        @error('item_desc')
        <div class="text-red-600 text-sm">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-group">
        <label class="req-label">Select a Category:</label>
        <select id="category" name="category" class="form-control">
            <option value="" selected disabled>Select a category</option>
            <?php foreach ($categories as $category): ?>
                <option value="<?= $category['id'] ?>"><?= $category['name'] ?></option>
            <?php endforeach; ?>
        </select>
        @error('category')
        <div class="text-red-600 text-sm">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-group">
        <label class="req-label">Select a Supplier:</label>
        <select id="supplier" name="supplier" class="form-control">
            <option value="" selected disabled>Select a supplier</option>
            <?php foreach ($suppliers as $supplier): ?>
                <option value="<?= $supplier['id'] ?>"><?= $supplier['name'] ?></option>
            <?php endforeach; ?>
        </select>
        @error('supplier')
        <div class="text-red-600 text-sm">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-group">
        <label class="req-label">Current Quantity</label>
        <input type="number" id="quantity" name="quantity" min="0" step="1" class="form-control">
        @error('quantity')
        <div class="text-red-600 text-sm">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-group">
    <label for="">Upload Image</label>
    <input type="file" name="image" id="image" class="form-control" accept="image/*">
    @error('image')
    <div class="text-red-600 text-sm">{{ $message }}</div>
    @enderror
</div>

    <div class="form-group">
        <label class="req-label">Location</label>
        <input type="text" name="location" class="form-control" placeholder="Enter location" autocomplete="off" value="{{ old('location') }}">
        @error('location')
        <div class="text-red-600 text-sm">{{ $message }}</div>
        @enderror
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save</button>
    </div>
</form>

        </div>
      </div>
    </div>
    <!--/.Content-->
  </div>
</div>

<!--Modal: modalRelatedContent-->


 <div class="modal fade right" id="modalEdit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
      aria-hidden="true" data-backdrop="true">
      <div class="modal-dialog modal-side modal-bottom-right modal-notify modal-danger" role="document">
        <!--Content-->
        <div class="modal-content">
          <!--Header-->
          <div class="modal-header bg-primary">
            <h4 style="color:white">Update Item </h4>

            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true" class="white-text">&times;</span>
            </button>
          </div>

          <!--Body-->
      
         <form action="/admin/update-item" method="post" enctype="multipart/form-data">
           <div class="modal-body">
                  @csrf
                  <input type="hidden"class="form-control"  name="itemid" id="itemid" > 
            <div class="form-group" style="width: 100%">
              <label class="req-label">Item Name</label>

              <input type="text"class="form-control"  name="item-name" id="item-name" placeholder="Enter  name" autocomplete="off" value="" required>
                   @error('item-name')
              <div class="text-red-600 text-sm">{{ $message }}</div>
              @enderror
            </div>
              <div class="form-group" style="width: 100%">
              <label class="req-label">Item description</label>
              <textarea style="width: 100%" class="form-control" type="text" id="itemdesc" name="itemdesc" placeholder="Enter Item description" autocomplete="off" value=""><br> </textarea>
              @error('item-desc')
              <div class="text-red-600 text-sm">{{ $message }}</div>
              @enderror
            </div>
            <div class="form-group" style="width: 100%">
              <label class="req-label">Current Quantity</label>
              <input type="number" name="quan" class="form-control" id="quan" placeholder="Enter location" autocomplete="off" value="">
              @error('quantity')
              <div class="text-red-600 text-sm">{{ $message }}</div><br>
              @enderror
            </div>
            <div class="form-group" style="width: 100%">
            <label class="req-label">Select a Supplier:</label>
            <select id="supplier" name="supplier" class="form-control" required>
              <option value="" selected disabled>Select a supplier</option>
                            <?php foreach ($suppliers as $supplier): ?>
                  <option value="<?= $supplier['id'] ?>"><?= $supplier['name'] ?></option>
              <?php endforeach; ?>
          </select>
            @error('supplier')
            <div class="text-red-600 text-sm">{{ $message }}</div><br>
            @enderror
          </div>
            <div class="form-group" style="width: 100%">
            <label class="req-label">Select a Category:</label>
            <select id="category" name="category" class="form-control" required>
              <option value="" selected disabled>Select a category</option>
              
              <?php foreach ($categories as $category): ?>
                  <option value="<?= $category['id'] ?>"><?= $category['name'] ?></option>
              <?php endforeach; ?>
          </select>
            @error('category')
            <div class="text-red-600 text-sm">{{ $message }}</div><br>
            @enderror
          </div>
          <div class="form-group">
    <label for="">Upload Image</label>
    <input type="file" name="image" id="image" class="form-control" accept="image/*">
    @error('image')
    <div class="text-red-600 text-sm">{{ $message }}</div>
    @enderror
</div>
            <div class="form-group" style="width: 100%"s>
              <label class="req-label">Location</label>
              <input type="text" id="location" name="location" class="form-control" placeholder="Enter location" autocomplete="off" value=""><br>
              @error('location')
              <div class="text-red-600 text-sm">{{ $message }}</div>
              @enderror
            </div>
        </div>

        <div class="modal-footer d-flex justify-content-end">

        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <x-primary-button id="updateRecord" style="background-color: #3074ff; color: white;" class="btn">
        {{ __('Update Item') }}
      </x-primary-button>
          
        </div>
  
  </form>
      </div>
    </div>
  </div>


  <div class="modal fade right" id="modalAdd" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="true">
    <div class="modal-dialog modal-side modal-bottom-right modal-notify modal-danger" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h4 class="modal-title" style="color:white">New Assistance request</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form action="/admin/add-item" method="post">
                @csrf
                <div class="modal-body">
                <div class="form-group" style="width: 100%">
              <label class="req-label">Current Quantity</label>
              <input type="hidden"class="form-control"  name="item-id" id="item-id" required> 
              <input type="number" name="quantity-label" class="form-control" id="quantity-label" placeholder="Enter location" autocomplete="off" value="">
              <input type="number" name="quantity-add" class="form-control" id="quantity-add" placeholder="Enter location" autocomplete="off" value="">
         
              @error('quantity')
              <div class="text-red-600 text-sm">{{ $message }}</div><br>
              @enderror
            </div>
                </div>
                <div class="modal-footer d-flex justify-content-end">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
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
    url: '/admin/get-item/' + id, // Replace '/get-record/' with the correct URL from your routes file
    dataType: 'json',
    success: function(response) {
        //Update the modal fields with the fetched data
       var categoryName = response.category_name;
       var SupplierName = response.supplier_name;

      
       $('#itemid').val(response.id);
       $('#item-id').val(response.id);
         var imageUrl = "{{ asset('uploads/inventory') }}/" + response.image;
         $('#inventoryImage').attr('src', imageUrl);
        $('#item-id').val(response.id);
        $('#item-name').val(response.name);
       $('#category').val(response.category_id);
         $('#category option').filter(function() {
            return $(this).text() === categoryName;
        }).prop('selected', true);
        
        $('#supplier').val(response.category_id);
        $('#supplier option').filter(function() {
            return $(this).text() === SupplierName;
        }).prop('selected', true);
        $('#itemdesc').val(response.description);
        $('#quan').val(response.current_quantity);
        $('#quantity-label').val(response.current_quantity);
        $('#location').val(response.location);

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