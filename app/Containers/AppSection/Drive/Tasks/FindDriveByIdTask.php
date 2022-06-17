<?php

namespace App\Containers\AppSection\Drive\Tasks;

use App\Containers\AppSection\Drive\Data\Repositories\DriveRepository;
use App\Containers\AppSection\Drive\Models\Drive;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Exception;

class FindDriveByIdTask extends ParentTask
{
    public function __construct(
        protected DriveRepository $repository
    ) {
    }

    /**
     * @throws NotFoundException
     */
    public function run($id): Drive
    {
        try {
            return $this->repository->find($id);
        } catch (Exception) {
            throw new NotFoundException();
        }
    }
}
