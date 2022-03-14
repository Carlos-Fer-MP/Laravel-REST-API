<?php

namespace Src\BoundedContext\WorkEntry\Infrastructure;

use Illuminate\Http\Request;
use Src\BoundedContext\WorkEntry\Application\GetWorkEntryUseCase;
use Src\BoundedContext\WorkEntry\Application\UpdateWorkEntryUseCase;
use Src\BoundedContext\User\Infrastructure\Repositories\EloquentUserRepository;

class UpdateWorkEntryController
{
    private $repository;

    public function __construct(EloquentUserRepository $repository)
    {
        $this->repository = $repository;
    }
    public function __invoke(Request $request): ?\Src\BoundedContext\WorkEntry\Domain\WorkEntry
    {
        $workEntryId = (int)$request->id;

        $getWorkEntryUseCase = new GetWorkEntryUseCase($this->repository);
        $workEntry = $getWorkEntryUseCase->__invoke($workEntryId);
        $workEntryStartDate = $workEntry->startDate()->value();
        $workEntryEndDate = $workEntry->endDate()->value();

        $updateWorkEntryUseCase = new UpdateWorkEntryUseCase($this->repository);
        $updateWorkEntryUseCase->__invoke(
            $workEntryId,
            $workEntryStartDate,
            $workEntryEndDate
        );
        return $getWorkEntryUseCase->__invoke($workEntryId);
    }

}
