                    <ul  class="collapse"  id="devices" data-parent="#sidebar-menu" wire:poll.20s>
                      <div class="sub-menu">
                            @foreach($data as $key)
                            <li>
                              <a href="{{route('IndividualDeviceReport',['Device_Id'=>$key->Device_Id])}}" class="sidenav-item-link">
                                <span class="nav-text">{{$key-> Device_Name}}</span> 
                              </a>
                            </li>
                            @endforeach
                      </div>
                    </ul> 