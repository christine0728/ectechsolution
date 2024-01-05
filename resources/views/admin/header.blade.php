<div class="top-navbar">
    <nav class="navbar navbar-expand-lg" style="">
        <div class="container-fluid">

            <!-- ... (your existing code) ... -->

            <div class="collapse navbar-collapse d-lg-block d-xl-block d-sm-none d-md-none d-none" id="navbarSupportedContent">
                <ul class="nav navbar-nav ml-auto">
                    <div id="date-time-container">
                        <!-- The date and time will be dynamically updated here -->
                    </div>
                    <li class="dropdown nav-item active">
                        <a href="#" class="nav-link" data-toggle="dropdown">
                            <span class="material-icons">notifications</span>
                            <span class="notification">{{$unread}}</span>
                        </a>
                        <ul class="dropdown-menu" style="max-height: 300px; overflow-y: auto;">
                            <li>
                                @forelse($notifications as $notification)
                                    @php
                                        $isNew = !$notification->read_at; // Check if the notification is new
                                    @endphp
                                    <div class="notification-item {{ $notification->read_at ? 'read' : 'unread' }}" style="margin-bottom: 10px; padding: 10px; border: 1px solid #eee; border-radius: 5px; display: flex; align-items: center;">
                                        <!-- Profile Picture for Notification -->
                                        <img src="{{ asset('images/notification-bell.png') }}" alt="Profile Picture" style="border-radius: 50%; width: 30px; height: 30px; margin-right: 5px;">

                                        <div class="notification-content" style="font-size: 10px; /* Set your desired font size here */">
                                            <a href="{{ 
                                                $notification->data['nameNotif'] === 'report' ? '/pdrrmo/Sendreport' : 
                                                ($notification->data['nameNotif'] === 'is requesting an appointment' ? '/admin/appointment-read/' . $notification->id : 
                                                ($notification->data['nameNotif'] === 'has responded to your request' ? '/pdrrmo/response-notifs/'.$notification->id : 
                                                ($notification->data['nameNotif'] === 'has send a file' ? '/mdrrmo/memo-notifs/'.$notification->id  : '/pdrrmo/dashboard')))
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
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</div>
