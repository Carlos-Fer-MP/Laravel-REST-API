<?php


namespace Src\BoundedContext\WorkEntry\Application;

use Src\BoundedContext\WorkEntry\Domain\Contracts\WorkEntryRepositoryContract;
use Src\BoundedContext\WorkEntry\Domain\WorkEntry;
use Src\BoundedContext\WorkEntry\Domain\ValueObjects\WorkEntryId;

final class GetWorkEntryUseCase
{
    private $repository;

    public function __construct(WorkEntryRepositoryContract $repository)
    {
        $this->repository = $repository;
    }
    public function __invoke(int $workEntryId): ?WorkEntry
    {
        $id = new WorkEntryId($workEntryId);

        return $this->repository->find($id);
    }

}
