<?php

namespace App\Containers\AppSection\Drive\Actions;

use Apiato\Core\Exceptions\IncorrectIdException;
use App\Containers\AppSection\Drive\Models\Drive;
use App\Containers\AppSection\Drive\Tasks\UpdateDriveTask;
use App\Containers\AppSection\Drive\UI\API\Requests\UpdateDriveRequest;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Actions\Action as ParentAction;

class UpdateDriveAction extends ParentAction
{
    /**
     * @param UpdateDriveRequest $request
     * @return Drive
     * @throws UpdateResourceFailedException
     * @throws IncorrectIdException
     * @throws NotFoundException
     */
    public function run(UpdateDriveRequest $request): Drive
    {
        $data = $request->sanitizeInput([
            // add your request data here
        ]);

        return app(UpdateDriveTask::class)->run($data, $request->id);
    }
}
