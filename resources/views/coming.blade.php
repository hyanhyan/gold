

<tr>
    <th>999 ֊ 24k</th>

    <td>{{ $rates[0]->buy +0}}</td>
    <td>{{ $rates[0]->sell +0}}</td>
    <td class="{{ ($rates[0]->sell - $last_rates[0]->sell) > 0 ? "text-success" : "text-danger"  }}">{{ ($rates[0]->sell - $last_rates[0]->sell) > 0 ? "+" : "" }}{{ number_format($rates[0]->sell - $last_rates[0]->sell, 2) +0}}</td>
    <td style="font-size: 12px">@if($rateTime === '01') {{date("H:i:s", strtotime($rates[0]->updated_at))}} @else <span style="color: #ef5160; font-weight: bold;">Closed<span> @endif</td>
</tr>
<tr>
    <th>995 ֊ 24k</th>
    <td>{{ $rates[1]->buy +0}}</td>
    <td>{{ $rates[1]->sell +0}}</td>
    <td class="{{ ($rates[1]->sell - $last_rates[1]->sell) > 0 ? "text-success" : "text-danger"  }}">{{ ($rates[1]->sell - $last_rates[1]->sell) > 0 ? "+" : "" }}{{ number_format($rates[1]->sell - $last_rates[1]->sell, 2) +0}}</td>
    <td style="font-size: 12px">@if($rateTime === '01') {{date("H:i:s", strtotime($rates[1]->updated_at))}} @else <span style="color: #ef5160; font-weight: bold;">Closed<span> @endif</td>
</tr>
<tr>
    <th>585 ֊ 14k</th>
    <td>{{ $rates[6]->buy +0}}</td>
    <td>{{ $rates[6]->sell +0}}</td>
    <td class="{{ ($rates[6]->buy - $last_rates[6]->buy) > 0 ? "text-success" : "text-danger"  }}">{{ ($rates[6]->buy - $last_rates[6]->buy) > 0 ? "+" : "" }}{{ number_format($rates[6]->buy - $last_rates[6]->buy, 2) +0}}</td>
    <td style="font-size: 12px">@if($rateTime === '01') {{date("H:i:s",strtotime($rates[6]->updated_at))}} @else <span style="color: #ef5160; font-weight: bold;">Closed<span> @endif</td>
</tr>
<tr  class="last-level">
    <th>958 ֊ 23k</th>
    <td>{{ $rates[2]->buy +0}}</td>
    <td>{{ $rates[2]->sell +0}}</td>
    <td class="{{ ($rates[2]->buy - $last_rates[2]->buy) > 0 ? "text-success" : "text-danger"  }}">{{ ($rates[2]->buy - $last_rates[2]->buy) > 0 ? "+" : "" }}{{ number_format($rates[2]->buy - $last_rates[2]->buy, 2) +0}}</td>

    <td style="font-size: 12px">@if($rateTime === '01') {{date("H:i:s",strtotime($rates[2]->updated_at))}} @else <span style="color: #ef5160; font-weight: bold;">Closed<span> @endif</td>
</tr>
<tr  class="last-level">
    <th>916 ֊ 22k</th>
    <td>{{ $rates[3]->buy +0}}</td>
    <td>{{ $rates[3]->sell +0}}</td>
    <td class="{{ ($rates[3]->buy - $last_rates[3]->buy) > 0 ? "text-success" : "text-danger"  }}">{{ ($rates[3]->buy - $last_rates[3]->buy) > 0 ? "+" : "" }}{{ number_format($rates[3]->buy - $last_rates[3]->buy, 2) +0}}</td>
    <td style="font-size: 12px">@if($rateTime === '01') {{date("H:i:s",strtotime($rates[3]->updated_at))}} @else <span style="color: #ef5160; font-weight: bold;">Closed<span> @endif</td>
