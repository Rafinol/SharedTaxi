<?php

namespace App\Containers\AppSection\Order\UI\WEB\Controllers;

use App\Containers\AppSection\Order\Actions\FindOrderByIdAction;
use App\Containers\AppSection\Order\Actions\UpdateOrderAction;
use App\Containers\AppSection\Order\UI\WEB\Requests\EditOrderRequest;
use App\Containers\AppSection\Order\UI\WEB\Requests\UpdateOrderRequest;
use App\Ship\Parents\Controllers\WebController;

class UpdateOrderController extends WebController
{
    public function edit(EditOrderRequest $request)
    {
        $order = app(FindOrderByIdAction::class)->run($request);
        // ..
    }

    public function update(UpdateOrderRequest $request)
    {
        $order = app(UpdateOrderAction::class)->run($request);
        // ..
    }
}
