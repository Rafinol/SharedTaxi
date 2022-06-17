<?php

namespace App\Containers\AppSection\Order\UI\WEB\Controllers;

use App\Containers\AppSection\Order\Actions\CreateOrderAction;
use App\Containers\AppSection\Order\UI\WEB\Requests\CreateOrderRequest;
use App\Ship\Parents\Controllers\WebController;
use Illuminate\Support\Facades\Auth;

class CreateOrderController extends WebController
{
    public function create(CreateOrderRequest $request)
    {
        $data = $request->all();
        $data['user_id'] = Auth::id();
        $order = app(CreateOrderAction::class)->run($data);
        return redirect()->route('findOrderById', [$order]);
    }
}
