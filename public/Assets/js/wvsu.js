//auto close alert

document.addEventListener('DOMContentLoaded', function() {
    // Set the delay time in milliseconds (e.g., 5000ms = 5 seconds)
    var delay = 5000;
  
    // Automatically close the alert after the delay
    setTimeout(function() {
      var alert = document.getElementById('auto-close-alert');
      if (alert) {
        // Use Bootstrap's method to close the alert
        var bsAlert = new bootstrap.Alert(alert);
        bsAlert.close();
      }
    }, delay);
  });

  function getOwnerName(){
    $.ajax({
      url: Url+"getOwnerName",
      type: "GET",
      success: function(response){
        $('#OwnerName').empty(); // Clear existing options
        $('#OwnerName').append('<option value="" disabled selected>Choose Owner Name</option>'); // Add default option
        response.data.forEach(function(item) {
            $('#OwnerName').append(new Option(item.name, item.name));
        });
      }
    });
  }

  function checkDeviceId(){
    let DeviceId = $('#DeviceId').val();
    $.ajax({
      url: Url+"checkDeviceId",
      type: "GET",
      data: {
        DeviceId: DeviceId
      },
      success: function(response){
        if(response.exist){
          $('#submit').prop({'disabled':true});
          $('#errorDeviceId').css({
            'display':'block'
          });
        }else{
          $('#submit').prop({'disabled':false});
          $('#errorDeviceId').css({
            'display':'none'
          });
        }
      }
    });
  }

  // $(document).ready(function() {
  //   $('#dataTable').DataTable({
  //     paging:false
  //   });
  // });
  