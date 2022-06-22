<?php

/**
 * @apiGroup           PriceCalculator
 * @apiName            GetRidesPrices
 *
 * @api                {GET} /v1/rides/prices Get All Price Calculators
 * @apiDescription     Endpoint description here...
 *
 * @apiVersion         1.0.0
 * @apiPermission      Authenticated ['permissions' => '', 'roles' => '']
 *
 * @apiHeader          {String} accept=application/json
 * @apiHeader          {String} authorization=Bearer
 *
 * @apiParam           {String} parameters here...
 *
 * @apiSuccessExample  {json} Success-Response:
 * HTTP/1.1 200 OK
 * {
 *     // Insert the response of the request here...
 * }
 */

use App\Containers\AppSection\PriceCalculator\UI\API\Controllers\GetRidesPricesController;
use Illuminate\Support\Facades\Route;

Route::get('rides/prices', [GetRidesPricesController::class, 'getPrices'])
    ->middleware(['auth:api']);

