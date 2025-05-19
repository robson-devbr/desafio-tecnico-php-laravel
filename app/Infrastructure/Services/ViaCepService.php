<?php

namespace App\Infrastructure\Services;

use Illuminate\Support\Facades\Http;

class ViaCepService
{
    public function buscarEndereco(string $cep): array
    {
        $response = Http::get("https://viacep.com.br/ws/{$cep}/json/");

        if ($response->failed() || isset($response['erro'])) {
            throw new \Exception('CEP inválido ou não encontrado.');
        }

        return $response->json();
    }
}
