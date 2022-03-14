<?php

namespace Src\BoundedContext\User\Infrastructure\Repositories;

use App\User as EloquentUserModel;
use Src\BoundedContext\User\Domain\Contracts\UserRepositoryContract;
use Src\BoundedContext\User\Domain\User;
use Src\BoundedContext\User\Domain\ValueObjects\UserEmail;
use Src\BoundedContext\User\Domain\ValueObjects\UserEmailVerifiedDate;
use Src\BoundedContext\User\Domain\ValueObjects\UserName;
use Src\BoundedContext\User\Domain\ValueObjects\UserId;
use Src\BoundedContext\User\Domain\ValueObjects\UserPassword;
use Src\BoundedContext\WorkEntry\Domain\ValueObjects\WorkEntryUserId;
use Src\BoundedContext\WorkEntry\Domain\WorkEntry;

final class EloquentUserRepository implements UserRepositoryContract
{
    private $eloquentUserModel;

    public function __construct()
    {
        $this->eloquentUserModel = new EloquentUserModel;
    }
    public function find(UserId $id): ?User
    {
        $user = $this->eloquentUserModel->findOrFail($id->value());

        return new User(

            new UserName($user->name),
            new UserEmail($user->email),
            new UserEmailVerifiedDate($user->email_verified_at),
            new UserPassword($user->password)
        );
    }
    public function findAll()
    {
        return User::all();
    }
    public function save(User $user): void
    {
        $newUser = $this->eloquentUserModel;

        $data = [

            'name'              => $user->name()->value(),
            'email'             => $user->email()->value(),
            'email_verified_at' => $user->emailVerifiedDate()->value(),
            'password'          => $user->password()->value(),
        ];
        $newUser->create($data);
    }
    public function update(UserId $userId, User $user): void
    {
        $userToUpdate = $this->eloquentUserModel;

        $data = [
            'name'  => $user->name()->value(),
            'email' => $user->email()->value(),
        ];

        $userToUpdate
            ->findOrFail($userId->value())
            ->update($data);
    }

    public function delete(UserId $id): void
    {
        $this->eloquentUserModel
            ->findOrFail($id->value())
            ->delete();
    }

}
