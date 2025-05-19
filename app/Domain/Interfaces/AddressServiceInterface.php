<?php

namespace App\Domain\Interfaces;

interface AddressServiceInterface
{
    public function getAddressByCep(string $cep): array;
}
