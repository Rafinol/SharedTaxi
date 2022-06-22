<?php

namespace App\Containers\AppSection\PriceCalculator\UI\API\Controllers;

use Apiato\Core\Exceptions\CoreInternalErrorException;
use Apiato\Core\Exceptions\InvalidTransformerException;
use App\Containers\AppSection\PriceCalculator\Actions\GetRidesPricesAction;
use App\Containers\AppSection\PriceCalculator\DTO\CalculatorPriceRequestDTO;
use App\Containers\AppSection\PriceCalculator\UI\API\Requests\GetRidesPricesRequest;
use App\Ship\Parents\Controllers\ApiController;
use Prettus\Repository\Exceptions\RepositoryException;

class GetRidesPricesController extends ApiController
{
    /**
     * @throws InvalidTransformerException
     * @throws CoreInternalErrorException
     * @throws RepositoryException
     */
    public function getPrices(GetRidesPricesRequest $request): array
    {
        $data = new CalculatorPriceRequestDTO($request->price, $request->addresses);
        return app(GetRidesPricesAction::class)->run($data);
    }
}
