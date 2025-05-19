<!doctype html>
<html>
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    @vite('resources/css/app.css')
    <title>Login</title>
  </head>
  <body class="bg-[#3B275D] min-h-screen flex items-center justify-center">
    <div class="container max-w-md bg-white p-8 rounded-lg shadow-lg border-4 border-green-500">
        <h2 class="text-2xl font-bold text-center text-gray-800 mb-6">Login</h2>

        <form class="space-y-4 border-2 border-[#01754F] p-4 rounded-md" method="POST" action="{{ route('login.post') }}">
            @csrf
            <div>
              <input 
                type="email" 
                name="email" 
                placeholder="Email" 
                required 
                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500"
              >
            </div>

            <div>
              <input 
                type="password" 
                name="password" 
                placeholder="Senha" 
                required 
                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500"
              >
            </div>

            <div>
              <button 
                type="submit" 
                class="w-full bg-[#3B275D] text-white hover:bg-green-600 font-semibold py-2 rounded-lg transition duration-300"
              >
                Entrar
              </button>
              <div class="text-center mt-4">
                <a href="{{ route('register') }}" class="text-green-600 hover:underline">Criar uma conta</a>
              </div>
            </div>
        </form>
    </div>
  </body>
</html>
