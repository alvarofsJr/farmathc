<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight ">
            {{ __('Bem vindo de volta!') }}
        </h2>
    </x-slot>

    <div class="container">
    <div class="grid grid-rows-1 sm:grid-rows-3 lg:grid-rows-6 gap-4 p-6">
    <div class="shadow-md rounded-lg p-2 flex flex-col items-center mb-4 max-w-xs text-white bg-info">
        <h2 class="text-sm font-semibold">Produtos Cadastrados</h2>
        <p class="text-2xl font-bold mt-2">{{ $produtosCount }} produtos cadastrados</p>
    </div>
    <div class="shadow-md rounded-lg p-2 flex flex-col items-center mb-4 max-w-xs text-white bg-info">
        <h2 class="text-sm font-semibold">Fornecedores Cadastrados</h2>
        <p class="text-2xl font-bold mt-2">{{ $fornecedoresCount }} fornecedores cadastrados</p>
    </div>
</div>

</div>

</x-app-layout>
