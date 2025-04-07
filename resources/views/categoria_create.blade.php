<x-app-layout>
    <div class="container mx-auto mt-10 max-w-sm">
        <div class="bg-white shadow-md rounded-lg p-6 border border-gray-200">
            <h1 class="text-2xl font-semibold text-center text-gray-800 mb-6">Nova Categoria</h1>

            <form method="POST" action="{{ route('categorias.store') }}">
                @csrf

                <div class="mb-4">
                    <label for="nome" class="block text-gray-700 font-medium mb-1">Nome da Categoria</label>
                    <input type="text" id="nome" name="nome" value="{{ old('nome') }}"
                        class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">

                    @error('nome')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-6">
                    <label for="tipo" class="block text-gray-700 font-medium mb-1">Tipo da Categoria</label>
                    <select name="tipo" id="tipo"
                        class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                        <option value="">Selecione um tipo</option>
                        <option value="produto" {{ old('tipo') == 'produto' ? 'selected' : '' }}>Produto</option>
                        <option value="remedio" {{ old('tipo') == 'remedio' ? 'selected' : '' }}>Remédio Controlado</option>
                    </select>

                    @error('tipo')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex justify-between">
                    <x-primary-button type="submit">Salvar</x-primary-button>
                    <a href="{{ route('categorias.index') }}"
                        class="px-4 py-2 bg-gray-500 text-white rounded-md hover:bg-gray-600 transition">
                        Cancelar
                    </a>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
