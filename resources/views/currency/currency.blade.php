<h1>Currency List</h1>
<table border="1">
    <tr>
        <td>Currency</td>  
        <td>Value</td>
    </tr>
    @foreach($collection as $item)
    <tr>
        <td><strong>{{$item['code']}}</strong></td>  
        <td>{{$item['value']}}</td>
    </tr>
    @endforeach
</table>