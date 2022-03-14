<?php

namespace Src\BoundedContext\User\Application;

use DateTime;
use Src\BoundedContext\User\Domain\Contracts\UserRepositoryContract;
use Src\BoundedContext\User\Domain\User;
use Src\BoundedContext\User\Domain\ValueObjects\UserEmail;
use Src\BoundedContext\User\Domain\ValueObjects\UserEmailVerifiedDate;
use Src\BoundedContext\User\Domain\ValueObjects\UserName;
use Src\BoundedContext\User\Domain\ValueObjects\UserPassword;

final class CreateUserUseCase
{
    private $repository;

    public function __construct(UserRepositoryContract $repository)
    {
        $this->repository= $repository;
    }
    public function __invoke(
        string $userName,
        string $userEmail,
        ?DateTime $userEmailVerifiedDate,
        string $userPassword
    ): void
    {
        $name = new UserName($userName);
        $email = new UserEmail($userEmail);
        $password = new UserPassword($userPassword);
        $emailVerifiedDate = new UserEmailVerifiedDate($userEmailVerifiedDate);

        $user = User::create($name, $email, $emailVerifiedDate, $password);

        $this->repository->save($user);
    }

}
