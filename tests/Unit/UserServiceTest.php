<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use App\Services\UserService;
use App\Domain\Enums\UserRole;

class UserServiceTest extends TestCase
{
    public function test_create_user()
    {
        $service = new UserService();

        $user = $service->createUser([
            'name' => 'João',
            'email' => 'joao@example.com',
            'password' => 'secret',
            'role' => 'admin', // <- ESSE CAMPO É OBRIGATÓRIO
        ]);

        $this->assertEquals('João', $user->name);
    }
}
