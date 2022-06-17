<?php

namespace App\Containers\AppSection\Drive\UI\API\Transformers;

use App\Containers\AppSection\Drive\Models\Drive;
use App\Ship\Parents\Transformers\Transformer as ParentTransformer;

class DriveTransformer extends ParentTransformer
{
    protected array $defaultIncludes = [

    ];

    protected array $availableIncludes = [

    ];

    public function transform(Drive $drive): array
    {
        $response = [
            'object' => $drive->getResourceKey(),
            'id' => $drive->getHashedKey(),
        ];

        return $this->ifAdmin([
            'real_id' => $drive->id,
            'created_at' => $drive->created_at,
            'updated_at' => $drive->updated_at,
            'readable_created_at' => $drive->created_at->diffForHumans(),
            'readable_updated_at' => $drive->updated_at->diffForHumans(),
            // 'deleted_at' => $drive->deleted_at,
        ], $response);
    }
}
