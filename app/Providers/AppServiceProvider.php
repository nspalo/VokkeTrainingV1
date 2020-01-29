<?php

namespace App\Providers;

use App\Repositories\Contracts\IUserRepository;
use App\Repositories\User\UserRepository;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind( IUserRepository::class, UserRepository::class );
//        $this->app->bind( 'App\Repositories\Contracts\IUserRepository', 'App\Http\Services\CreateUserService' );
    }
}
