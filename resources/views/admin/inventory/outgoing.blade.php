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
                  <table class="table"  style="width:100%">
              <thead>
                <tr>
                  

                  <th>Transaction Name</th>
                  <th>Transaction Type</th>
                  <th>Description</th>
                  <th>Date Created</th>       
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody>
                 @forelse ($transactions as $transaction)
                <tr>
               
                  <td>{{ $transaction->inventory_name}}</td>
                  <td>{{ $transaction->transaction_type }}</td>
                  <td>{{ $transaction->description }}</td>
                    <td>{{ date('F d, Y g:ia', strtotime($transaction->transaction_date)) }}</td>
                  <td> 
                  <button type="button" class="btn btn-success btn-sm">
                    
                  <a href="#" class="btn-edit" data-toggle="modal"  data-id="{{ $transaction->id }}" data-target="#modalEdit" ><i class="fas fa-edit" style="color:white"></i></a>
</button>
<button type="button" class="btn btn-danger btn-sm">
                  <a href="#" onclick="confirmDelete('{{ $transaction->id }}')"><i style="color: white;" class="fas fa-trash-alt"></i></a>
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

<div class="modal fade right" id="modalRelatedContent" tabindex="-1" role="dialog"
  aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="false">
  <div class="modal-dialog modal-side modal-bottom-right modal-notify modal-info" role="document">
    <!--Content-->
    <div class="modal-content">
      <!--Header-->
      <div class="modal-header bg-info">
        <h4 style="color:white">Outgoing product</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true" class="white-text">&times;</span>
        </button>
      </div>
      <!--Body-->
      <div class="modal-body">
        <div class="row">
  <div style="margin: 20px;">

 <form action="/admin/insert-transaction" method="post" >
   <div class="modal-body">
          @csrf

          <div class="form-group">
    <input type="hidden" class="form-control" name="id-rep" id="id-rep" placeholder="" autocomplete="off" value="" style="width: 410px;">
</div>

<div class="form-group">
    <label class="req-label">Select an Item:</label>
    <select class="form-control" id="ItemId" name="ItemId" required style="width: 410px;">
        <option value="" selected disabled>Select an Item</option>
        @foreach ($items as $item)
            <option value="{{ $item->id }}">{{ $item->name }}</option>
        @endforeach
    </select>
    @error('category')
        <div class="text-red-600 text-sm">{{ $message }}</div>
    @enderror
</div>

<div class="form-group">
    <label class="req-label">Select Transaction Type:</label>
    <select class="form-control" id="transactionTypeId" name="transactionTypeId" required style="width: 410px;">
        <option value="" selected disabled>Select a Transaction Type</option>
        @foreach ($trans as $tran)
            <option value="{{ $tran->id }}">{{ $tran->type }}</option>
        @endforeach
    </select>
    @error('category')
        <div class="text-red-600 text-sm">{{ $message }}</div>
    @enderror
</div>

<div class="form-group">
    <label class="req-label">Transaction date</label>
    <input type="date" class="form-control" id="transaction_date" name="transaction_date" placeholder="Enter Transaction Date" autocomplete="off" value="" style="width: 410px;">
    @error('transaction-date')
        <div class="text-red-600 text-sm">{{ $message }}</div>
    @enderror
</div>

<div class="form-group">
    <label class="req-label">Quantity</label>
    <input type="number" class="form-control" id="quantity" name="quantity" placeholder="Enter Quantity" autocomplete="off" value="" style="width: 410px;">
    @error('quantity')
        <div class="text-red-600 text-sm">{{ $message }}</div>
    @enderror
</div>

<div class="form-group">
    <label class="req-label">Description </label>
    <input type="text" class="form-control" id="description" name="description" placeholder="Enter Description" autocomplete="off" value="" style="width: 410px;">
    @error('resource_need')
        <div class="text-red-600 text-sm">{{ $message }}</div>
    @enderror
