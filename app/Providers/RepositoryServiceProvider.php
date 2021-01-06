<?php


namespace App\Providers;

use App\Interfaces\TelephoneInterface;

use App\Repositories\TelephoneRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(TelephoneInterface::Class, TelephoneRepository::Class);
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
