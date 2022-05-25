@extends('layouts.app')
@section('content')
    <h1>{{ __('home.cs') }}</h1>
    <div class="container" style="background: gray">
        <div class="container" style="background: white">
            <table border="1">
                <tr>
                    <td>{{ __('home.currency') }}</td>
                    <td>{{ __('home.value') }}</td>
                </tr>
                @foreach ($collection as $item)
                    <tr>
                        <td><strong>{{ $item['code'] }}</strong></td>
                        <td>{{ $item['value'] }}</td>
                    </tr>
                @endforeach
            </table>
        </div> 
    </div>
@endsection
