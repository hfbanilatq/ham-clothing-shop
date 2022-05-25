<?php

namespace App\Util;

use App\Interfaces\ImageStorage;
use Carbon\Carbon;
use Google\Cloud\Storage\StorageClient;

class ImageGCPStorage implements ImageStorage
{

    public function store($request)
    {
        $imageUrl = null;
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $imageUniqueName = '' . Carbon::now()->timestamp . '.' . $file->extension();

            $googleConfigFile = file_get_contents(config_path('ham-clothing-shop.json'));
            $storage = new StorageClient([
                'keyFile' => json_decode($googleConfigFile, true)
            ]);
            $storageBucketName = config('googlecloud.storage_bucket');
            $bucket = $storage->bucket($storageBucketName);
            $fileSource = fopen($file->getRealPath(), 'r');
            $newFolderName = 'img';
            $googleCloudStoragePath = $newFolderName . '/' . $imageUniqueName;
            /* Upload a file to the bucket.
        Using Predefined ACLs to manage object permissions, you may
        upload a file and give read access to anyone with the URL.*/
            $bucket->upload($fileSource, [
                // 'predefinedAcl' => 'publicRead',
                'name' => $googleCloudStoragePath
            ]);
            $imageUrl = 'https://storage.cloud.google.com/' . $storageBucketName . '/' . $googleCloudStoragePath;
        }

        return $imageUrl;
    }
}
