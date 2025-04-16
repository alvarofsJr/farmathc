<x-app-layout>
    <div
        class="container mx-auto mt-8 px-4"
        x-data="{ show: false, fornecedorId: null, openDeleteModal(id) { this.show = true; this.fornecedorId = id } }">
        <h1 class="text-2xl font-bold mb-6 text-center">Lista de Fornecedores</h1>

        @if(session()->has('message'))
            <div id="message-modal" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 z-50">
                <div class="bg-white p-6 rounded-lg shadow-md max-w-sm w-full">
                    <h2 class="text-lg font-semibold mb-4 text-center text-cyan-700">Sucesso!</h2>
                    <p class="text-center text-gray-700">{{ session('message') }}</p>
                    <div class="mt-6 flex justify-center">
                        <button onclick="document.getElementById('message-modal').classList.add('hidden')" class="bg-cyan-600 hover:bg-cyan-700 text-white px-4 py-2 rounded">OK</button>
                    </div>
                </div>
            </div>
        @endif

        <div class="flex justify-end mb-4">
            <a href="{{ route('fornecedors.create') }}">
                <x-primary-button> Novo Fornecedor </x-primary-button>
            </a>
        </div>

        <div class="overflow-x-auto bg-white rounded shadow">
            <table class="min-w-full text-sm text-center text-gray-800">
                <thead class="bg-gray-800 text-white">
                    <tr>
                        <th class="py-3 px-4">Empresa</th>
                        <th class="py-3 px-4">CNPJ</th>
                        <th class="py-3 px-4">E-mail</th>
                        <th class="py-3 px-4"></th>
                        <th class="py-3 px-4"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($fornecedors as $fornecedor)
                        <tr class="border-b">
                            <td class="px-4 py-2">{{ $fornecedor->nome_fantasia }}</td>
                            <td class="px-4 py-2">
                                {{ preg_replace("/(\d{2})(\d{3})(\d{3})(\d{4})(\d{2})/", "$1.$2.$3/$4-$5", $fornecedor->cnpj) }}
                            </td>
                            <td class="px-4 py-2">{{ $fornecedor->email }}</td>
                            <td class="px-4 py-2">
                                <a href="{{ route('fornecedors.edit', $fornecedor->id) }}" >
                                    <button class="text-green-600 hover:underline">Editar</button>
                                </a>
                            </td>
                            <td class="px-4 py-2">
                                <button
                                    @click="openDeleteModal({{ $fornecedor->id }})"
                                    class="text-red-600 hover:underline">
                                    Excluir
                                </button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div
            x-show="show"
            x-transition
            x-cloak
            class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50">
            <div class="bg-white p-6 rounded shadow-lg max-w-md w-full">
                <h2 class="text-lg font-bold mb-4 text-center text-red-600">Confirmar Exclusão</h2>
                <p class="text-center mb-4">Tem certeza que deseja excluir este fornecedor?</p>
                <form :action="`/fornecedors/${fornecedorId}`" method="POST" class="flex justify-center gap-4">
                    @csrf
                    @method('DELETE')
                    <button type="button" @click="show = false" class="bg-gray-300 hover:bg-gray-400 text-gray-800 px-4 py-2 rounded">
                        Cancelar
                    </button>
                    <button type="submit" class="bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded">
                        Excluir
                    </button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
