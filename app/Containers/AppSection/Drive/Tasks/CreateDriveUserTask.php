<?php

namespace App\Containers\AppSection\Drive\Tasks;

use App\Containers\AppSection\Drive\Data\Repositories\DriveUserRepository;
use App\Containers\AppSection\Drive\Models\DriveUser;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Exception;
use Illuminate\Support\Facades\Log;

class CreateDriveUserTask extends ParentTask
{
    public function __construct(
        protected DriveUserRepository $repository
    ) {
    }

    /**
     * @throws CreateResourceFailedException
     */
    public function run(array $data): DriveUser
    {
        try {
            return $this->repository->create($data);
        } catch (Exception $e) {
            Log::error($e->getMessage());
            throw new CreateResourceFailedException();
        }
    }
}
