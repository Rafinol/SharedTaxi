<?php

namespace App\Containers\AppSection\PriceCalculator\Tasks;

use App\Containers\AppSection\Drive\Dto\DriveParametersDto;
use App\Ship\Parents\Tasks\Task as ParentTask;

class CalculatePriceTask extends ParentTask
{
    /*
     *    t1 * price
     *    ----------     (x - count of drives,  t1 - current drive time, t0 - whole drive time )
     *      x * t0
     *
     * */
    public function run(int $price,
                        int $driveCount,
                        int $currentTime,
                        int $commonTime) :int
    {
        if($driveCount == 1){
            return $price;
        }
        $coef = min(
            $currentTime / $commonTime,
            $driveCount) ; // Cant pay more than whole price
        return $coef * $price / $driveCount;
    }
}
