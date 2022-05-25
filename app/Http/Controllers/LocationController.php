<?php

namespace App\Http\Controllers;

use App\Dto\LocationDto;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class LocationController extends Controller
{
    public function locations()
    {
        $result = Http::get("http://35.208.158.250/public/api/locations");
        $data = $result["data"];
        $locations = [];
        foreach ($data as $item) {
            $location = new LocationDto();
            info($location->hydrate($item));
            array_push($locations,$location );
        }

        info($locations);

        $viewData['locations'] = $locations;

        return view('external.locations')->with("viewData", $viewData);
    }
}
