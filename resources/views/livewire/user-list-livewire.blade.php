<tbody wire:poll.5s>
    @foreach($data as $key)
     <tr>
        <td>{{$loop->iteration }}</td>
        <td>{{$key-> name}}</td>
        <td>{{$key-> address}}</td>
        <td>{{$key-> contact}}</td>
        <td>{{$key-> date_registered}}</td>
        <td>{{$key-> status}}</td>
        <td class="text-center px-0">
        <a href="{{route('ViewUserDevice', ['DeviceOwner' => $key->name])}}" class="btn btn-success btn-sm p-2" title="View User Device"><i class="mdi mdi-chip" aria-hidden="true"></i> </a>
         @if($key->status == "Active")
        <a href="{{route('BanUser', ['id'=>$key->id])}}" onclick="return confirm(&quot;Are you sure you want to Restrict this User?&quot;)" class="btn btn-danger btn-sm p-2" title="Restrict"><i class="mdi mdi-account-clock" aria-hidden="true"></i> </a> 
         @else
        <a href="{{route('UnbanUser', ['id'=>$key->id])}}" onclick="return confirm(&quot;Are you sure you want to Unrestricted this User?&quot;)" class="btn btn-info btn-sm p-2" title="Unrestrict"><i class="mdi mdi-account-check" aria-hidden="true"></i> </a> 
        @endif                                            
        </td>
     </tr>
     @endforeach
</tbody>