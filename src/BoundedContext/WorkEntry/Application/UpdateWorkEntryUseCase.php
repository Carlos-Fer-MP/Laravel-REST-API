<?php

namespace Src\Management\WorkEntry\Application;

use DateTime;
use Src\BoundedContext\WorkEntry\Domain\Contracts\WorkEntryRepositoryContract;
use Src\BoundedContext\WorkEntry\Domain\WorkEntry;
use Src\BoundedContext\WorkEntry\Domain\ValueObjects\WorkEntryId;
use Src\BoundedContext\WorkEntry\Domain\ValueObjects\WorkEntryStartDate;
use Src\BoundedContext\WorkEntry\Domain\ValueObjects\WorkEntryEndDate;

class UpdateWorkEntryUseCase
{

    private $repository;

    public function __construct(WorkEntryRepositoryContract $repository)
    {
        $this->repository = $repository;
    }
    public function __invoke(
        int $workEntryId,
        ?DateTime $workEntryStartDate,
        ?DateTime $workEntryEndDate
    )
    {
        $id = new WorkEntryId($workEntryId);
        $startDate = new WorkEntryStartDate($workEntryStartDate);
        $endDate = new WorkEntryEndDate($workEntryEndDate);

        $workEntry = WorkEntry::create($id, $startDate, $endDate);

        $this->repository->update($startDate, $endDate, $workEntry);
    }

}
