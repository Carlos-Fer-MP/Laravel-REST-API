<?php

namespace Src\BoundedContext\WorkEntry\Infrastructure;

use Illuminate\Http\Request;
use Src\BoundedContext\WorkEntry\Application\DeleteWorkEntryUseCase;
use Src\BoundedContext\User\Infrastructure\Repositories\EloquentUserRepository;

final class DeleteWorkEntryController
{
    private $repository;

    public function __construct(EloquentUserRepository $repository)
    {
        $this->repository = $repository;
    }
    public function __invoke(Request $request)
    {
        $workEntryId = (int)$request->id;

        $deleteWorkEntryUseCase = new DeleteWorkEntryUseCase($this->repository);
        $deleteWorkEntryUseCase->__invoke($workEntryId);
    }
}
