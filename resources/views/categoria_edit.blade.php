<x-app-layout>
    <div class="container mx-auto mt-3">
        <h1 class="text-xl font-bold mb-4">Editar Categoria</h1>

        <form method="POST" action="{{ route('categorias.update', $categoria->id) }}">
            @csrf
            @method('PUT')

            <!-- Nome da Categoria -->
            <div class="mb-4">
                <label for="nome" class="block text-gray-700 font-bold mb-2">Nome da Categoria</label>
                <input type="text" id="nome" name="nome" value="{{ old('nome', $categoria->nome) }}"
                    class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                @error('nome')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Tipo da Categoria -->
            <div class="mb-4">
                <label for="tipo" class="block text-gray-700 font-bold mb-2">Tipo da Categoria</label>
                <select id="tipo" name="tipo"
                    class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <option value="produto" {{ old('tipo', $categoria->tipo) == 'produto' ? 'selected' : '' }}>Produto</option>
                    <option value="remedio" {{ old('tipo', $categoria->tipo) == 'remedio' ? 'selected' : '' }}>Remédio</option>
                </select>
                @error('tipo')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Botões -->
            <div class="flex space-x-2">
                <x-primary-button type="submit">Atualizar</x-primary-button>
                <a href="{{ route('categorias.index') }}" class="px-4 py-2 bg-gray-500 text-white rounded-md">Cancelar</a>
            </div>
        </form>
    </div>
</x-app-layout>
