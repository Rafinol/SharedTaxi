<?php

namespace App\Containers\AppSection\PriceCalculator\Actions;

use App\Containers\AppSection\PriceCalculator\Actions\SubActions\CalculatePriceSubAction;
use App\Containers\AppSection\PriceCalculator\DTO\CalculatorPriceRequestDTO;
use App\Ship\Parents\Actions\Action as ParentAction;

class GetRidesPricesAction extends ParentAction
{
    public function run(CalculatorPriceRequestDTO $data)
    {
        return app(CalculatePriceSubAction::class)->run($data);
    }
}
