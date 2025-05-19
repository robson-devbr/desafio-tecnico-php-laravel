<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Home</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100 text-[#3B275D] min-h-screen p-8">

    {{-- Mensagem de Sucesso --}}
    @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-6">
            <strong class="font-bold">Sucesso!</strong>
            <span class="block sm:inline">{{ session('success') }}</span>
        </div>
    @endif

    {{-- Mensagem de Erro --}}
    @if(session('error'))
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-6">
            <strong class="font-bold">Erro!</strong>
            <span class="block sm:inline">{{ session('error') }}</span>
        </div>
    @endif

    <h1 class="text-3xl font-bold text-[#01754F] mb-6">Usuários Cadastrados</h1>

    {{-- Formulário de Filtragem --}}
    <form method="GET" action="{{ route('home') }}" class="mb-6 flex flex-wrap gap-4">
        <input
            type="text"
            name="name"
            placeholder="Nome"
            value="{{ request('name') }}"
            class="px-4 py-2 border border-[#3B275D] rounded-md focus:outline-none focus:ring focus:border-[#01754F]"
        >
        <input
            type="text"
            name="email"
            placeholder="E-mail"
            value="{{ request('email') }}"
            class="px-4 py-2 border border-[#3B275D] rounded-md focus:outline-none focus:ring focus:border-[#01754F]"
        >
        <button
            type="submit"
            class="px-6 py-2 bg-[#01754F] text-white rounded hover:bg-[#015c3f] transition"
        >
            Filtrar
        </button>
    </form>

    {{-- Tabela de Usuários --}}
    <div class="overflow-x-auto">
        <table class="w-full table-auto border border-[#3B275D] rounded">
            <thead class="bg-[#3B275D] text-white">
                <tr>
                    <th class="px-4 py-2 text-left">Nome</th>
                    <th class="px-4 py-2 text-left">Email</th>
                    <th class="px-4 py-2 text-left">Perfil</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($users as $user)
                    <tr class="border-t border-[#3B275D] hover:bg-gray-100">
                        <td class="px-4 py-2">{{ $user->name }}</td>
                        <td class="px-4 py-2">{{ $user->email }}</td>
                        <td class="px-4 py-2 capitalize">{{ $user->role }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3" class="px-4 py-4 text-center text-gray-500">Nenhum usuário encontrado.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    {{-- Paginação --}}
    <div class="mt-6">
        {{ $users->links() }}
    </div>

</body>
</html>
