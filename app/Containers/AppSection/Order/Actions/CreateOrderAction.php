<?php

namespace App\Containers\AppSection\Order\Actions;

use Apiato\Core\Exceptions\IncorrectIdException;
use App\Containers\AppSection\Order\Models\Order;
use App\Containers\AppSection\Order\Tasks\CreateOrderTask;
use App\Containers\AppSection\Order\UI\API\Requests\CreateOrderRequest;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Actions\Action as ParentAction;

class CreateOrderAction extends ParentAction
{
    /**
     * @return Order
     * @throws CreateResourceFailedException
     * @throws IncorrectIdException
     */
    public function run(array $data): Order
    {
        return app(CreateOrderTask::class)->run($data);
    }
}
