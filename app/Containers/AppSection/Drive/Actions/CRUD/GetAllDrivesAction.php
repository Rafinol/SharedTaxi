<?php

namespace App\Containers\AppSection\Drive\Actions\CRUD;

use Apiato\Core\Exceptions\CoreInternalErrorException;
use App\Containers\AppSection\Drive\Tasks\GetAllDrivesTask;
use App\Ship\Parents\Actions\Action as ParentAction;
use Prettus\Repository\Exceptions\RepositoryException;

class GetAllDrivesAction extends ParentAction
{
    /**
     * @throws CoreInternalErrorException
     * @throws RepositoryException
     */
    public function run(array $data): mixed
    {
        return app(GetAllDrivesTask::class)->run();
    }
}
