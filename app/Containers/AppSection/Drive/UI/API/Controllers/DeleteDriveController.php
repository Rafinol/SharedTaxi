<?php

namespace App\Containers\AppSection\Drive\UI\API\Controllers;

use App\Containers\AppSection\Drive\Actions\DeleteDriveAction;
use App\Containers\AppSection\Drive\UI\API\Requests\DeleteDriveRequest;
use App\Ship\Exceptions\DeleteResourceFailedException;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Controllers\ApiController;
use Illuminate\Http\JsonResponse;

class DeleteDriveController extends ApiController
{
    /**
     * @param DeleteDriveRequest $request
     * @return JsonResponse
     * @throws DeleteResourceFailedException
     * @throws NotFoundException
     */
    public function deleteDrive(DeleteDriveRequest $request): JsonResponse
    {
        app(DeleteDriveAction::class)->run($request);

        return $this->noContent();
    }
}
