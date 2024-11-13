    
                       <!-- Page level plugins -->
                    <script src="{{asset('Assets/plugins/datatables/jquery.dataTables.min.js')}}"></script>
                    <script src="{{asset('Assets/plugins/datatables/dataTables.bootstrap4.min.js')}}"></script>
                   
                    <script src="{{asset('Assets/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
                    <script src="{{asset('Assets/plugins/simplebar/simplebar.min.js')}}"></script>
                    <!-- <script src="{{asset('Assets/plugins/jvectormap/jquery-jvectormap-2.0.3.min.js')}}"></script>
                    <script src="{{asset('Assets/plugins/jvectormap/jquery-jvectormap-world-mill.js')}}"></script>
                    <script src="{{asset('Assets/plugins/jvectormap/jquery-jvectormap-us-aea.js')}}"></script> -->
                    <script src="{{asset('Assets/plugins/daterangepicker/moment.min.js')}}"></script>
                    <script src="{{asset('Assets/plugins/daterangepicker/daterangepicker.js')}}"></script>
                    <script>
                      jQuery(document).ready(function() {
                        jQuery('input[name="dateRange"]').daterangepicker({
                        autoUpdateInput: false,
                        singleDatePicker: true,
                        locale: {
                          cancelLabel: 'Clear'
                        }
                      });
                        jQuery('input[name="dateRange"]').on('apply.daterangepicker', function (ev, picker) {
                          jQuery(this).val(picker.startDate.format('MM/DD/YYYY'));
                        });
                        jQuery('input[name="dateRange"]').on('cancel.daterangepicker', function (ev, picker) {
                          jQuery(this).val('');
                        });
                      });

                      function checkPassword(){
                        let Name = $('#Name').text()
                        let Password = $('#Current').val();
                        $.ajax({
                          url: Url+"checkPassword",
                          type: "GET",
                          data: {
                            Name: Name,
                            Password: Password
                          },
                          success: function(response){
                            if(response.result){
                              $('#submitchange').prop('disabled',false)
                              $('#CurrentErr').css({
                                'display': 'none'
                              });
                            }else{
                              $('#submitchange').prop('disabled',true)
                              $('#CurrentErr').css({
                                'display': 'block'
                              });
                            }
                          }
                        });

                      }

                      function confirmPassword(){
                        let Npassword = $('#Npassword').val();
                        let Cpassword = $('#Cpassword').val();

                        if(Npassword != Cpassword){
                          $('#submitchange').prop('disabled', true);
                          $('#ConfirmErr').css({
                            'display': 'block'
                          });  
                        }else{
                          $('#submitchange').prop('disabled', false);
                          $('#ConfirmErr').css({
                            'display': 'none'
                          });
                        }
                      }
                      
                    </script>
                    <!-- <script src="{{asset('Assets/plugins/toaster/toastr.min.js')}}"></script> -->
                    <script src="{{asset('Assets/js/mono.js')}}"></script>
                    <!-- <script src="{{asset('Assets/js/chart.js')}}"></script> -->
                    <!-- <script src="{{asset('Assets/js/map.js')}}"></script> -->
                    <script src="{{asset('Assets/js/custom.js')}}"></script>
                    <script src="{{asset('Assets/js/wvsu.js')}}"></script>
                    
                    @livewireScripts