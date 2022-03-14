<?php

namespace App\Http\Controllers\UserController;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use Illuminate\Http\Request;

class GetUserController extends Controller
{
    private \Src\BoundedContext\User\Infrastructure\GetUserController $getUserController;

    public function __construct(\Src\BoundedContext\User\Infrastructure\GetUserController $getUserController)
    {
        $this->getUserController = $getUserController;
    }
    public function __invoke(Request $request): \Illuminate\Http\Response|\Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Routing\ResponseFactory
    {
        $user = new UserResource($this->getUserController->__invoke($request));

        return response($user, 200);
    }
}
