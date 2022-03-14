<?php

namespace Src\BoundedContext\WorkEntry\Domain\ValueObjects;

use DateTime;

final class WorkEntryEndDate
{
    private $value;

    public function __construct(DateTime $endDate)
    {
        $this->value = $endDate;
    }
    public function value(): ?DateTime
    {
        return $this->value;
    }

}
