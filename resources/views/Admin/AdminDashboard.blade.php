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
                    </ol>
                </nav>
                  @livewire('DashboardCardLivewire')
                <div class="row">
                <div class="col-md-4">
                    <!-- Top Customers -->
                    <div class="card card-default">
                      <div class="card-header">
                        <h2>Top Client Sales</h2>
                      </div>
                      <div class="card-body">
                        <table class="table table-borderless table-thead-border">
                          <thead>
                            <tr>
                              <th>Name</th>
                              <th class="text-right">Income</th>
                            </tr>
                          </thead>
                          @livewire('TopCustomerLivewire')
                        </table>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-8">            
                    <!-- Income and Express -->
                    <div class="card card-default">
                      <div class="card-header">
                        <h2>Overall Sales</h2>
                      </div>
                      <div class="card-body">
                        <div class="chart-wrapper">
                          <div id="mixed-chart-1"></div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

</div>

<script>

  function fetchChart(){

    $.ajax({
      url: Url+"AdminChart",
      type: "GET",
      success: function(response){
        SingleBar(response.result);
      }
    });
  }
  fetchChart();
  setInterval(fetchChart,10000);
  
</script>

@endsection