<?php

/**
 * @apiGroup           Drive
 * @apiName            Join
 *
 * @api                {PATCH} /v1/order/:id/join Join
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

use App\Containers\AppSection\Drive\UI\API\Controllers\OrderJoinController;
use Illuminate\Support\Facades\Route;

Route::patch('orders/{id}/join', [OrderJoinController::class, 'join'])
    ->middleware(['auth:api']);

