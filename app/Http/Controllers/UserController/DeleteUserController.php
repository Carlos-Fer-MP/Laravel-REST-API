<?php

namespace App\Http\Controllers\UserController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DeleteUserController extends Controller
{
    private $deleteUserController;

    public function __construct(\Src\BoundedContext\User\Infrastructure\DeleteUserController $deleteUserController)
    {
        $this->deleteUserController = $deleteUserController;
    }

    public function __invoke(Request $request)
    {
        $this->deleteUserController->__invoke($request);

        return response([], 204);
    }
}
