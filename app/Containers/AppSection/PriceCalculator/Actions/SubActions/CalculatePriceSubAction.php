<?php

namespace App\Containers\AppSection\PriceCalculator\Actions\SubActions;

use App\Containers\AppSection\PriceCalculator\DTO\RideDTO;
use App\Containers\AppSection\PriceCalculator\DTO\RouteDTO;
use App\Containers\AppSection\PriceCalculator\Tasks\CalculatePriceTask;
use App\Containers\AppSection\PriceCalculator\Tasks\GetRouteTask;
use Symfony\Component\HttpFoundation\Exception\BadRequestException;

class CalculatePriceSubAction
{
    public function run(int $drivePrice, array $addresses) :array
    {
        if(count($addresses) < 2){
            throw new BadRequestException('Minimum 2 address require');
        }

        $rides = [];

        /**@var $commonRoute RouteDTO*/
        $commonRoute = app(GetRouteTask::class)
            ->run($addresses[0], last($addresses));

        $countRoutes = count($addresses)-1;
        for ($i=0; $i < $countRoutes; $i++){

            /**@var $route RouteDTO*/
            $route = app(GetRouteTask::class)
                ->run($addresses[$i], $addresses[$i+1]);

            $price = app(CalculatePriceTask::class)->run(
                    $drivePrice  - ($price ?? 0), // left price
                    $countRoutes - $i, // left routes
                    $route->time,
                    $commonRoute->time);

            $ride = new RideDTO($route);
            $ride->price = $price;

            $rides[] = $ride;
        }

        return $rides;
    }
}
