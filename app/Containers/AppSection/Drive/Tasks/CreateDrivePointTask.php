<?php

namespace App\Containers\AppSection\Drive\Tasks;

use App\Containers\AppSection\Drive\Data\Repositories\DrivePointRepository;
use App\Containers\AppSection\Drive\Models\DrivePoint;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Exception;

class CreateDrivePointTask extends ParentTask
{
    public function __construct(
        protected DrivePointRepository $repository
    ) {
    }

    /**
     * @throws CreateResourceFailedException
     */
    public function run(array $data): DrivePoint
    {
        try {
            $last_raw = DrivePoint::whereDriveId($data['drive_id'])
                ->orderBy('position', 'desc')
                ->first();

            $data['position'] = $last_raw ? $last_raw->position+1 : 0;
            return $this->repository->create($data);

        } catch (Exception $e) {
            throw new CreateResourceFailedException();
        }
    }
}
