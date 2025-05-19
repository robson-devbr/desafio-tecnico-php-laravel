<?php

namespace App\Application\UseCases;

use App\Application\DTOs\RegisterUserDTO;
use App\Domain\Entities\User as UserEntity;
use App\Domain\Interfaces\UserRepositoryInterface;
use App\Infrastructure\Services\ViaCepService;
use Illuminate\Support\Facades\Auth; // ✅ IMPORTANTE

class RegisterUserUseCase
{
    public function __construct(
        private UserRepositoryInterface $userRepository,
        private ViaCepService $viaCepService
    ) {}

    public function execute(RegisterUserDTO $dto): \App\Models\User
    {
        $endereco = null;

        if ($dto->cep) {
            try {
                $endereco = $this->viaCepService->buscarEndereco($dto->cep);
            } catch (\Exception $e) {
                // Você pode logar o erro aqui, se quiser
            }
        }

        $userEntity = new UserEntity(
            name: $dto->name,
            email: $dto->email,
            password: $dto->password,
            role: $dto->role,
            cep: $dto->cep,
            street: $endereco['logradouro'] ?? $dto->street,
            number: $dto->number,
            neighborhood: $endereco['bairro'] ?? $dto->neighborhood,
            city: $endereco['localidade'] ?? $dto->city,
            state: $endereco['uf'] ?? $dto->state,
        );

        // Cria o usuário no banco
        $user = $this->userRepository->create($userEntity);

        return $user;
    }
}
