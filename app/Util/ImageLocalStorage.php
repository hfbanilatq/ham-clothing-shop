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
            Storage::disk('public')->put(
                $imageUniqueName,
                file_get_contents($request->file('image')->getRealPath())
            );
        }

        return $imageUniqueName;
    }
}
