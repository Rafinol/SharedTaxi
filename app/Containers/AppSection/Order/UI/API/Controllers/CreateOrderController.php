<?php

namespace App\Containers\AppSection\Order\UI\API\Controllers;

use Apiato\Core\Exceptions\IncorrectIdException;
use Apiato\Core\Exceptions\InvalidTransformerException;
use App\Containers\AppSection\Order\Actions\CreateOrderAction;
use App\Containers\AppSection\Order\UI\API\Requests\CreateOrderRequest;
use App\Containers\AppSection\Order\UI\API\Transformers\OrderTransformer;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Controllers\ApiController;
use Carbon\Carbon;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;

class CreateOrderController extends ApiController
{
    /**
     * @param CreateOrderRequest $request
     * @return JsonResponse
     * @throws CreateResourceFailedException
     * @throws InvalidTransformerException
     * @throws IncorrectIdException
     */
    public function createOrder(CreateOrderRequest $request): JsonResponse
    {
        $data = [
            'user_id' => Auth::id(),
            'departure_address' => $request->departure_address,
            'arrival_address' => $request->arrival_address,
            'earliest_time' => Carbon::createFromFormat('H:i', $request->earliest_time),
            'latest_time' => Carbon::createFromFormat('H:i', $request->latest_time),
        ];

        $order = app(CreateOrderAction::class)->run($data);

        return $this->created($this->transform($order, OrderTransformer::class));
    }
}
