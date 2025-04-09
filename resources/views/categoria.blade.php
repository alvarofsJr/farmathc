<x-app-layout>
    <div class="container mx-auto mt-3">
        <h1 class="text-2xl font-bold mb-6 text-center">Lista de Categorias</h1>

        @if(session()->has('success'))
            <div class="alert alert-success my-3 mx-4 d-flex justify-center items-center">
                <ul class="mb-0">
                    {{ session()->get('success') }}
                </ul>
            </div>
        @endif

        <div class="flex justify-end mb-4">
            <a href="{{ route('categorias.create') }}">
                <x-primary-button>Nova Categoria</x-primary-button>
            </a>
        </div>

        <div class="overflow-x-auto border rounded-lg shadow">
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
                                <a href="{{ route('categorias.edit', $categoria->id) }}"  class="no-underline"> <button class="text-green-600 hover:underline">Editar</button></a>
                            </td>
                            <td>
                                <form action="{{ route('categorias.destroy', $categoria->id) }}" method="POST" onsubmit="return confirm('Tem certeza que deseja excluir esta categoria?');">
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
