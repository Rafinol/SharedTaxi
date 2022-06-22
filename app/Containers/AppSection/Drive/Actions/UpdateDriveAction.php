<?php

namespace App\Containers\AppSection\Drive\Actions;

use Apiato\Core\Exceptions\IncorrectIdException;
use App\Containers\AppSection\Drive\Actions\SubActions\CalculatePriceForDrivePointsAction;
use App\Containers\AppSection\Drive\Models\Drive;
use App\Containers\AppSection\Drive\Tasks\UpdateDrivePointPriseViaRidesTask;
use App\Containers\AppSection\Drive\Tasks\UpdateDriveTask;
use App\Containers\AppSection\Drive\UI\API\Requests\UpdateDriveRequest;
use App\Containers\AppSection\PriceCalculator\Actions\SubActions\CalculatePriceSubAction;
use App\Containers\AppSection\PriceCalculator\DTO\CalculatorPriceRequestDTO;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Actions\Action as ParentAction;

class UpdateDriveAction extends ParentAction
{
    /**
     * @return Drive
     * @throws UpdateResourceFailedException
     * @throws IncorrectIdException
     * @throws NotFoundException
     */
    public function run(array $data): Drive
    {
        $drive = Drive::whereId($data['id'])->firstOrFail();
        $old_price = $drive->price;
        $drive = app(UpdateDriveTask::class)->run($data, $data['id']);
        if($old_price != $data['price']){
            $points = $drive->pointsSortByPosition;
            $requestDTO = new CalculatorPriceRequestDTO($data['price'], $points->pluck('point')->toArray());
            $rides = app(CalculatePriceSubAction::class)->run($requestDTO);
            app(UpdateDrivePointPriseViaRidesTask::class)->run($rides, $points->all());
        }
        return $drive;
    }
}
