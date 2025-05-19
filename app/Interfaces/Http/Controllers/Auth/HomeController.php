<?php

namespace App\Interfaces\Http\Controllers\Auth;

use App\Http\Controllers\Controller; // ✅ Importa corretamente
use Illuminate\Http\Request;
use App\Application\UseCases\ListUsersUseCase;

class HomeController extends Controller
{
    public function index(Request $request, ListUsersUseCase $listUsersUseCase)
    {
        $users = $listUsersUseCase->execute($request->all());

        return view('home', [
            'users' => $users
        ]);
    }
}
