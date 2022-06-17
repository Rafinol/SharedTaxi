<?php

namespace App\Containers\AppSection\Drive\UI\WEB\Controllers;

use App\Containers\AppSection\Drive\Actions\DeleteDriveAction;
use App\Containers\AppSection\Drive\UI\WEB\Requests\DeleteDriveRequest;
use App\Ship\Parents\Controllers\WebController;

class DeleteDriveController extends WebController
{
    public function destroy(DeleteDriveRequest $request)
    {
         $result = app(DeleteDriveAction::class)->run($request);
         // ..
    }
}
