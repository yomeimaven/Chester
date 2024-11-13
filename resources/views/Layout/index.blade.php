<!DOCTYPE html>

<html lang="en">
  @include('Layout.head')
  <body class="navbar-fixed sidebar-fixed" id="body">
    

    
    <!-- ====================================
    ——— WRAPPER
    ===================================== -->
    <div class="wrapper">
      
      
       @include('Layout.sidebar')

      <!-- ====================================
      ——— PAGE WRAPPER
      ===================================== -->
      <div class="page-wrapper"> 
          <!-- Header -->
          <header class="main-header" id="header">
            <nav class="navbar navbar-expand-lg navbar-light" id="navbar">
              <!-- Sidebar toggle button -->
              <button id="sidebar-toggler" class="sidebar-toggle">
                <span class="sr-only">Toggle navigation</span>
              </button>

              <div class="navbar-right ">

                <ul class="nav navbar-nav">
                  <!-- Offcanvas -->

                  <!-- User Account -->
                  <li class="dropdown user-menu">
                    <button class="dropdown-toggle nav-link" data-toggle="dropdown">
                      <img src="{{asset('Assets/images/user/user-xs-01.jpg')}}" class="user-image rounded-circle" alt="User Image" />
                      <span class="d-none d-lg-inline-block" id="Name">{{session()->get('Name')}}</span>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-right">
                      <li>
                        <a class="dropdown-link-item" href="{{route('DeviceManagement')}}">
                          <i class="mdi mdi-chip"></i>
                          <span class="nav-text">My Devices</span>
                        </a>
                      </li>
                      <li>
                        <a class="dropdown-link-item" href="#" data-toggle="modal" data-target="#changepassword">
                          <i class="mdi mdi-settings"></i>
                          <span class="nav-text">Change Password</span>
                        </a>
                      </li>
                      <li>
                      <a class="dropdown-link-item" href="#" data-toggle="modal" data-target="#logoutModal"> <i class="mdi mdi-logout"></i> <span class="nav-text">Log Out</span> </a>
                      </li>
                    </ul>
                  </li>
                </ul>
              </div>
            </nav>


          </header>

        <!-- ====================================
        ——— CONTENT WRAPPER
        ===================================== -->
        <div class="content-wrapper">

          @yield('content')
          
        </div>

        <!-- Logout Modal -->
        <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="logoutModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="logoutModalLabel">Confirm Logout</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        Are you sure you want to log out?
                    </div>
                    <div class="modal-footer">
                        <a href="{{route('Logout')}}" class="btn btn-danger btn-sm"><b>Logout</b></a>
                        <button type="button" class="btn btn-light btn-sm" data-dismiss="modal"><b>Cancel</b></button>
                        
                    </div>
                </div>
            </div>
        </div>

        <!-- Change Password -->
        <div class="modal fade" id="changepassword" tabindex="-1" role="dialog" aria-labelledby="changepassword" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Change Password</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{route('ChangePassword')}}" method="post">
                          @csrf
                          <input type="hidden" name="Name" value="{{session()->get('Name')}}">
                          <div class="form-group">
                              <label for="">Current Password:</label>
                              <input type="text" id="Current" onchange="checkPassword()" name="Current" class="form-control" placeholder="Enter Current Password" required>
                              <small id="CurrentErr" class="text-danger" style="display:none">Incorrect Password</small>
                            </div>
                          <div class="form-group">
                              <label for="">New Password:</label>
                              <input id="Npassword" type="password" name="Npassword" class="form-control" placeholder="Enter New Password" required>
                            </div>
                          <div class="form-group">
                              <label for="">Confirm Password:</label>
                              <input id="Cpassword" type="text" onchange="confirmPassword()" name="Cpassword" class="form-control" placeholder="Enter New Password" required>
                              <small id="ConfirmErr" class="text-danger" minlength="5" style="display:none">Password Do not match!</small>
                            </div>
                       
                    </div>
                    <div class="modal-footer">
                        <button type="submit" id="submitchange" class="btn btn-success btn-sm"><b>Confirm</b></button>
                        <button type="button" class="btn btn-light btn-sm" data-dismiss="modal"><b>Cancel</b></button>
                        
                    </div>
                    </form>
                </div>
            </div>
        </div>
        
          <!-- Footer -->
          <footer class="footer mt-auto">
            <div class="copyright bg-white">
              <p>
                 <span id="copy-year"></span>BS INFORMATION TECHNOLOGY WVSU-HCC. 2024
              </p>
            </div>
          </footer>

      </div>
    </div>
    @include('Layout.script')
  </body>
</html>
