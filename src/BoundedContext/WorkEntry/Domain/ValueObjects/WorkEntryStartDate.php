<?php

namespace Src\BoundedContext\WorkEntry\Domain\ValueObjects;

use DateTime;

final class WorkEntryStartDate extends \Src\BoundedContext\User\Domain\ValueObjects\UserId
{
    private $value;

    public function __construct(DateTime $startDate)
    {
        $this->value = $startDate;
    }
    public function value(): ?DateTime
    {

        return $this->value;
    }
}