</tr>
<tr  class="last-level">
    <th>900 ֊ 21.6k</th>
    <td>{{ $rates[10]->buy +0}}</td>
    <td>{{ $rates[10]->sell +0}}</td>
    <td class="{{ ($rates[10]->buy - $last_rates[10]->buy) > 0 ? "text-success" : "text-danger"  }}">{{ ($rates[10]->buy - $last_rates[10]->buy) > 0 ? "+" : "" }}{{ number_format($rates[10]->buy - $last_rates[10]->buy, 2) +0}}</td>
    <td style="font-size: 12px">@if($rateTime === '01') {{date("H:i:s",strtotime($rates[10]->updated_at))}} @else <span style="color: #ef5160; font-weight: bold;">Closed<span> @endif</td>
</tr>
<tr  class="last-level">
    <th>875 ֊ 21k</th>
    <td>{{ $rates[4]->buy +0}}</td>
    <td>{{ $rates[4]->sell +0}}</td>
    <td class="{{ ($rates[4]->buy - $last_rates[4]->buy) > 0 ? "text-success" : "text-danger"  }}">{{ ($rates[4]->buy - $last_rates[4]->buy) > 0 ? "+" : "" }}{{ number_format($rates[4]->buy - $last_rates[4]->buy, 2) +0}}</td>
    <td style="font-size: 12px">@if($rateTime === '01') {{date("H:i:s",strtotime($rates[4]->updated_at))}} @else <span style="color: #ef5160; font-weight: bold;">Closed<span> @endif</td>
</tr>
<tr  class="last-level">
    <th>750 ֊ 18k</th>
    <td>{{ $rates[5]->buy +0}}</td>
    <td>{{ $rates[5]->sell +0}}</td>
    <td class="{{ ($rates[5]->buy - $last_rates[5]->buy) > 0 ? "text-success" : "text-danger"  }}">{{ ($rates[5]->buy - $last_rates[5]->buy) > 0 ? "+" : "" }}{{ number_format($rates[5]->buy - $last_rates[5]->buy, 2) +0}}</td>
    <td style="font-size: 12px">@if($rateTime === '01') {{date("H:i:s",strtotime($rates[5]->updated_at))}} @else <span style="color: #ef5160; font-weight: bold;">Closed<span> @endif</td>
</tr>
<tr  class="last-level">
    <th>500 ֊ 12k</th>
    <td>{{ number_format($rates[6]->buy*0.843,2) +0}}</td>
    <td>{{ number_format($rates[6]->sell*0.843,2) +0}}</td>
    <td class="{{ ($rates[6]->buy - $last_rates[6]->buy) > 0 ? "text-success" : "text-danger"  }}">{{ ($rates[6]->buy*0.843 - $last_rates[6]->buy*0.843) > 0 ? "+" : "" }}{{ number_format($rates[6]->buy*0.843 - $last_rates[6]->buy*0.843, 2) +0}}</td>
    <td style="font-size: 12px">@if($rateTime === '01') {{date("H:i:s",strtotime($rates[6]->updated_at))}} @else <span style="color: #ef5160; font-weight: bold;">Closed<span> @endif</td>
</tr>
<tr  class="last-level">
    <th>416 ֊ 10k</th>
    <td>{{ $rates[7]->buy +0}}</td>
    <td>{{ $rates[7]->sell +0}}</td>
    <td class="{{ ($rates[7]->buy - $last_rates[7]->buy) > 0 ? "text-success" : "text-danger"  }}">{{ ($rates[7]->buy - $last_rates[7]->buy) > 0 ? "+" : "" }}{{ number_format($rates[7]->buy - $last_rates[7]->buy, 2) +0}}</td>
    <td style="font-size: 12px">@if($rateTime === '01') {{date("H:i:s",strtotime($rates[7]->updated_at))}} @else <span style="color: #ef5160; font-weight: bold;">Closed<span> @endif</td>
