<?php

namespace Src\BoundedContext\WorkEntry\Domain\Contracts;

use Src\BoundedContext\WorkEntry\Domain\ValueObjects\WorkEntryStartDate;
use Src\BoundedContext\WorkEntry\Domain\ValueObjects\WorkEntryEndDate;
use Src\BoundedContext\WorkEntry\Domain\WorkEntry;
use Src\BoundedContext\WorkEntry\Domain\ValueObjects\WorkEntryId;
use Src\BoundedContext\WorkEntry\Domain\ValueObjects\WorkEntryUserId;

interface WorkEntryRepositoryContract
{
 public function find(WorkEntryId $id): ?WorkEntry;

 public function findUserId(WorkEntryUserId $userId): ?WorkEntry;

 public function save(WorkEntry $workEntry): void;

 public function update(WorkEntryId $id,WorkEntryStartDate $startDate, WorkEntryEndDate $endDate, WorkEntry $workEntry):void;

 public function delete(WorkEntryId $id): void;
}
