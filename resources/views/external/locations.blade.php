@extends('layouts.app')
@section('content')
    <h1>{{ __('external.title') }}</h1>
    <div class="container" style="background: gray">
        <div class="container" style="background: white">
            <table class="table container">
                <thead>
                    <tr>
                        <th scope="col" class="col">{{ __('external.id') }}</th>
                        <th scope="col" class="col">{{ __('external.name') }}</th>
                        <th scope="col" class="col">{{ __('external.geoLatitude') }}</th>
                        <th scope="col" class="col">{{ __('external.geoLongitude') }}</th>
                        <th scope="col" class="col">{{ __('external.country') }}</th>
                    </tr>

                </thead>
                <tbody>
                    @foreach ($viewData['locations'] as $key => $item)
                        <tr>
                            <td scope="col" >{{ $item->getId() }}</td>
                            <td scope="col" >{{ $item->getName() }}</td>
                            <td scope="col" class="col">
                                {{ $item->getGeoLatitude() }}</td>
                            <td scope="col" class="col ">
                                {{ $item->getGeoLongitude() }}</td>
                            <td scope="col" class="col">{{ $item->getCountry() }}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
