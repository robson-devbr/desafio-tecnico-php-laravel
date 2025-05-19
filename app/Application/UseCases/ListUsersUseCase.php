<?php

namespace App\Application\UseCases;

use App\Domain\Interfaces\UserRepositoryInterface;

class ListUsersUseCase
{
    public function __construct(
        protected UserRepositoryInterface $userRepository
    ) {}

    public function execute(array $filters)
    {
        return $this->userRepository->paginateWithFilters($filters);
    }
}
