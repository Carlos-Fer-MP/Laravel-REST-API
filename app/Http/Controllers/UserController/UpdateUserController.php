<?php

namespace App\Http\Controllers\UserController;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use Illuminate\Http\Request;

class UpdateUserController extends Controller
{
    private $updateUserController;

    public function __construct(\Src\BoundedContext\User\Infrastructure\UpdateUserController $updateUserController)
    {
        $this->updateUserController = $updateUserController;
    }
    public function __invoke(Request $request)
    {
        $updatedUser = new UserResource($this->updateUserController->__invoke($request));

        return response($updatedUser, 200);
    }
}
