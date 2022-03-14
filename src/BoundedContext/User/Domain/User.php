<?php

namespace Src\BoundedContext\User\Domain;

use JetBrains\PhpStorm\Pure;
use Src\BoundedContext\User\Domain\ValueObjects\UserName;
use Src\BoundedContext\User\Domain\ValueObjects\UserEmail;
use Src\BoundedContext\User\Domain\ValueObjects\UserEmailVerifiedDate;
use Src\BoundedContext\User\Domain\ValueObjects\UserPassword;

final class User
{
    private UserName $name;
    private UserEmail $email;
    private UserEmailVerifiedDate $emailVerifiedDate;
    private UserPassword $password;

    public function __construct(
        UserName $name,
        UserEmail $email,
        UserEmailVerifiedDate $emailVerifiedDate,
        UserPassword $password,
    )
    {
        $this->name = $name;
        $this->email = $email;
        $this->emailVerifiedDate = $emailVerifiedDate;
        $this->password = $password;
    }

    public function name(): UserName
    {
        return $this->name;
    }
    public function email(): UserEmail
    {
        return $this->email;
    }
    public function emailVerifiedDate(): UserEmailVerifiedDate
    {
        return $this->emailVerifiedDate;
    }
    public function password(): UserPassword
    {
        return $this->password;
    }

    #[Pure] public static function create(
        UserName $name,
        UserEmail $email,
        UserEmailVerifiedDate $emailVerifiedDate,
        UserPassword $password,
    ): User{

        return new self($name, $email, $emailVerifiedDate, $password);
    }
}
