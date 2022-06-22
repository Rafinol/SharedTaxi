<?php

namespace App\Containers\AppSection\Drive\UI\API\Controllers;

use App\Containers\AppSection\Drive\Actions\OrderJoinAction;
use App\Containers\AppSection\Drive\UI\API\Requests\OrderJoinRequest;
use App\Ship\Parents\Controllers\ApiController;
use Illuminate\Support\Facades\Auth;

class OrderJoinController extends ApiController
{
    public function join(OrderJoinRequest $request) :array
    {
        $drive = app(OrderJoinAction::class)->run([
            'order_id' => $request->id,
            'point' => $request->point,
            'user_id' => Auth::id(),
        ]);
        return ['drive_id' => $drive->id];
    }
}
