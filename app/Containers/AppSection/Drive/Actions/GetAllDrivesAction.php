<?php

namespace App\Containers\AppSection\Drive\Actions;

use Apiato\Core\Exceptions\CoreInternalErrorException;
use App\Containers\AppSection\Drive\Tasks\GetAllDrivesTask;
use App\Containers\AppSection\Drive\UI\API\Requests\GetAllDrivesRequest;
use App\Ship\Parents\Actions\Action as ParentAction;
use Prettus\Repository\Exceptions\RepositoryException;

class GetAllDrivesAction extends ParentAction
{
    /**
     * @throws CoreInternalErrorException
     * @throws RepositoryException
     */
    public function run(GetAllDrivesRequest $request): mixed
    {
        return app(GetAllDrivesTask::class)->run();
    }
}
