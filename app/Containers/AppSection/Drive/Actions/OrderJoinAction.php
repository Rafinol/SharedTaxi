<?php

namespace App\Containers\AppSection\Drive\Actions;

use App\Containers\AppSection\Drive\Models\Drive;
use App\Containers\AppSection\Drive\Tasks\CreateDrivePointTask;
use App\Containers\AppSection\Drive\Tasks\CreateDriveTask;
use App\Containers\AppSection\Drive\Tasks\CreateDriveUserTask;
use App\Containers\AppSection\Order\Models\Order;
use App\Ship\Parents\Actions\Action as ParentAction;

class OrderJoinAction extends ParentAction
{
    public function run(array $data) :Drive
    {
        $orderId = $data['order_id'];
        $userId = $data['user_id'];
        $joiningAddress = $data['point'];

        /** @var $order Order*/
        $order = Order::findOrFail($orderId);

        $drive = $this->createDrive();

        $this->addPointsToDrive($drive->id, [
            $order->departure_address,
            $order->arrival_address,
            $joiningAddress
        ]);

        $this->addUsersToDrive($drive->id, $order->user_id, $userId);

        return $drive;
    }

    private function createDrive() :Drive
    {
        /** @var $drive Drive */
        return app(CreateDriveTask::class)->run([]);
    }

    private function addPointsToDrive(int $drive_id, array $addresses) :void
    {
        $createDrivePointTask = app(CreateDrivePointTask::class);

        foreach ($addresses as $address){
            if(!$address){
                continue;
            }
            $createDrivePointTask->run([
                'drive_id' => $drive_id,
                'address' => $address
            ]);
        }
    }

    private function addUsersToDrive(int $drive_id, int $main_user_id, $user_id) :void
    {
        $createDriveUserTask = app(CreateDriveUserTask::class);

        $createDriveUserTask->run([
            'drive_id' => $drive_id,
            'user_id' => $main_user_id,
            'is_maintainer' => 1,
        ]);
        $createDriveUserTask->run([
            'drive_id' => $drive_id,
            'user_id' => $user_id,
            'is_maintainer' => 0,
        ]);
    }
}
