<?php

/**
 * @apiGroup           Drive
 * @apiName            DeleteDrive
 *
 * @api                {DELETE} /v1/drives/:id Delete Drive
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

use App\Containers\AppSection\Drive\UI\API\Controllers\DeleteDriveController;
use Illuminate\Support\Facades\Route;

Route::delete('drives/{id}', [DeleteDriveController::class, 'deleteDrive'])
    ->middleware(['auth:api']);

