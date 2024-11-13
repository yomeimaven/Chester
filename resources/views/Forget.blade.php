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

                    <h4 class="text-dark text-center"><b>Forget Password</b></h4>
                    <center><small class="text-muted">Remember your password? </small> <a href="{{url('/')}}">Login here</a></center>
                   <br>

                    <form action="{{route('CreateNewPassView')}}" method="post">
                        @csrf
                        <div class="row">
                        <div class="form-group col-md-12 mb-4">
                            <input type="text" name="username" id="username" class="form-control input-lg" placeholder="Enter your username">
                            <small class="text-danger" id="MsgEmailError" style="display:none">Username can't be found!</small>
                            <small class="text-success" id="MsgEmailSuccess" style="display:none">Username found Please check your Sms</small>
                        </div>
                        
                        <div class="form-group col-md-12">
                            <div class="input-group">
                            <input type="text" id="otp" class="form-control input-lg" placeholder="Enter your OTP">
                            <input type="hidden" id="designateotp">
                            <div class="input-group-append">
                                <button class="btn btn-outline-primary btn-sm" type="button" id="sendSms">
                                <span id="sendBtnText"><b>Send</b></span>
                                <span id="countdownText" style="display:none;"><b>1:00</b></span>
                                </button>
                            </div>
                            </div>
                            <small class="text-danger" id="OtpMsg" style="display:none">Incorrect OTP</small>
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
                $("#sendSms").on('click', function(){
                    let username = $("#username").val();
                    // Hide the "Send" text and show the countdown
                    $("#sendBtnText").hide();
                    $("#countdownText").show();
                    // Start the countdown from 1:00 (60 seconds)
                    let countdown = 60;
                    let countdownInterval = setInterval(function(){
                        let minutes = Math.floor(countdown / 60);
                        let seconds = countdown % 60;
                        // Format time as mm:ss
                        let formattedTime = minutes + ":" + (seconds < 10 ? "0" + seconds : seconds);
                        $("#countdownText").text(formattedTime);

                        // Decrement countdown
                        countdown--;

                        // Once countdown reaches 0, stop the countdown
                        if(countdown < 0) {
                            clearInterval(countdownInterval);
                            $("#sendBtnText").show();  // Show "Send" text again
                            $("#countdownText").hide();  // Hide countdown
                            $("#sendSms").prop('disabled', false);  // Enable button again
                        }
                    }, 1000); // Update every second
                    $.ajax({
                        url: "http://127.0.0.1:8000/sendOtp",
                        type: "GET",
                        data: {
                            username:username,
                        },
                        success: function(response){
                            if(response.MsgEmail){
                                $("#MsgEmailError").css('display', 'block');
                                $("#MsgEmailSuccess").css('display', 'none');
                            }else{
                                $("#designateotp").val(response.OTP);
                                $("#MsgEmailSuccess").css('display', 'block');
                                $("#MsgEmailError").css('display', 'none');
                                $("#submitBtn").prop('sendSms', true);
                            }
                            
                        }
                        });
                });

                //Input OTP
                $("#otp").on('change', function(){
                    let otp = $("#otp").val();
                    let designateotp = $("#designateotp").val();
                    if(otp == designateotp){
                        $("#OtpMsg").css('display', 'none');
                        $("#submitBtn").prop('disabled', false);
                    }else{
                        $("#OtpMsg").css('display', 'block');
                        $("#submitBtn").prop('disabled', true);
                    }
                });
            });
        </script>

</body>
</html>
