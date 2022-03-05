

<tr class="tb-title">
    <th>Gold</th>

    <td>{{ $rates[0]->price + 0}}</td>
    <td class="{{ ($rates[0]->price - $last_rates[0]->price) > 0 ? "text-success" : "text-danger"  }}">{{ ($rates[0]->price - $last_rates[0]->price) > 0 ? "+" : "" }}{{ number_format($rates[0]->price - $last_rates[0]->price, 2) }}</td>
    <td style="font-size: 12px">{{ date("H:i:s",strtotime($rates[0]->updated_at)) }}</td>
</tr>

<tr class="tb-title">
    <th>SILVER</th>
    <td>{{ $rates[1]->price + 0}}</td>
    <td class="{{ ($rates[1]->price - $last_rates[1]->price) > 0 ? "text-success" : "text-danger"  }}">{{ ($rates[1]->price - $last_rates[1]->price) > 0 ? "+" : "" }}{{ number_format($rates[1]->price - $last_rates[1]->price, 2) }}</td>
    <td style="font-size: 12px">{{ date("H:i:s",strtotime($rates[1]->updated_at)) }}</td>
</tr>

<tr class="tb-title">
    <th>PLATINUM</th>
    <td>{{ $rates[2]->price + 0}}</td>
    <td class="{{ ($rates[2]->price - $last_rates[2]->price) > 0 ? "text-success" : "text-danger"  }}">{{ ($rates[2]->price - $last_rates[2]->price) > 0 ? "+" : "" }}{{ number_format($rates[2]->price - $last_rates[2]->price, 2) }}</td>
    <td style="font-size: 12px">{{ date("H:i:s",strtotime($rates[2]->updated_at)) }}</td>
</tr>

<tr class="tb-title">
    <th>PALLADIUM</th>
    <td>{{ $rates[3]->price + 0}}</td>
    <td class="{{ ($rates[3]->price - $last_rates[3]->price) > 0 ? "text-success" : "text-danger"  }}">{{ ($rates[3]->price - $last_rates[3]->price) > 0 ? "+" : "" }}{{ number_format($rates[3]->price - $last_rates[3]->price, 2) }}</td>
    <td style="font-size: 12px">{{ date("H:i:s",strtotime($rates[3]->updated_at)) }}</td>
</tr>



