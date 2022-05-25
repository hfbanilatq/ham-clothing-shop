<?php

namespace App\Http\Controllers;

use App\Interfaces\ImageStorage;
use App\Models\Discount;
use App\Models\Goal;
use App\Models\Publication;
use DateInterval;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PublicationController extends Controller
{

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Publication::validate($request);
        $publication = new Publication();
        $storeInterface = app(ImageStorage::class);
        $savedImageName = $storeInterface->store($request);
        if ($savedImageName !== null) {
            $publication->setImage($savedImageName);
            $publication->setUserId(Auth::user()->getId());
            $publication->setProductId($request->input('productId'));
            $publication->setDescription($savedImageName);
            $publication->save();
        }

        return back()->with(__('home.success'));
    }

}
