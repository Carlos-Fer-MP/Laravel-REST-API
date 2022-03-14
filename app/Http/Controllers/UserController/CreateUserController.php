<?php

namespace App\Http\Controllers\UserController;

use App\Http\Controllers\Controller;
use App\Http\resources\UserResource;
use Illuminate\Http\Request;


final class CreateUserController extends Controller
{
    private $createUserController;

    public function __construct(\Src\BoundedContext\User\Infrastructure\CreateUserController $createUserController)
    {
        $this->createUserController = $createUserController;
    }
    public function __invoke(Request $request)
    {
        $newUser = new UserResource($this->createUserController->__invoke($request));

        return response($newUser, 201);
    }
}
