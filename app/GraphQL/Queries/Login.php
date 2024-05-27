<?php declare(strict_types=1);

#inspiration chat GPT
namespace App\GraphQL\Queries;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\User;

final class Login
{
    /** @param  array{}  $args */
    public function __invoke( null $_, array $args)
    {   
    
      $controller = new AuthController();
      $request = request()->merge($args);
      $response = $controller->login($request);

      return $response;

    }
}
