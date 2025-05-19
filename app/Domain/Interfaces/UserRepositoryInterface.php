<?php

namespace App\Domain\Interfaces;

use App\Domain\Entities\User;

interface UserRepositoryInterface
{
    public function create(User $user): \App\Models\User;

}
