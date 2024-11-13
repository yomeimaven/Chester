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
                    <div class="app-brand w-100 d-flex justify-content-center border-bottom-0">
                      <a class="w-auto pl-0" href="/index.html">
                        <img src="{{asset('Assets/images/logowvsu3.png')}}" class="img-fluid" width="300" alt="ARM">
                      </a>
                    </div>
                  </div>
                  <div class="card-body px-5 pb-5 pt-0">

                    <h4 class="text-dark mb-6 text-center">Welcome to A.R.M</h4>
                   
                    @if(Session::has('error'))
                    <div id="auto-close-alert" class="alert alert-danger alert-dismissible fade show alert-icon" role="alert">
                    <i class="mdi mdi-alert"></i>
                    <small><strong>Error!</strong> {{session()->get('error')}}</small>
                    </div>
                    @endif
                    @if(Session::has('success'))
                    <div id="auto-close-alert" class="alert alert-danger alert-dismissible fade show alert-icon" role="alert">
                    <i class="mdi mdi-alert"></i>
                    <small><strong>Error!</strong> {{session()->get('success')}}</small>
                    </div>
                    @endif

                    <form action="{{route('LoginVerification')}}" method="post">
                        @csrf
                      <div class="row">
                        <div class="form-group col-md-12 mb-4">
                          <input type="username" name="UserName" class="form-control input-lg" placeholder="Username">
                        </div>
                        <div class="form-group col-md-12 ">
                          <input type="password" name="Password" class="form-control input-lg" placeholder="Password">
                        </div>
                        <div class="col-md-12">

                          <div class="d-flex justify-content-between mb-3">

                            <div class="custom-control custom-checkbox mr-3 mb-3">
                              <input type="checkbox" name="Remember" class="custom-control-input" id="customCheck2">
                              <label class="custom-control-label" for="customCheck2">Remember me</label>
                            </div>

                            <a class="text-color" href="{{route('ForgotPasswordview')}}"> Forgot password? </a>

                          </div>

                          <center><button type="submit" class="btn btn-primary btn-block mb-4 col-md-10">Sign In</button></center>

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

</body>
</html>
