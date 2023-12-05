<?php

namespace App\Providers;

use App\Services\NovaposhtaDeliveryService;
use GuzzleHttp\Client;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind('delivery.novaposhta', function(Application $app) {
            $client = $app->make(Client::class);
            $config = config('delivery.services.novaposhta');
            return new NovaposhtaDeliveryService($client, $config);
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
