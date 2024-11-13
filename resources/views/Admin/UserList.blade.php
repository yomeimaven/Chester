@extends('Layout.index')
@section('content')
<div class="content">
                  @if(Session::has('success'))
                  <div class="row">
                    <div class="col-md-8"></div>
                    <div class="col-md-4">
                      <div id="auto-close-alert" class="alert alert-success alert-dismissible fade show alert-icon" role="alert">
                      <i class="mdi mdi-checkbox-marked-outline"></i>
                      <small><strong>Success!</strong> {{session()->get('success')}}</small>
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                      </button>
                     </div>
                    </div>
                  </div>
                  @endif  

                <nav>
                    <ol class="breadcrumb" style="border:none; padding:0">
                    <li class="breadcrumb-item">  <a href="#">Dashboard  </a>  </li>
                    <li class="breadcrumb-item active" aria-current="page">User List  </li>
                    </ol>
                </nav>


                <!-- Table Product -->
                <div class="row">
                  <div class="col-md-12">
                    <div class="card card-default">
                    <div class="card-header align-items-center">
                        <h2 class="">User List</h2>
                        <a href="#" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#AddUser">
                        <i class="mdi mdi-account-plus"></i> 
                          Add User</a>
                      </div>
                      <div class="card-body">
                      <table id="dataTable" class="table table-bordered table-striped table-hover text-center table-md">
                          <thead class="bg-dark">
                            <tr>
                              <th class="text-white">No</th>
                              <th class="text-white">Name</th>
                              <th class="text-white">Address</th>
                              <th class="text-white">Contact Number</th>
                              <th class="text-white">Date Registered</th>
                              <th class="text-white">Status</th>
                              <th class="text-white">Action</th>
                            </tr>
                          </thead>
                        @livewire('UserListLivewire')
                        </table>

                      </div>
                    </div>
                  </div>
                </div>

</div>

              <div class="modal fade" id="AddUser" tabindex="-1" role="dialog"
                aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalFormTitle"><i class="mdi mdi-account-plus"></i> Add User</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <form method="post" action="{{route('SubmitAddUser')}}">
                        @csrf
                        <div class="row">
                          <div class="col-md-6">
                          <div class="form-group">
                          <label for="exampleInputEmail1">Name: </label>
                          <input type="text" name="Name" class="form-control" placeholder="Enter Name: Juan S. Delacruz" required> 
                        </div>
                        <div class="form-group">
                          <label for="exampleInputEmail1">Address: </label>
                          <input type="text" name="Address" class="form-control"
                            placeholder="Enter Address: Sitio, Barangay, City/Municipality" required>
                        </div>
                        <div class="form-group">
                          <label for="exampleInputPassword1">Contact #:</label>
                          <input type="text" name="Contact" class="form-control" placeholder="ex. 9384054701" required maxlength="10">
                        </div> 
                          </div>
                          <div class="col-md-6">
                          <div class="form-group">
                          <label for="exampleInputPassword1">Username:</label>
                          <input type="text" id="username" onchange="usernameCheck()" name="Username" class="form-control" placeholder="Enter Username" required>
                          <small id="error" class="form-text text-danger" style="display:none">Username Already Exist!</small>
                        </div>           
                        <div class="form-group">
                          <label for="exampleInputPassword1">Password:</label>
                          <input type="password" id="password" name="Password" class="form-control" placeholder="Enter Password" minlength="5" required>
                        </div>           
                        <div class="form-group">
                          <label for="exampleInputPassword1">Confirm Password:</label>
                          <input type="password" onchange="passwordVerification()" id="cpassword" name="Cpassword" class="form-control" placeholder="Confirm Password" required>
                          <small id="errorCpassword" class="form-text text-danger" style="display:none">Password didn't Match!</small>
                        </div> 
                          </div>
                        </div>
                                  
                                  
                    </div>
                    <div class="modal-footer">
                      <button id="submit" type="submit" class="btn btn-primary btn-sm">Submit</button>
                      <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
                    </div>

                    </form>
                  </div>
                </div>
              </div>

  <script>
  
    function usernameCheck(){
      let username = $('#username').val();
      $.ajax({
        url: Url+"usernameCheck",
        type: "GET",
        data: {
          username: username
        },
        success: function(response){
         if(response.exist){
          $('#submit').prop('disabled', true);
          $("#error").css({
            'display':'block',
          });
         }else{
          $('#submit').prop('disabled', false);
          $("#error").css({
            'display':'none',
          });
         } 
        }
      });
    }

    function passwordVerification(){
      let password = $("#password").val();
      let cpassword = $("#cpassword").val();

      if(password != cpassword){
        $('#submit').prop('disabled', true);
        $("#errorCpassword").css({
          'display':'block'
        });
      }else{
        $('#submit').prop('disabled', false);
        $("#errorCpassword").css({
          'display':'none'
        });
      }
    }

</script>
@endsection


