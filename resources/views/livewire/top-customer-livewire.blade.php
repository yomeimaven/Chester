                            <tbody wire:poll.5s>
                            @foreach($TopSales as $key)
                            <tr>
                              <td class="text-dark font-weight-bold">{{$key->OwnerName}}</td>
                              <td class="text-right">&#8369; {{$key->TotalSale}}</td>
                            </tr>
                            @endforeach
                          </tbody>