<?php


namespace App\Containers\AppSection\PriceCalculator\Services\Map;


class MockMapService implements MapService
{

    public function getDistanceM(string $address_start, string $address_finish): int
    {
        return rand(500, 3000);
    }

    public function getTimeS(string $address_start, string $address_finish): int
    {
        return rand(5*60, 20*60);
    }
}
