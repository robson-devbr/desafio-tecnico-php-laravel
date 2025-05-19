<?php

namespace App\Interfaces\Http\Controllers\Auth;

use App\Application\DTOs\RegisterUserDTO;
use App\Application\UseCases\RegisterUserUseCase;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Log;

class RegisterController extends Controller
{
    public function __construct(
        private RegisterUserUseCase $registerUserUseCase
    ) {}

    public function register(Request $request)
    {
        Log::info('Iniciando registro...');

        $data = $request->validate([
            'name'         => 'required|string|max:255',
            'email'        => 'required|email|unique:users,email',
            'password'     => 'required|string|min:8|confirmed',
            'role'         => 'sometimes|string|in:admin,user',
            'cep'          => 'nullable|string',
            'street'       => 'nullable|string',
            'number'       => 'nullable|string',
            'neighborhood' => 'nullable|string',
            'city'         => 'nullable|string',
            'state'        => 'nullable|string',
        ]);

        Log::info('Validação passou', $data);

        try {
            $dto = RegisterUserDTO::fromRequest($data);
            Log::info('DTO criado com sucesso', (array)$dto);

            $user = $this->registerUserUseCase->execute($dto);
            Log::info('Usuário criado com sucesso', ['id' => $user->id]);

            return redirect('/api/home')->with('success', 'Usuário registrado com sucesso!');

        } catch (\Throwable $e) {
            Log::error('Erro no registro de usuário: ' . $e->getMessage(), [
                'trace' => $e->getTraceAsString()
            ]);
            return response()->json(['error' => 'Erro interno ao registrar usuário'], 500);
        }
    }
}
