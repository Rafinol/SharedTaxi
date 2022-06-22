<?php

namespace App\Containers\AppSection\Drive\Tasks;

use App\Containers\AppSection\Drive\Models\DrivePoint;
use App\Containers\AppSection\PriceCalculator\DTO\RideDTO;
use App\Ship\Parents\Tasks\Task as ParentTask;

class UpdateDrivePointPriseViaRidesTask extends ParentTask
{
    public function __construct()
    {
        // ..
    }

    /** @var $rides RideDTO[]*/
    /** @var $points DrivePoint[]*/
    public function run(array $rides, array $points) :void
    {
        $rides = collect($rides)->keyBy('route.finishAddress')->all();
        foreach ($points as $point){
            if(isset($rides[$point->address])){
                $point->price = $rides[$point->address]->price;
                $point->save();
            }
        }
    }
}
