<?php

namespace Src\BoundedContext\WorkEntry\Application;

use Src\BoundedContext\WorkEntry\Domain\Contracts\WorkEntryRepositoryContract;
use Src\BoundedContext\WorkEntry\Domain\ValueObjects\WorkEntryUserId;
use Src\BoundedContext\WorkEntry\Domain\WorkEntry;

class GetByUserIdWorkEntryUseCase
{
    private $repository;

    public function __construct(WorkEntryRepositoryContract $repository)
    {
        $this->repository = $repository;
    }
    public function __invoke(int $workEntryId): ?WorkEntry
    {
        $userId = new WorkEntryuserId($workEntryId);

        return $this->repository->findUserId($userId);
    }
}
