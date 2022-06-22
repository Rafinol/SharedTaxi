<?php

namespace App\Containers\AppSection\PriceCalculator\Providers;

use App\Containers\AppSection\PriceCalculator\Services\Map\MapService;
use App\Containers\AppSection\PriceCalculator\Services\Map\MockMapService;
use App\Ship\Parents\Providers\MainServiceProvider as ParentMainServiceProvider;

/**
 * The Main Service Provider of this container, it will be automatically registered in the framework.
 */
class MainServiceProvider extends ParentMainServiceProvider
{
    /**
     * Container Service Providers.
     */
    public array $serviceProviders = [
        // InternalServiceProviderExample::class,
    ];

    /**
     * Container Aliases
     */
    public array $aliases = [
        // 'Foo' => Bar::class,
    ];

    /**
     * Register anything in the container.
     */
    public function register(): void
    {
        parent::register();

        // $this->app->bind(UserRepositoryInterface::class, UserRepository::class);

        $this->app->bind(MapService::class, MockMapService::class);
    }
}
