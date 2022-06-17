<?php

namespace App\Containers\AppSection\Drive\UI\WEB\Controllers;

use App\Containers\AppSection\Drive\Actions\FindDriveByIdAction;
use App\Containers\AppSection\Drive\UI\WEB\Requests\FindDriveByIdRequest;
use App\Ship\Parents\Controllers\WebController;

class FindDriveByIdController extends WebController
{
    public function show(FindDriveByIdRequest $request)
    {
        $drive = app(FindDriveByIdAction::class)->run($request);
        // ..
    }
}
