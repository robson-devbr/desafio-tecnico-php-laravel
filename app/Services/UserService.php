<?php

namespace App\Services;

use App\Domain\Entities\User;
use App\Domain\Enums\UserRole;

class UserService
{
    public function createUser(array $data): User
    {
        return new User(
            name: $data['name'],
            email: $data['email'],
            password: $data['password'],
            role: UserRole::from($data['role']),
            street: $data['street'] ?? null,
            number: $data['number'] ?? null,
            neighborhood: $data['neighborhood'] ?? null,
            city: $data['city'] ?? null,
            state: $data['state'] ?? null,
            cep: $data['cep'] ?? null,
        );
    }
}
