<?php

namespace App\Providers;

use App\Contracts\PaymentContract;
use App\Services\OperatorMenu;
use App\Services\Processors\Processor;
use App\Services\SocialUserResolver;
use App\Services\StripeApi;
use Coderello\SocialGrant\Resolvers\SocialUserResolverInterface;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * All of the container bindings that should be registered.
     *
     * @var array
     */
    public $bindings = [
        SocialUserResolverInterface::class => SocialUserResolver::class,
    ];

    public $singletons = [
        PaymentContract::class => StripeApi::class,
    ];

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(Processor::class, fn() => Processor::instance(request('processor')));
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
