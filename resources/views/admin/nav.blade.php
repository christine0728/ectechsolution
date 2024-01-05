
        <nav id="sidebar" style="color: white; background: black;">
            <div class="sidebar-header" style="color: white; background: black;">
                <h3><img src="/assets/img/circle.jpg" class="img-fluid"/><span style="color: white; background: #00072d;">GlowaAndGlam</span>  <center><span style="color:white;"> {{$username}}</span></center></h3>
            </div>
            <ul class="list-unstyled components">
      <li >
                    <a href="/landing" class="dashboard"  style="color: white; "><i class="material-icons"  style="color: white; ">dashboard</i><span>Dashboard</span></a>
                </li>
               
                

      <li>
      <a href="/admin/service" class="dashboard"  style="color: white; "><i class="material-icons"  style="color: white; ">build</i><span  style="color: white; "> Services</span></a>

                </li>

                <li class="dropdown">
                    <a href="#homeSubmenu1" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
          <i class="material-icons"  style="color: white; ">inventory_2</i><span  style="color: white; ">Appointment</span></a>
                    <ul class="collapse list-unstyled menu" id="homeSubmenu1">
                        <li >
                        <a href="/admin/appointment-list" class="dashboard"  style="color: white; "><i class="material-icons"  style="color: white; ">event</i><span>List of Appointment</span></a>

                        </li>
                        <li >
                        <a href="/admin/pastAppointment"  style="color: white; " class="dashboard"><i class="material-icons"  style="color: white; ">event</i><span>Past Appointment</span></a>

                        </li>
                    </ul>
                </li>
                <li >
                <a href="/admin/promo" class="dashboard"><i class="material-icons"  style="color: white; ">local_offer</i><span  style="color: white; "> Promo</span></a>

                </li>
          <div class="small-screen navbar-display">
                <li class="dropdown d-lg-none d-md-block d-xl-none d-sm-block">
                    <a href="#homeSubmenu0" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
          <i class="material-icons" style="">notifications</i><span> 4 notification</span></a>
                    <ul class="collapse list-unstyled menu" id="homeSubmenu0">
                                    <li>
                                    <a href="#">You have 5 new messages</a>
                                    </li>
                                    <li>
                                        <a href="#">You're now friend with Mike</a>
                                    </li>
                                    <li>
                                        <a href="#">Wish Mary on her birthday!</a>
                                    </li>
                                    <li>
                                        <a href="#">5 warnings in Server Console</a>
                                    </li>
                    </ul>
                </li>
  
                <li class="dropdown">
                    <a href="#pageSubmenu2" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                    <i class="material-icons"  style="color: white; ">aspect_ratio</i><span  style="color: white; ">Inventory</span></a>
                    <ul class="collapse list-unstyled menu" id="pageSubmenu2">
                        <li>
                            <a href="/admin/item"  style="color: white; ">Item</a>
                        </li>
                        <li>
                            <a href="/admin/supplier"  style="color: white; ">Supplier</a>
                        </li>
                        <li>
                            <a href="/admin/category"  style="color: white; ">Category</a>
                        </li>
                        <li>
                            <a href="/admin/outgoing"  style="color: white; ">Outgoing Item</a>
                        </li>
                        <li>
                            <a href="/admin/transaction"  style="color: white; ">Transaction Type</a>
                        </li>
                    </ul>
                </li>
      
            
                
                <li >
                <form method="POST" action="{{ route('logout') }}">
                  @csrf
                  <x-dropdown-link :href="route('logout')"  style="color: white; "
                      onclick="event.preventDefault(); this.closest('form').submit();">
                      {{ __('Log Out') }}
                  </x-dropdown-link>
              </form>     </li>

        
  
        
      
         
               
               
            </ul>

           
        </nav>