<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Bem-vindo de volta!') }}
        </h2>
    </x-slot>

    <div class="container mx-auto p-6">
        <div class="max-w-5xl mx-auto grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-2 gap-6 justify-center">
            <div class="bg-cyan-600 shadow-lg rounded-lg p-6 flex flex-col items-center text-white">
                <h2 class="text-lg font-semibold">Produtos Cadastrados</h2>
                <p class="text-3xl font-bold mt-2">{{ $produtosCount }}</p>
                <p class="text-sm mt-1">produtos cadastrados</p>
            </div>
            <div class="bg-cyan-600 shadow-lg rounded-lg p-6 flex flex-col items-center text-white">
                <h2 class="text-lg font-semibold">Remédios Controlados</h2>
                <p class="text-3xl font-bold mt-2">{{ $remediosCount }}</p>
                <p class="text-sm mt-1">remédios cadastrados</p>
            </div>
            <div class="bg-cyan-600 shadow-lg rounded-lg p-6 flex flex-col items-center text-white">
                <h2 class="text-lg font-semibold">Fornecedores Cadastrados</h2>
                <p class="text-3xl font-bold mt-2">{{ $fornecedoresCount }}</p>
                <p class="text-sm mt-1">fornecedores cadastrados</p>
            </div>
            <div class="bg-cyan-600 shadow-lg rounded-lg p-6 flex flex-col items-center text-white">
                <h2 class="text-lg font-semibold">Categorias Cadastradas</h2>
                <p class="text-3xl font-bold mt-2">{{ $categoriasCount }}</p>
                <p class="text-sm mt-1">categorias cadastradas</p>
            </div>
        </div>
    </div>
</x-app-layout>
