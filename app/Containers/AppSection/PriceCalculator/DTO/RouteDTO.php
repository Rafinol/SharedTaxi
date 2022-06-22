<?php


namespace App\Containers\AppSection\PriceCalculator\DTO;


class RouteDTO
{
    public string $startAddress;
    public string $finishAddress;
    public int $distance;
    public int $time;
}
