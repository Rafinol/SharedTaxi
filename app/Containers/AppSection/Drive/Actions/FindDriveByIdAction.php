<?php

namespace App\Containers\AppSection\Drive\Actions;

use App\Containers\AppSection\Drive\Models\Drive;
use App\Containers\AppSection\Drive\Tasks\FindDriveByIdTask;
use App\Containers\AppSection\Drive\UI\API\Requests\FindDriveByIdRequest;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Actions\Action as ParentAction;

class FindDriveByIdAction extends ParentAction
{
    /**
     * @throws NotFoundException
     */
    public function run(FindDriveByIdRequest $request): Drive
    {
        return app(FindDriveByIdTask::class)->run($request->id);
    }
}
