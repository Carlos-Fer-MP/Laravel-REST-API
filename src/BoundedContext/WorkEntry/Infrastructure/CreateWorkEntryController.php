<?php

namespace Src\BoundedContext\WorkEntry\Infrastructure;

use Illuminate\Http\Request;
use Src\BoundedContext\WorkEntry\Application\CreateWorkEntryUseCase;
use Src\BoundedContext\WorkEntry\Application\GetByUserIdWorkEntryUseCase;
use Src\BoundedContext\WorkEntry\Infrastructure\Repository\EloquentWorkEntryRepository;

final class CreateWorkEntryController
{
    private $repository;

    public function __construct(EloquentWorkEntryRepository $repository)
    {
        $this->repository = $repository;
    }
    public function __invoke(Request $request)
    {
        $workEntryStartDate = $request->input('startDate');
        $workEntryEndDate = $request->input('endDate');
        $workEntryId = $request->input('id');

        $createWorkEntryUseCase = new CreateWorkEntryUseCase($this->repository);
        $createWorkEntryUseCase->__invoke($workEntryId, $workEntryEndDate, $workEntryStartDate);

    }

}
