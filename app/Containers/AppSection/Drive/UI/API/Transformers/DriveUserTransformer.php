<?php

namespace App\Containers\AppSection\Drive\UI\API\Transformers;

use App\Containers\AppSection\Drive\Models\DriveUser;
use App\Ship\Parents\Transformers\Transformer as ParentTransformer;

class DriveUserTransformer extends ParentTransformer
{
    protected array $defaultIncludes = [

    ];

    protected array $availableIncludes = [

    ];

    public function transform(DriveUser $driveuser): array
    {
        $response = [
            'object' => $driveuser->getResourceKey(),
            'id' => $driveuser->getHashedKey(),
        ];

        return $this->ifAdmin([
            'real_id' => $driveuser->id,
            'created_at' => $driveuser->created_at,
            'updated_at' => $driveuser->updated_at,
            'readable_created_at' => $driveuser->created_at->diffForHumans(),
            'readable_updated_at' => $driveuser->updated_at->diffForHumans(),
            // 'deleted_at' => $driveuser->deleted_at,
        ], $response);
    }
}
