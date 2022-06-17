<?php

/**
 * @apiGroup           Drive
 * @apiName
 *
 * @api                {POST} /v1/drives/points
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

use App\Containers\AppSection\Drive\UI\API\Controllers\CreateDrivePointController;
use Illuminate\Support\Facades\Route;

Route::post('drives/points', [CreateDrivePointController::class, 'createPoint'])
    ->middleware(['auth:api']);
