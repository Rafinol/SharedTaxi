<?php

namespace App\Containers\AppSection\Drive\UI\API\Controllers;

use Apiato\Core\Exceptions\CoreInternalErrorException;
use Apiato\Core\Exceptions\InvalidTransformerException;
use App\Containers\AppSection\Drive\Actions\GetAllDrivesAction;
use App\Containers\AppSection\Drive\UI\API\Requests\GetAllDrivesRequest;
use App\Containers\AppSection\Drive\UI\API\Transformers\DriveTransformer;
use App\Ship\Parents\Controllers\ApiController;
use Prettus\Repository\Exceptions\RepositoryException;

class GetAllDrivesController extends ApiController
{
    /**
     * @throws InvalidTransformerException
     * @throws CoreInternalErrorException
     * @throws RepositoryException
     */
    public function getAllDrives(GetAllDrivesRequest $request): array
    {
        $drives = app(GetAllDrivesAction::class)->run($request);

        return $this->transform($drives, DriveTransformer::class);
    }
}
