<?php
namespace App\Containers\AppSection\PriceCalculator\Services\Map;

interface MapService
{
    public function getDistanceM(string $address_start, string $address_finish) :int; // metres

    public function getTimeS(string $address_start, string $address_finish) :int; //seconds
}
