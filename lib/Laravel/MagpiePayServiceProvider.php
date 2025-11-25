<?php

namespace MagpiePay\Laravel;

use Illuminate\Support\ServiceProvider;
use MagpiePay\Configuration;
use MagpiePay\Api\PaymentsApi;
use MagpiePay\Api\PayoutsApi;
use MagpiePay\Api\QRPhRequestsApi;
use MagpiePay\Api\ReferencesApi;
use GuzzleHttp\Client;

class MagpiePayServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        // Merge default config if we had one, but for now we rely on services.magpiepay or env

        $this->app->singleton(Configuration::class, function ($app) {
            $config = Configuration::getDefaultConfiguration();

            // Try config first, then env
            $apiKey = config('services.magpiepay.key', env('MAGPIEPAY_API_KEY'));

            if ($apiKey) {
                $config->setUsername($apiKey);
                $config->setPassword(''); // Empty password for Basic Auth with API Key
            }

            return $config;
        });

        $this->app->bind(PaymentsApi::class, function ($app) {
            return new PaymentsApi(new Client(), $app->make(Configuration::class));
        });

        $this->app->bind(PayoutsApi::class, function ($app) {
            return new PayoutsApi(new Client(), $app->make(Configuration::class));
        });

        $this->app->bind(QRPhRequestsApi::class, function ($app) {
            return new QRPhRequestsApi(new Client(), $app->make(Configuration::class));
        });

        $this->app->bind(ReferencesApi::class, function ($app) {
            return new ReferencesApi(new Client(), $app->make(Configuration::class));
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
