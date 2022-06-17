<?php

namespace App\Containers\AppSection\Drive\UI\WEB\Controllers;

use App\Containers\AppSection\Drive\Actions\CreateDriveAction;
use App\Containers\AppSection\Drive\UI\WEB\Requests\CreateDriveRequest;
use App\Containers\AppSection\Drive\UI\WEB\Requests\StoreDriveRequest;
use App\Ship\Parents\Controllers\WebController;

class CreateDriveController extends WebController
{
    public function create(CreateDriveRequest $request)
    {
        // ..
    }

    public function store(StoreDriveRequest $request)
    {
        $drive = app(CreateDriveAction::class)->run($request);
        // ..
    }
}
