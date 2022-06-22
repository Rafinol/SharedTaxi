<?php

namespace App\Containers\AppSection\Drive\Actions;

use Apiato\Core\Exceptions\IncorrectIdException;
use App\Containers\AppSection\Drive\Models\Drive;
use App\Containers\AppSection\Drive\Tasks\CreateDriveTask;
use App\Containers\AppSection\Drive\UI\API\Requests\CreateDriveRequest;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Actions\Action as ParentAction;

class CreateDriveAction extends ParentAction
{
    /**
     * @param CreateDriveRequest $request
     * @return Drive
     * @throws CreateResourceFailedException
     * @throws IncorrectIdException
     */
    public function run(array $data): Drive
    {
        return app(CreateDriveTask::class)->run($data);
    }
}
