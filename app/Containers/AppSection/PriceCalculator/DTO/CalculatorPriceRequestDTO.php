<?php


namespace App\Containers\AppSection\PriceCalculator\DTO;


class CalculatorPriceRequestDTO
{
    /**
     * @param int $price
     * @param $addresses string[]
     */
    public function __construct(public int $price, public array $addresses){
    }
}
