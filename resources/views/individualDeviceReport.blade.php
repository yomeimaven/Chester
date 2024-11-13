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
                    <li class="breadcrumb-item active" aria-current="page">Device Report  </li>
                    </ol>
                </nav>


                <!-- Table Product -->
                <div class="row">
                    <div class="col-md-6">
                        <div class="card card-default">
                        <div class="card-header py-3 d-flex justify-content-between align-items-center">
                            <h6 class="m-0 font-weight-bold text-primary">{{$DeviceName->Device_Name}} Product Sales</h6>
                            <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#inventory"> <i class="mdi mdi-shape-circle-plus mdi-18px"></i> Restock</button>
                        </div>
                        <div class="card-body">
                        <table id="dataTable" class="table table-bordered table-striped table-hover text-center table-md">
                            <thead class="bg-dark">
                                <tr>
                                <th class="text-white">No</th>
                                <th class="text-white">Date & Time</th>
                                <th class="text-white">Container</th>
                                <th class="text-white">Weight Sold</th>
                                <th class="text-white">Price</th>
                                </tr>
                            </thead>
                                @livewire('IndividualsReportLivewire', ['Device_Id'=>$Device_Id])
                            </table>

                        </div>
                        </div>               
                    </div>
                    <div class="col-md-6">
                        <!-- Income and Express -->
                        <div class="card card-default">
                        <div class="card-header">
                            <h2>Product Sales</h2>
                        </div>
                        <div class="card-body">
                            <input id="Device_Id" type="hidden" value="{{$Device_Id}}">
                            <div class="chart-wrapper">
                            <div id="mixed-chart-1"></div>
                            </div>
                        </div>
    
                        </div>
                    </div>
                </div>
</div>

            <div class="modal fade" id="inventory" tabindex="-1" role="dialog"
                aria-hidden="true">
                <div class="modal-dialog modal-md" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalFormTitle"><i class="mdi mdi-shape-circle-plus mdi-18px"></i> Add Stock</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <form method="post" action="{{route('Restock')}}">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="">Device Name:</label>
                                    <input type="text" value="{{$DeviceName->Device_Name}}" class="form-control" disabled>
                                    <input type="hidden" name="Device_Id" value="{{$Device_Id}}">
                                </div>
                                <div class="form-group">
                                    <label for="">Container 1:</label>
                                    <input type="number" name="Container1" value="{{$Stock->Container1}}" class="form-control" min="0" required>
                                    <small class="text-mouted">Remaining Rice kilo's in Container : </small>
                                </div>
                                <div class="form-group">
                                    <label for="">Container 2:</label>
                                    <input type="number" name="Container2" value="{{$Stock->Container2}}" class="form-control" min="0" required>
                                    <small class="text-mouted">Remaining Rice kilo's in Container : </small>
                                </div>
                            </div>
                        </div>
            
                    </div>
                    <div class="modal-footer">
                      <button id="submit" type="submit" class="btn btn-primary btn-sm"> <i  class="mdi mdi-check"></i> Confirm</button>
                      <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal"><i  class="mdi mdi-close"></i> Close</button>
                    </div>

                    </form>
                  </div>
                </div>
              </div>



<script>

  function fetchChart(){
    let Device_Id = $('#Device_Id').val();
    $.ajax({
      url: Url+"IndividualChart",
      type: "GET",
      data: {
        Device_Id: Device_Id
      },
      success: function(response){
        DoubleBar(response.dataset1,response.dataset2);
      }
    });
  }
  fetchChart();
  setInterval(fetchChart,5000);
  
</script>

@endsection


