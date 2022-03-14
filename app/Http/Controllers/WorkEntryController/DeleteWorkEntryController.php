<?php

namespace App\Http\Controllers\WorkEntryController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DeleteWorkEntryController extends Controller
{
    private $deleteUserController;

    public function __construct(\Src\BoundedContext\WorkEntry\Infrastructure\DeleteWorkEntryController $deleteWorkEntryController)
    {
        $this->deleteUserController = $deleteWorkEntryController;
    }
    public function __invoke(Request $request)
    {
        $this->deleteUserController->__invoke($request);

        return response([], 204);
    }
}
