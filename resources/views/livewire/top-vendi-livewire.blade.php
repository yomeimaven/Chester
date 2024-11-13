                        <tbody wire:poll.5s>
                            @foreach($TopVendo as $key)
                            <tr>
                              <td class="text-dark font-weight-bold">{{$key->DeviceName}}</td>
                              <td class="text-right">&#8369; {{$key->TotalSale}}</td>
                            </tr>
                            @endforeach
                          </tbody> 