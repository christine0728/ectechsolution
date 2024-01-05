<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>service</title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18/dist/sweetalert2.all.min.js"></script>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <style>
 
     
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


.container .card .image {
  position : relative;
  width : 260px;
  height : 260px;
  
  top : -10%;
  left: 8px;
 
  z-index : 1;
}

.container .card .image img {
  max-width : 100%;
  border-radius : 15px;
}
.nav-item.active {
    /* Your styling for the active link */
    background-color: #d4af37;/* Change to the text color you want */
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
  <body style="background-color: #1c1c1c;"  >

  @include('/user/nav')
<br> <br>
    <!-- services section Starts -->
    <section class="services section-padding" id="services">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-header text-center pb-5">
                        <h2 style="color:white">Our Services</h2>
                        <p style="color:white">Our salon offers a welcoming and tranquil atmosphere, allowing you to unwind and enjoy your experience.</p>
                    </div>
                </div>
            </div>
            </div>
            <div class="container">
            <div class="row">
        @forelse ($services as $service)
        <div class="col-lg-4 col-md-6 col-sm-12">
            <div class="card" style ="background: #d4af37">
                <div class="image">
                    @if ($service->image)
                        <a href="{{ route('download-pic', ['filename' => $service->image]) }}" target="_blank" style="width: 100%; height: 60%; overflow: hidden;">
                            <img src="{{ asset('uploads/inventory/' . $service->image) }}" alt="Image Description" style="width: 400px; height: 200px; object-fit: cover;">
                        </a>
                    @else
                        <img alt="Image Description" src="{{ asset('assets/img/default.jpg') }}" style="width: 100%; height: 60%; object-fit: cover;">
                    @endif
                </div>
                <div class="content">
                  <br><br>
                    <p class="desc" style="color: white;">{{$service->price}}</p>
                    <h3 style="color: white;">{{$service->name}}</h3>
                    <a href="#" class="btn-edit" data-toggle="modal" data-target="#modalService" data-id="{{$service->id}}" > <button class="btn bg-warning text-dark">Read More</button></a>
            
                </div>
            </div>
        </div>
        @empty
        <h4>No service available</h4>
        @endforelse
    </div>
</div>

<br>

<div class="container">
    <div class="row">
        @forelse ($promos as $promo)
        <div class="col-lg-4 col-md-6 col-sm-12">
            <div class="card" style ="background: #d4af37">
                <div class="image">
                  
                             <img src="{{ asset('uploads/logo/promo.png' ) }}" alt="Image Description" style="width: 400px; height: 200px; object-fit: cover;">
               
                 
                </div>
                <div class="content">
                  <br><br>   <br><br>   
                    <p class="desc" style="color: white;">{{$promo->title}}</p>
                  
                    <a href="#" class="btn-promo" data-toggle="modal" data-target="#modalEdit" data-id="{{$promo->id}}" > <button class="btn bg-warning text-dark">Read More</button></a>
            
                </div>
            </div>
        </div>
        @empty
        <h4>No promo available</h4>
        @endforelse
    </div>
</div>

           
        </div>
    </section>


</center>
@include('user/footer')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
 $(document).on('click', '.btn-edit', function() {
    // Get the data ID attribute from the clicked Edit button
    var id = $(this).data('id');

    // Perform AJAX request to fetch the record data based on the ID
    $.ajax({
    type: 'GET',
    url: '/user/read-more/' + id, // Replace '/get-record/' with the correct URL from your routes file
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
                text: xhr,
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

<script>
 $(document).on('click', '.btn-promo', function() {
    // Get the data ID attribute from the clicked Edit button
    var id = $(this).data('id');

    // Perform AJAX request to fetch the record data based on the ID
    $.ajax({
    type: 'GET',
    url: '/user/read-promo/' + id, // Replace '/get-record/' with the correct URL from your routes file
    dataType: 'json',
    success: function(response) {
        //Update the modal fields with the fetched data
  
        $('#promo-name').text(response.title);
        console.log(response.description);
        $('#promo-desc').text(response.description);
        var endDate = new Date(response.end_date);
var formattedEndDate = endDate.toLocaleDateString('en-US', {
    year: 'numeric',
    month: 'long',
    day: 'numeric'
});

$('#enddate').text(formattedEndDate);


    },
  error: function(xhr, status, error) {
        // Check if the response status code is 404 (Not Found)
        if (xhr.status === 404) {
            // Show SweetAlert error message with the error response from the server
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: xhr,
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

<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

<!-- Modal: modalAbandonedCart-->
<div class="modal fade right" id="modalEdit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="true">
  <div class="modal-dialog modal-side modal-bottom-right modal-notify modal-info" role="document">
    <!--Content-->
    <div class="modal-content">
      <!--Header-->
      <div class="modal-header" style="background-color: #1f1f1e; color: white;">
   
      <h4 class="modal-title" id="promo-name"></h4>

        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true" class="white-text">&times;</span>
        </button>
      </div>

      <!--Body-->
      <div class="modal-body">

        <div class="row">
     
          <div class="col-9">
          <br><span id="promo-desc"></span> <br>

          <br>End date: <span id="enddate"></span>
          </div>
        </div>
      </div>

      <!--Footer-->
      <div class="modal-footer justify-content-center">

        <a type="button" class="btn" data-dismiss="modal">Close</a>
      </div>
    </div>
    <!--/.Content-->
  </div>
</div>
<!-- Modal: modalAbandonedCart-->

<!-- Modal: modalAbandonedCart-->
<div class="modal fade right" id="modalService" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="true">
  <div class="modal-dialog modal-side modal-bottom-right modal-notify modal-info" role="document">
    <!--Content-->
    <div class="modal-content">
      <!--Header-->
      <div class="modal-header" style="background-color: #1f1f1e; color: white;">
   
      <h4 class="modal-title" id="service-name"></h4>

        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true" class="white-text">&times;</span>
        </button>
      </div>

      <!--Body-->
      <div class="modal-body">

        <div class="row">

          <div class="col-9">
          <span style="font-weight: bold;">Price:</span> <br><span id="service-price"></span><br>
          <span style="font-weight: bold;">Duration:</span> <br> <span id="service-duration"></span><br>
          <span style="font-weight: bold;">Description:</span> <br><span id="service-desc"></span>

          </div>
        </div>
      </div>

      <!--Footer-->
      <div class="modal-footer justify-content-center">

        <a type="button" class="btn" data-dismiss="modal">Close</a>
      </div>
    </div>
    <!--/.Content-->
  </div>
</div>
<!-- Modal: modalAbandonedCart-->