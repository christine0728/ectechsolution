<nav class="navbar navbar-expand-lg" style="background-color: #1c1c1c;">
    <div class="container">
        <a class="navbar-brand" href="#">
            <span class="text-warning">Glow&</span><span style="color:white;">Glam</span>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">

            <li class="nav-item {{ request()->is('landing') ? 'active' : '' }}">
                    <a class="nav-link" href="/landing">Home</a>
                </li>

                <li class="nav-item {{ request()->is('user/about') ? 'active' : '' }}">
                    <a class="nav-link" href="/user/about">About</a>
                </li>

                <li class="nav-item {{ request()->is('user/services') ? 'active' : '' }}">
                    <a class="nav-link" href="/user/services">Service</a>
                </li>

                <li class="nav-item {{ request()->is('user/appointment') ? 'active' : '' }}">
    <a class="nav-link" href="/user/appointment">Appointment</a>

                </li>

                @guest
                <!-- Display login link for guest users -->
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}">{{ __('Log In') }}</a>
                </li>

                @else
                <!-- Display logout link for authenticated users -->

                <li class="nav-item {{ request()->is('user/appointment-history') ? 'active' : '' }}">
                    <a class="nav-link" href="/user/appointment-history">Appointmen History</a>
                </li>

                <li class="nav-item" style="color: ">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <x-dropdown-link :href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();">
                            Logout
                        </x-dropdown-link>
                    </form>
                </li>

                <li class="nav-item">
                    <div class="icon" onclick="toggleNotifi()">
                        <img src="/assets/img/notif.png" alt="" style="width:40px; margin-bottom:10px"> <span>{{$unread}}</span>
                    </div>
                    <div class="notifi-box" id="box" style="height: 300px; overflow-y: auto;">
    <h2>Notifications <span>{{$unread}}</span></h2>

    @forelse($notifications as $notification)
        @php
            $isNew = !$notification->read_at; // Check if the notification is new
        @endphp
        <div class="notification-item {{ $notification->read_at ? 'read' : 'unread' }}" style="margin-bottom: 10px; padding: 10px; border: 1px solid #eee; border-radius: 5px; display: flex; align-items: center;">
            <!-- Profile Picture for Notification -->
            <img src="{{ asset('images/notification-bell.png') }}" alt="Profile Picture" style="border-radius: 50%; width: 30px; height: 30px; margin-right: 5px;">

            <div class="notification-content" style="font-size: 10px; /* Set your desired font size here */">
                <a href="{{ 
                        $notification->data['nameNotif'] === 'report' ? '/mdrrmo/Sendreport' : 
                        ($notification->data['nameNotif'] === 'has responded to your appointment' ? '/user/respond/' . $notification->id : 
                        ($notification->data['nameNotif'] === 'has responded to your request' ? '/mdrrmo/response-notifs/'.$notification->id : 
                        ($notification->data['nameNotif'] === 'has send a file' ? '/mdrrmo/memo-notifs/'.$notification->id  : '/mdrrmo/dashboard')))
                    }}" style="text-decoration: none; color: #333;">

                    <span style="font-weight: bold;">[{{ $notification->created_at->diffForHumans() }}]</span>
                    @if($isNew)
                    <span class="new-notification-label" style="background-color: #007bff; color: #fff; border-radius: 3px; padding: 2px 5px; font-size: 11px; margin-right: 5px;">New</span>
                    @endif
                    <span class="text">{{ ucfirst($notification->data['username']) }} {{ $notification->data['nameNotif'] }}. </span>
                </a>
            </div>
        </div> 
    @empty
        <p class="no-notifications" style="margin-top: 20px; text-align: center; color: white; font-size: 12px;">There are no new notifications</p>
    @endforelse
</div>


                </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>

<script>
    var box = document.getElementById('box');
    var down = false;

    function toggleNotifi() {
        if (down) {
            box.style.height = '0px';
            box.style.opacity = 0;
            down = false;
        } else {
            box.style.height = '510px';
            box.style.opacity = 1;
            down = true;
        }
    }
</script>
