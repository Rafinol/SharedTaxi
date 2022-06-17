<?php

namespace App\Containers\AppSection\Order\UI\WEB\Controllers;

use App\Containers\AppSection\Order\Actions\DeleteOrderAction;
use App\Containers\AppSection\Order\UI\WEB\Requests\DeleteOrderRequest;
use App\Ship\Parents\Controllers\WebController;

class DeleteOrderController extends WebController
{
    public function destroy(DeleteOrderRequest $request)
    {
         $result = app(DeleteOrderAction::class)->run($request);
         // ..
    }
}
