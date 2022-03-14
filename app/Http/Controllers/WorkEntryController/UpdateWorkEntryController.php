<?php

namespace App\Http\Controllers\WorkEntryController;

use App\Http\Controllers\Controller;
use App\Http\resources\WorkEntryResource;
use Illuminate\Http\Request;

class UpdateWorkEntryController extends Controller
{
    private $updateWorkEntryController;

    public function __construct(\Src\BoundedContext\WorkEntry\Infrastructure\UpdateWorkEntryController $updateWorkEntryController)
    {
        $this->updateWorkEntryController = $updateWorkEntryController;
    }

    public function __invoke(Request $request)
    {
        $updatedWorkEntry = new WorkEntryResource($this->updateWorkEntryController->__invoke($request));

        return response($updatedWorkEntry, 200);
    }

}
