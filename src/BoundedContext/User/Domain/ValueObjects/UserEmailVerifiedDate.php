<?php

namespace Src\BoundedContext\User\Domain\ValueObjects;

final class UserEmailVerifiedDate
{
    private $value;

    public function __construct(?\DateTime $emailVerifiedDate)
    {
        $this->value = $emailVerifiedDate;
    }
    public function value(): ?\DateTime
    {
        return $this->value;

    }
}
