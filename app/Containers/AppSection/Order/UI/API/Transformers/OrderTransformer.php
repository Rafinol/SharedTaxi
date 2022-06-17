<?php

namespace App\Containers\AppSection\Order\UI\API\Transformers;

use App\Containers\AppSection\Order\Models\Order;
use App\Ship\Parents\Transformers\Transformer as ParentTransformer;

class OrderTransformer extends ParentTransformer
{
    protected array $defaultIncludes = [

    ];

    protected array $availableIncludes = [

    ];

    public function transform(Order $order): array
    {
        $response = [
            'object' => $order->getResourceKey(),
            'id' => $order->getHashedKey(),
            'departure_address' => $order->departure_address,
            'arrival_address' => $order->arrival_address,
            'earliest_time' => $order->earliest_time,
            'latest_time' => $order->latest_time,
            'user' => [
                'name' => $order->user->name,
                'phone' => $order->user->phone,
            ]
        ];

        return $this->ifAdmin([
            'real_id' => $order->id,
            'created_at' => $order->created_at,
            'updated_at' => $order->updated_at,
            'readable_created_at' => $order->created_at->diffForHumans(),
            'readable_updated_at' => $order->updated_at->diffForHumans(),
            // 'deleted_at' => $order->deleted_at,
        ], $response);
    }
}
