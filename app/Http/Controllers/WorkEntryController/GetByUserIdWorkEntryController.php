<?php

namespace App\Http\Controllers\WorkEntryController;

use App\Http\Controllers\Controller;
use App\Http\Resources\WorkEntryResource;
use Illuminate\Http\Request;

class GetByUserIdWorkEntryController extends Controller
{
    private $getByUserIdController;

    public function __construct(\Src\BoundedContext\WorkEntry\Infrastructure\GetByUserIdWorkEntryController $getByUserIdController)
    {
        $this->getByUserIdController = $getByUserIdController;
    }
    public function __invoke(Request $request): \Illuminate\Http\Response|\Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Routing\ResponseFactory
    {
        $workEntry = new WorkEntryResource($this->getByUserIdController->__invoke($request));

        return response($workEntry, 200);
    }
}
