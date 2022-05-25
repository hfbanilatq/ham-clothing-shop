<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use App\Interfaces\ImageStorage;
use App\Util\ImageGCPStorage;
use App\Util\ImageLocalStorage;

class ImageServiceProvider extends ServiceProvider
{

    public function register()
    {

        $this->app->bind(ImageStorage::class, function () {
            $storageConfigFile = file_get_contents(config_path('storagetype.php'));

            if (config('storagetype.storage_type') === 'gcp') {
                return new ImageGCPStorage();
            } else {
                return new ImageLocalStorage();
            }
        });
    }
}
