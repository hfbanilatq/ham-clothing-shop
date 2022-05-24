<?php

namespace App\Util;

use App\Interfaces\ImageStorage;

use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;

class ImageLocalStorage implements ImageStorage
{

    public function store($request)
    {
        $imageUniqueName = null;
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $imageUniqueName = '' . Carbon::now()->timestamp . '.' . $file->getClientOriginalName();
            $file->move(public_path(), '/img/', $imageUniqueName);
        }

        return $imageUniqueName;
    }
}
