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
                    <li class="breadcrumb-item active" aria-current="page">Request List  </li>
                    </ol>
                </nav>


                <!-- Table Product -->
                <div class="row">
                  <div class="col-md-12">
                    <div class="card card-default">
                    
                      <div class="card-body">
                      <table id="dataTable" class="table table-bordered table-striped table-hover text-center table-md">
                          <thead class="bg-dark">
                            <tr>
                              <th class="text-white">No</th>
                              <th class="text-white">Name</th>
                              <th class="text-white">Device Name</th>
                              <th class="text-white">Device Id</th>
                              <th class="text-white">Status</th>
                              <th class="text-white">Action</th>
                            </tr>
                          </thead>
                            <tbody>
                                @php
                                    $count = 1;
                                @endphp
                                @foreach($data as $key)
                                    <tr>
                                        <td>{{ $count }}</td>
                                        <td>{{ $key->Owner }}</td>
                                        <td>{{ $key->Device_Name }}</td>
                                        <td>{{ $key->Device_Id }}</td>
                                        <td class="text-danger">{{ $key->status }}</td>
                                        <td>
                                            
                                            <a href="{{ route('approve', [ 'id' => $key->id ]) }}" class="btn btn-success btn-sm">
                                                <i class="mdi mdi-check"></i>
                                            </a>
                                            <a href="{{ route('decline', [ 'id' => $key->id ]) }}" class="btn btn-danger btn-sm">
                                                <i class="mdi mdi-close"></i>
                                            </a>

                                        </td>
                                    </tr>

                                @php
                                    $count++
                                @endphp
                                @endforeach
                            </tbody>
                        </table>

                      </div>
                    </div>
                  </div>
                </div>

</div>

@endsection


