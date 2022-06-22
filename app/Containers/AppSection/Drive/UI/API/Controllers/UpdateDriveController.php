<?php

namespace App\Containers\AppSection\Drive\UI\API\Controllers;

use Apiato\Core\Exceptions\IncorrectIdException;
use Apiato\Core\Exceptions\InvalidTransformerException;
use App\Containers\AppSection\Drive\Actions\UpdateDriveAction;
use App\Containers\AppSection\Drive\UI\API\Requests\UpdateDriveRequest;
use App\Containers\AppSection\Drive\UI\API\Transformers\DriveTransformer;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Controllers\ApiController;

class UpdateDriveController extends ApiController
{
    /**
     * @param UpdateDriveRequest $request
     * @return array
     * @throws InvalidTransformerException
     * @throws UpdateResourceFailedException
     * @throws IncorrectIdException
     * @throws NotFoundException
     */
    public function updateDrive(UpdateDriveRequest $request): array
    {
        $data = $request->input();
        $data['id'] = $request->id;
        $drive = app(UpdateDriveAction::class)->run($data);

        return $this->transform($drive, DriveTransformer::class);
    }
}
