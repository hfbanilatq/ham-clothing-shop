<?php

namespace App\Util;

use App\Interfaces\ImageStorage;

use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;

class ImageGCPStorage implements ImageStorage
{

    public function store($request)
    {
        $imageUniqueName = null;
        if ($request->hasFile('image')) {
            $imageUniqueName = '' . Carbon::now()->timestamp . '.' . $request->file('image')->extension();
            Storage::disk('public')->put(
                $imageUniqueName,
                file_get_contents($request->file('image')->getRealPath())
            );
        }

        return $imageUniqueName;
    }
}
