        <!-- ====================================
          ——— LEFT SIDEBAR WITH OUT FOOTER
        ===================================== -->
        <aside class="left-sidebar sidebar-dark" id="left-sidebar">
          <div id="sidebar" class="sidebar sidebar-with-footer">
            <!-- Aplication Brand -->
            <div class="app-brand">
              <a href="#" style="padding:0px">
              <img src="{{asset('Assets/images/logowvsu3.png')}}" class="img-fluid" width="100" alt="ARM">
                <span class="brand-name"> <b>A.R.M</b> </span>
              </a>
            </div>
            <!-- begin sidebar scrollbar -->
            <div class="sidebar-left" data-simplebar style="height: 100%;">
              @if(session()->get('Designation') == 'Administrator')
              <!-- sidebar menu -->
              <ul class="nav sidebar-inner" id="sidebar-menu">

                  <li class="{{$NavActive == 'DashboardNav' ? 'active' : ''}}">
                    <a class="sidenav-item-link" href="{{route('AdminDashboard')}}">
                      <i class="mdi mdi-chart-line"></i>
                      <span class="nav-text">Dashboard</span>
                    </a>
                  </li>

                
                  <li class="section-title">
                    Components
                  </li>
                
                  <li  class="has-sub {{$NavActive == 'DeviceList' ? 'active' : ''}}" >
                    <a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse" data-target="#devices"
                      aria-expanded="false">
                      <i class="mdi mdi-chip"></i>
                      <span class="nav-text">Device List</span> <b class="caret"></b>
                    </a>
                    @livewire('DeviceListLivewire')
                  </li>
                 

                  <li class="{{$NavActive == 'DeviceManagement' ? 'active' : ''}}">
                    <a class="sidenav-item-link" href="{{route('DeviceManagement')}}">
                      <i class="mdi mdi-database-check"></i>
                      <span class="nav-text">Device Management</span>
                    </a>
                  </li>


                  <li class="{{$NavActive == 'UserNav' ? 'active' : ''}}">
                    <a class="sidenav-item-link" href="{{route('AdminUserList')}}">
                    <i class="mdi mdi-account-group"></i>
                      <span class="nav-text">User List</span>
                    </a>
                  </li>
                  
              </ul>
              @else
              <ul class="nav sidebar-inner" id="sidebar-menu">

                  <li class="{{$NavActive == 'DashboardNav' ? 'active' : ''}}">
                    <a class="sidenav-item-link" href="{{route('ClientDashboard')}}">
                      <i class="mdi mdi-chart-line"></i>
                      <span class="nav-text">Dashboard</span>
                    </a>
                  </li>

                
                  <li class="section-title">
                    Components
                  </li>
                
                  <li  class="has-sub {{$NavActive == 'DeviceList' ? 'active' : ''}}" >
                    <a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse" data-target="#devices"
                      aria-expanded="false">
                      <i class="mdi mdi-chip"></i>
                      <span class="nav-text">Device List</span> <b class="caret"></b>
                    </a>
                    @livewire('ClientDeviceListLivewire')
                  </li>
                 

                  <li class="{{$NavActive == 'DeviceManagement' ? 'active' : ''}}">
                    <a class="sidenav-item-link" href="{{route('ClientDeviceManagement')}}">
                      <i class="mdi mdi-database-check"></i>
                      <span class="nav-text">Device Management</span>
                    </a>
                  </li>

                  <li class="{{$NavActive == 'AboutUs' ? 'active' : ''}}">
                    <a class="sidenav-item-link" href="{{route('AboutUs')}}">
                      <i class="mdi mdi-comment-question"></i>
                      <span class="nav-text">About Us</span>
                    </a>
                  </li>

                  <li class="{{$NavActive == 'ContactUs' ? 'active' : ''}}">
                    <a class="sidenav-item-link" href="{{route('ContactUs')}}">
                      <i class="mdi mdi-phone-in-talk"></i>
                      <span class="nav-text">Contact Us</span>
                    </a>
                  </li>

              </ul>
              @endif

            </div>
          </div>
        </aside>

