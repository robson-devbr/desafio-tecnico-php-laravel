<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  @vite('resources/css/app.css')
</head>
<body>
  <div class="min-h-screen flex items-center justify-center bg-gray-100">
  <div class="bg-white border-4 border-[#01754F] rounded-lg shadow-lg p-8 text-center max-w-xl">
    <h1 class="text-3xl font-bold text-[#3B275D] mb-4">
      Server is running 🚀!
    </h1>
    <p class="text-gray-700 mb-6">
      Acesse: 
      <a 
        href="http://localhost:8000/api/home" 
        class="text-[#3B275D] font-semibold hover:underline"
      >
        http://localhost:8000/api/home
      </a>
    </p>
    <a 
      href="http://localhost:8000/api/home" 
      class="inline-block bg-[#3B275D] text-white px-6 py-2 rounded hover:bg-[#2a1d46] transition"
    >
      Ir para API Home
    </a>
  </div>
</div>

</body>
</html>