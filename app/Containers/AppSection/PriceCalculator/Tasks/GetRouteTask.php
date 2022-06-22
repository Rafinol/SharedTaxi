<?php

namespace App\Containers\AppSection\PriceCalculator\Tasks;

use App\Containers\AppSection\PriceCalculator\DTO\RideDTO;
use App\Containers\AppSection\PriceCalculator\DTO\RouteDTO;
use App\Containers\AppSection\PriceCalculator\Services\Map\MapService;
use App\Ship\Parents\Tasks\Task as ParentTask;

class GetRouteTask extends ParentTask
{
    public function __construct(private MapService $mapService){
    }

    public function run(string $startAddress, string $finishAddress) :RouteDTO
    {
        $parameters = new RouteDTO();
        $parameters->startAddress = $startAddress;
        $parameters->finishAddress = $finishAddress;

        $parameters->distance = $this->mapService->getDistanceM($startAddress, $finishAddress);
        $parameters->time = $this->mapService->getTimeS($startAddress, $finishAddress);

        return $parameters;
    }
}
