<?php

namespace App\Containers\AppSection\Order\UI\WEB\Controllers;

use App\Containers\AppSection\Order\Actions\GetAllOrdersAction;
use App\Containers\AppSection\Order\UI\WEB\Requests\GetAllOrdersRequest;
use App\Ship\Parents\Controllers\WebController;

class GetAllOrdersController extends WebController
{
    public function index(GetAllOrdersRequest $request)
    {
        $orders = app(GetAllOrdersAction::class)->run($request);
        // ..
    }
}
