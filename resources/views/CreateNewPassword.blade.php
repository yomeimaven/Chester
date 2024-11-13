<!DOCTYPE html>

<html lang="en">
<head>
  <head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />

  <title>A.R.M: Automated Rice Machine</title>

  <link href="{{asset('Assets/plugins/material/css/materialdesignicons.min.css')}}" rel="stylesheet" />
  <link href="{{asset('Assets/plugins/simplebar/simplebar.css" rel="stylesheet')}}" />
  <link rel="icon" href="{{asset('Assets/images/logowvsu3.png')}}" type="image/png">

  <!-- MONO CSS -->
  <link id="main-css-href" rel="stylesheet" href="{{asset('Assets/css/style.css')}}" />

</head>

</head>
  <body style="background-image:linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)),url('{{asset('Assets/images/bgwvsu3.jpeg')}}'); background-size: cover; background-position: center; background-repeat: no-repeat;" class="bg-light-gray" id="body">

          <div class="container d-flex align-items-center justify-content-center" style="min-height: 100vh">
          <div class="d-flex flex-column justify-content-between">
            <div class="row justify-content-center">
              <div class="col-lg-6 col-md-10">
                <div class="card card-default mb-0">
                  <div class="card-header pb-0">
                  </div>
                  <div class="card-body px-5 pb-5 pt-0">

                    <h4 class="text-dark text-center"><b>Create New Password</b></h4>
                   <br>

                    <form action="{{route('UpdateNewPassword')}}" method="post">
                        @csrf
                        <input type="hidden" name="username" value="{{Session()->get('username')}}">
                        <div class="row">
                        <div class="form-group col-md-12 mb-4">
                            <input type="password" name="NewPassword" id="NewPass" class="form-control input-lg" placeholder="Enter your New Password">
                        </div>
                        <div class="form-group col-md-12 mb-4">
                            <input type="password" id="ConfirmPass" class="form-control input-lg" placeholder="Confirm New Password">
                            <small class="text-danger" id="passwordVerification" style="display:none">Password do not Match!</small>
                        </div>
  
                        <div class="col-md-12">
                            <center><button type="submit" id="submitBtn" class="btn btn-primary btn-block mb-4 col-md-10" disabled>Submit</button></center>
                        </div>
                        </div>

                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <script src="{{asset('Assets/plugins/jquery/jquery.min.js')}}"></script>
        <script src="{{asset('Assets/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
        <script src="{{asset('Assets/js/custom.js')}}"></script>
        <script src="{{asset('Assets/js/wvsu.js')}}"></script>

        <script>
            $(document).ready(function(){
                $("#ConfirmPass").on('change', function(){
                    $newpass = $("#NewPass").val();
                    $confirmpass = $("#ConfirmPass").val();

                    if($newpass == $confirmpass){
                        $("#submitBtn").prop('disabled', false);
                        $("#passwordVerification").css('display', 'none');
                    }else{
                        $("#submitBtn").prop('disabled', true);
                        $("#passwordVerification").css('display', 'block');
                    }
                });
            });
        </script>

</body>
</html>
