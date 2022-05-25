<h1>{{ __('home.cs') }}</h1>
<ul class="bg-primary">
    <li><a href="{{ route('home.index') }}">{{ __('home.home') }}</a></li>
</ul>
<table border="1">
    <tr>
        <td>{{ __('home.currency') }}</td>  
        <td>{{ __('home.value') }}</td>
    </tr>
    @foreach($collection as $item)
    <tr>
        <td><strong>{{$item['code']}}</strong></td>  
        <td>{{$item['value']}}</td>
    </tr>
    @endforeach
</table>