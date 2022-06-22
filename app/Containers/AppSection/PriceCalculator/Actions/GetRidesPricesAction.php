<?php

namespace App\Containers\AppSection\PriceCalculator\Actions;

use App\Containers\AppSection\PriceCalculator\Actions\SubActions\CalculatePriceSubAction;
use App\Ship\Parents\Actions\Action as ParentAction;

class GetRidesPricesAction extends ParentAction
{
    public function run(int $price, array $addresses)
    {
        return app(CalculatePriceSubAction::class)->run($price, $addresses);
    }
}
