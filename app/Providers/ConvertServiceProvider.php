<?php


namespace App\Providers;

use App\Services\ConvertService;
use Illuminate\Support\ServiceProvider;

class ConvertServiceProvider extends ServiceProvider
{
    /**
     * Register bindings in the container.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(App\Services\ConvertService::class, function ($app) {
            return new ConvertService();
        });
    }
}
