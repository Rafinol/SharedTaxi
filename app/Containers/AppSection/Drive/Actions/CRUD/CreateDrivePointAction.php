<?php

namespace App\Containers\AppSection\Drive\Actions\CRUD;

use Apiato\Core\Exceptions\IncorrectIdException;
use App\Containers\AppSection\Drive\Models\DrivePoint;
use App\Containers\AppSection\Drive\Tasks\CreateDrivePointTask;
use App\Containers\AppSection\Drive\UI\API\Requests\CreateDrivePointRequest;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Actions\Action as ParentAction;

class CreateDrivePointAction extends ParentAction
{
    /**
     * @return DrivePoint
     * @throws CreateResourceFailedException
     * @throws IncorrectIdException
     */
    public function run(array $data): DrivePoint
    {
        return app(CreateDrivePointTask::class)->run($data);
    }
}
