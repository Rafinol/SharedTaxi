<?php

namespace App\Containers\AppSection\Drive\Models;

use App\Ship\Parents\Models\Model as ParentModel;

class DriveUser extends ParentModel
{
    protected $fillable = [
        'drive_id',
        'user_id',
        'is_maintainer',
    ];

    protected $hidden = [

    ];

    protected $casts = [

    ];

    /**
     * A resource key to be used in the serialized responses.
     */
    protected string $resourceKey = 'DriveUser';
}
