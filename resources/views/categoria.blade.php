<x-app-layout>
    <div class="container mx-auto mt-3">
        <h1 class="text-2xl font-bold mb-6 text-center">Lista de Categorias</h1>

        @if(session()->has('message'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4 mx-4 text-center" role="alert">
                <span class="block sm:inline">{{ session()->get('message') }}</span>
            </div>
        @endif

        <div class="flex justify-end mb-4">
            <a href="{{ route('categorias.create') }}">
                <x-primary-button>Nova Categoria</x-primary-button>
            </a>
        </div>

        <div class="overflow-x-auto border rounded-lg shadow" x-data="{ showModal: false, categoriaId: null, categoriaNome: '' }">
            <table class="min-w-full text-center text-sm text-gray-800 border border-gray-300">
                <thead class="bg-gray-800 text-white">
                    <tr>
                        <th class="py-3 px-2">Nome</th>
                        <th class="py-3 px-2">Tipo</th>
                        <th class="py-3 px-2">Editar</th>
                        <th class="py-3 px-2">Excluir</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($categorias as $categoria)
                        <tr class="border-b bg-gray-100">
                            <td class="py-2 px-2">{{ $categoria->nome }}</td>
                            <td class="py-2 px-2">
                                <span class="px-2 py-1 rounded-full text-white text-xs {{ $categoria->tipo === 'produto' ? 'bg-blue-500' : 'bg-purple-600' }}">
                                    {{ ucfirst($categoria->tipo) }}
                                </span>
                            </td>
                            <td>
                                <a href="{{ route('categorias.edit', $categoria->id) }}" class="no-underline">
                                    <button class="text-green-600 hover:underline">Editar</button>
                                </a>
                            </td>
                            <td>
                                <button
                                    @click="categoriaId = {{ $categoria->id }}; categoriaNome = '{{ $categoria->nome }}'; showModal = true;"
                                    class="text-red-600 hover:underline"
                                >
                                    Excluir
                                </button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <!-- Modal de Confirmação de Exclusão -->
            <div
                x-show="showModal"
                class="fixed inset-0 flex items-center justify-center z-50 bg-black bg-opacity-50"
                style="display: none;"
            >
                <div class="bg-white p-6 rounded-lg shadow-lg max-w-sm w-full">
                    <h2 class="text-xl font-bold mb-4 text-center text-gray-800">Confirmar Exclusão</h2>
                    <p class="text-center mb-6">Deseja realmente excluir a categoria <span class="font-semibold" x-text="categoriaNome"></span>?</p>
                    <div class="flex justify-center space-x-4">
                        <form
                            method="POST"
                            :action="'/categorias/' + categoriaId"
                            @submit="showModal = false"
                        >
                            @csrf
                            @method('DELETE')
                            <button
                                type="submit"
                                class="bg-red-600 text-white px-4 py-2 rounded hover:bg-red-700"
                            >
                                Excluir
                            </button>
                        </form>
                        <button
                            @click="showModal = false"
                            class="bg-gray-400 text-white px-4 py-2 rounded hover:bg-gray-500"
                        >
                            Cancelar
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
