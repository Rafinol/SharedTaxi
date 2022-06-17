<?php

namespace App\Containers\AppSection\Drive\UI\WEB\Controllers;

use App\Containers\AppSection\Drive\Actions\FindDriveByIdAction;
use App\Containers\AppSection\Drive\Actions\UpdateDriveAction;
use App\Containers\AppSection\Drive\UI\WEB\Requests\EditDriveRequest;
use App\Containers\AppSection\Drive\UI\WEB\Requests\UpdateDriveRequest;
use App\Ship\Parents\Controllers\WebController;

class UpdateDriveController extends WebController
{
    public function edit(EditDriveRequest $request)
    {
        $drive = app(FindDriveByIdAction::class)->run($request);
        // ..
    }

    public function update(UpdateDriveRequest $request)
    {
        $drive = app(UpdateDriveAction::class)->run($request);
        // ..
    }
}
