<?php

namespace App\Containers\AppSection\Drive\UI\API\Transformers;

use App\Containers\AppSection\Drive\Models\DrivePoint;
use App\Ship\Parents\Transformers\Transformer as ParentTransformer;

class DrivePointTransformer extends ParentTransformer
{
    protected array $defaultIncludes = [

    ];

    protected array $availableIncludes = [

    ];

    public function transform(DrivePoint $drivepoint): array
    {
        $response = [
            'object' => $drivepoint->getResourceKey(),
            'id' => $drivepoint->getHashedKey(),
        ];

        return $this->ifAdmin([
            'real_id' => $drivepoint->id,
            'created_at' => $drivepoint->created_at,
            'updated_at' => $drivepoint->updated_at,
            'readable_created_at' => $drivepoint->created_at->diffForHumans(),
            'readable_updated_at' => $drivepoint->updated_at->diffForHumans(),
            // 'deleted_at' => $drivepoint->deleted_at,
        ], $response);
    }
}
