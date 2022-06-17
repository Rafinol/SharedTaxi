<?php

namespace App\Containers\AppSection\Drive\UI\WEB\Controllers;

use App\Containers\AppSection\Drive\Actions\GetAllDrivesAction;
use App\Containers\AppSection\Drive\UI\WEB\Requests\GetAllDrivesRequest;
use App\Ship\Parents\Controllers\WebController;

class GetAllDrivesController extends WebController
{
    public function index(GetAllDrivesRequest $request)
    {
        $drives = app(GetAllDrivesAction::class)->run($request);
        // ..
    }
}