</tr>
<tr  class="last-level">
    <th>375 ֊ 9k</th>
    <td>{{ $rates[8]->buy +0}}</td>
    <td>{{ $rates[8]->sell +0}}</td>
    <td class="{{ ($rates[8]->buy - $last_rates[8]->buy) > 0 ? "text-success" : "text-danger"  }}">{{ ($rates[8]->buy - $last_rates[8]->buy) > 0 ? "+" : "" }}{{ number_format($rates[8]->buy - $last_rates[8]->buy, 2) +0}}</td>
    <td style="font-size: 12px">@if($rateTime === '01') {{date("H:i:s",strtotime($rates[8]->updated_at))}} @else <span style="color: #ef5160; font-weight: bold;">Closed<span> @endif</td>
</tr>
<tr  class="last-level">
    <th>333 ֊ 8k</th>
    <td>{{ $rates[9]->buy +0}}</td>
    <td>{{ $rates[9]->sell +0}}</td>
    <td class="{{ ($rates[9]->buy - $last_rates[9]->buy) > 0 ? "text-success" : "text-danger"  }}">{{ ($rates[9]->buy - $last_rates[9]->buy) > 0 ? "+" : "" }}{{ number_format($rates[9]->buy - $last_rates[9]->buy, 2) +0}}</td>
    <td style="font-size: 12px">@if($rateTime === '01') {{date("H:i:s",strtotime($rates[9]->updated_at))}} @else <span style="color: #ef5160; font-weight: bold;">Closed<span> @endif</td>
</tr>
<tr class="table-active tb-title">
    <th>{{ Lang::get('lang.SILVER')  }}</th>
    <td>Buy</td>
    <td>Sell</td>
    <th scope="col">+\-</th>
    <td>Time</td>
</tr>
<tr>
    <th>995</th>
    <td>{{ $rates[11]->buy +0}}</td>
    <td>{{ $rates[11]->sell +0}}</td>
    <td class="{{ ($rates[11]->buy - $last_rates[11]->buy) > 0 ? "text-success" : "text-danger"  }}">{{ ($rates[11]->buy - $last_rates[11]->buy) > 0 ? "+" : "" }}{{ number_format($rates[11]->buy - $last_rates[11]->buy, 2) +0}}</td>
    <td style="font-size: 12px">@if($rateTime === '01') {{date("H:i:s",strtotime($rates[11]->updated_at))}} @else <span style="color: #ef5160; font-weight: bold;">Closed<span> @endif</td>
</tr>
<tr>
    <th>999</th>
    <td>{{ $rates[12]->buy +0}}</td>
    <td>{{ $rates[12]->sell +0}}</td>
    <td class="{{ ($rates[12]->buy - $last_rates[12]->buy) > 0 ? "text-success" : "text-danger"  }}">{{ ($rates[12]->buy - $last_rates[12]->buy) > 0 ? "+" : "" }}{{ number_format($rates[12]->buy - $last_rates[12]->buy, 2) +0}}</td>
    <td style="font-size: 12px">@if($rateTime === '01') {{date("H:i:s",strtotime($rates[12]->updated_at))}} @else <span style="color: #ef5160; font-weight: bold;">Closed<span> @endif</td>
</tr>
{{--<tr class="table-primary">
    <th>{{ Lang::get('lang.PLATINUM')  }}</th>
    <td>Ամսաթիվ</td>
    <td>Առք/Buy</td>
    <td>Վաճ/Sell</td>
</tr>
<tr>
    <th>999 ֊ 24k</th>
    <td style="font-size: 12px">{{ $rates[1]->updated_at }}</td>
    <td>{{ $rates[1]->buy }}</td>
    <td>{{ $rates[1]->sell }}</td>
</tr>
<tr class="table-primary">
    <th>{{ Lang::get('lang.PALLADIUM')  }}</th>
    <td>Ամսաթիվ</td>
    <td>Առք/Buy</td>
    <td>Վաճ/Sell</td>
</tr>
<tr>
    <th>999 ֊ 24k</th>
    <td style="font-size: 12px">{{ $rates[0]->updated_at }}</td>
    <td>{{ $rates[0]->buy }}</td>
    <td>{{ $rates[0]->sell }}</td>
</tr>--}}


