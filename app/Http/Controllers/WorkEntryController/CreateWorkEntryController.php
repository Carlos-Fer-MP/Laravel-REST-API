<?php

namespace App\Http\Controllers\WorkEntryController;

use App\Http\Controllers\Controller;
use App\Http\Resources\WorkEntryResource;
use Illuminate\Http\Request;

class CreateWorkEntryController extends Controller
{

   private $createWorkEntryController;

   public function __construct(\Src\BoundedContext\WorkEntry\Infrastructure\CreateWorkEntryController $createWorkEntryController)
   {
       $this->createWorkEntryController = $createWorkEntryController;
   }
   public function __invoke(Request $request): \Illuminate\Http\Response|\Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Routing\ResponseFactory
   {
       $newWorkEntry = new WorkEntryResource($this->createWorkEntryController->__invoke($request));

       return response($newWorkEntry, 201);
   }

}
