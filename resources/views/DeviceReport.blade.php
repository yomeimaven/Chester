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
                            <h6 class="m-0 font-weight-bold text-primary">{{$DeviceName->Device_Name}}</h6>
                            <div>
                            <input type="date" id="reportDate" name="reportDate" value="{{date('Y-m-d')}}" class="form-control d-inline-block" style="width: auto;">
                        </div>
                        </div>
                        <div class="card-body">
                        <table id="dataTable" class="table table-bordered table-striped table-hover text-center table-md">
                            <thead class="bg-dark">
                                <tr>
                                <th class="text-white">No</th>
                                <th class="text-white">Device ID</th>
                                <th class="text-white">Date & Time</th>
                                <th class="text-white">Variety</th>
                                <th class="text-white">Weight Sold</th>
                                <th class="text-white">Price</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $TotalSales=0 @endphp
                                @foreach($data as $key)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$key->Device_id}}</td>
                                    <td>{{$key->Date}} {{$key->Time}}</td>
                                    <td>{{$key->Variety}}</td>
                                    <td>{{$key->Weight_Sold}}</td>
                                    <td> &#8369; {{$key->Price}}</td>
                                    @php
                                    $TotalSales = $TotalSales + $key->Price
                                    @endphp
                                </tr>
                                @endforeach
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <th>Grand Total</th>
                                    <td> &#8369; {{$TotalSales}}</td>                                 
                                </tr>
                            </tbody>
                            </table>

                        </div>
                        </div>               
                    </div>
                    <div class="col-md-6">
                        <!-- Income and Express -->
                        <div class="card card-default">
                        <div class="card-header">
                            <h2>Income And Expenses</h2>
                        </div>
                        <div class="card-body">
                            <div class="chart-wrapper">
                            {{ $chart->container() }}
                            </div>
                        </div>
    
                        </div>
                    </div>
                </div>

</div>
{{ $chart->script() }}
@endsection


