<?php

/**
 * @apiGroup           DriveUser
 * @apiName            CreateDriveUser
 *
 * @api                {POST} /v1/drives/users Create Drive User
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

use App\Containers\AppSection\Drive\UI\API\Controllers\CreateDriveUserController;
use Illuminate\Support\Facades\Route;

Route::post('drives/users', [CreateDriveUserController::class, 'createDriveUser'])
    ->middleware(['auth:api']);

