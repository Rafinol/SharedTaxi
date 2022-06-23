<?php

namespace App\Containers\AppSection\Drive\Tasks;

use App\Containers\AppSection\Drive\Data\Repositories\DriveRepository;
use App\Containers\AppSection\Drive\Models\Drive;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Exception;
use Illuminate\Support\Facades\Log;

class CreateDriveTask extends ParentTask
{
    public function __construct(
        protected DriveRepository $repository
    ) {
    }

    /**
     * @throws CreateResourceFailedException
     */
    public function run(array $data): Drive
    {
        try {
            $data = array_merge(
                $data,
                ['status' => Drive::CREATED_STATUS]
            );
            return $this->repository->create($data);
        } catch (Exception $e) {
            Log::error($e->getMessage());
            throw new CreateResourceFailedException();
        }
    }
}
