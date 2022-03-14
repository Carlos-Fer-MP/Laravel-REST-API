<?php

namespace Src\BoundedContext\WorkEntry\Application;

use Src\BoundedContext\WorkEntry\Domain\Contracts\WorkEntryRepositoryContract;
use Src\BoundedContext\WorkEntry\Domain\ValueObjects\WorkEntryId;

class DeleteWorkEntryUseCase
{
    private $repository;

    public function __construct(WorkEntryRepositoryContract $repository)
    {
        $this->repository = $repository;
    }

    public function __invoke(int $workEntryId): void
    {
       $id = new WorkEntryId($workEntryId);

       $this->repository->delete($id);

    }
}
