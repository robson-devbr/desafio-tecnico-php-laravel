<!doctype html>
<html>
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    @vite('resources/css/app.css')
    <title>Register</title>
  </head>
  <body class="bg-gray-100 min-h-screen flex items-center justify-center">
    <div class="container max-w-md bg-white p-8 rounded-lg shadow-lg border-4 border-green-500">
        <h2 class="text-2xl font-bold text-center text-gray-800 mb-6">Registrar</h2>

        <form class="space-y-4 border-2 border-gray-200 p-4 rounded-md" method="POST" action="{{ route('register.post') }}">
            @csrf
            <input type="text" name="name" placeholder="Nome" required class="w-full px-4 py-2 border rounded-lg">
            <input type="email" name="email" placeholder="Email" required class="w-full px-4 py-2 border rounded-lg">
            <input type="password" name="password" placeholder="Senha" required class="w-full px-4 py-2 border rounded-lg">
            <input type="password" name="password_confirmation" placeholder="Confirme a senha" required class="w-full px-4 py-2 border rounded-lg">
            <select name="role" class="w-full px-4 py-2 border rounded-lg">
                <option value="user">Usuário</option>
                <option value="admin">Administrador</option>
            </select>
            <input type="text" name="cep" placeholder="CEP" class="w-full px-4 py-2 border rounded-lg">
            <input type="text" name="street" placeholder="Rua" class="w-full px-4 py-2 border rounded-lg">
            <input type="text" name="number" placeholder="Número" class="w-full px-4 py-2 border rounded-lg">
            <input type="text" name="neighborhood" placeholder="Bairro" class="w-full px-4 py-2 border rounded-lg">
            <input type="text" name="city" placeholder="Cidade" class="w-full px-4 py-2 border rounded-lg">
            <input type="text" name="state" placeholder="Estado" class="w-full px-4 py-2 border rounded-lg">

            <button type="submit" class="w-full bg-green-500 hover:bg-green-600 text-white font-semibold py-2 rounded-lg">
                Registrar
            </button>
        </form>

        <div class="text-center mt-4">
            <a href="{{ route('login') }}" class="text-green-600 hover:underline">Já tem uma conta? Entrar</a>
        </div>
    </div>
  </body>
</html>
