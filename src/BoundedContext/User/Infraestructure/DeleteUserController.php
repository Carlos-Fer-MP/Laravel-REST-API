<?php

namespace Src\BoundedContext\User\Infrastructure;

use Illuminate\Http\Request;
use Src\BoundedContext\User\Application\DeleteUserUseCase;
use Src\BoundedContext\User\Infrastructure\Repositories\EloquentUserRepository;

final class DeleteUserController
{
    private $repository;

    public function __construct(EloquentUserRepository $repository)
    {
        $this->repository = new $repository;
    }
    public function __invoke($request)
    {
        $userId = (int)$request->id;

        $deleteUserUseCase = new DeleteUserUseCase($this->repository);
        $deleteUserUseCase->__invoke($userId);
    }
}
