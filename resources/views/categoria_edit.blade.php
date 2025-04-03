<x-app-layout>
    <div class="container mx-auto mt-3">
        <h1 class="text-xl font-bold mb-3">Editar Categoria</h1>

        <form action="{{ route('categorias.update', $categoria->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label for="nome" class="block text-gray-700 font-bold mb-2">Nome da Categoria</label>
                <input type="text" id="nome" name="nome" value="{{ old('nome', $categoria->nome) }}"
                    class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">

                @error('nome')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex space-x-2">
                <x-primary-button type="submit">Salvar</x-primary-button>
                <a href="{{ route('categorias.index') }}" class="px-4 py-2 bg-gray-500 text-white rounded-md">Cancelar</a>
            </div>
        </form>
    </div>
</x-app-layout>
