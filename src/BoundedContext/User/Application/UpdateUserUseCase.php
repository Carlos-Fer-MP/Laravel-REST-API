<?php

namespace Src\BoundedContext\User\Application;

use DateTime;
use Src\BoundedContext\User\Domain\Contracts\UserRepositoryContract;
use Src\BoundedContext\User\Domain\User;
use Src\BoundedContext\User\Domain\ValueObjects\UserEmailVerifiedDate;
use Src\BoundedContext\User\Domain\ValueObjects\UserName;
use Src\BoundedContext\User\Domain\ValueObjects\UserEmail;
use Src\BoundedContext\User\Domain\ValueObjects\UserPassword;
use Src\BoundedContext\User\Domain\ValueObjects\UserId;

final class UpdateUserUseCase
{

    private $repository;

    public function __construct(UserRepositoryContract $repository)
    {
        $this->repository = $repository;
    }

    public function __invoke(
        int $userId,
        string $userName,
        string $userEmail,
        ?DateTime $userEmailVerifiedDate,
        string $userPassword,

    ): void
    {
        $name = new UserName($userName);
        $id = new UserId($userId);
        $email = new UserEmail();
        $emailVerifiedDate = new UserEmailVerifiedDate($userEmailVerifiedDate);
        $password = new UserPassword($userPassword);

        $user = User::create($id, $name, $email, $emailVerifiedDate, $password);

        $this->repository->update($id, $user);
    }
}
