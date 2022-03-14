<?php

namespace Src\BoundedContext\WorkEntry\Domain\ValueObjects;

use InvalidArgumentException;

final class WorkEntryUserId
{
    private $value;

    public function __construct(int $userId)
    {
        $this->validate($userId);
        $this->value = $userId;
    }

    private function validate(int $userId)
    {
        $options = array(
            'options' => array(
                'min_range' => 1,
            )
        );

        if (!filter_var($userId, FILTER_VALIDATE_INT, $options)) {
            throw new InvalidArgumentException(
                sprintf('<%s> does not allow the value <%s>.', static::class, $userId)
            );
        }
    }
    public function value(): int
    {
        return $this->value;
    }
}
