<?php

namespace App\Containers\AppSection\Drive\Actions;

use App\Containers\AppSection\Drive\Models\Drive;
use App\Containers\AppSection\Drive\Tasks\CreateDrivePointTask;
use App\Containers\AppSection\Drive\Tasks\CreateDriveTask;
use App\Containers\AppSection\Drive\Tasks\CreateDriveUserTask;
use App\Containers\AppSection\Order\Models\Order;
use App\Ship\Parents\Actions\Action as ParentAction;
use Illuminate\Support\Facades\Auth;

class OrderJoinAction extends ParentAction
{
    public function run(array $data) :Drive
    {
        $orderId = $data['order_id'];
        $order = Order::whereId($orderId)->firstOrFail();
        $additional_point = $data['point'];
        $user_id = $data['user_id'];

        /** @var Drive */
        $drive = app(CreateDriveTask::class)->run([]);

        app(CreateDrivePointTask::class)->run([
            'drive_id' => $drive->id,
            'point' => $order->departure_address
        ]);
        app(CreateDrivePointTask::class)->run([
            'drive_id' => $drive->id,
            'point' => $order->arrival_address
        ]);
        if($additional_point){
            app(CreateDrivePointTask::class)->run([
                'drive_id' => $drive->id,
                'point' => $additional_point
            ]);
        }

        app(CreateDriveUserTask::class)->run([
            'drive_id' => $drive->id,
            'user_id' => $order->user_id,
            'is_maintainer' => 1,
        ]);
        app(CreateDriveUserTask::class)->run([
            'drive_id' => $drive->id,
            'user_id' => $user_id,
            'is_maintainer' => 0,
        ]);

        return $drive;
    }
}
