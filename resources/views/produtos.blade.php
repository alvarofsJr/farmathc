<x-app-layout>
    <div class="container mx-auto mt-3">
        <h1 class="text-xl font-bold mb-4">Lista de Produtos</h1>

        @if(session()->has('message'))
            <div id="message-modal" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 z-50">
                <div class="bg-white p-6 rounded-lg shadow-md max-w-sm w-full">
                    <h2 class="text-lg font-semibold mb-4 text-center">Sucesso</h2>
                    <p class="text-center text-gray-700">{{ session('message') }}</p>
                    <div class="mt-6 flex justify-center">
                        <button onclick="document.getElementById('message-modal').classList.add('hidden')" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded">OK</button>
                    </div>
                </div>
            </div>
        @endif

        <div class="flex justify-start mb-4">
            <a href="{{ route('produtos.create') }}">
                <x-primary-button> Novo Produto </x-primary-button>
            </a>
        </div>

        <div class="overflow-x-auto">
            <table class="min-w-full text-center text-sm font-light text-gray-800 border border-gray-300 rounded-md shadow-lg">
                <thead class="border-b border-gray-300 bg-gray-800">
                    <tr>
                        <th class="py-3 px-2 font-medium text-white">Nome</th>
                        <th class="py-3 px-2 font-medium text-white">Categoria</th>
                        <th class="py-3 px-2 font-medium text-white">Quantidade</th>
                        <th class="py-3 px-2 font-medium text-white">Preço</th>
                        <th class="py-3 px-2 font-medium text-white">Validade</th>
                        <th class="py-3 px-2 font-medium text-white" colspan="2">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($produtos as $produto)
                        <tr class="border-b border-gray-300 bg-gray-100">
                            <td class="whitespace-nowrap px-2 py-2 border-r border-gray-300">{{ $produto->nome }}</td>
                            <td class="whitespace-nowrap px-2 py-2 border-r border-gray-300">{{ $produto->categoria->nome ?? '-' }}</td>
                            <td class="whitespace-nowrap px-2 py-2 border-r border-gray-300">{{ $produto->quantidade }}</td>
                            <td class="whitespace-nowrap px-2 py-2 border-r border-gray-300">R$ {{ number_format($produto->valor, 2, ',', '.') }}</td>
                            <td class="whitespace-nowrap px-2 py-2 border-r border-gray-300">{{ $produto->validade }}</td>
                            <td class="whitespace-nowrap px-4 py-2 border-r border-gray-300">
                                <a href="{{ route('produtos.edit', $produto->id) }}" class="no-underline">
                                    <button class="text-green-600 hover:underline">Editar</button>
                                </a>
                            </td>
                            <td class="whitespace-nowrap px-4 py-2">
                                <button onclick="openDeleteModal({{ $produto->id }})" class="text-red-600 hover:underline">Excluir</button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- Modal de confirmação de exclusão -->
    <div id="delete-modal" class="fixed inset-0 hidden items-center justify-center bg-black bg-opacity-50 z-50">
        <div class="bg-white p-6 rounded-lg shadow-md max-w-sm w-full">
            <h2 class="text-lg font-semibold mb-4 text-center text-red-600">Confirmar Exclusão</h2>
            <p class="text-center text-gray-700">Tem certeza que deseja excluir este produto?</p>
            <form id="delete-form" method="POST" class="mt-4 flex justify-center gap-4">
                @csrf
                @method('DELETE')
                <button type="submit" class="bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded">Excluir</button>
                <button type="button" onclick="closeDeleteModal()" class="bg-gray-300 hover:bg-gray-400 text-gray-700 px-4 py-2 rounded">Cancelar</button>
            </form>
        </div>
    </div>

    <script>
        function openDeleteModal(id) {
            const form = document.getElementById('delete-form');
            form.action = `/produtos/${id}`;
            document.getElementById('delete-modal').classList.remove('hidden');
            document.getElementById('delete-modal').classList.add('flex');
        }

        function closeDeleteModal() {
            document.getElementById('delete-modal').classList.add('hidden');
            document.getElementById('delete-modal').classList.remove('flex');
        }
    </script>
</x-app-layout>
