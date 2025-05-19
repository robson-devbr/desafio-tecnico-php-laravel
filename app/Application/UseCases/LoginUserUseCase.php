<?php

namespace App\Application\UseCases;

use App\Application\DTOs\LoginUserDTO;
use App\Domain\Interfaces\UserRepositoryInterface;
use Illuminate\Support\Facades\Hash;

class LoginUserUseCase
{
    public function __construct(
        private UserRepositoryInterface $userRepository
    ) {}

    public function execute(LoginUserDTO $data): ?string
    {
        $user = $this->userRepository->findByEmail($data->email);

        if (!$user || !Hash::check($data->password, $user->password)) {
            return null;
        }

        return $user->createToken('auth_token')->plainTextToken;
    }
}
