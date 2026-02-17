@props(['url'])
<tr>
<td class="header">
<a href="{{ $url }}" style="display: inline-block;">
@if (trim($slot) === 'Laravel')
<img src="https://www.charrosdejalisco.com.mx/img/charroslogoretro.png"  alt="Charros Logo">
@else
{{ $slot }}
@endif
</a>
</td>
</tr>

