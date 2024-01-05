<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>About</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.1/css/all.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat&display=swap">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <style>
      .appointm {
        color: #fddc5c
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
.nav-item.active {
    /* Your styling for the active link */
    background-color:  #d4af37;
    color:  #d4af37;
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
   z-index: 1000;
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

    <!-- services section Starts -->
    <section class="services section-padding" id="services">
    <div class="responsive-container-block bigContainer">
  <div class="responsive-container-block Container">
    <div class="responsive-container-block leftSide">
      <p class="text-blk heading" style="color: #BFA100;">
 Your premier destination for beauty and relaxation.
      </p>
      <p class="text-blk subHeading">
      At Glow and Glam, we believe in the transformative power of beauty. Our team of skilled professionals is dedicated to providing you with a rejuvenating experience that enhances both your inner and outer beauty.
      Immerse yourself in a sanctuary designed to whisk you away from the demands of daily life, inviting you to embrace the art of self-care. Whether you seek a rejuvenating haircut, a captivating color transformation, or a blissful spa experience, our seasoned experts are dedicated to surpassing your expectations with their unparalleled expertise.
    
    </p>
    <p class="appointm">Thank you for choosing Salon Name. Schedule an appointment today and let us pamper you!</p>
  <a href="/user/appointment" ><button class="appoint">Book Appointment!</button></a>
  </div>
    <div class="responsive-container-block rightSide">
      <img class="number1img" src="{{ asset('assets/img/about1.jpg') }}">
      <img class="number2img" src="{{ asset('assets/img/about2.jpg') }}">
      <img class="number3img"src="{{ asset('assets/img/about3.jpg') }}">
      <img class="number5img" src="{{ asset('assets/img/about4.jpg') }}">

      <img class="number4vid" src="{{ asset('assets/img/makeup1.jpg') }}">
      <img class="number7img"src="{{ asset('assets/img/about5.jpg') }}">
      <img class="number6img" src="{{ asset('assets/img/pic4.jpg') }}">
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
