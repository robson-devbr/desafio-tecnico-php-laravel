<?php

namespace App\Infrastructure\Repositories;

use App\Domain\Entities\User as UserEntity;
use App\Domain\Interfaces\UserRepositoryInterface;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserRepositoryEloquent implements UserRepositoryInterface
{
    protected $model;

    public function __construct(User $model)
    {
        $this->model = $model;
    }

    public function create(UserEntity $user): User
    {
        return User::create([
            'name'         => $user->name,
            'email'        => $user->email,
            'password'     => Hash::make($user->password),
            'role'         => $user->role->value,
            'cep'          => $user->cep,
            'street'       => $user->street,
            'number'       => $user->number,
            'neighborhood' => $user->neighborhood,
            'city'         => $user->city,
            'state'        => $user->state,
        ]);
    }

    public function paginateWithFilters(array $filters)
    {
        $query = $this->model->query();

        if (!empty($filters['name'])) {
            $query->where('name', 'like', '%' . $filters['name'] . '%');
        }

        if (!empty($filters['email'])) {
            $query->where('email', 'like', '%' . $filters['email'] . '%');
        }

        return $query->paginate(10)->appends($filters);
    }
}
