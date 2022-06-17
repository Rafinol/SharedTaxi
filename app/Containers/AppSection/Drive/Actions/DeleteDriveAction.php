<?php

namespace App\Containers\AppSection\Drive\Actions;

use App\Containers\AppSection\Drive\Tasks\DeleteDriveTask;
use App\Containers\AppSection\Drive\UI\API\Requests\DeleteDriveRequest;
use App\Ship\Exceptions\DeleteResourceFailedException;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Actions\Action as ParentAction;

class DeleteDriveAction extends ParentAction
{
    /**
     * @param DeleteDriveRequest $request
     * @return int
     * @throws DeleteResourceFailedException
     * @throws NotFoundException
     */
    public function run(DeleteDriveRequest $request): int
    {
        return app(DeleteDriveTask::class)->run($request->id);
    }
}
