<?php


namespace App\Containers\AppSection\PriceCalculator\DTO;


class RideDTO extends RouteDTO
{
    public function __construct(public RouteDTO $route){
    }
    public int $price;
}
