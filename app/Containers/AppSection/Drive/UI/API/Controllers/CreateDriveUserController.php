<?php

namespace App\Containers\AppSection\Drive\UI\API\Controllers;

use Apiato\Core\Exceptions\IncorrectIdException;
use Apiato\Core\Exceptions\InvalidTransformerException;
use App\Containers\AppSection\Drive\Actions\CreateDriveUserAction;
use App\Containers\AppSection\Drive\UI\API\Requests\CreateDriveUserRequest;
use App\Containers\AppSection\Drive\UI\API\Transformers\DriveUserTransformer;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Controllers\ApiController;
use Illuminate\Http\JsonResponse;

class CreateDriveUserController extends ApiController
{
    /**
     * @param CreateDriveUserRequest $request
     * @return JsonResponse
     * @throws CreateResourceFailedException
     * @throws InvalidTransformerException
     * @throws IncorrectIdException
     */
    public function createDriveUser(CreateDriveUserRequest $request): JsonResponse
    {
        $data = [
            'drive_id' => $request->drive_id,
            'user_id' => $request->user_id,
            'is_maintainer' => $request->is_maintainer,
        ];
        $driveuser = app(CreateDriveUserAction::class)->run($data);

        return $this->created($this->transform($driveuser, DriveUserTransformer::class));
    }
}
