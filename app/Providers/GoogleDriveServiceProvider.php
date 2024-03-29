<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class GoogleDriveServiceProvider extends ServiceProvider
{
    private $clientID = '1027089166382-s1idi5jgg7ji0g3o1f3ojf1jrl8fucf5.apps.googleusercontent.com';
    private $clientSecret = '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';
    private $refreshToken = '1//04yBQp8-gd-olCgYIARAAGAQSNwF-L9IrIfMWqx5HBUKN7uCOIhbfIIUNaFyBAqAyi8Tvx4A258hN0NP0qyH08g4h6PYfdGSfIfs';
    private $folderId = '117wP23mE_FsYYNjhXuEC07LxoLLnidqq';
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        \Storage::extend('google', function($app, $config) {
            $client = new \Google_Client();
            $client->setClientId($this->clientID);
            $client->setClientSecret($this->clientSecret);
            $client->refreshToken($this->refreshToken);
            $client->setRedirectUri('https://developers.google.com/oauthplayground');
            $client->setAccessType('offline');  //this line is magic point
            $client->setApprovalPrompt('force'); //this line is magic point
            $client->addScope("drive");
            $service = new \Google_Service_Drive($client);
            $adapter = new \Hypweb\Flysystem\GoogleDrive\GoogleDriveAdapter($service, $this->folderId);

            return new \League\Flysystem\Filesystem($adapter);
        });
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
