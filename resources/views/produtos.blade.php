<x-app-layout>
    <div class="container mx-auto mt-3">
        <h1 class="text-xl font-bold mb-4">Lista de Produtos</h1>

        @if(session()->has('message'))
            <div class="alert alert-success my-3 mx-4 d-flex justify-content-center align-items-center">
                <ul class="mb-0">
                    {{ session()->get('message') }}
                </ul>
            </div>
        @endif

        <div class="flex justify-start mb-1">
            <form method="GET" action="{{ route('produtos.create') }}">
                <x-primary-button type="submit">Novo Produto</x-primary-button>
            </form>
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
                        <th class="py-3 px-2 font-medium text-white"></th>
                        <th class="py-3 px-2 font-medium text-white"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($produtos as $produto)
                        <tr class="border-b border-gray-300 bg-gray-100">
                            <td class="whitespace-nowrap px-2 py-2 border-r border-gray-300">{{ $produto->nome }}</td>
                            <td class="whitespace-nowrap px-2 py-2 border-r border-gray-300">{{ $produto->categoria->nome }}</td>
                            <td class="whitespace-nowrap px-2 py-2 border-r border-gray-300">{{ $produto->quantidade }}</td>
                            <td class="whitespace-nowrap px-2 py-2 border-r border-gray-300">R$ {{ number_format($produto->valor, 2, ',', '.') }}</td>
                            <td class="whitespace-nowrap px-2 py-2 border-r border-gray-300">{{ \Carbon\Carbon::parse($produto->validade)->format('d/m/Y') }}</td>
                            <td class="whitespace-nowrap px-4 py-2 border-r border-gray-300">
                                <a href="{{ route('produtos.edit', ['produto' => $produto->id]) }}">
                                    <button class="text-green-600 hover:underline">Editar</button>
                                </a>
                            </td>
                            <td class="whitespace-nowrap px-4 py-2">
                                <form action="{{ route('produtos.destroy', $produto->id) }}" method="POST" onsubmit="return confirm('Você tem certeza que deseja excluir este produto?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:underline">Excluir</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>
