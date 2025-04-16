<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Farm+ Login</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-400 min-h-screen flex items-center justify-center">

    @if (Route::has('login'))
        <div class="w-full max-w-sm bg-white rounded-xl shadow-xl p-6 animate-fade-in">
            <div class="flex justify-center mb-4">
                <img src="{{ asset('img/logo-certa.png') }}" alt="Logo" class="h-16 w-16 rounded-full shadow-md border border-gray-200" />
            </div>
            <div class="text-center">
                <h1 class="text-2xl font-bold text-cyan-700">FarmaTHC</h1>
                <p class="text-sm text-gray-500 mt-1">Eficiência e organização para transformar sua farmácia!</p>
                <h2 class="text-md font-medium text-cyan-700 mt-4">Bem-vindo! No que posso ajudar?</h2>
            </div>

            <div class="mt-6 flex flex-col items-center space-y-3">
                @auth
                    <a href="{{ url('/dashboard') }}"
                       class="w-full text-center bg-cyan-600 text-white border border-cyan-500 hover:bg-cyan-700 font-semibold py-2 px-4 rounded transition duration-300">
                        Painel Inicial
                    </a>
                @else
                    <a href="{{ route('login') }}"
                       class="w-full text-center bg-cyan-600 text-white border border-cyan-500 hover:bg-cyan-700 font-semibold py-2 px-4 rounded transition duration-300">
                        Entrar
                    </a>
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}"
                           class="w-full text-center bg-cyan-600 text-white border border-cyan-500 hover:bg-cyan-700 font-semibold py-2 px-4 rounded transition duration-300">
                            Cadastre-se
                        </a>
                    @endif
                @endauth
            </div>
        </div>
    @endif
</body>
</html>
