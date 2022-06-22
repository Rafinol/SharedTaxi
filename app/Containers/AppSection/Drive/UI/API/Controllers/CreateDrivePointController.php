<?php

namespace App\Containers\AppSection\Drive\UI\API\Controllers;

use App\Containers\AppSection\Drive\Actions\CRUD\CreateDrivePointAction;
use App\Containers\AppSection\Drive\UI\API\Requests\CreateDrivePointRequest;
use App\Containers\AppSection\Drive\UI\API\Transformers\DrivePointTransformer;
use App\Ship\Parents\Controllers\ApiController;
use Illuminate\Http\JsonResponse;

class CreateDrivePointController extends ApiController
{
    public function createPoint(CreateDrivePointRequest $request): JsonResponse
    {
        $data = [
            'drive_id' => $request->drive_id,
            'point' => $request->point,
        ];
        $point = app(CreateDrivePointAction::class)->run($data);

        return $this->created($this->transform($point, DrivePointTransformer::class));
    }
}
