<?php

namespace App\Containers\AppSection\Drive\Actions;

use App\Containers\AppSection\Drive\Models\Drive;
use App\Containers\AppSection\Drive\Tasks\UpdateDrivePointPriseViaRidesTask;
use App\Containers\AppSection\PriceCalculator\Actions\SubActions\CalculatePriceSubAction;
use App\Containers\AppSection\PriceCalculator\DTO\CalculatorPriceRequestDTO;
use App\Ship\Parents\Actions\Action as ParentAction;

class SetPriceForDrive extends ParentAction
{
    public function run(int $drive_id, int $price)
    {
        $drive = Drive::whereId($drive_id)->firstOrFail();
        $drive->setPrice($price);
        $points = $drive->pointsSortByPosition->pluck('point')->toArray();
        $requestDTO = new CalculatorPriceRequestDTO($price, $points);
        $rides = app(CalculatePriceSubAction::class)->run($requestDTO);
        app(UpdateDrivePointPriseViaRidesTask::class)->run($rides, $points);
    }


}
