<?php

namespace App\Containers\AppSection\Drive\Models;

use App\Ship\Parents\Models\Model as ParentModel;

class DrivePoint extends ParentModel
{
    protected $fillable = [
        'drive_id',
        'point',
        'position',
    ];

    protected $hidden = [

    ];

    protected $casts = [

    ];

    /**
     * A resource key to be used in the serialized responses.
     */
    protected string $resourceKey = 'DrivePoint';
}