</div>


        </div>

          <div class="modal-footer d-flex justify-content-end">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <x-primary-button id="addRecord" style="background-color: #2C3B41; color: white;" class="btn">
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


 <div class="modal fade right" id="modalEdit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
      aria-hidden="true" data-backdrop="true">
      <div class="modal-dialog modal-side modal-bottom-right modal-notify modal-danger" role="document">
        <!--Content-->
        <div class="modal-content">
          <!--Header-->
          <div class="modal-header bg-info">
             <h4 style="color: White;">Update outgoing product</h4>

            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true" class="white-text">&times;</span>
            </button>
          </div>

       <form action="/admin/update-transaction" method="post" >
         <div class="modal-body">
                @csrf

                <div class="form-group">
            <input type="hidden" name="transid" id="transid">
            <input type="hidden" name="id" id="id" placeholder="" autocomplete="off" value="">
        </div>
        <div class="form-group">
            <label class="req-label">Update Item:</label>
            <h4 id="name" name="name"></h4>
            @error('category')
            <div class="text-red-600 text-sm">{{ $message }}</div><br>
            @enderror
        </div>
        <div class="form-group">
            <label class="req-label">Select Transaction Type:</label>
            <select class="form-control" id="transactionTypeId" name="transactionTypeId" required style="width: 410px;">
                <option value="" selected disabled>Select a Transaction Type</option>
                @foreach ($trans as $tran)
                    <option value="{{ $tran->id }}">{{ $tran->type }}</option>
                @endforeach
            </select>
            @error('category')
            <div class="text-red-600 text-sm">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label class="req-label">Transaction date</label>
            <input type="date" class="form-control" id="transdate" name="transdate" placeholder="Enter Transaction Date" autocomplete="off" value=""><br>
            @error('transaction-date')
            <div class="text-red-600 text-sm">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label class="req-label">Description </label>
            <input type="text" class="form-control" id="desc" name="desc" placeholder="Enter Description" autocomplete="off" value=""><br>
            @error('resource_need')
            <div class="text-red-600 text-sm">{{ $message }}</div>
            @enderror
        </div>
        </div>

        <div class="modal-footer d-flex justify-content-end">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <x-primary-button id="addRecord" style="background-color: #2C3B41; color: white;" class="btn">
        {{ __('Update ') }}
      </x-primary-button>
       
        </div>
  
  </form>

      </div>
    </div>
    <!--Modal: modalDiscount-->


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
    // Set a global variable for the base URL
    var baseUrl = "{{ url('/') }}";
</script>
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
           url: '/admin/destroy-transaction/' + id, 
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
        error: function (jqXHR, textStatus, errorThrown) {
    // Display error message with details
    Swal.fire(
      'Error!',
      'An error occurred while deleting the request. ' + textStatus + ': ' + errorThrown,
      'error'
    );
    // Log the error to the console
    console.error(jqXHR);
    'dd'
    console.error(textStatus);
    'ee'
    console.error(errorThrown);
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
     url: '/admin/get-transaction/' + id, // Replace '/get-record/' with the correct URL from your routes file
    dataType: 'json',
    success: function(response) {
        //Update the modal fields with the fetched data
        var ItemName= response.inv_name;
        var type= response.type;
        $('#name').text(response.inv_name);
        $('#transid').val(response.id);
        $('#id').val(response.id);
        
        $('#ItemId').val(response.ItemId);
        $('#ItemId option').filter(function() {
            return $(this).text() === ItemName;
        }).prop('selected', true);
        $('#transactionTypeId option').filter(function() {
            return $(this).text() === type;
        }).prop('selected', true);
        
        $('#transactionTypeId ').val(response.ItemId);
        $('#transactionTypeId  option').filter(function() {
            return $(this).text() === ItemName;
        }).prop('selected', true);

        $('#transdate').val(response.transaction_date);
        $('#desc').val(response.description);
        $('#quan').val(response.quantity);
        $('#purpose-label').val(response.purpose)
       
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

    @if(session('error'))
      <script>

          Swal.fire({
              icon: 'error',
              title: 'Error',
              text: '{{ session('error') }}'
          });
      </script>
      @endif

    <script>