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
                    <li class="breadcrumb-item active" aria-current="page">Device Management</li>
                    </ol>
                </nav>


                <!-- Table Product -->
                <div class="row">
                  <div class="col-md-12">
                    <div class="card card-default">
                    <div class="card-header align-items-center">
                        <h2 class="">Device List</h2>
                        <a href="#" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#AddDeviceModal" onclick="getOwnerName()">
                        <i class="mdi mdi-account-plus"></i> 
                          Add Device</a>
                      </div>
                      <div class="card-body">
                      <table id="dataTable" class="table table-bordered table-striped table-hover text-center table-md">
                          <thead class="bg-dark">
                            <tr>
                              <th class="text-white">No</th>
                              <th class="text-white">Device Id</th>
                              <th class="text-white">Device Name</th>
                              <th class="text-white">Owner</th>
                              <th class="text-white">Date Registered</th>
                              <th class="text-white">Status</th>
                              <th class="text-white">Action</th>
                            </tr>
                          </thead>
                        <tbody>
                            @foreach($data as $key)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$key->Device_Id}}</td>
                                <td>{{$key->Device_Name}}</td>
                                <td>{{$key->Owner}}</td>
                                <td>{{$key->Date_Registered}}</td>
                                <td class="{{ $key->status == 'pending' ? 'text-danger' : 'text-primary' }}">{{ $key->status }}</td>
                                <td class="text-center px-0">

                                  @if($key->status != 'pending')
                                <a href="{{route('IndividualDeviceReport', ['Device_Id'=>$key->Device_Id])}}" class="btn btn-success btn-sm p-2" title="View Device Report"><i class="mdi mdi-file-document-box-multiple-outline" aria-hidden="true"></i> </a>
                                  @endif
                                <a href="{{route('RemoveDevice',['id'=>$key->id])}}" onclick="return confirm(&quot;Are you sure you want to Delete this Device?&quot;)" class="btn btn-danger btn-sm p-2" title="Remove Data"><i class="mdi mdi-delete" aria-hidden="true"></i> </a> 
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                        </table>

                      </div>
                    </div>
                  </div>
                </div>

</div>
<div class="modal fade" id="AddDeviceModal" tabindex="-1" role="dialog"
                aria-hidden="true">
                <div class="modal-dialog modal-md" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalFormTitle"><i class="mdi mdi-table-column-plus-after"></i> Add Device</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <form method="post" action="{{route('SubmitAddDevice')}}">
                        @csrf
 
                          <div class="form-group">
                          <label for="exampleInputEmail1">Device ID: </label>
                          <input type="text" onchange="checkDeviceId()" name="DeviceId" id="DeviceId" class="form-control" placeholder="Enter your Device Id" required>
                          <small id="errorDeviceId" class="form-text text-danger" style="display:none">Device Id Already Exist!</small> 
                        </div>
                        <div class="form-group">
                          <label for="exampleInputEmail1">Device Name: </label>
                          <input type="text" name="DeviceName" class="form-control"
                            placeholder="Enter your Device Name" required>
                        </div>
                        @if(session()->get('Designation') == 'Administrator')
                        <div class="form-group">
                          <label for="exampleInputPassword1">Owner Name:</label>
                          <select name="OwnerName" id="OwnerName" class="form-control">
                            <option value="" disabled selected>Choose Owner Name</option>
                          </select>
                        </div>
                        @else
                        <div class="form-group">
                          <label for="exampleInputPassword1">Owner Name:</label>
                          <select name="OwnerName" class="form-control">
                            <option value="{{session()->get('Name')}}" selected>{{session()->get('Name')}}</option>
                          </select>
                        </div>
                        @endif

                    </div>
                    <div class="modal-footer">
                      <button id="submit" type="submit" class="btn btn-primary btn-sm">Submit</button>
                      <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
                    </div>

                    </form>
                  </div>
                </div>
              </div>

@endsection


