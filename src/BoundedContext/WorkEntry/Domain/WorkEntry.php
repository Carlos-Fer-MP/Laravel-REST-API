<?php

namespace Src\BoundedContext\WorkEntry\Domain;

use JetBrains\PhpStorm\Pure;
use Src\BoundedContext\WorkEntry\Domain\ValueObjects\WorkEntryId;
use Src\BoundedContext\WorkEntry\Domain\ValueObjects\WorkEntryStartDate;
use Src\BoundedContext\WorkEntry\Domain\ValueObjects\WorkEntryEndDate;

final class WorkEntry
{
    private $id;
    private $startDate;
    private $endDate;

    public function __construct(

        WorkEntryId $id,
        WorkEntryStartDate $startDate,
        WorkEntryEndDate $endDate
    )
    {
        $this->id = $id;
        $this->startDate = $startDate;
        $this->endDate = $endDate;
    }
    public function id(): WorkEntryId
    {
        return $this->id;
    }

    public function startDate(): WorkEntryStartDate
    {
        return $this->startDate;
    }

    public function endDate(): WorkEntryEndDate
    {
        return $this->endDate;
    }

    #[Pure] public static function create(
        WorkEntryId $id,
        WorkEntryStartDate $startDate,
        WorkEntryEndDate $endDate

    ): WorkEntry
    {
        $workentry = new  self($id, $startDate, $endDate);

        return $workentry;

    }
}
