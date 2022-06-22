<?php

namespace App\Containers\AppSection\Drive\Actions;

use App\Containers\AppSection\Drive\Models\Drive;
use App\Containers\AppSection\Drive\Tasks\UpdateDrivePointPriseViaRidesTask;
use App\Containers\AppSection\PriceCalculator\Actions\SubActions\CalculatePriceSubAction;
use App\Ship\Parents\Actions\Action as ParentAction;

class SetPriceForDriveAction extends ParentAction
{
    public function run(int $drive_id, int $price) :Drive
    {
        $drive = Drive::whereId($drive_id)->firstOrFail();
        $drive->setPrice($price);

        $points = $drive->pointsSortByPosition;
        $addresses = $points->pluck('point')->toArray();

        $rides = app(CalculatePriceSubAction::class)->run($price, $addresses);

        app(UpdateDrivePointPriseViaRidesTask::class)->run($rides, $points);

        return $drive;
    }


}
