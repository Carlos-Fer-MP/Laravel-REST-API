<?php

namespace Src\BoundedContext\WorkEntry\Infrastructure;

use Illuminate\Http\Request;
use Src\BoundedContext\User\Infrastructure\Repositories\EloquentUserRepository;
use Src\BoundedContext\WorkEntry\Application\GetWorkEntryUseCase;

final class GetWorkEntryController
{
    private $repository;

    public function __construct(EloquentUserRepository $repository)
    {
        $this->repository = $repository;
    }
    public function __invoke(Request $request): ?\Src\BoundedContext\WorkEntry\Domain\WorkEntry
    {
        $workEntryId = (int)$request->id;

        $getWorkEntryUseCase = new GetWorkEntryUseCase($this->repository);
        return $getWorkEntryUseCase->__invoke($workEntryId);
    }

}
