<?php

namespace App\Application\DTOs;

use App\Domain\Enums\UserRole;

class RegisterUserDTO
{
    public function __construct(
        public string $name,
        public string $email,
        public string $password,
        public UserRole $role,
        public ?string $cep = null,
        public ?string $street = null,
        public ?string $number = null,
        public ?string $neighborhood = null,
        public ?string $city = null,
        public ?string $state = null,
    ) {}

    public static function fromRequest(array $data): self
    {
        return new self(
            name: $data['name'],
            email: $data['email'],
            password: $data['password'],
            role: UserRole::from($data['role']),
            cep: $data['cep'] ?? null,
            street: $data['street'] ?? null,
            number: $data['number'] ?? null,
            neighborhood: $data['neighborhood'] ?? null,
            city: $data['city'] ?? null,
            state: $data['state'] ?? null,
        );
    }
}
