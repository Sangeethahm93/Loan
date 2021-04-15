<?php

namespace App\Providers;

use Google_Client;
use Hypweb\Flysystem\GoogleDrive\GoogleDriveAdapter;
use Illuminate\Support\ServiceProvider;
use League\Flysystem\Filesystem;
use Storage;

class GoogleDriveServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        Storage::extend('google', function($app, $config) {
            $client = new Google_Client();
            $client->setClientId($config['clientId']);
            $client->setClientSecret($config['clientSecret']);
            $client->refreshToken($config['refreshToken']);
            $service = new \Google_Service_Drive($client);

            $file = new \Google_Service_Drive_DriveFile();
            $folder_name = auth()->user()->name;
            $parameters['q'] = "mimeType='application/vnd.google-apps.folder' and name='$folder_name' and trashed=false";
            $folders = $service->files->listFiles($parameters);

            $folderName = [];
            foreach( $folders as $key => $folder ) {
                $folderName[] = $folder;
            }

            if( count( $folderName ) == 0 ) {
                $file->setName( $folder_name );
                $file->setMimeType('application/vnd.google-apps.folder');
                $folders = $service->files->create($file, ['fields' => 'id']);
                $folderId = $folders->id;
            } else {
                $folderId = $folderName[0]->id;
            }

            $options = [];
            if(isset($config['teamDriveId'])) {
                $options['teamDriveId'] = $config['teamDriveId'];
            }

            $adapter = new GoogleDriveAdapter($service, $folderId, $options);

            return new Filesystem($adapter);
        });
    }
}
