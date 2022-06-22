<?php

namespace App\Containers\AppSection\Drive\UI\API\Controllers;

use Apiato\Core\Exceptions\InvalidTransformerException;
use App\Containers\AppSection\Drive\Actions\CRUD\FindDriveByIdAction;
use App\Containers\AppSection\Drive\UI\API\Requests\FindDriveByIdRequest;
use App\Containers\AppSection\Drive\UI\API\Transformers\DriveTransformer;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Controllers\ApiController;

class FindDriveByIdController extends ApiController
{
    /**
     * @throws InvalidTransformerException|NotFoundException
     */
    public function findDriveById(FindDriveByIdRequest $request): array
    {
        $drive = app(FindDriveByIdAction::class)->run($request);

        return $this->transform($drive, DriveTransformer::class);
    }
}
