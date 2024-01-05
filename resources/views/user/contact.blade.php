<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18/dist/sweetalert2.all.min.js"></script>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  </head>
  <body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container">
    <a class="navbar-brand" href="#"> <span class="text-warning">Glow&</span> Glam</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
    
        <li class="nav-item">
          <a class="nav-link" href="/landing">Home</a>
        </li>

    
        <li class="nav-item">
          <a class="nav-link" href="/user/about">About</a>
        </li>
 
    
        <li class="nav-item">
          <a class="nav-link" href="/user/services">Service</a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="/user/appointment">Appointment</a>
        </li>
        <li class="nav-item">
        @guest
    <!-- Display login link for guest users -->
        <li class="nav-item">
          <a class="nav-link" href="{{ route('login') }}">{{ __('Log In') }}</a>
        </li>

        @else
          <!-- Display logout link for authenticated users -->

 

        <li class="nav-item">
          <a class="nav-link" href="/user/appointment-history">Appointmen History</a>
        </li>
        <li class="nav-item">
              <form method="POST" action="{{ route('logout') }}">
                  @csrf
                  <x-dropdown-link :href="route('logout')"
                      onclick="event.preventDefault(); this.closest('form').submit();">
                      {{ __('Log Out') }}
                  </x-dropdown-link>
              </form>
        </li>
          @endguest
        </li>
 
      </ul>
    </div>
  </div>
</nav>

	<!-- services section Starts -->
	<section class="services section-padding" id="services">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="section-header text-center pb-5">
						<h2>Our Services</h2>
						<p>Lorem ipsum dolor sit amet, consectetur<br>
						adipisicing elit. Non, quo.</p>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-12 col-md-12 col-lg-4">
					<div class="card text-white text-center bg-dark pb-2">
						<div class="card-body">
							<i class="bi bi-laptop"></i>
							<h3 class="card-title">Best Quality</h3>
							<p class="lead">Lorem ipsum dolor sit amet consectetur adipisicing elit. Adipisci eligendi modi temporibus alias iste. Accusantium?</p><button class="btn bg-warning text-dark">Read More</button>
						</div>
					</div>
				</div>
				<div class="col-12 col-md-12 col-lg-4">
					<div class="card text-white text-center bg-dark pb-2">
						<div class="card-body">
							<i class="bi bi-journal"></i>
							<h3 class="card-title">Sustainability</h3>
							<p class="lead">Lorem ipsum dolor sit amet consectetur adipisicing elit. Adipisci eligendi modi temporibus alias iste. Accusantium?</p><button class="btn bg-warning text-dark">Read More</button>
						</div>
					</div>
				</div>
				<div class="col-12 col-md-12 col-lg-4">
					<div class="card text-white text-center bg-dark pb-2">
						<div class="card-body">
							<i class="bi bi-intersect"></i>
							<h3 class="card-title">Integrity</h3>
							<p class="lead">Lorem ipsum dolor sit amet consectetur adipisicing elit. Adipisci eligendi modi temporibus alias iste. Accusantium?</p><button class="btn bg-warning text-dark">Read More</button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section><!-- services section Ends -->
	<!-- portfolio strats --><div class="container" style="margin-left: 20px;"> <!-- Add margin to the left side of the container -->
    <div class="row">
        @forelse ($services as $service)
        <div class="col-md-4 mb-2 mr-2"> <!-- Smaller margins with "mb-2" and "mr-2" classes -->
            <div class="card" style="width: 18rem;">
                @if ($service->image)
                    <a href="{{ route('download-pic', ['filename' => $service->image]) }}" target="_blank">
                        <img src="{{ asset('uploads/inventory/' . $service->image) }}" class="img-fluid img-thumbnail">
                    </a>
                @else
                    <img alt="" src="{{ asset('uploads/inventory/default.png') }}" class="img-fluid img-thumbnail">
                @endif
                <div class="card-body">
                    <h5 class="card-title">{{$service->name}}</h5>
                    <p class="card-text">{{$service->description}}</p>
                    <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
            </div>
        </div>
        @empty
            <h4>No service available</h4>
        @endforelse
    </div>
</div>


</center>
@include('user/footer')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>