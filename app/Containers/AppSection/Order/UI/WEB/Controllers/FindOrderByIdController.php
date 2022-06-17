<?php

namespace App\Containers\AppSection\Order\UI\WEB\Controllers;

use App\Containers\AppSection\Order\Actions\FindOrderByIdAction;
use App\Containers\AppSection\Order\UI\WEB\Requests\FindOrderByIdRequest;
use App\Ship\Parents\Controllers\WebController;

class FindOrderByIdController extends WebController
{
    public function show(FindOrderByIdRequest $request)
    {
        $order = app(FindOrderByIdAction::class)->run($request);
        // ..
    }
}
