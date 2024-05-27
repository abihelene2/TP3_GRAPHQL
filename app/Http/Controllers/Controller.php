<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

define('OK', 200);
define('CREATED', 201);
define('NO_CONTENT', 204);
define('FORBIDDEN', 403);
define('NOT_FOUND', 404);
define('INVALID_DATA', 422);
define('SERVER_ERROR', 500);
abstract class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;
}
