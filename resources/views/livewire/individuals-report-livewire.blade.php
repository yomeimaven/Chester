                            <tbody wire:poll.5s>
                                @php $TotalSales=0; $TotalWeight=0; @endphp
                                @foreach($data as $key)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$key->Date}} {{$key->Time}}</td>
                                    <td>{{$key->Container}}</td>
                                    <td>{{$key->Weight_Sold}}</td>
                                    <td> &#8369; {{$key->Price}}</td>
                                    @php
                                    $TotalSales = $TotalSales + $key->Price;
                                    $TotalWeight = $TotalWeight + $key->Weight_Sold;
                                    @endphp
                                </tr>
                                @endforeach
                                <tr>
                                    <td><b>Grand Total</b></td>
                                    <td></td>
                                    <td></td>
                                    <th>{{$TotalWeight}} Kg</th>
                                    <td> &#8369; {{$TotalSales}}</td>                                 
                                </tr>
                            </tbody>