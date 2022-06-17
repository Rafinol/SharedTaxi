<?php

namespace App\Containers\AppSection\Drive\Actions;

use Apiato\Core\Exceptions\IncorrectIdException;
use App\Containers\AppSection\Drive\Models\DriveUser;
use App\Containers\AppSection\Drive\Tasks\CreateDriveUserTask;
use App\Containers\AppSection\Drive\UI\API\Requests\CreateDriveUserRequest;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Actions\Action as ParentAction;

class CreateDriveUserAction extends ParentAction
{
    /**
     * @return DriveUser
     * @throws CreateResourceFailedException
     * @throws IncorrectIdException
     */
    public function run(array $data): DriveUser
    {
        return app(CreateDriveUserTask::class)->run($data);
    }
}
