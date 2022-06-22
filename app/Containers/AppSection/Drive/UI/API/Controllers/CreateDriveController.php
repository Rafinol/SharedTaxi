<?php

namespace App\Containers\AppSection\Drive\UI\API\Controllers;

use Apiato\Core\Exceptions\IncorrectIdException;
use Apiato\Core\Exceptions\InvalidTransformerException;
use App\Containers\AppSection\Drive\Actions\CRUD\CreateDriveAction;
use App\Containers\AppSection\Drive\UI\API\Requests\CreateDriveRequest;
use App\Containers\AppSection\Drive\UI\API\Transformers\DriveTransformer;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Controllers\ApiController;
use Illuminate\Http\JsonResponse;

class CreateDriveController extends ApiController
{
    /**
     * @param CreateDriveRequest $request
     * @return JsonResponse
     * @throws CreateResourceFailedException
     * @throws InvalidTransformerException
     * @throws IncorrectIdException
     */
    public function createDrive(CreateDriveRequest $request): JsonResponse
    {
        $drive = app(CreateDriveAction::class)->run($request);

        return $this->created($this->transform($drive, DriveTransformer::class));
    }
}
