<?php

namespace App\Domain\Entities;

use App\Domain\Enums\UserRole;

class User
{
    public function __construct(
        public string $name,
        public string $email,
        public string $password,
        public UserRole $role,
        public ?string $street = null,
        public ?string $number = null,
        public ?string $neighborhood = null,
        public ?string $city = null,
        public ?string $state = null,
        public ?string $cep = null,
    ) {}
}
