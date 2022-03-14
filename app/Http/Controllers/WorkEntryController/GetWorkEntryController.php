<?php

namespace App\Http\Controllers\WorkEntryController;

use App\Http\Controllers\Controller;
use App\Http\Resources\WorkEntryResource;
use Illuminate\Http\Request;

class GetWorkEntryController extends Controller
{
    private $getWorkEntryController;

    public function __construct(\Src\BoundedContext\WorkEntry\Infrastructure\GetWorkEntryController $getWorkEntryController)
    {
        $this->getWorkEntryController = $getWorkEntryController;
    }
    public function __invoke(Request $request)
    {
        $workEntry = new WorkEntryResource($this->getWorkEntryController->__invoke($request));

        return response($workEntry, 200);
    }
}
