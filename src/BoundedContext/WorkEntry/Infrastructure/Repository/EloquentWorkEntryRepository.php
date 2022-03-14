<?php

namespace Src\BoundedContext\WorkEntry\Infrastructure\Repository;

use App\WorkEntry as EloquentWorkEntryModel;
use Src\BoundedContext\WorkEntry\Domain\Contracts\WorkEntryRepositoryContract;
use Src\BoundedContext\WorkEntry\Domain\ValueObjects\WorkEntryId;
use Src\BoundedContext\WorkEntry\Domain\ValueObjects\WorkEntryStartDate;
use Src\BoundedContext\WorkEntry\Domain\ValueObjects\WorkEntryEndDate;
use Src\BoundedContext\WorkEntry\Domain\ValueObjects\WorkEntryUserId;
use Src\BoundedContext\WorkEntry\Domain\WorkEntry;

class EloquentWorkEntryRepository implements WorkEntryRepositoryContract
{
    private $eloquentWorkEntryModel;

    public function __construct()
    {
        $this->eloquentWorkEntryModel = new EloquentWorkEntryModel();
    }

    public function find(WorkEntryId $id): ?WorkEntry
    {
        $workEntry = $this->eloquentWorkEntryModel->findOrFail($id->value());

        return new WorkEntry(
            new WorkEntryId($workEntry->id),
            new WorkEntryStartDate($workEntry->startDate),
            new WorkEntryEndDate($workEntry->endDate)
        );

    }

    public function findUserId(WorkEntryUserId $userId): ?WorkEntry
    {
        $workEntry = $this->eloquentWorkEntryModel->findOrFail($userId->value());

        return new WorkEntry(
            new WorkEntryId($workEntry->id),
            new WorkEntryStartDate($workEntry->startDate),
            new WorkEntryEndDate($workEntry->endDate)
        );
    }

    public function save(WorkEntry $workEntry): void
    {
        $newWorkEntry = $this->eloquentWorkEntryModel;

        $data = [

            'startDate' => $workEntry->startDate()->value(),
            'endDate' => $workEntry->endDate()->value()

        ];
    }

    public function update( WorkEntryId $id, WorkEntryStartDate $startDate, WorkEntryEndDate $endDate, WorkEntry $workEntry): void
    {
        $workEntryToUpdate = $this->eloquentWorkEntryModel;

        $data = [

            'startDate' => $workEntry->startDate()->value(),
            'endDate' => $workEntry->endDate()->value()

        ];

        $workEntryToUpdate->findOrFail($id->value())->update($data);
    }

    public function delete(WorkEntryId $id): void
    {
        $this->eloquentWorkEntryModel->findOrFail($id->value())->delete();
    }
}
