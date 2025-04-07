<div class="overflow-x-auto">
    <table class="min-w-full text-center text-sm font-light text-gray-800 border border-gray-300 rounded-md shadow-lg">
        <thead class="border-b border-gray-300 bg-gray-800">
            <tr>
                <th class="py-3 px-2 font-medium text-white">Nome</th>
                <th class="py-3 px-2 font-medium text-white"></th>
                <th class="py-3 px-2 font-medium text-white"></th>
            </tr>
        </thead>
        <tbody>
            @forelse($categorias as $categoria)
                <tr class="border-b border-gray-300 bg-gray-100">
                    <td class="whitespace-nowrap px-2 py-2 border-r border-gray-300">{{ $categoria->nome }}</td>
                    <td class="whitespace-nowrap px-4 py-2 border-r border-gray-300">
                        <a href="{{ route('categorias.edit', $categoria->id) }}">
                            <button class="text-green-600 hover:underline">Editar</button>
                        </a>
                    </td>
                    <td class="whitespace-nowrap px-4 py-2">
                        <form action="{{ route('categorias.destroy', $categoria->id) }}" method="POST" onsubmit="return confirm('Tem certeza que deseja excluir esta categoria?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600 hover:underline">Excluir</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="3" class="py-4">Nenhuma categoria cadastrada.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
