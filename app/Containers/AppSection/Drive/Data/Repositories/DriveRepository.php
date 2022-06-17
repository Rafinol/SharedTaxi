<?php

namespace App\Containers\AppSection\Drive\Data\Repositories;

use App\Ship\Parents\Repositories\Repository as ParentRepository;

class DriveRepository extends ParentRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id' => '=',
        // ...
    ];
}
